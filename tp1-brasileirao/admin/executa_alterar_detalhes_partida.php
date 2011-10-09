<?
include "verifica.php";
$id = $_POST["id"];
$numero_gols_mandante = $_POST["numero_gols_mandante"];
$numero_gols_visitante = $_POST["numero_gols_visitante"];
$numero_faltas_mandante = $_POST["numero_faltas_mandante"];
$numero_faltas_visitante = $_POST["numero_faltas_visitante"];
$numero_cartoes_mandante = $_POST["numero_cartoes_mandante"];
$numero_cartoes_visitante = $_POST["numero_cartoes_visitante"];

for ($i = 0; $i < $numero_gols_mandante; $i++) {
    $jogador_id = $_POST['tabela_gols_mandante' . $i . '_jogador_id'];
    $tipo = $_POST['tabela_gols_mandante' . $i . '_tipo'];
    $tempo = $_POST['tabela_gols_mandante' . $i . '_tempo_id'];
    if ($jogador_id != "" && $tipo != "" && $tempo != "" && $id != "") {
    $sql = "INSERT INTO gol (minutos,tipo,partida_id,jogador_id) 
            values ('$tempo','$tipo','$id','$jogador_id')";
    //echo $sql."<br/>";
    mysql_query($sql);
    }
}

for ($i = 0; $i < $numero_gols_visitante; $i++) {
    $jogador_id = $_POST['tabela_gols_visitante' . $i . '_jogador_id'];
    $tipo = $_POST['tabela_gols_visitante' . $i . '_tipo'];
    $tempo = $_POST['tabela_gols_visitante' . $i . '_tempo_id'];
    if ($jogador_id != "" && $tipo != "" && $tempo != "" && $id != "") {
    $sql = "INSERT INTO gol (minutos,tipo,partida_id,jogador_id) 
            values ('$tempo','$tipo','$id','$jogador_id')"; 
    //echo $sql."<br/>";
    mysql_query($sql);
    }
}

for ($i = 0; $i < $numero_faltas_mandante; $i++) {
    $jogador_id = $_POST['tabela_faltas_mandante' . $i . '_jogador_id'];
    $tempo = $_POST['tabela_faltas_mandante' . $i . '_tempo_id'];
    if ($jogador_id != "" && $tempo != "" && $id != "") {
    $sql = "INSERT INTO falta (minutos,partida_id,jogador_id) 
            values ('$tempo','$id','$jogador_id')"; 
    //echo $sql."<br/>";
    mysql_query($sql);
    }
}

for ($i = 0; $i < $numero_faltas_visitante; $i++) {
    $jogador_id = $_POST['tabela_faltas_visitante' . $i . '_jogador_id'];
    $tempo = $_POST['tabela_faltas_visitante' . $i . '_tempo_id'];
    if ($jogador_id != "" && $tempo != "" && $id != "") {    
    $sql = "INSERT INTO falta (minutos,partida_id,jogador_id) 
            values ('$tempo','$id','$jogador_id')"; 
    //echo $sql."<br/>";
    mysql_query($sql);
    }
}

for ($i = 0; $i < $numero_cartoes_mandante; $i++) {
    $jogador_id = $_POST['tabela_cartoes_mandante' . $i . '_jogador_id'];
    $tipo = $_POST['tabela_cartoes_mandante' . $i . '_tipo'];
    $tempo = $_POST['tabela_cartoes_mandante' . $i . '_tempo_id'];
    if ($jogador_id != "" && $tipo != "" && $tempo != "" && $id != "") {    
    $sql = "INSERT INTO cartao (minutos,tipo,partida_id,jogador_id) 
            values ('$tempo','$tipo','$id','$jogador_id')"; 
    //echo $sql."<br/>";
    mysql_query($sql);
    }
}

for ($i = 0; $i < $numero_cartoes_visitante; $i++) {
    $jogador_id = $_POST['tabela_cartoes_visitante' . $i . '_jogador_id'];
    $tipo = $_POST['tabela_cartoes_visitante' . $i . '_tipo'];
    $tempo = $_POST['tabela_cartoes_visitante' . $i . '_tempo_id'];
    if ($jogador_id != "" && $tipo != "" && $tempo != "" && $id != "") {    
    $sql = "INSERT INTO cartao (minutos,tipo,partida_id,jogador_id) 
            values ('$tempo','$tipo','$id','$jogador_id')"; 
    //echo $sql."<br/>";
    mysql_query($sql);
    }
}
echo "Alteração feita com sucesso. Clique <a href='?acao=listar_partidas'>aqui</a>.";
?>
