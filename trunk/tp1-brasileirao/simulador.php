<script language="javascript">
    function submitform(passou,rodada)
    {
        document.getElementById("rodada").value=rodada;
        document.getElementById("simulate").value='1';
        document.placar.submit();
    }
</script>
<?
include "admin/conecta.php";
include "scripts_simulacao.php";

//print_r($_GET);
$rodada = $_REQUEST["rodada"];
$simulate = $_REQUEST["simulate"];

if (!$rodada) {
    $rodada = 1;
}

if (!$simulate) {
    criar_tabelas();
} else {
    $num = $_REQUEST["num"];
    for ($i = 0; $i < $num; $i++) {
        $mandante_gols = $_REQUEST["mandante_gols" . $i];
        $visitante_gols = $_REQUEST["visitante_gols" . $i];
        $mandante_id = $_REQUEST["mandante_id" . $i];
        $visitante_id = $_REQUEST["visitante_id" . $i];        
        $partida_id = $_REQUEST["partida_id" . $i];
        $passou = $_REQUEST["passou" . $i];
                
        if ($partida_id != "" && $mandante_gols != "" && $visitante_gols != "" && $visitante_id!="" && $mandante_id!="" && $passou=="" ) {

            $sql = "SELECT * FROM partida_tmp where id='$partida_id'";
            $qry = mysql_query($sql) or die(mysql_error());
            $R = mysql_fetch_object($qry);
            
            if($R->mandante_gols=="" && $R->visitante_gols==""){
                $sql = "UPDATE partida_tmp SET mandante_gols='$mandante_gols',visitante_gols='$visitante_gols' where id='$partida_id'";
                mysql_query($sql) or die(mysql_error());
                insere_valores($mandante_id,$visitante_id,$mandante_gols,$visitante_gols);
            }
            else{
                reverte_valores($R->mandante_id,$R->visitante_id,$R->mandante_gols,$R->visitante_gols);
                $sql = "UPDATE partida_tmp SET mandante_gols='$mandante_gols',visitante_gols='$visitante_gols' where id='$partida_id'";
                mysql_query($sql) or die(mysql_error());
                insere_valores($mandante_id,$visitante_id,$mandante_gols,$visitante_gols);
            }

        }
        else{
            //do nothing...
        }
    }
}


$sql = "SELECT 
        partida_tmp.id,
        rodada,
	estadio.nome as estadio_nome,
        mandante_gols,
	mandante_id,
        visitante_gols,
	visitante_id,
        concat(time1.nome,'-',time1.estado) as mandante_nome,
        time1.sigla as mandante_sigla,
        concat(time2.nome,'-',time2.estado) as visitante_nome,
        time2.sigla as visitante_sigla,
        time1.brasao as mandante_brasao,
        time2.brasao as visitante_brasao,
        DATE_FORMAT(data,'%d/%m/%Y %H:%i:%s')as data_formatada,
        IF(data < CURDATE(),'passada','') as passou 
        FROM partida_tmp inner join time_tmp as time1 inner join time_tmp as time2 inner join estadio where time1.id=partida_tmp.mandante_id and time2.id=partida_tmp.visitante_id and estadio.id=partida_tmp.estadio_id 
        ORDER by data";
$rs = mysql_query($sql) or die(mysql_error());
$table = array();
while ($row = mysql_fetch_array($rs)) {
    if (!$table[$row['rodada']])
        $table[$row['rodada']] = array();
    array_push($table[$row['rodada']], $row);
}

$sql = "SELECT concat(nome,'-',estado) as nome,
        vitorias*3+empates as P,
        vitorias+derrotas+empates as J,
        vitorias as V,
        empates as E,
        derrotas as D,
        gols_pro as GP,
        gols_contra as GC,
        gols_pro-gols_contra as SG,
        IF((vitorias+empates+derrotas),(vitorias*3+empates)/((vitorias+empates+derrotas)*3)*100,0) as aprv FROM time_tmp
        order by P desc,SG desc,GP desc";
$qry = mysql_query($sql) or die(mysql_error());
?>
<div class="box_first">
    <h5>Escolha uma Rodada</h5>
    <div class="rodadas">
        <?
        $i = 1;
        while ($i < count($table)) {
            $rod = $table[$i]['1']['rodada'];
            echo " <div class='rodada'><a href='javascript:submitform(1,$rod)' class='" . utf8_encode($table[$i]['1']['passou']) . "'>" .
            utf8_encode(str_pad($rod, 2, '0', STR_PAD_LEFT)) . "</a></div>\n";
            $i++;
        }
        ?>
    </div><!--End rodadas-->
</div><!--End box_first-->

<div class="box">
    <h5><? echo "Partidas da rodada $rodada"; ?></h5>
    <form name="placar" id="placar" method="POST" action="?acao=simulador&simulate=1">
        <?
        $i = 0;
        while ($i < count($table[$rodada])) {
            $partida_id = utf8_encode($table[$rodada][$i]['id']);
            $brasao_mandante = "img/" . utf8_encode($table[$rodada][$i]['mandante_brasao']);
            $brasao_visitante = "img/" . utf8_encode($table[$rodada][$i]['visitante_brasao']);
            $mandante_sigla = utf8_encode($table[$rodada][$i]['mandante_sigla']);
            $visitante_sigla = utf8_encode($table[$rodada][$i]['visitante_sigla']);
            $mandante_nome = utf8_encode($table[$rodada][$i]['mandante_nome']);
            $mandante_id = utf8_encode($table[$rodada][$i]['mandante_id']);
            $visitante_id = utf8_encode($table[$rodada][$i]['visitante_id']);
            $visitante_nome = utf8_encode($table[$rodada][$i]['visitante_nome']);
            $passou = utf8_encode($table[$rodada][$i]['passou']);            
            $gols_mandante = utf8_encode($table[$rodada][$i]['mandante_gols']);
            $gols_visitante = utf8_encode($table[$rodada][$i]['visitante_gols']);
            $estadio = utf8_encode($table[$rodada][$i]['estadio_nome']);
            $data = utf8_encode($table[$rodada][$i]['data_formatada']);
            echo "<div class='partida_box' >\n";
            echo "<div class='partida' >\n";
            echo "<input type='hidden' name='partida_id" . $i . "' id='partida_id" . $i . "' value='" . $partida_id . "'>\n";
            echo "<input type='hidden' name='mandante_id" . $i . "' id='mandante_id" . $i . "' value='" . $mandante_id . "'>\n";
            echo "<input type='hidden' name='visitante_id" . $i . "' id='visitante_id" . $i . "' value='" . $visitante_id . "'>\n";
            echo "<input type='hidden' name='passou" . $i . "' id='passou" . $i . "' value='" . $passou . "'>\n";                        
            echo "<img src='" . $brasao_mandante . "' title='" . $mandante_nome . "' alt='" . $mandante_nome . "' class='mandante'/>\n";
            echo "<input type='text' name='mandante_gols" . $i . "' id='mandante' value='" . $gols_mandante . "' size='2' maxlength='2'>\n";
            echo "<img src='img/versus.png' class='versus'/>\n";
            echo "<input type='text' name='visitante_gols" . $i . "' id='visitante' value='" . $gols_visitante . "' size='2' maxlength='2'>\n";
            echo "<img src='" . $brasao_visitante . "' title='" . $visitante_nome . "' alt='" . $visitante_nome . "' class='visitante'/>\n";
            echo "</div>\n";
            echo "<div class='info'>\n";
            echo "<p class='label'>" . $data . "</p>\n";
            echo "<p class='label'>" . $estadio . "</p>\n";
            echo "</div>\n";
            echo "</div>\n";
            $i++;
        }
        ?>
        <input type="submit" class="botao" id="botao" name="botao_submit" value="Simular">     
        <input type='hidden' name='num' id='num' value=<?= count($table[$rodada]) ?>> 
        <input type='hidden' name='acao' id='acao' value='simulador'> 
        <input type='hidden' name='rodada' id='rodada' value=<?= $rodada ?>>         
        <input type='hidden' name='simulate' id='simulate' value='1'>
    </form>            
</div>

<div class="box">
    <h5>Tabela</h5>
    <table>
        <thead>
            <tr id="primeira">
                <td>Classificação</td>
                <td>Nome</td>
                <td>P</td>
                <td>J</td>
                <td>V</td>
                <td>E</td>
                <td>D</td>
                <td>GP</td>
                <td>GC</td>
                <td>SG</td>
                <td>%</td>
            </tr>
        </thead>
        <tbody>
            <?
            $i = 1;
            while ($R = mysql_fetch_object($qry)) {
                $nome = $R->nome;
                $P = $R->P;
                $J = $R->J;
                $V = $R->V;
                $E = $R->E;
                $D = $R->D;
                $GP = $R->GP;
                $GC = $R->GC;
                $SG = $R->SG;
                $aprv = $R->aprv;

                if ($i % 2)
                    $cor = "#ffffff";
                else
                    $cor = "#f1f1f1";
                ?>
                <tr>
                    <td><? echo $i; ?></td>
                    <td><? echo utf8_encode($nome); ?></td>
                    <td align="center"><? echo $P; ?></td>
                    <td align="center"><? echo $J; ?></td>
                    <td align="center"><? echo $V; ?></td>
                    <td align="center"><? echo $E; ?></td>
                    <td align="center"><? echo $D; ?></td>
                    <td align="center"><? echo $GP; ?></td>
                    <td align="center"><? echo $GC; ?></td>
                    <td align="center"><? echo $SG; ?></td>
                    <td align="center"><? echo $aprv; ?></td>
                    </td>
                </tr>
                <?
                $i++;
            }
            ?>
        <tbody>
        <tfoot>
        </tfoot>    
    </table>  
</div>