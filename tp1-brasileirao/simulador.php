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

$sql = "SELECT * FROM partida ORDER BY data";
$rs = mysql_query($sql) or die(mysql_error());
$table = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $table[$i++] = $row;
}

$sql = "SELECT distinct rodada from partida";
$rs = mysql_query($sql) or die(mysql_error());
$rodadas = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $rodadas[$i++] = $row;
}
?>
<div class="box_first">
    <h5>Escolha uma Rodada</h5>
    <div class="rodadas">
        <?
        $i=0;
        while($i < count($rodadas)){
           echo " <div class='rodada'><a href='#' class='passada'>".utf8_encode($rodadas[$i]['rodada'])."</a></div>";
           $i++;
        }
        ?>
    </div><!--End rodadas-->
</div><!--End box_first-->

<div class="box">
    <div class="partida">
        <form name="placar">
            <img src="img/america-mg_45x45.png" title="América-MG" alt="América-MG" class="mandante"/>
            <input type="text" name="mandante" id="mandante">
            <img src="img/versus.png" class="versus"/>
            <input type="text" name="visitante" id="visitante">
            <img src="img/america-mg_45x45.png" title="América-MG" alt="América-MG" class="visitante"/>
        </form>
        <div class="info">
            <p class="label">Data:</p><p>21/10/2011</p>
            <p>
        </div>
    </div>
</div>
