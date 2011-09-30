<?

/*
 	Departamento de Ciencia da Computacao - DCOMP
	Semana da Computacao - SECOMP 2011
 	Minicurso: Introdução a linguagem de programação PHP
-------------------------------------------------------------
	Servidor MySQL:     localhost
	Banco de dados:     bd01
	Usuario de acesso:  usuario
	Senha do usuario:   minicurso
*/

$dbserver  = "localhost";	// Servidor onde está o banco de dados
$dbname    = "bd01";		// Nome do banco de dados MySQL 
$dbuser    = "usuario";		// Usuario MySQL para conexao 
$dbpassw   = "minicurso";	// Senha do usuario MySQL

$conexao = mysql_connect($dbserver,$dbuser,$dbpassw) or die(mysql_error());
mysql_select_db($dbname,$conexao) or die(mysql_error());

?>
