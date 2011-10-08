<?

include "verifica.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$data = explode("/", $data_nascimento);
$data_nascimento = implode("-", array($data[2], $data[1], $data[0]));
$posicao = $_POST['posicao'];
$time_id = $_POST['time_id'];

if ($nome!="" && $data_nascimento!="" && $posicao !="" && $time_id!="") {

    $sql = "UPDATE jogador 
                        SET nome='$nome',data_nascimento='$data_nascimento',posicao='$posicao',time_id='$time_id'
                        WHERE id='$id'";
    mysql_query($sql) or die(mysql_error());
    echo "Alteração feita com sucesso. Clique <a href='?acao=listar_jogadores'>aqui</a>.";
} else {
    echo "Alteração cancelada.";
}
?>
