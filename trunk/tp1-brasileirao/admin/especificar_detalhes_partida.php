<?
include "verifica.php";
$id = $_POST["id"];
$mandante_id = $_POST["mandante_id"];
$visitante_id = $_POST["visitante_id"];
$gols_mandante = $_POST["gols_mandante"];
$gols_contra_mandante = $_POST["gols_contra_mandante"];
$gols_visitante = $_POST["gols_visitante"];
$gols_contra_visitante = $_POST["gols_contra_visitante"];
$faltas_mandante = $_POST["faltas_mandante"];
$cartoes_mandante = $_POST["cartoes_mandante"];
$faltas_visitante = $_POST["faltas_visitante"];
$cartoes_visitante = $_POST["cartoes_visitante"];


$sql = "SELECT jogador.id,jogador.nome,time.id as time_id 
                FROM `time` inner join jogador where jogador.time_id=time.id and time.id='$mandante_id' order by nome";
$rs = mysql_query($sql) or die(mysql_error());
$jogadores_mandante = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $jogadores_mandante[$i++] = $row;
}

$sql = "SELECT jogador.id,jogador.nome,time.id as time_id 
            FROM `time` inner join jogador where jogador.time_id=time.id and time.id='$visitante_id' order by nome";
$rs = mysql_query($sql) or die(mysql_error());
$jogadores_visitante = array();
$i = 0;
while ($row = mysql_fetch_array($rs)) {
    $jogadores_visitante[$i++] = $row;
}
?>
<form name="form_alterar" method="POST" action="?acao=executa_adicionar_detalhes_partida">
    <input type="hidden" name="id" value="<?echo $id;?>">
    <div>
    <h3>Gols Mandante</h3>    
    <table id='tabela_gols_mandante' border='0' width=49%'>
        <?for($i=0;$i< $gols_mandante;$i++){?>
        <tr>
            <td>
                <select name="<?='gol_mandante_'.$i.'_jogador_id'?>">
                    <?
                    $j = 0;
                    while ($j < count($jogadores_mandante)) {
                            echo "<option value=\"" . utf8_encode($jogadores_mandante[$j]['id']) . "\">" . utf8_encode($jogadores_visitante[$j]['nome']) . "</option>\n  ";
                        $j++;
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="<?='gol_mandante_'.$i.'_tempo'?>">
                    <?
                    $j = 0;
                    while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">".utf8_encode($j)."</option>\n";
                        $j++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?}?>
    </table>
<br />
    </div>
        <div>
    <h3>Gols Visitante</h3>             
    <table id='tabela_gols_visitante' border='0' width='49%'>
        <?for($i=0;$i< $gols_visitante;$i++){?>
        <tr>
            <td>
                <select name="<?='gol_visitante_'.$i.'_jogador_id'?>">
                    <?
                    $j = 0;
                    while ($j < count($jogadores_visitante)) {
                            echo "<option value=\"" . utf8_encode($jogadores_visitante[$j]['id']) . "\">" . utf8_encode($jogadores_visitante[$j]['nome']) . "</option>\n  ";
                        $j++;
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="<?='gol_visitante_'.$i.'_tempo'?>">
                    <?
                    $j = 0;
                    while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">".utf8_encode($j)."</option>\n";
                        $j++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?}?>
    </table>
        </div>
    
        <div>
      <h3>Faltas Madante</h3>           
    <table id='tabela_faltas_mandante' border='0' width='49%'>
         <?for($i=0;$i< $gols_mandante;$i++){?>
        <tr>
            <td>
                <select name="<?='falta_mandante_'.$i.'_jogador_id'?>">
                    <?
                    $j = 0;
                    while ($j < count($jogadores_mandante)) {
                            echo "<option value=\"" . utf8_encode($jogadores_mandante[$j]['id']) . "\">" . utf8_encode($jogadores_visitante[$j]['nome']) . "</option>\n  ";
                        $j++;
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="<?='falta_visitante_'.$i.'_tempo'?>">
                    <?
                    $j = 0;
                    while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">".utf8_encode($j)."</option>\n";
                        $j++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?}?>
    </table>
<br />
    </div>
    
        <div>
       <h3>Faltas Visitante</h3>          
    <table id='tabela_faltas_visitante' border='0' width='49%'>
        <?for($i=0;$i< $gols_mandante;$i++){?>
        <tr>
            <td>
                <select name="<?='gol_mandante_'.$i.'_jogador_id'?>">
                    <?
                    $j = 0;
                    while ($j < count($jogadores_mandante)) {
                            echo "<option value=\"" . utf8_encode($jogadores_mandante[$j]['id']) . "\">" . utf8_encode($jogadores_visitante[$j]['nome']) . "</option>\n  ";
                        $j++;
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="<?='gol_mandante_'.$i.'_tempo'?>">
                    <?
                    $j = 0;
                    while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">".utf8_encode($j)."</option>\n";
                        $j++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?}?>
    </table>
<br />
    </div>  
    <p align="right">
        <input type="submit" name="Submit" value="Alterar">
</form>
