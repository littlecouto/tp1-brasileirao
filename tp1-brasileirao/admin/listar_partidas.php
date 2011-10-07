<?

$sql = "SELECT id,nome,brasao,estado FROM time ORDER BY nome";
$rs = mysql_query($sql) or die(mysql_error());
$times = array();
$imagens = array();
while ($R = mysql_fetch_object($rs)){
    $times[$R->id] = $R->nome.'-'.$R->estado;
    $imagens[$R->id] = "../img/".$R->brasao;
}

$sql = "SELECT * FROM estadio";
$rs = mysql_query($sql) or die(mysql_error());
$estadios = array();
while ($R = mysql_fetch_object($rs)) {
    $estadios[$R->id] = $R->nome;
}

$sql = "SELECT * FROM partida ORDER BY data";
$qry = mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($qry)>0) {
	?>
	<table cellpadding="1" cellspacing="1">
		<?
        $i=0;
		while ($R=mysql_fetch_object($qry)) {
			$mandante_id     = $R->mandante_id;
			$visitante_id    = $R->visitante_id;
			$estadio_id      = $R->estadio_id;
			$data    		 = $R->data;
			$ac_pri_tempo    = $R->ac_pri_tempo;
			$ac_seg_tempo    = $R->ac_seg_tempo;
                        if($i%2) $cor = "#ffffff";       
                         else $cor = "#f1f1f1";
			?>
			<tr bgcolor="<?=$cor?>">
				<td><img src="<?=$imagens[$mandante_id];?>" alt="<?=utf8_encode($times[$mandante_id]);?>" ></img></td>
				<td><? echo utf8_encode("X"); ?></td>				
				<td><img src="<?=$imagens[$visitante_id];?>" alt="<?=utf8_encode($times[$mandante_id]);?>" ></img></td>
				<td><? echo utf8_encode($estadios[$estadio_id]); ?></td>
				<td><? echo utf8_encode($data); ?></td>
				<td><? echo utf8_encode($ac_pri_tempo); ?></td>
				<td><? echo utf8_encode($ac_seg_tempo); ?></td>
				<td align="center" width="10%">
					[ <a href="?acao=alterar&matricula=<?=$matricula;?>">A</a> ]
					[ <a href="?acao=excluir&matricula=<?=$matricula;?>">X</a> ]
				</td>
			</tr>
			<?
			$i++;
		}
		?>
	</table>
	<?
}else{
	echo "Listagem cancelada (Tabela vazia).";
}
?>
