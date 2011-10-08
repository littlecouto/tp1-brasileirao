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
<form name="form_incluir" id="form_incluir" method="POST" action="?acao=executa_incluir_time">
    <table>
        <tr>   

            <td>
                Nome:
            </td>
            <td>
                <input type="text" name="nome" id="nome" size="20" maxlength="20">
            </td>
        <tr>
            <td>
                Visitante:
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