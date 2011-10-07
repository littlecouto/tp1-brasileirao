<?
$sql = "SELECT * FROM arbitro ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
	<table cellpadding="1" cellspacing="1">
		<?
        $i=0;
		while ($R=mysql_fetch_object($qry)) {
			$nome      = $R->nome;
			$data_nascimento    = $R->data_nascimento;
                        if($i%2) $cor = "#ffffff";       
                         else $cor = "#f1f1f1";
			?>
			<tr bgcolor="<?=$cor?>">
				<td><? echo utf8_encode($nome); ?></td>
				<td><? echo utf8_encode($data_nascimento); ?></td>
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
