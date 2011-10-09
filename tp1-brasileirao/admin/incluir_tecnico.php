<? include "verifica.php"; ?>
<?
$sql = "SELECT id,nome FROM tecnico ORDER BY nome";
$rs = mysql_query($sql);
$table = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $table[$i++] = $row;
}
?>
<form name="form_incluir" id="form_incluir" method="POST" action="?acao=executa_incluir_tecnico">
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
         <td>&nbsp;</td>
            <td>
                <input type="submit" name="Submit" value="Enviar">
            </td>
            </tr>
    </table> 
</form>