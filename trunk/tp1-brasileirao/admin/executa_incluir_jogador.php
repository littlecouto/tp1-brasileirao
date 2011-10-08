<?
	include "verifica.php";
	$nome             = $_POST["nome"];
	$data_nascimento  = $_POST["data_nascimento"];
        $data = explode("/",$data_nascimento);
	$data_nascimento = implode("-",array($data[2],$data[1],$data[0]));
 	$posicao          = $_POST["posicao"];	
        $time_id          = $_POST["time_id"];


	if ($nome!="" && $data_nascimento!="" && $posicao !="" && $time_id!="") {

		$sql = "INSERT INTO jogador (nome,data_nascimento,posicao,time_id) values 
		('$nome','$data_nascimentoa','$posicao','$time_id')";
		mysql_query($sql) or die(mysql_error());
		echo "Inclusão feita com sucesso. Clique <a href='?acao=listar_jogadores'>aqui</a>.";

	}else{

		echo "Cadastro cancelado porra.";
	}

?>
