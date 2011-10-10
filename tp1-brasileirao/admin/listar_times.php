<?
$sql = "SELECT * FROM time ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
	<table cellpadding="1" cellspacing="1">
		<?
        $i=0;
		while ($R=mysql_fetch_object($qry)) {
                        $id        = $R->id;  
			$nome      = $R->nome;
			$brasao    = $R->brasao;
			$estado    = $R->estado;
			$gols_pro  = $R->gols_pro; 
			$gols_contra = $R->gols_contra;
			$total_faltas = $R->total_faltas; 
                        if($i%2) $cor = "#ffffff";       
                        else $cor = "#f1f1f1";
			?>
			<tr bgcolor="<?=$cor?>">
				<td><img src="<?="../img/".$brasao; ?>" alt="kkk"></img></td>
				<td><? echo utf8_encode($nome); ?></td>
				<td><? echo utf8_encode($estado); ?></td>
				<td><? echo $gols_pro; ?></td>
				<td><? echo $gols_contra; ?></td>
				<td><? echo $total_faltas; ?></td>
				<td align="center" width="10%">
					[ <a href="?acao=alterar_time&id=<?=$id;?>">A</a> ]
					[ <a href="?acao=excluir_time&id=<?=$id;?>">X</a> ]
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
