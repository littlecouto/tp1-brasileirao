<html>
<head>
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>.: Cadastro de Alunos :.</title>
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
                margin-left: 20%;
            }
            .menu ul {
                display: block;
                padding: 0 0 0 0;
            }
            .menu li {
                display: block;
                padding: 10 10 10 10;
            }
            .menu li:hover {
                background-color: #e1e1e1;
            }
            
            ul.tabela{
                display: block;
                padding: 0 0 0 0;
                width: auto;
            }
            ul.colunas {
                padding: 0 0 0 0;
                width: auto;
            }
            li.linha{
                padding: 0 0 0 0;
                width: 100%;
            }
            li.coluna{
                text-align: left;
                display: inline-block;
                /*border-style: solid;*/
                width: 21%;
                padding: 10 10 10 10;
            }
            .odd li.coluna{
                background-color: #ffffff;
            }
            .even li.coluna{
                background-color: #e1e1e1;
            }
            
         </style>
</head>
<body>
<center>    
<div class="principal">
	<div class="banner">
            <h1><b>Cadastro de Alunos</b></h1>
        </div>
        <div class="corpo">
            <div class="menu">
                <ul>
                        <li><a href="?acao=incluir">Incluir</a></li>
                        <li><a href="?acao=listar">Listar</a></li>
                </ul>
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
