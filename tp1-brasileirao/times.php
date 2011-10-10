<?
$time = $_GET['time'];
if (!$time)
    $time = 1;

$sql = "SELECT 
               id, 
               concat (time.nome,'-',estado) as nome,
               sigla,
               brasao
               FROM time ORDER BY time.nome";
    $rs = mysql_query($sql) or die(mysql_error());
    $table = array();
    $i = 0;
    while ($row = mysql_fetch_array($rs)) {
        $table[$i++] = $row;
    }


$sql = "SELECT time.nome,
               estado,
               sigla,
               brasao,
               gols_pro,
               gols_contra,
               total_faltas,
               vitorias,
               derrotas,
               empates,
               tecnico.nome as tecnico_nome 
               FROM time inner join tecnico where tecnico_id=tecnico.id and time.id='".$time."'ORDER BY time.nome";
$qry = mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($qry)) {
    $R = mysql_fetch_object($qry);
}
else{
    die("Não existem informações sobre esse time.");
}

$sql = "SELECT *,DATE_FORMAT(data_nascimento,'%d/%m/%Y')as data FROM jogador where time_id='" .$time . "' ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry) > 0) {
    ?>
<div>
    <?
    $i=0;
    while($i < count($table)){
       echo "<a href='?acao=times&time=".utf8_encode($table[$i]['id'])."'><img src='img/".utf8_encode($table[$i]['brasao'])."'></img></a>\n";
       $i++;
    }
    ?>
</div>
    <div class="box_first">
        <table>
            <?
            $id = $R->id;
            $nome = $R->nome;
            $brasao = $R->brasao;
            $estado = $R->estado;
            $sigla = $R->sigla;
            $gols_contra = $R->gols_contra;
            $total_faltas = $R->total_faltas;
            $tecnico = $R->tecnico_nome;
            ?>
            <tr>
                <td>Brasão:</td>
                <td><img src="<?= "img/" . $brasao; ?>" alt="kkk"></img></td>
            </tr>
            <tr>
                <td>Nome:</td>
                <td><? echo utf8_encode($nome); ?></td>
            </tr>
            <tr>
            <tr>
                <td>Sigla:</td>
                <td><? echo utf8_encode($sigla); ?></td>
            </tr>
            <tr>                
                <td>Estado:</td>
                <td><? echo utf8_encode($estado); ?></td>
            </tr>
            <tr>
                <td>Técnico:</td>
                <td><? echo utf8_encode($tecnico); ?></td>
            </tr>   
        </table>
    </div>    
    <div class ="box">
        <table>
            <?
            $i = 0;
            ?>
                 <tr class="first">
                    <td>Nome</td>
                    <td>Data Nasc</td>
                    <td>Posição</td>
                    <td>Cartões Amarelos</td>
                    <td>Cartões Vermelhos</td>
                    <td>Num Faltas</td>
                </tr>
             <?   
            while ($R = mysql_fetch_object($qry)) {
                $id = $R->id;
                $nome = $R->nome;
                $data_nascimento = $R->data;
                $posicao = $R->posicao;
                $time = $R->time_id;
                $cartoes_amarelos = $R->cartoes_amarelos;
                $cartoes_vermelhos = $R->cartoes_vermelhos;
                $total_faltas = $R->total_faltas;
                if ($i % 2)
                    $cor = "#ffffff";
                else
                    $cor = "#f1f1f1";
                ?>
                <tr>
                    <td><? echo utf8_encode($nome); ?></td>
                    <td><? echo utf8_encode($data_nascimento); ?></td>
                    <td><? echo utf8_encode($posicao); ?></td>
                    <td><? echo $cartoes_amarelos; ?></td>
                    <td><? echo $cartoes_vermelhos; ?></td>
                    <td><? echo $total_faltas; ?></td>
                </tr>
                <?
                $i++;
            }
            ?>
        </table>
    </div>    
    <?
}else {
    echo "Listagem cancelada (Tabela vazia).";
}
?>
