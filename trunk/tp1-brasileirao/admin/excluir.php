<?
	$matricula = $_GET["matricula"];

	if ($matricula!="") {

		$sql = "DELETE FROM cadastroXX WHERE matricula='$matricula'";
		mysql_query($sql) or die(mysql_error());
		echo "Exclusão feita com sucesso. Clique <a href='?acao=listar'>aqui</a>.";

	}else{

		echo "Exclusão cancelada.";
	}

?>
