<?
include "verifica.php";
$id = $_POST["id"];
$nome = $_POST["nome"];

if ($id != "" && $nome != "") {
    $sql = "UPDATE tecnico 
            SET nome='$nome'
            WHERE id='$id'";
    mysql_query($sql) or die(mysql_error());
    echo "Alteração feita com sucesso. Clique <a href='?acao=listar_tecnicos'>aqui</a>.";
} else {
    echo "Alteração cancelada. clique <a href='?acao=listar_tecnicos'>aqui</a> para tentar denovo";
}
?>
