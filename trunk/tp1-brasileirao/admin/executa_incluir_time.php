<?
	include "verifica.php";
	$nome         = $_POST["nome"];
	$estado       = $_POST["estado"];
        $tecnico_id   = $_POST["tecnico"];
 	$gols_pro     = $_POST["gols_pro"];
	$gols_contra  = $_POST["gols_contra"];
	$total_faltas = $_POST["total_faltas"];
	$brasao       = $_POST["brasao"];	



	if ($nome!="" && $estado!="" && $tecnico_id !="" && $gols_pro!="" && $gols_contra!="" && $total_faltas!="" && $brasao!="") {

		$sql = "INSERT INTO time (nome,estado,brasao,gols_pro,gols_contra,total_faltas,tecnico_id) values 
		('$nome','$estado','$brasao','$gols_pro','$gols_contra','$total_faltas','$tecnico_id')";
		mysql_query($sql) or die(mysql_error());
		echo "Inclusão feita com sucesso. Clique <a href='?acao=listar_times'>aqui</a>.";

	}else{

		echo "Cadastro cancelado.";
	}

?>
