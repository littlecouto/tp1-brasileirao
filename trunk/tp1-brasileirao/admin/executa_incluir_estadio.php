<?
	include "verifica.php";
	$matricula = $_POST["matricula"];
	$nome      = $_POST["nome"];
	$email     = $_POST["email"];

	if ($matricula!="" && $nome!="" && $email!="") {

		$sql = "INSERT INTO cadastroXX (matricula,nome,email) values ('$matricula','$nome','$email')";
		mysql_query($sql) or die(mysql_error());
		echo "Inclusão feita com sucesso. Clique <a href='?acao=listar'>aqui</a>.";

	}else{

		echo "Cadastro cancelado.";
	}

?>
