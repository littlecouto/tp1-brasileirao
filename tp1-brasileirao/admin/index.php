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
<div class="principal">
	<div class="banner">
            <h1><b>Cadastro de Alunos</b></h1>
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
