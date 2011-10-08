<?
include "verifica.php";

$id = $_GET["id"];
$sql = "SELECT * FROM jogador where id='$id'";
$qry = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($qry) > 0) {
    $R = mysql_fetch_object($qry);
    $id = $R->id;
    $nome = $R->nome;
    $data_nascimento = $R->data_nascimento;
    $data = explode("-", $data_nascimento);
    $data_nascimento = implode("/",array($data[2],$data[1],$data[0]));   
    $posicao = $R->posicao;
    $time = $R->time_id;
    $cartoes_amarelos = $R->cartoes_amarelos;
    $cartoes_vermelhos = $R->cartoes_vermelhos;
    $total_faltas = $R->total_faltas;

    $sql = "SELECT id,nome,estado FROM time ORDER BY nome";
    $rs = mysql_query($sql);
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
<form name="form_incluir" id="form_incluir" method="POST" action="?acao=executa_alterar_jogador">
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
            <td>
                Data Nascimento (dd/mm/aaaa):
            </td>
            <td>
                <input type="text" name="data_nascimento" id="data_2" size="10" maxlength="10" value="<?=$data_nascimento;?>">
            </td>
        </tr>
        <tr>
            <td>
                Posicão:
            </td> 
            <td>
                <select name="posicao">
                    <option value="<?=$posicao;?>" selected="selected"><? echo $posicao;?></option>
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
                        if($time == $table[$i]['id']){
                            echo "<option value='".utf8_encode($table[$i]['id'])."' selected='selected'>" . utf8_encode($table[$i]['nome'] . "-" . $table[$i]['estado']) . "</option>\n  ";
                        }
                        else{
                            echo "<option value=\"" . utf8_encode($table[$i]['id']) . "\">" . utf8_encode($table[$i]['nome'] . "-" . $table[$i]['estado']) . "</option>\n  ";
                        }
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
        <input type="hidden" name="id" id="id" value="<?=$id;?>" >
</form>
