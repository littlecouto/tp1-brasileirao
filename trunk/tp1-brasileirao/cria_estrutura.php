<?

function criar_tabelas(){
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
}
?>
