<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="_style/default.css" rel="stylesheet" type="text/css"/>
		<link href="_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="_scripts/jquery.js"></script>
		<script type="text/javascript" src="_scripts/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="_scripts/exemplo-calendario.js"></script>
		<script src="_scripts/functions.js" type="text/javascript" language="javascript"></script>
        <title>.: Brasileirão 2011 :.</title>
        <style>
            div {
                text-align: center;
            }
            ul {
                list-style: none;
                padding: 0 0 0 0;
            }
            a {
                text-decoration: none;
            }
            div.principal{
                width: 90%;
                display: table;
            }
            div.corpo{
                padding: 0 0 0 0;
            }
            div.menu {
                width: 20%;
                float: left;
                padding: 0 0 0 0;
                border: 1px solid #000000;
            }
            div.conteudo {
                margin-left: 21%;
            }
            .menu ul {
                display: block;
                padding: 0 0 0 0;
            }
            .menu li {
                display: block;
                padding: 10 10 10 10;
            }
/*            .menu li {
                background-color: #e1e1e1;   
            }*/
            .menu ul li ul{
                display:none; 
            }
            .menu ul li:houver{
                display:block; 
            }
            
         </style>
</head>
<body>
<center>
<? include "verifica.php"; ?>    
<div class="principal">
	<div class="banner">
            <h1><b>Brasileirão 2011</b></h1>
        </div>
        <div class="corpo">
            <div class="menu">
                <? include "opcoes_admin.php"; ?>
            </div>
            <div class="conteudo">

                    <?
                            $acao = $_GET["acao"];
                            if ($acao != "") {
                                    include "conecta.php";
                                    $arquivo = $acao.".php";
                                    if (file_exists($arquivo)) {
                                            include $arquivo;
                                    }else{
                                            echo "Arquivo não encontrado.";
                                    }
                            }else{
                                    include "boasvindas.php";
                            }
                    ?>
            </div>
       </div>     
</div>
</center>    
</body>
</html>

