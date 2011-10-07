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
    <table>
        <tr>   

            <td>
                Mandante:
            </td>
            <td>
                <select name="mandante"  id="select_mandante">
                    <?
                    $i = 0;
                    while ($i < count($estadio)) {
                        echo "<option value=\"" . utf8_encode($table[$i]['id']) . "\">" . utf8_encode($table[$i]['nome'] . "-" . $table[$i]['estado']) . "</option>\n  ";
                        $i++;
                    }
                    ?>
                </select>
            </td>
        <tr>
            <td>
                Visitante:
            </td>
            <td>
                <select name="visitante">
                    <?
                    $i = 0;
                    while ($i < count($table)) {
                        echo "<option value=\"" . utf8_encode($table[$i]['id']) . "\">" . utf8_encode($table[$i]['nome'] . "-" . $table[$i]['estado']) . "</option>\n  ";
                        $i++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Estádio:
            </td> 
            <td>
                <select name="estadio">
                    <?
                    $i = 0;
                    while ($i < count($estadio)) {
                        echo "<option value=\"" . utf8_encode($estadio[$i]['id']) . "\">" . utf8_encode($estadio[$i]['nome']) . "</option>\n  ";
                        $i++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>          
            <td>
                Data (dd/mm/aaaa):
            </td>
            <td>
                <input type="text" name="data" id="data_2" size="10" maxlength="10"></label>
            </td>
        <tr>           
            <td>
                Hora (hh:mm):
            </td>
            <td>
                <input type="text" name="hora" id="hora" size="5" maxlength="5">
            </td>
        <tr>
            <td>    
                Rodada: 
            </td>
            <td>
                <input type="text" name="rodada" id="rodada" size="5" maxlength="5">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="Submit" value="Enviar">
            </td>
    </table>    
</form>