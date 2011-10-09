<?
$sql = "SELECT * FROM tecnico ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
	<table cellpadding="1" cellspacing="1">
		<?
                $i=0;
		while ($R=mysql_fetch_object($qry)) {
                        $id       =$R->id;
			$nome      = $R->nome;
                        $cartoes_amarelos = $R->cartoes_amarelos;
                        $cartoes_vermelhos = $R->cartoes_vermelhos;
                        if($i%2) $cor = "#ffffff";       
                         else $cor = "#f1f1f1";
			?>
			<tr bgcolor="<?=$cor?>">
				<td><? echo utf8_encode($nome); ?></td>
				<td><? echo utf8_encode($cartoes_amarelos); ?></td>
				<td><? echo utf8_encode($cartoes_vermelhos); ?></td>
                                <td align="center" width="10%">
					[ <a href="?acao=alterar_tecnico&id=<?=$id;?>">A</a> ]
					[ <a href="?acao=excluir_tecnico&id=<?=$id;?>">X</a> ]
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
