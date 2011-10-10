
<?
//print_r($_GET);
$rodada = $_REQUEST["rodada"];
$simulate = $_GET["simulate"];

if (!$rodada) {
    $rodada = 1;
}
include "admin/conecta.php";
include "cria_estrutura.php";

if(!$simulate) {echo "kkkkkk";criar_tabelas();}
else{
    echo "kkkkhhhhhkk";
    $num = $_GET["num"];
    for($i=0;$i<$num;$i++){
        $mandante_gols = $_GET["mandante_gols".$i];
        $visitante_gols = $_GET["visitante_gols".$i];
        echo $mandante_gols;
        echo $visitante_gols;
}
}


$sql = "SELECT 
        partida_tmp.id,
        rodada,
        mandante_gols,
        visitante_gols,
        concat(time1.nome,'-',time1.estado) as mandante_nome,
        time1.sigla as mandante_sigla,
        concat(time2.nome,'-',time2.estado) as visitante_nome,
        time2.sigla as visitante_sigla,
        time1.brasao as mandante_brasao,
        time2.brasao as visitante_brasao,
        DATE_FORMAT(data,'%d/%m/%Y %H:%i:%s')as data_formatada,
        IF(data < CURDATE(),'passada','') as passou 
        FROM partida_tmp inner join time_tmp as time1 inner join time_tmp as time2 where time1.id=partida_tmp.mandante_id and time2.id=partida_tmp.visitante_id
        ORDER by data";
$rs = mysql_query($sql) or die(mysql_error());
$table = array();
while ($row = mysql_fetch_array($rs)) {
    if(!$table[$row['rodada']]) $table[$row['rodada']] = array();
    array_push($table[$row['rodada']],$row);
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
        order by (vitorias*3+empates) desc";
$qry = mysql_query($sql) or die(mysql_error());

?>
<div class="box_first">
    <h5>Escolha uma Rodada</h5>
    <div class="rodadas">
        <?
        $i=1;
        while($i < count($table)){
           echo " <div class='rodada'><a href='javascript:submitform()' class='".utf8_encode($table[$i]['1']['passou'])."'>".
                   utf8_encode(str_pad($table[$i]['1']['rodada'],2,'0', STR_PAD_LEFT))."</a></div>\n";
            $i++;
        }
        ?>
    </div><!--End rodadas-->
</div><!--End box_first-->

<div class="box">
    <div class="partida" >
        <form name="placar" id="placar" method="GET" action="?acao=simulador&simulate=true">
        <?
        $i=0;
        while($i < count($table[$rodada])){
            
            $brasao_mandante = "img/".utf8_encode($table[$rodada][$i]['mandante_brasao']);
            $brasao_visitante = "img/".utf8_encode($table[$rodada][$i]['visitante_brasao']);
            $mandante_sigla = utf8_encode($table[$rodada][$i]['mandante_sigla']);
            $visitante_sigla = utf8_encode($table[$rodada][$i]['visitante_sigla']);
            $mandante_nome = utf8_encode($table[$rodada][$i]['mandante_nome']);
            $visitante_nome = utf8_encode($table[$rodada][$i]['visitante_nome']);            
            $gols_mandante = utf8_encode($table[$rodada][$i]['mandante_gols']);
            $gols_visitante = utf8_encode($table[$rodada][$i]['visitante_gols']);
            $data = utf8_encode($partidas_por_rodada[$rodada][$i]['data_formatada']);
            
            echo "<img src='".$brasao_mandante."' title='".$mandante_nome."' alt='".$mandante_nome."' class='mandante'/>";
            echo "<input type='text' name='mandante_gols".$i."' id='mandante' value=".$gols_mandante.">";
            echo "<img src='img/versus.png' class='versus'/>";
            echo "<input type='text' name='visitante_gols".$i."' id='visitante' value=".$gols_mandante.">";
            echo "<img src='".$brasao_visitante."' title='".$visitante_nome."' alt='".$visitante_nome."' class='mandante'/>";
            echo "<div class='info'>";
            echo "<p class='label'>".$data."</p>";
            echo "<p>";
            echo "</div>";
            $i++;
        }
        ?>
        <input type="submit" class="botao" id="botao" name="submit" value="Simular">     
        <input type='hidden' name='num' id='num' value=<?=count($table[$rodada])?>> 
        <input type='hidden' name='acao' id='acao' value='simulador'> 
        <input type='hidden' name='rodada' id='rodada' value=<?=$rodada?>>         
        <input type='hidden' name='simulate' id='simulate' value='0'> 
        </form>            
    </div>
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
                $i=1;
		while ($R=mysql_fetch_object($qry)) { 
			$nome      = $R->nome;
			$P    = $R->P;
			$J    = $R->J;
			$V  = $R->V; 
			$E = $R->E;
			$D = $R->D;
			$GP = $R->GP;
                        $GC = $R->GC; 
			$SG = $R->SG; 
			$aprv = $R->aprv; 

                        if($i%2) $cor = "#ffffff";       
                        else $cor = "#f1f1f1";
			?>
			<tr>
                                <td><? echo $i; ?></td>
				<td><? echo utf8_encode($nome); ?></td>
				<td align="center"><? echo $P;?></td>
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
