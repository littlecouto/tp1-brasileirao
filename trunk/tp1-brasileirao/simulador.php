<?
$rodada = $_GET["rodada"];
if (!$rodada) {
    $rodada = 1;
}
include "admin/conecta.php";
$sql = "drop table if exists `tp1_bd`.`partida_tmp`";
$qry = mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE  `tp1_bd`.`partida_tmp` (
  `id` int(10) unsigned NOT NULL,
  `mandante_id` int(10) unsigned NOT NULL,
  `visitante_id` int(10) unsigned NOT NULL,
  `estadio_id` int(10) unsigned NOT NULL,
  `data` datetime NOT NULL,
  `rodada` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 select * from partida";
$qry = mysql_query($sql) or die(mysql_error());

$sql = "drop table if exists `tp1_bd`.`time_tmp`";
$qry = mysql_query($sql) or die(mysql_error());

$sql = "CREATE TABLE  `tp1_bd`.`time_tmp` (
    `id` int(10) unsigned NOT NULL,
  `nome` varchar(80) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `brasao` varchar(255) NOT NULL,
  `gols_pro` int(10) unsigned NOT NULL DEFAULT '0',
  `gols_contra` int(10) unsigned NOT NULL DEFAULT '0',
  `total_faltas` int(10) unsigned NOT NULL DEFAULT '0',
  `tecnico_id` int(10) unsigned NOT NULL DEFAULT '1',
  `vitorias` int(10) unsigned NOT NULL DEFAULT '0',
  `derrotas` int(10) unsigned NOT NULL DEFAULT '0',
  `empates` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 select * from time";
$qry = mysql_query($sql) or die(mysql_error());

$sql = "SELECT 
        partida.id,
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
        FROM partida inner join time as time1 inner join time as time2 where time1.id=partida.mandante_id and time2.id=partida.visitante_id
        ORDER by data";
$rs = mysql_query($sql) or die(mysql_error());
$table = array();
while ($row = mysql_fetch_array($rs)) {
    if(!$table[$row['rodada']]) $table[$row['rodada']] = array();
    array_push($table[$row['rodada']],$row);
}
?>
<div class="box_first">
    <h5>Escolha uma Rodada</h5>
    <div class="rodadas">
        <?
        $i=1;
        while($i < count($table)){
           echo " <div class='rodada'><a href='?acao=simulador&rodada=".utf8_encode($table[$i]['1']['rodada'])."' class='".utf8_encode($table[$i]['1']['passou'])."'>".
                   utf8_encode(str_pad($table[$i]['1']['rodada'],2,'0', STR_PAD_LEFT))."</a></div>\n";
           $i++;
        }
        ?>
    </div><!--End rodadas-->
</div><!--End box_first-->

<div class="box">
    <div class="partida">
        <form name="placar">
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
            echo "<input type='text' name='mandante' id='mandante' value=".$gols_mandante.">";
            echo "<img src='img/versus.png' class='versus'/>";
            echo "<input type='text' name='visitante' id='visitante' value=".$gols_mandante.">";
            echo "<img src='".$brasao_visitante."' title='".$visitante_nome."' alt='".$visitante_nome."' class='mandante'/>";
            echo "<div class='info'>";
            echo "<p class='label'>".$data."</p>";
            echo "<p>";
            echo "</div>";
            $i++;
        }
        ?>        
        </form>            
    </div>
</div>
