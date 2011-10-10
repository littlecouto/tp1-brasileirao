<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Bola na Rede :: Sistema de Informações</title>
        <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
        <script src="jquery/jquery-1.4.1.min.js" language="javascript"></script>
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
                <img src="img/logo.png" alt="Logo Bola na Rede"/>
            </div><!--End Header-->


            <div class="menu">
                <ul class="nav main">
                    <li><a href="?acao=tabela_campeonato">Tabela</a></li>
                    <li><a href="?acao=estatisticas">Estatísticas</a></li>
                    <li><a href="?acao=simulador">Simulador de Jogos</a></li>
                    <li><a href="?acao=times">Equipes e Jogadores</a></li>
                    <li class="secondary"><a href="admin">Admin</a></li>
                </ul>
            </div><!--End Main Menu-->

            <div id="content">
                <?
                $acao = $_GET["acao"];
                if ($acao != "") {
                    include "admin/conecta.php";
                    $arquivo = $acao . ".php";
                    if (file_exists($arquivo)) {
                        include $arquivo;
                    } else {
                        echo "Arquivo não encontrado.";
                    }
                } else {
                    include "tabela_campeonato.php";
                }
                ?>
            </div><!--End content-->

            <div id="bottom"><p>Sistema criado por Isac Sandin e Luiz Oliveira</p></div>
        </div><!--End container-->
    </body>
</html>
