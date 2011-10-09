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
    totals_1 =-1;
    totals_2 =-1;
    totals_3 =-1;
    totals_4 =-1;
    totals_5 = -1;
function adiciona(tabela){
    tbl = document.getElementById(tabela)
 
    if (tabela == "tabela_gols_mandante"){
    totals_1++;    
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals_1%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
    
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='\"+tabela+totals_1+\"_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_mandante)) {
        echo "\"<option value='".utf8_encode($jogadores_mandante[$i]['id'])."'>".utf8_encode($jogadores_mandante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='\"+tabela+totals_1+\"_tempo_id'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
    if (tabela == "tabela_gols_visitante"){
    totals_2++;    
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals_2%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
    
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='\"+tabela+totals_2+\"_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_visitante)) {
        echo "\"<option value='".utf8_encode($jogadores_visitante[$i]['id'])."'>".utf8_encode($jogadores_visitante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='\"+tabela+totals_2+\"_tempo_id'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
    if (tabela == "tabela_faltas_mandante"){
    totals_3++;    
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals_3%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
    
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='\"+tabela+totals_3+\"_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_mandante)) {
        echo "\"<option value='".utf8_encode($jogadores_mandante[$i]['id'])."'>".utf8_encode($jogadores_mandante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='\"+tabela+totals_3+\"_tempo_id'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
    if (tabela == "tabela_faltas_visitante"){
    totals_4++;    
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals_4%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
    
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='\"+tabela+totals_4+\"_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_mandante)) {
        echo "\"<option value='".utf8_encode($jogadores_visitante[$i]['id'])."'>".utf8_encode($jogadores_visitante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='\"+tabela+totals_4+\"_tempo_id'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
    
    if (tabela == "tabela_cartoes_mandante"){
    totals_4++;    
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals_4%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
    
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='\"+tabela+totals_4+\"_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_mandante)) {
        echo "\"<option value='".utf8_encode($jogadores_mandante[$i]['id'])."'>".utf8_encode($jogadores_mandante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='\"+tabela+totals_4+\"_tempo_id'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
    if (tabela == "tabela_cartoes_visitante"){
    totals_5++;    
    var novaLinha = tbl.insertRow(-1);
    var novaCelula;
 
    if(totals_5%2==0) cl = "#F5E9EC";
    else cl = "#FBF6F7";
    
    novaCelula = novaLinha.insertCell(0);
    novaCelula.style.backgroundColor = cl
    novaCelula.innerHTML = <? echo "\"<select name='\"+tabela+totals_5+\"_jogador_id'>\"+\n";
    $i = 0;
    while ($i < count($jogadores_mandante)) {
        echo "\"<option value='".utf8_encode($jogadores_visitante[$i]['id'])."'>".utf8_encode($jogadores_visitante[$i]['nome'])."</option>\"+\n";
        $i++;
        }
    echo "\"</select>\";";?>
 
    novaCelula = novaLinha.insertCell(1);
    novaCelula.align = "left";
    novaCelula.style.backgroundColor = cl;
    novaCelula.innerHTML = <?echo "\"<select name='\"+tabela+totals_5+\"_tempo_id'>\"+";
                        $j = 0;
                        while ($j < 90) {
                            echo "\"<option value='". utf8_encode($j)."'>".utf8_encode($j) ."</option>\"+\n";
                            $j++;
                        }
                    echo "\" </select>\"";?>
 
    }
}
</script>


<form name="form_alterar" method="POST" action="?acao=executa_alterar_detalhes_partida">
    <input type="hidden" name="id" value="<?echo $id;?>">
    <div>
        <table id='tabela_gols_mandante' border='0' width=49%'>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir novo gol mandante' onclick='adiciona("tabela_gols_mandante")'/>
    </div>
    <div>
        <table id='tabela_gols_visitante' border='0' width='49%'>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir novo gol visitante' onclick='adiciona("tabela_gols_visitante")'/>
    </div>
    <div>
        <table id='tabela_faltas_mandante' border='0' width='49%'>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir nova falta mandante' onclick='adiciona("tabela_faltas_mandante")'/>
    </div>

    <div>
        <table id='tabela_faltas_visitante' border='0' width='49%'>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir nova falta visitante' onclick='adiciona("tabela_faltas_visitante")'/>
    </div>
    
      <div>
        <table id='tabela_cartoes_mandante' border='0' width='49%'>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir novo cartão mandante' onclick='adiciona("tabela_cartoes_mandante")'/>
    </div>
    
        <div>
        <table id='tabela_cartoes_visitante' border='0' width='49%'>
        </table>
        <br />
        <input type='button' id='incluir' value='incluir novo cartão visitante' onclick='adiciona("tabela_cartoes_visitante")'/>
    </div>

    <p align="right">
        <input type="submit" name="Submit" value="Alterar">
</form>

