<?
$sql = "SELECT * FROM cadastroXX ORDER BY nome";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
	<ul class="tabela">
		<li class="linha even">
                    <ul class="colunas">
			<li class="coluna">Mat</li>
			<li class="coluna">Nome</li>
			<li class="coluna">Email</li>
			<li class="coluna">Opções</li>
                    </ul>    
		</li>
		<?
                $i = 0;
		while ($R=mysql_fetch_object($qry)) {
			$matricula = $R->matricula;
			$nome      = $R->nome;
			$email     = $R->email;
                        ?>
                        <?if($i % 2){?>
                            <li class="linha even" >
                        <?}else{?>
                            <li class="linha odd">
                         <?}?>       
			
                            <ul class="colunas">
				<li class="coluna"><? echo $matricula; ?></li>
				<li class="coluna"><? echo $nome; ?></li>
				<li class="coluna"><? echo $email; ?></li>
				<li class="coluna">
					[ <a href="?acao=alterar&matricula=<?=$matricula;?>">A</a> ]
					[ <a href="?acao=excluir&matricula=<?=$matricula;?>">X</a> ]
				</li>
                            </ul>
			</li>
			<?
                        $i++;
		}
		?>
	</ul>
	<?
}else{
	echo "Listagem cancelada (Tabela vazia).";
}
?>
