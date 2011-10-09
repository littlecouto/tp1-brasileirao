<?php
//FAZEMOS O INCLUDE DO ARQUIVO DE CONFIG
require_once("conecta.php");
//RECEBE OS DADOS DO FORMULÁRIO
$usuario   =   $_POST[user]; 
// ASPAS ESCARPADAS EVITANDO ASPAS SIMPLES 
$usuario = addslashes($usuario);
// RECEBE OS DADOS DE USER DA SENHA 
$senha     =   $_POST[senha];
// DA O MD5 PARA CRIPTOGRAFIA 
$senha  = md5($senha); 
//VERIFICAMOS USUÁRIO E SENHA COMPARANDO COM OS DADOS DO BANCO MYSQL
$sql   =   mysql_query("SELECT ID_USUARIO, NOME_USUARIO FROM tb_usuarios 
	 WHERE  USUARIO  =  '$usuario' AND SENHA    =  '$senha'") or die(mysql_error());
 
//VERIFICAMOS AS LINHAS AFETADAS PELA CONSULTA
$row   =  mysql_num_rows($sql);
 
//VERIFICAMO SE RETORNOU ALGO
if($row == 0) 
{
	echo "Erro: Usuário ou Senha inválidos";
	echo "<br>";
	echo "<a href='index.php'>voltar</a>";
}
//SE $row É DIFERENTE DE ZERO, RETORNOU ALGO
else 
{ 
     //PEGA OS DADOS DO MYSQL E ATRIBUIMOS O VALOR A VARIAVEL
	 $id   =   mysql_result($sql, 0, "ID_USUARIO");
	 $nome =   mysql_result($sql, 0, "NOME_USUARIO");
     //INICIALIZAMOS A SESSÃO
	 session_start();
	 //PASSAMOS AS VARIÁVEIS PARA SESSÃO
	 $_SESSION[iduser]    =   $id;
	 $_SESSION[nomeuser]  =   $nome;	 
	 //REDIRECIONAMOS PARA A PÁGINA QUE VAI EXIBIR OS DADOS
	 Header("Location: exibe.php");
}
?>
