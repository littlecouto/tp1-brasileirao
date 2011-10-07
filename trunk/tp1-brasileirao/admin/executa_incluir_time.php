<?
	include "verifica.php";
	$nome         = $_POST["nome"];
	$estado       = $_POST["estado"];
	$gols_pro     = $_POST["gols_pro"];
	$gols_contra  = $_POST["gols_contra"];
	$total_faltas = $_POST["total_faltas"];
	$banner       = $_POST["banner"];	



	if ($nome!="" && $estado!="" && $gols_pro!="" && $gols_contra!="" && $total_faltas!="" && $banner!="") {

		$sql = "INSERT INTO time (nome,estado,brasao,gols_pro,gols_contra,total_faltas) values 
		('$nome','$estado','$brasao','$gols_pro','$gols_contra','$total_faltas')";
		mysql_query($sql) or die(mysql_error());
		echo "Inclusão feita com sucesso. Clique <a href='?acao=listar_times'>aqui</a>.";

	}else{

		echo "Cadastro cancelado.";
	}

?>
