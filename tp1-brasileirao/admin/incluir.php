<? include "verifica.php"; ?> 
<form name="form_incluir" method="POST" action="?acao=executa_incluir">
	Matrícula:<br />
	<input type="text" name="matricula" size="15" maxlength="15"><br />
	Nome:<br />
	<input type="text" name="nome" size="30" maxlength="100"><br />
	Email:<br />
	<input type="text" name="email" size="30" maxlength="255">
	<p align="right">
	<input type="submit" name="Submit" value="Enviar">
</form>

