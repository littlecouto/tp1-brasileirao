<?
include "admin/conecta.php";
$sql = "SELECT concat(nome,'-',estado) as nome,
        vitorias*3+empates as P,
        vitorias+derrotas+empates as J,
        vitorias as V,
        empates as E,
        derrotas as D,
        gols_pro as GP,
        gols_contra as GC,
        gols_pro-gols_contra as SG,
        IF((vitorias+empates+derrotas),(vitorias*3+empates)/((vitorias+empates+derrotas)*3)*100,0) as aprv FROM time
        order by P desc,SG desc,GP desc";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
<div class="box_first">
    <h5>TP1 - BD - UFSJ</h5>
    <p>Este sistema de informação intitulado "Bola na Rede" é parte integrante do trabalho da disciplina de banco de dados do curso de ciência da computação da Universidade Federal de São João del-Rei, ministrada pelo professor Leonardo Rocha.</p>
</div>
<div class="box">
<h5>Tabela Atual do Campeonato Brasileiro</h5>
	<table>
                <thead>
                <tr id="primeira">
                    <td>Classificação</td>
                    <td>Nome</td>
                    <td>P</td>
                    <td>J</td>
                    <td>V</td>
                    <td>E</td>
                    <td>D</td>
                    <td>GP</td>
                    <td>GC</td>
                    <td>SG</td>
                    <td>%</td>
                </tr>
                </thead>
                <tbody>
		<?
                $i=1;
		while ($R=mysql_fetch_object($qry)) { 
			$nome      = $R->nome;
			$P    = $R->P;
			$J    = $R->J;
			$V  = $R->V; 
			$E = $R->E;
			$D = $R->D;
			$GP = $R->GP;
                        $GC = $R->GC; 
			$SG = $R->SG; 
			$aprv = $R->aprv; 

                        if($i%2) $cor = "#ffffff";       
                        else $cor = "#f1f1f1";
			?>
			<tr>
                                <td><? echo $i; ?></td>
				<td><? echo utf8_encode($nome); ?></td>
				<td align="center"><? echo $P;?></td>
				<td align="center"><? echo $J; ?></td>
				<td align="center"><? echo $V; ?></td>
				<td align="center"><? echo $E; ?></td>
                                <td align="center"><? echo $D; ?></td>
				<td align="center"><? echo $GP; ?></td>
				<td align="center"><? echo $GC; ?></td>
				<td align="center"><? echo $SG; ?></td>
				<td align="center"><? echo $aprv; ?></td>
                                </td>
			</tr>
			<?
			$i++;
		}
		?>
                <tbody>
               <tfoot>
               </tfoot>    
	</table>  
</div>
	<?
}else{
	echo "Listagem cancelada (Tabela vazia).";
}
?>

