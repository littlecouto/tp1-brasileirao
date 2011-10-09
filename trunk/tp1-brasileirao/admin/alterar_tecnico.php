<?
include "verifica.php";

$id = $_GET["id"];
$sql = "SELECT * FROM tecnico where id='$id'";
$qry = mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($qry) > 0) {
    $R=mysql_fetch_object($qry);
    $nome = $R->nome;
    $id = $R->id;    

} else {
    echo "Tabela sem registros.";
    die();
}
?>
<form name="form_alterar" id="form_alterar" method="POST" action="?acao=executa_alterar_tecnico">
    <table>
        <tr>   
            <td>
                Nome:
            </td>
            <td>
                <input type="text" name="nome" id="nome" size="50" maxlength="50" value="<?=$nome;?>">
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        <td>
            <input type="submit" name="Submit" value="Enviar">
        </td>
        </tr>
    </table> 
    <input type="hidden" name="id" id="id" value="<?=$id;?>" >
</form>

