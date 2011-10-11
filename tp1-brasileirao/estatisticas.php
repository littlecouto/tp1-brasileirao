<?
$artilharia = "SELECT nome,count(nome) as gols from gol inner join jogador where jogador_id=id group by nome order by gols desc";
$jogador_far_play = "SELECT nome,count(nome) as faltas from falta inner join jogador where jogador_id=id group by nome order by faltas desc";
$jogador_violento = "SELECT nome,count(nome) as faltas from falta inner join jogador where jogador_id=id group by nome order by faltas asc";
$equipe_far_play = "SELECT time.nome,count(time.nome) as faltas from falta inner join jogador inner join time where jogador_id=jogador.id and  time.id=time_id group by time.nome order by faltas asc";
$equipe_violenta = "SELECT time.nome,count(time.nome) as faltas from falta inner join jogador inner join time where jogador_id=jogador.id and  time.id=time_id group by time.nome order by faltas desc";

$qry = mysql_query($artilharia) or die(mysql_error());
?>
<div class="box_first">
    <h5>Artilharia</h5>
    <table cellpadding="1" cellspacing="1">
        <tr id="primeira">
            <td>Jogador</td>
            <td>Número Gols</td>
        </tr>
        <?
        if (mysql_num_rows($qry) > 0) {
            $i = 0;
            while ($R = mysql_fetch_object($qry)) {
                $nome = $R->nome;
                $gols = $R->gols;
                ?>
                <tr bgcolor="<?= $cor ?>">
                    <td><? echo utf8_encode($nome); ?></td>
                    <td><? echo utf8_encode($gols); ?></td>
                </tr>
                <?
                $i++;
            }
        } else {
            echo "Não existem gols cadastrados!";
        }
        ?>
    </table>
</div>
<?
$qry = mysql_query($jogador_far_play) or die(mysql_error());
?>
<div class="box">
    <h5>Jogador Fair Play</h5>
    <table cellpadding="1" cellspacing="1">
        <tr id="primeira">
            <td>Jogador</td>
            <td>Número Faltas</td>
        </tr>
        <?
        if (mysql_num_rows($qry) > 0) {
            $i = 0;

            while ($R = mysql_fetch_object($qry)) {
                $nome = $R->nome;
                $faltas = $R->faltas;
                ?>
                <tr>
                    <td><? echo utf8_encode($nome); ?></td>
                    <td><? echo utf8_encode($faltas); ?></td>
                </tr>
                <?
                $i++;
            }
        } else {
            echo "Não existem faltas cadastradas!";
        }
        ?>
    </table>
</div>
<? ?>
<?
$qry = mysql_query($equipe_far_play) or die(mysql_error());
if (mysql_num_rows($qry) > 0) {
    ?>
    <div class="box">
        <h5>Equipe Fair Play</h5>
        <table cellpadding="1" cellspacing="1">
            <tr id="primeira">
                <td>Jogador</td>
                <td>Número Faltas</td>
            </tr>
            <?
            $i = 0;
            while ($R = mysql_fetch_object($qry)) {
                $nome = $R->nome;
                $faltas = $R->faltas;
                ?>
                <tr>
                    <td><? echo utf8_encode($nome); ?></td>
                    <td><? echo utf8_encode($faltas); ?></td>
                </tr>
                <?
                $i++;
            }
            ?>
        </table>
    </div>
    <?
} else {
    echo "Não existem faltas cadastradas!";
}
?>
<?
?>
<div class="box">
    <h5>Jogador Mais Violento</h5>
    <table cellpadding="1" cellspacing="1">
        <tr id="primeira">
            <td>Jogador</td>
            <td>Número Faltas</td>
        </tr>
        <?
        $qry = mysql_query($jogador_violento) or die(mysql_error());
        if (mysql_num_rows($qry) > 0) {
            $i = 0;
            while ($R = mysql_fetch_object($qry)) {
                $nome = $R->nome;
                $faltas = $R->faltas;
                ?>
                <tr>
                    <td><? echo utf8_encode($nome); ?></td>
                    <td><? echo utf8_encode($faltas); ?></td>
                </tr>
                <?
                $i++;
            }
        } else {
            echo "Não existem faltas cadastradas!";
        }
        ?>
    </table>
</div>
<? ?>

<?
?>
<div class="box">
    <h5>Equipe Mais Violenta</h5>
    <table cellpadding="1" cellspacing="1">
        <tr id="primeira">
            <td>Jogador</td>
            <td>Número Faltas</td>
        </tr>
        <?
        $qry = mysql_query($equipe_violenta) or die(mysql_error());
        if (mysql_num_rows($qry) > 0) {
            $i = 0;
            while ($R = mysql_fetch_object($qry)) {
                $nome = $R->nome;
                $faltas = $R->faltas;
                ?>
                <tr>
                    <td><? echo utf8_encode($nome); ?></td>
                    <td><? echo utf8_encode($faltas); ?></td>
                </tr>
                <?
                $i++;
            }
        } else {
            echo "Não existem faltas cadastradas!";
        }
        ?>
    </table>
</div>
<?
?>
