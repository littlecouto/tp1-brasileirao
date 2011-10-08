<?
$sql = "SELECT * FROM estadio ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
	<table cellpadding="1" cellspacing="1">
		<?
        $i=0;
		while ($R=mysql_fetch_object($qry)) {
                        $id       =$R->id;
			$nome      = $R->nome;
                        if($i%2) $cor = "#ffffff";       
                         else $cor = "#f1f1f1";
			?>
			<tr bgcolor="<?=$cor?>">
				<td><? echo utf8_encode($nome); ?></td>
				<td align="center" width="10%">
					[ <a href="?acao=alterar_estadio&id=<?=$id;?>">A</a> ]
					[ <a href="?acao=excluir_estadio&id=<?=$id;?>">X</a> ]
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
