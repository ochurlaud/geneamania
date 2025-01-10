<script type="text/javascript">
<!--

// Ajoute le nom saisi dans la liste des noms de famille
function ajoute_nom() {
  nouv_text = document.forms.saisie.nouveau_nom.value;
  nouv_val = '0/' + nouv_text;
  document.forms.saisie.NomP.value = nouv_val;
  nouvel_element = new Option(nouv_text,nouv_val,false,true);
  //document.forms.saisie.idNomP.options[document.forms.saisie.idNomP.length] = nouvel_element;
  document.forms.saisie.NomSel.options[document.forms.saisie.NomSel.length] = nouvel_element;
  document.forms.saisie.nouveau_nom.value = "";
  inverse_div('id_div_ajout_nom');
}

// Met le nom en majuscules
function NomMaj() {
	document.forms.saisie.nouveau_nom.value = document.forms.saisie.nouveau_nom.value.toUpperCase();
}
 
//-->
</script> 

