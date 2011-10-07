<?
$sql = "SELECT * FROM jogador ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
	<table cellpadding="1" cellspacing="1">
		<?
        $i=0;
		while ($R=mysql_fetch_object($qry)) {
			$id                 = $R->id;
			$nome    		    = $R->nome;
			$data_nascimento    = $R->data_nascimento;
			$posicao            = $R->posicao;
			$time               = $R->time_id;
			$cartoes_amarelos   = $R->cartoes_amarelos;
			$cartoes_vermelhos  = $R->cartoes_vermelhos;
			$total_faltas       = $R->total_faltas;									
            if($i%2) $cor = "#ffffff";       
            else $cor = "#f1f1f1";
			?>
			<tr bgcolor="<?=$cor?>">
				<td><? echo utf8_encode($nome); ?></td>
				<td><? echo utf8_encode($data_nascimento); ?></td>
				<td><? echo utf8_encode($posicao); ?></td>
				<td><? echo $time; ?></td>
				<td><? echo $cartoes_amarelos; ?></td>
				<td><? echo $cartoes_vermelhos; ?></td>
				<td><? echo $total_faltas; ?></td>
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
