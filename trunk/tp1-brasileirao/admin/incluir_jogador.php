<? include "verifica.php"; ?>
<?
$sql = "SELECT id,nome,estado FROM time ORDER BY nome";
$rs = mysql_query($sql);
$table = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $table[$i++] = $row;
}
?>


<form name="form_incluir" id="form_incluir" method="POST" action="?acao=executa_incluir_jogador">
    <table>
        <tr>   
            <td>
                Nome:
            </td>
            <td>
                <input type="text" name="nome" id="nome" size="50" maxlength="50">
            </td>
        </tr>
        <tr>
            <td>
                Data Nascimento (dd/mm/aaaa):
            </td>
            <td>
                <input type="text" name="data_nascimento" id="data_2" size="10" maxlength="10">
            </td>
        </tr>
        <tr>
            <td>
                Posicão:
            </td> 
            <td>
                <select name="posicao">  
                    <option value="Goleiro">Goleiro</option>
                    <option value="Zagueiro">Zagueiro</option>
                    <option value="Lateral-esquerdo">Lateral-esquerdo</option>
                    <option value="Lateral-direito">Lateral-direito</option>
                    <option value="Meia">Meia</option>
                    <option value="Volante">Volante</option>
                    <option value="Meia-atacante">Meia-atacante</option>
                    <option value="Atacante">Atacante</option>
                </select>  
            </td>
        </tr>
        <tr>
            <td>
                Time:
            </td> 
            <td>        
                <select name="time_id"  id="select_time">
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
        <td>&nbsp;</td>
        <td>
            <input type="submit" name="Submit" value="Enviar">
        </td>
    </table> 
</form>