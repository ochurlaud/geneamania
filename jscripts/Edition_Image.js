<script type="text/javascript">
<!--

// Vérification des zones obligatoires seulement sur le bouton ok
// non standard car FF se comporte bizarrement avec la value du type file
function verification_form_image(formulaire) {
	var retour = true;
	var fic_saisi = formulaire.nom_du_fichier.value;
	if (formulaire.cache.value == 'ok') {
		var ko1 = false;
		if (formulaire.nom_du_fichier.value == '') {
			fic_saisi = formulaire.ANom.value;
		}
		if (fic_saisi == '') {
			formulaire.nom_du_fichier.className='absent';
			ko1 = true;
			retour = false;
		}
		else {
			formulaire.nom_du_fichier.className='oblig';
		}
		var ko2 = verification_form(formulaire,'Titre');
		if (ko2 = false) retour = false;
	}
	return retour;
}

//-->
</script>