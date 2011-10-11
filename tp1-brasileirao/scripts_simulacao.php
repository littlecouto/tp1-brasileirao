<?

function criar_tabelas() {
    $sql = "drop table if exists `tp1_bd`.`partida_tmp`";
    $qry = mysql_query($sql) or die(mysql_error());

    $sql = "CREATE TABLE partida_tmp ENGINE=MEMORY AS (SELECT * FROM partida)";
    $qry = mysql_query($sql) or die(mysql_error());

    $sql = "drop table if exists `tp1_bd`.`time_tmp`";
    $qry = mysql_query($sql) or die(mysql_error());

    $sql = "CREATE TABLE time_tmp ENGINE=MEMORY AS (SELECT * FROM time)";
    $qry = mysql_query($sql) or die(mysql_error());
}

function reverte_valores($mandante_id,$visitante_id,$mandante_gols,$visitante_gols) {
    
    if ($mandante_gols > $visitante_gols) {
        $sql = "UPDATE time_tmp SET vitorias = vitorias-1 WHERE id = $mandante_id;";
        mysql_query($sql) or die(mysql_error());
        $sql = "UPDATE time_tmp SET derrotas = derrotas-1 WHERE id = $visitante_id;";
        mysql_query($sql) or die(mysql_error());
    } elseif ($visitante_gols > $mandante_gols) {
        $sql = "UPDATE time_tmp SET vitorias = vitorias-1 WHERE id = $visitante_id;";
        mysql_query($sql) or die(mysql_error());
        $sql = "UPDATE time_tmp SET derrotas = derrotas-1 WHERE id = $mandante_id;";
        mysql_query($sql) or die(mysql_error());
    } else {
        $sql = "UPDATE time_tmp SET empates = empates-1 WHERE (id = $mandante_id OR id = $visitante_id);";
        mysql_query($sql) or die(mysql_error());
    }
    $sql = "UPDATE time_tmp SET gols_pro = gols_pro - $mandante_gols WHERE id = $mandante_id;";
    mysql_query($sql) or die(mysql_error());
    $sql = "UPDATE time_tmp SET gols_contra = gols_contra - $visitante_gols WHERE id = $mandante_id;";
    mysql_query($sql) or die(mysql_error());
    $sql = "UPDATE time_tmp SET gols_pro = gols_pro - $visitante_gols WHERE id = $visitante_id;";
    mysql_query($sql) or die(mysql_error());
    $sql = "UPDATE time_tmp SET gols_contra = gols_contra - $mandante_gols WHERE id = $visitante_id;";
    mysql_query($sql) or die(mysql_error());    
}

function insere_valores($mandante_id,$visitante_id,$mandante_gols,$visitante_gols) {
    if ($mandante_gols > $visitante_gols) {
        $sql = "UPDATE time_tmp SET vitorias = vitorias+1 WHERE id = $mandante_id;";
        mysql_query($sql) or die(mysql_error());
        $sql = "UPDATE time_tmp SET derrotas = derrotas+1 WHERE id = $visitante_id;";
        mysql_query($sql) or die(mysql_error());
    } elseif ($visitante_gols > $mandante_gols) {
        $sql = "UPDATE time_tmp SET vitorias = vitorias+1 WHERE id = $visitante_id;";
        mysql_query($sql) or die(mysql_error());
        $sql = "UPDATE time_tmp SET derrotas = derrotas+1 WHERE id = $mandante_id;";
        mysql_query($sql) or die(mysql_error());
    } else {
        $sql = "UPDATE time_tmp SET empates = empates+1 WHERE (id = $mandante_id OR id = $visitante_id);";
        mysql_query($sql) or die(mysql_error());
    }
    $sql = "UPDATE time_tmp SET gols_pro = gols_pro + $mandante_gols WHERE id = $mandante_id;";
    mysql_query($sql) or die(mysql_error());
    $sql = "UPDATE time_tmp SET gols_contra = gols_contra + $visitante_gols WHERE id = $mandante_id;";
    mysql_query($sql) or die(mysql_error());
    $sql = "UPDATE time_tmp SET gols_pro = gols_pro + $visitante_gols WHERE id = $visitante_id;";
    mysql_query($sql) or die(mysql_error());
    $sql = "UPDATE time_tmp SET gols_contra = gols_contra + $mandante_gols WHERE id = $visitante_id;";
    mysql_query($sql) or die(mysql_error());
}

?>
