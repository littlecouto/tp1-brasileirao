<?
	include "verifica.php"; 
	$id = $_GET["id"];

	if ($id!="") {
		$sql = "DELETE FROM tecnico WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		echo "Exclusão feita com sucesso. Clique <a href='?acao=listar_tecnicos'>aqui</a>.";

	}else{

		echo "Exclusão cancelada.";
	}

?>
