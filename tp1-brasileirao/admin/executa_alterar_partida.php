<?
	include "verifica.php";
	$mandante    = $_POST["mandante"];
	$visitante   = $_POST["visitante"];
	$estadio     = $_POST["estadio_id"];
	$rodada    		= $_POST["rodada"];
	$data 			= $_POST["data"];
	$hora		 	= $_POST["hora"];
	$data_hora = implode(" ",array($data,$hora));	

	if ($mandante !="" && $visitante !="" && $estadio !="" && $data_hora !="" && $rodada !="") {

		$sql = "UPDATE partida 
				SET mandante_id='$mandante',visitante_id='$visitante',estadio_id='$estadio',data='$data_hora',rodada='$rodada' 
				WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		echo "Alteração feita com sucesso. Clique <a href='?acao=listar'>aqui</a>.";

	}else{

		echo "Alteração cancelada.";
	}

?>
