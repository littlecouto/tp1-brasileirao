<?
include "verifica.php";

$id = $_GET["id"];
$sql = "SELECT * FROM time ORDER BY nome where id='$id'";
$qry = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($qry) > 0) {
    $id = $R->id;
    $nome = $R->nome;
    $brasao = $R->brasao;
    $estado = $R->estado;
    $gols_pro = $R->gols_pro;
    $gols_contra = $R->gols_contra;
    $total_faltas = $R->total_faltas;
    $estadio_id = $R->estadio_id;

    $sql = "SELECT id,nome FROM tecnico ORDER BY nome";
    $rs = mysql_query($sql) or die(mysql_error());
    $table = array();
    $i = 0;
    while ($row = mysql_fetch_array($rs)) {
        $table[$i++] = $row;
    }
} else {
    echo "Tabela sem registros.";
    die();
}
?>
<form name="form_alterar" id="form_alterar" method="POST" action="?acao=executa_alterar_time">
    <table>
        <tr>   
            <td>
                Nome:
            </td>
            <td>
                <input type="text" name="nome" id="nome" size="50" maxlength="50" value="<?= $nome; ?>">
            </td>
        <tr>
            <td>
                Estado:
            </td>
            <td>
                <select name="estado">  
                    <option value="AC">AC</option>  
                    <option value="AL">AL</option>  
                    <option value="AM">AM</option>  
                    <option value="AP">AP</option>  
                    <option value="BA">BA</option>  
                    <option value="CE">CE</option>  
                    <option value="DF">DF</option>  
                    <option value="ES">ES</option>  
                    <option value="GO">GO</option>  
                    <option value="MA">MA</option>  
                    <option value="MG">MG</option>  
                    <option value="MS">MS</option>  
                    <option value="MT">MT</option>  
                    <option value="PA">PA</option>  
                    <option value="PB">PB</option>  
                    <option value="PE">PE</option>  
                    <option value="PI">PI</option>  
                    <option value="PR">PR</option>  
                    <option value="RJ">RJ</option>  
                    <option value="RN">RN</option>  
                    <option value="RO">RO</option>  
                    <option value="RR">RR</option>  
                    <option value="RS">RS</option>  
                    <option value="SC">SC</option>  
                    <option value="SE">SE</option>  
                    <option value="SP">SP</option>  
                    <option value="TO">TO</option>  
                </select>  
            </td>
        </tr>
        <tr>
            <td>
                Tecnico:
            </td> 
            <td>
                <select name="Tecnico">
                    <?
                    $i = 0;
                    while ($i < count($table)) {
                        if ($i == $tecnico_id) {
                            echo "<ption value='" . utf8_encode($table[$i]['id']) . "'selected='selected'>" . utf8_encode($table[$i]['nome']) . "</option>\n  ";
                        } else {
                            echo "<option value=\"" . utf8_encode($table[$i]['id']) . "\">" . utf8_encode($table[$i]['nome']) . "</option>\n  ";
                        }
                        $i++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <td></td>
        <td>
            <input type="submit" name="Submit" value="Enviar">
        </td>
    </table> 
    <input type="hidden" name="gols_pro" id="gols_pro" value="<?= $gols_pro; ?>">
    <input type="hidden" name="gols_contra" id="gols_contra" value="<?= $gols_contra; ?>">
    <input type="hidden" name="total_faltas" id="total_faltas" value="<?= $total_faltas; ?>">
    <input type="hidden" name="brasao" id="brasao" value="sem_banner.jpg" >
</form>

