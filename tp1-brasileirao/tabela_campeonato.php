<?
$sql1="SELECT concat(nome,'-',estado) as nome,
    vitorias*3 as P,
    vitorias+derrotas+empates as J,
    vitorias as V,
    empates as E,
    derrotas as D,
    gols_pro as GP,
    gols_contra as GC,
    gols_pro-gols_contra as SG,
    (vitorias*3)/((vitorias+empates+derrotas)*3)*100 as '%' FROM time";

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
        order by P";
$qry = mysql_query($sql) or die(mysql_error());


if (mysql_num_rows($qry)>0) {
	?>
<center>
	<table cellpadding="1" cellspacing="1">
                <thead>
                <tr>
                    <td>Classificacao</td>
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
			<tr bgcolor="<?=$cor?>">
                                <td><? echo $i; ?></td>
				<td><? echo utf8_encode($nome); ?></td>
				<td><? echo $P;?></td>
				<td><? echo $J; ?></td>
				<td><? echo $V; ?></td>
				<td><? echo $E; ?></td>
                                <td><? echo $D; ?></td>
				<td><? echo $GP; ?></td>
				<td><? echo $GC; ?></td>
				<td><? echo $SG; ?></td>
				<td><? echo $aprv; ?></td>
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
 </center>   
	<?
}else{
	echo "Listagem cancelada (Tabela vazia).";
}
?>

