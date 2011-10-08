<?

include "verifica.php";
$id = $_POST["id"];
$nome = $_POST["nome"];
$brasao = $_POST["brasao"];
$estado = $_POST["estado"];
$tecnico_id = $_POST["tecnico"];

if ($id != "" && $nome != "" && $brasao != "" && $estado != "" && $tecnico_id != "") {

    $sql = "UPDATE time 
                        SET nome='$nome',brasao='$brasao',estado='$estado',tecnico_id='$tecnico_id'
                        WHERE id='$id'";
    mysql_query($sql) or die(mysql_error());
    echo "Alteração feita com sucesso. Clique <a href='?acao=listar_times'>aqui</a>.";
} else {
    echo "Alteração cancelada.";
}
?>
