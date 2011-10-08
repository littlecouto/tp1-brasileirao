<?
	include "verifica.php";
	$nome = $_POST["nome"];

	if ($nome !="") {
		$sql = "INSERT INTO estadio (nome) values ('$nome')";
		if(mysql_query($sql)){
		echo "Inclusão feita com sucesso. Clique <a href='?acao=listar_estadios'>aqui</a>.";
                }
                else{
                     echo mysql_error();   
                     echo "Este estádio já está cadastrado. Clique <a href='?acao=incluir_estadio'>aqui</a> para tenter novamente";

                }

	}else{

		echo "Cadastro cancelado.";
	}

?>
