<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Bola na Rede :: Sistema de Informações</title>
        <link rel="stylesheet" type="text/css" href="../css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../css/nav.css" media="screen" />
        <link href="../style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.click-calendario-1.0-min.js"></script>		
        <script type="text/javascript" src="../js/exemplo-calendario.js"></script>
        <script src="../js/functions.js" type="text/javascript" language="javascript"></script>	  
        <script src="../jquery/jquery-1.4.1.min.js" language="javascript"></script>
        <script language="javascript">
	
            /*
                $(document).ready(function(){
                        $("a").each(function(){
                                $(this).click(function(){
                                        if($(this).attr("href")!="#" && $(this).attr("target")=="" && $(this).attr("id")!="map"){ 
                                                return carregaAjaxPagina($(this).attr("href"));
                                        }
                                });
                        });
                        ;
                });
                function carregaAjaxPagina(pagina){
                        $('#content').load(pagina);
                        return false;
                }
             */

        </script>
    </head>

    <body>
        <div class="container">

            <div id="header">
                <img src="../img/logo.png" alt="Logo Bola na Rede"/>
            </div><!--End Header-->


            <div class="main_menu">
                <ul class="nav">
                    <li><a href="?acao=incluir_time">I Time</a></li>
                    <li><a href="?acao=listar_times">L Times</a></li>
                    <li><a href="?acao=incluir_jogador">I Jogador</a></li>
                    <li><a href="?acao=listar_jogadores">L Jogadores</a></li>
                    <li><a href="?acao=incluir_tecnico">I Técnico</a></li>
                    <li><a href="?acao=listar_tecnicos">L Técnicos</a></li>
                    <li><a href="?acao=incluir_partida">I Partida</a></li>
                    <li><a href="?acao=listar_partidas">L Partidas</a></li>
                    <li><a href="?acao=incluir_estadio">I Estádio</a></li>
                    <li><a href="?acao=listarestadios">L Estádios</a></li>         
                    <li><a href="?acao=logout">Logout</a></li>
                </ul>
            </div><!--End Main Menu-->

            <div id="content">
                <center>
                <?
                    $acao = $_GET["acao"];
                    if ($acao != "") {
                        include "conecta.php";
                        $arquivo = $acao . ".php";
                        if (file_exists($arquivo)) {
                            include $arquivo;
                        } else {
                            echo "Arquivo não encontrado.";
                        }
                    } else {
                        include "boasvindas.php";
                    }
                ?> 
               </center>     
            </div><!--End content-->

            <div id="bottom"><p>Sistema criado por Isac Sandin e Luiz Oliveira</p></div>
        </div><!--End container-->
    </body>
</html>
