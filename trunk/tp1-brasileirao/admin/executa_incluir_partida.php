<?
	include "verifica.php";
	$mandante = $_POST["mandante"];
	$visitante      = $_POST["visitante"];
	$estadio     = $_POST["estadio"];
	$data = $_POST["data"];
	$data = explode("/",$data);
	$data = implode("-",array($data[2],$data[1],$data[0]));
	$hora = $_POST["hora"];
	$rodada = $_POST["rodada"];

	if ($mandante!="" && $visitante!="" && $estadio!="" && $data!="" && $hora!="" && $rodada!="") {

		$sql = "INSERT INTO partida (mandante_id,visitante_id,estadio_id,data,rodada) values ('$mandante','$visitante','$estadio','$data $hora','$rodada')";
		mysql_query($sql) or die(mysql_error());
		echo "Inclusão feita com sucesso. Clique <a href='?acao=listar_partidas'>aqui</a>.";

	}else{
		echo "Cadastro cancelado.";
	}

?>
