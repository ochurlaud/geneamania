<script type="text/javascript">
<!--

// Javascript spécialisé pour l'ajout rapide
// sorti du PHP pour en conditionner l'appel

function Calendrier_Naissance(cible) {
	switch(cible) {
		case "col" : x = Calendrier('CNe_lecol',document.forms.saisie.CNe_lecol.value,'Ne_lecol'); break;
		case "conj" : x = Calendrier('CNe_leconj',document.forms.saisie.CNe_leconj.value,'Ne_leconj'); break;
		case "pere" : x = Calendrier('CNe_lepere',document.forms.saisie.CNe_lepere.value,'Ne_lepere'); break;
		case "mere" : x = Calendrier('CNe_lemere',document.forms.saisie.CNe_lemere.value,'Ne_lemere'); break;
	}
}
function Calendrier_Bapteme(cible) {
	switch(cible) {
		case "col" : x = Calendrier('CBaptise_lecol',document.forms.saisie.CBaptise_lecol.value,'Baptise_lecol'); break;
		case "conj" : x = Calendrier('CBaptise_leconj',document.forms.saisie.CBaptise_leconj.value,'Baptise_leconj'); break;
		case "pere" : x = Calendrier('CBaptise_lepere',document.forms.saisie.CBaptise_lepere.value,'Baptise_lepere'); break;
		case "mere" : x = Calendrier('CBaptise_lemere',document.forms.saisie.CBaptise_lemere.value,'Baptise_lemere'); break;
	}
}
function Calendrier_Deces(cible) {
	switch(cible) {
		case "col" : x = Calendrier('CDecede_lecol',document.forms.saisie.CDecede_lecol.value,'Decede_lecol'); break;
		case "conj" : x = Calendrier('CDecede_leconj',document.forms.saisie.CDecede_leconj.value,'Decede_leconj'); break;
		case "pere" : x = Calendrier('CDecede_lepere',document.forms.saisie.CDecede_lepere.value,'Decede_lepere'); break;
		case "mere" : x = Calendrier('CDecede_lemere',document.forms.saisie.CDecede_lemere.value,'Decede_lemere'); break;
	}
}

function Calendrier_Union(cible) {
	switch(cible) {
		case "conj" : x = Calendrier('CUnis_leconj',document.forms.saisie.CUnis_leconj.value,'Unis_leconj'); break;
		case "parents" : x = Calendrier('CUnis_leparents',document.forms.saisie.CUnis_leparents.value,'Unis_leparents'); break;
	}
}

function ajoute2() {
  nouv_val = document.forms.saisie.nouvelle_ville2.value;
  nouvel_element = new Option(nouv_val,nouv_val,false,false);
  document.forms.saisie.Ville_NaissanceP.options[document.forms.saisie.Ville_NaissanceP.length] = nouvel_element;
  nouvel_element = new Option(nouv_val,nouv_val,false,true);
  document.forms.saisie.Ville_DecesP.options[document.forms.saisie.Ville_DecesP.length] = nouvel_element;
  document.forms.saisie.nouvelle_ville2.value = "";
  inverse_div('id_div_ajout2');
}

// Ajoute le nom saisi dans la liste des noms de famille
function ajoute_nom(cible) {
	var nouv_text = document.getElementById("nouveau_nom"+cible).value;
	var nouv_val = '0/' + nouv_text;
	document.getElementById("Nom"+cible).value = nouv_val;
	nouvel_element = new Option(nouv_text,nouv_val,false,true);
	document.getElementById("NomSel"+cible).options[document.getElementById("NomSel"+cible).length] = nouvel_element;
	document.getElementById("nouveau_nom"+cible).value = "";
	inverse_div('id_div_ajout_nom'+cible);
}

// Met le nom en majuscules
function NomMaj(cible) {
	document.getElementById("nouveau_nom"+cible).value = document.getElementById("nouveau_nom"+cible).value.toUpperCase();
}

// Reprend le nom saisi précédemment
function reprend_nom(cible) {
  nouv_text = document.forms.saisie.Nom_Prec.value;
  document.getElementById("Nom"+cible).value = nouv_text;
  document.getElementById("NomSel"+cible).value = nouv_text;
}

//-->
</script> 
