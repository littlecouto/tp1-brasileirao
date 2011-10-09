<?php
//INICIALIZAMOS A SESSÃO
session_start();
//DESTRUIMOS AS VARIÁVEIS
unset($_SESSION[iduser]);
unset($_SESSION[nomeuser]);
//REDIRECIONAMOS PARA PÁGINA DE LOGIN
Header("Location:..");
?>
