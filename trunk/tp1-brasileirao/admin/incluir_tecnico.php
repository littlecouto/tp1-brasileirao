<? include "verifica.php"; 
	$acao = $_GET["acao"];
	switch($acao){
		case "incluir_partida":	
?> 
<form name="form_incluir" method="POST" action="?acao=executa_incluir_partida">
	<label>Mandante:<select name="mandante">
	<?
		$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs)){
		  echo "<option value=\"".utf8_encode($row['id'])."\">".utf8_encode($row['nome']."-".$row['estado'])."</option>\n  ";
		}
	?>
	</select></label>
	</br>	
	<label>Visitante:<select name="visitante">
	<?
		$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs)){
		  echo "<option value=\"".utf8_encode($row['id'])."\">".utf8_encode($row['nome']."-".$row['estado'])."</option>\n  ";
		}
	?>
	</select></label>
    <br />
	<input type="text" name="email" size="30" maxlength="255">
	<p align="right">
	<input type="submit" name="Submit" value="Enviar">
</form>
<? 
		break;
	case "incluir_time":	
?>
<form name="form_incluir" method="POST" action="?acao=executa_incluir_time">
	<label>Mandante:<select name="mandante">
	<?
		$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs)){
		  echo "<option value=\"".utf8_encode($row['id'])."\">".utf8_encode($row['nome']."-".$row['estado'])."</option>\n  ";
		}
	?>
	</select></label>
	</br>	
	<label>Visitante:<select name="visitante">
	<?
		$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs)){
		  echo "<option value=\"".utf8_encode($row['id'])."\">".utf8_encode($row['nome']."-".$row['estado'])."</option>\n  ";
		}
	?>
	</select></label>
    <br />
	<input type="text" name="email" size="30" maxlength="255">
	<p align="right">
	<input type="submit" name="Submit" value="Enviar">
</form>
<? 
		break;
	case "incluir_tecnico":	
?>
<form name="form_incluir" method="POST" action="?acao=executa_incluir_tecnico">
	<label>Mandante:<select name="mandante">
	<?
		$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs)){
		  echo "<option value=\"".utf8_encode($row['id'])."\">".utf8_encode($row['nome']."-".$row['estado'])."</option>\n  ";
		}
	?>
	</select></label>
	</br>	
	<label>Visitante:<select name="visitante">
	<?
		$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs)){
		  echo "<option value=\"".utf8_encode($row['id'])."\">".utf8_encode($row['nome']."-".$row['estado'])."</option>\n  ";
		}
	?>
	</select></label>
    <br />
	<input type="text" name="email" size="30" maxlength="255">
	<p align="right">
	<input type="submit" name="Submit" value="Enviar">
</form>
<? 
		break;
	default:
			echo "fudeu!</br>";
	}			
?>
