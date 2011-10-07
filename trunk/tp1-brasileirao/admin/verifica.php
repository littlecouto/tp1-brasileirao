<?php
//INICIALIZAMOS A SESSÃO
session_start();
//VERIFICAMOS SE NÃO TEM VARIÁVEIS REGISTRADAS
if( (!isset($_SESSION[iduser])) AND (!isset($_SESSION[nomeuser])) )
//RETORNA PARA A TELA DE LOGIN  
 Header("Location: index.php");
?>
