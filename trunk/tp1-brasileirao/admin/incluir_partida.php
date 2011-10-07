<? include "verifica.php"; ?>
<?
$sql = "SELECT id,nome,estado FROM time ORDER BY time.nome";
$rs = mysql_query($sql);
$table = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $table[$i++] = $row;
}

$sql = "SELECT id,nome FROM estadio ORDER BY nome";
$rs = mysql_query($sql);
$estadio = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $estadio[$i++] = $row;
}

?>
<form name="form_incluir" id="form_incluir" method="POST" action="?acao=executa_incluir_partida">
    <label>Mandante:
        <select name="mandante"  id="select_mandante">
            <?
            $i = 0;
            while ($i < count($estadio)) {
                echo "<option value=\"" . utf8_encode($table[$i]['id']) . "\">" . utf8_encode($table[$i]['nome'] . "-" . $table[$i]['estado']) . "</option>\n  ";
                $i++;
            }
            ?>
        </select>
    </label>
    </br>	
    <label>Visitante:
		<select name="visitante">
            <?
            $i = 0;
            while ($i < count($table)) {
                echo "<option value=\"" .utf8_encode($table[$i]['id']) . "\">" . utf8_encode($table[$i]['nome'] . "-" . $table[$i]['estado']) . "</option>\n  ";
                $i++;
            }
            ?>
        </select>
    </label>
    <br />
    <label id="label_estadio">Estádio:
			<select name="estadio">
				<?
					$i=0;
					while($i < count($estadio)){
						echo "<option value=\"" .utf8_encode($estadio[$i]['id']) . "\">" . utf8_encode($estadio[$i]['nome']). "</option>\n  ";
						$i++;
					}
				?>
			</select>
		</label>
    <br />
    <label id="label_data">Data (dd/mm/aaaa): <input type="text" name="data" id="data_2" size="10" maxlength="10"></label>
	<label id="label_data">Hora (hh:mm): <input type="text" name="hora" id="hora" size="5" maxlength="5"></label>
    <br />
    <p align="right">
        <input type="submit" name="Submit" value="Enviar">
    </p>
</form>