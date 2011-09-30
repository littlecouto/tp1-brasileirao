<?
	include "conecta.php"; 

	$sql = "CREATE TABLE `cadastroXX` (
  		`matricula` varchar(15) CHARACTER SET utf8 NOT NULL,
  		`nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  		`email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  		PRIMARY KEY (`matricula`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";

	mysql_query($sql) or die(mysql_error());

	echo "<p>Tabela criada com sucesso !</p>";

?>
