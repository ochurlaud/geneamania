<script type="text/javascript">

// Javascript spécialisé pour l'édition des unions

<!--

//== Ajoute la ville saisie à la fin des listbox
function ajoute1() {
  	inverse_div('id_div_ajout1');
	nouv_val = document.forms.saisie.nouvelle_ville1.value;
	document.forms.saisie.nouvelle_ville1.value = "";
	Insert_Sel_1_2("Ville_MariageU", "Ville_NotaireU", nouv_val);
}

function ajoute2() {
  	inverse_div('id_div_ajout2');
	nouv_val = document.forms.saisie.nouvelle_ville2.value;
	document.forms.saisie.nouvelle_ville1.value = "";
	Insert_Sel_1_2("Ville_NotaireU", "Ville_MariageU", nouv_val);
}
//====================================================================================================

function sel_der(sexe) {
  if (sexe == 'm') {
    document.forms.saisie.Conjoint_1U.value = document.forms.saisie.MaxConjoint_1.value;
  }
  if (sexe == 'f') {
    document.forms.saisie.Conjoint_2U.value = document.forms.saisie.MaxConjoint_2.value;
  }
}

function Calendrier_Mariage() {
  x=Calendrier('CMaries_LeU',document.forms.saisie.CMaries_LeU.value,'Maries_LeU');
}
function Calendrier_Contrat() {
  x=Calendrier('CDate_KU',document.forms.saisie.CDate_KU.value,'Date_KU');
}

function Calendrier_Enfant_N(iteration) {
  x=Calendrier('CNe_leE_'+iteration,document.getElementById('CNe_leE_'+iteration).value,'Ne_leE_'+iteration);
}

function Calendrier_Enfant_D(iteration) {
  x=Calendrier('CDecede_leE_'+iteration,document.getElementById('CDecede_leE_'+iteration).value,'Decede_leE_'+iteration);
}

function verification_form_union(formulaire,zones) {
	var retour = true;
	var absentes = 0;
	if (formulaire.cache.value == 'ok') {
		var LesZones = zones.split(',');
		for (num = 0; num < LesZones.length; num++) {
			absentes += verification_zone_oblig_sel(formulaire[LesZones[num]]);
		}
		if (absentes > 0) {
			window.alert('Pensez à remplir les champs obligatoires...');
			retour = false;
		}
	}
	return retour;
}

//-->
</script>

