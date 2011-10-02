<?
	$matricula = $_GET["matricula"];
	
	$sql = "SELECT * FROM cadastroXX WHERE matricula='$matricula'";
        echo $sql;
	$qry = mysql_query($sql);

	if (mysql_num_rows($qry)>0) {
		$retorno = mysql_fetch_array($qry);
		$nome    = $retorno['nome']; 
		$email   = $retorno['email'];
	}else{
		echo "Tabela sem registros.";
		die();
	}
?>
<form name="form_alterar" method="POST" action="?acao=executa_alterar">
	<input type="hidden" name="matricula" value="<?=$matricula;?>">

	Matrícula:<br /><?=$matricula;?><br />
	Nome:<br />
	<input type="text" name="nome" value="<?=$nome;?>" size="30" maxlength="100"><br />
	Email:<br />
	<input type="text" name="email" value="<?=$email;?>" size="30" maxlength="255">
	<p align="right">
	<input type="submit" name="Submit" value="Alterar">
</form>

