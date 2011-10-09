<?
include "verifica.php";

//$id = $_GET["id"];
$id = 10;
$sql = "SELECT * FROM partida WHERE id='$id'";
$qry = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($qry) > 0) {
    $R = mysql_fetch_object($qry);
    $mandante_id = $R->mandante_id;
    $visitante_id = $R->visitante_id;
    $estadio_id = $R->estadio_id;
    $data_hora = $R->data;
    $rodada = $R->rodada;
    $data_hora = explode(" ", $data_hora);
    $data = $data_hora[0];
    $hora = $data_hora[1];

    $sql = "SELECT jogador.id,jogador.nome,time.id as time_id FROM `time` inner join jogador where jogador.time_id=time.id and time.id='$mandante_id' order by time.nome";
    $rs = mysql_query($sql) or die(mysql_error());
    $jogadores_mandante = array();
    $i = 0;
    while ($row = mysql_fetch_array($rs)) {
        $jogadores_mandante[$i++] = $row;
    }

    $sql = "SELECT jogador.id,jogador.nome,time.id as time_id FROM `time` inner join jogador where jogador.time_id=time.id and time.id='$visitante_id' order by time.nome";
    $rs = mysql_query($sql) or die(mysql_error());
    $jogadores_visitante = array();
    $i = 0;
    while ($row = mysql_fetch_array($rs)) {
        $jogadores_visitante[$i++] = $row;
    }
} else {
    echo "Tabela sem registros.";
    die();
}
?>
<script type="text/javascript">
    totals =-1;
function adiciona(tabela){
    totals++
    tbl = document.getElementById(tabela)
 
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
 
    if (tabela=="tabela_gols_mandante"){
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='gol_mandante_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_mandante)) {
        echo "\"<option value='".utf8_encode($jogadores_mandante[$i]['id'])."'>".utf8_encode($jogadores_visitante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='gol_mandante_tempo'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
}
</script>


<form name="form_alterar" method="POST" action="?acao=executa_alterar_partida">
    <input type="hidden" name="id" value="<? echo $id; ?>">
    <div>
        <table id='tabela_gols_mandante' border='0' width=49%'>
            <tr>
                <td>
                    <select name="<?= 'gol_mandante_jogador_id' ?>">
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
                    <select name="<?= 'gol_mandante_tempo' ?>">
                        <?
                        $j = 0;
                        while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">" . utf8_encode($j) . "</option>\n";
                            $j++;
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="<?= 'gol_mandante_tempo' ?>">
                        <?
                        $j = 0;
                        while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">" . utf8_encode($j) . "</option>\n";
                            $j++;
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir' onclick='adiciona("tabela_gols_mandante")'/>
    </div>
    <div>
        <table id='tabela_gols_visitante' border='0' width='49%'>
            <tr>
                <td>
                    <select name="<?= 'gol_visitante_jogador_id' ?>">
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
                    <select name="<?= 'gol_visitante_tempo' ?>">
                        <?
                        $j = 0;
                        while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">" . utf8_encode($j) . "</option>\n";
                            $j++;
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir' onclick='adiciona("tabela_gols_visitante")'/>
    </div>

    <div>
        <table id='tabela_faltas_mandante' border='0' width='49%'>
            <tr>
                <td>
                    <select name="<?= 'gol_mandante_jogador_id' ?>">
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
                    <select name="<?= 'gol_mandante_' . $i . '_tempo' ?>">
                        <?
                        $j = 0;
                        while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">" . utf8_encode($j) . "</option>\n";
                            $j++;
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir' onclick='adiciona("tabela_faltas_mandante")'/>
    </div>

    <div>
        <table id='tabela_faltas_visitante' border='0' width='49%'>
            <tr>
                <td>
                    <select name="<?= 'gol_mandante_' . $i . '_jogador_id' ?>">
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
                    <select name="<?= 'gol_mandante_' . $i . '_tempo' ?>">
                        <?
                        $j = 0;
                        while ($j < 90) {
                            echo "<option value=\"" . utf8_encode($j) . "\">" . utf8_encode($j) . "</option>\n";
                            $j++;
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir' onclick='adiciona("tabela_faltas_visitante")'/>
    </div>

    <p align="right">
        <input type="submit" name="Submit" value="Alterar">
</form>

