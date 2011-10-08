<?
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


?>
