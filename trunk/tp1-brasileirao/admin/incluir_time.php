<? include "verifica.php"; ?> 
<form name="form_incluir" method="POST" action="?acao=executa_incluir_partida" align="left">
	<label>Nome:<input type="text" name="nome" size="30" maxlength="255"></label>	
	<label>Estado:<select name="estado">  
    <option value="AC">AC</option>  
    <option value="AL">AL</option>  
    <option value="AM">AM</option>  
    <option value="AP">AP</option>  
    <option value="BA">BA</option>  
    <option value="CE">CE</option>  
    <option value="DF">DF</option>  
    <option value="ES">ES</option>  
    <option value="GO">GO</option>  
    <option value="MA">MA</option>  
    <option value="MG">MG</option>  
    <option value="MS">MS</option>  
    <option value="MT">MT</option>  
    <option value="PA">PA</option>  
    <option value="PB">PB</option>  
    <option value="PE">PE</option>  
    <option value="PI">PI</option>  
    <option value="PR">PR</option>  
    <option value="RJ">RJ</option>  
    <option value="RN">RN</option>  
    <option value="RO">RO</option>  
    <option value="RR">RR</option>  
    <option value="RS">RS</option>  
    <option value="SC">SC</option>  
    <option value="SE">SE</option>  
    <option value="SP">SP</option>  
    <option value="TO">TO</option>  
    </select></label>
    <br />
	<label>Gols Pró:<input type="text" name="gols_pro" size="10" maxlength="10" value="0"></label>
	<label>Gols Contra:<input type="text" name="gols_contra" size="10" maxlength="10" value="0"></label>	
	<label>Total Faltas:<input type="text" name="total_faltas" size="10" maxlength="10" value="0"></label>	
    <input type="hidden" name="banner" size="10" maxlength="10" value="sem_banner.jpg">	
		
	<p align="right">
	<input type="submit" name="Submit" value="Enviar">
</form>