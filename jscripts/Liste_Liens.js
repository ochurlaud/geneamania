<script type="text/javascript">
<!--

// Javascript spécialisé pour la liste des liens
// affiche / masque le bouton supprimer

// Ajoute une ligne à la table des évènements
function traite(num_lig) {
	//var zone = document.getElementsByName('S_Sup['+ligne+']');
	if (document.getElementById('S_Sup_'+num_lig).checked) {
		document.forms.saisie.compteur.value++;
	}
	else {
		document.forms.saisie.compteur.value--;
	}
	if (document.forms.saisie.compteur.value >0) {
		montre_div("boutons");
	}
	else {
		cache_div("boutons");
	}
}


//-->
</script>

