function PreencheTextBox(array) {

 var array_produtos = array.split("|");
 var index = parseInt(document.getElementById("select_mandante").value);
 document.getElementById("textbox_estadio").value = array_produtos[index].replace(/_/g," ");
 document.getElementById("hidden_estadio_id").value = index;
 document.getElementById("textbox_estadio").editable = "true";
 	
}