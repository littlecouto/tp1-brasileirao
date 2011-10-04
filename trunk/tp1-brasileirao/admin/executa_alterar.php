<?
	include "verifica.php";
	$matricula = $_POST["matricula"];
	$nome      = $_POST["nome"];
	$email     = $_POST["email"];

	if ($matricula!="" && $nome!="" && $email!="") {

		$sql = "UPDATE cadastroXX SET nome='$nome',email='$email' WHERE matricula='$matricula'";
		mysql_query($sql) or die(mysql_error());
		echo "Alteração feita com sucesso. Clique <a href='?acao=listar'>aqui</a>.";

	}else{

		echo "Alteração cancelada.";
	}

?>
