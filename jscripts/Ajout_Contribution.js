<script type="text/javascript">
<!--

// Javascript spécialisé pour l'ajout rapide
// sorti du PHP pour en conditionner l'appel

// Appel de la popup des calendriers
function Calendrier_Naissance(cible) {
	x = Calendrier('CNe_le'+cible,document.getElementsByName('CNe_le'+cible).value,'Ne_le'+cible);
}
function Calendrier_Bapteme(cible) {
	x = Calendrier('CBaptise_le'+cible,document.getElementsByName('CBaptise_le'+cible).value,'Baptise_le'+cible);
}
function Calendrier_Deces(cible) {
	x = Calendrier('CDecede_le'+cible,document.getElementsByName('CDecede_le'+cible).value,'Decede_le'+cible);
}
function Calendrier_Union(cible) {
	x = Calendrier('CUnis_le'+cible,document.getElementsByName('CUnis_le'+cible).value,'Unis_le'+cible);
}


// Appel de la popup de sélection de ville
function Appelle_Zone_Naissance(cible) {
	x = Zone_Geo('Ne'+cible,'idNeZone'+cible,document.getElementsByName('idNeZone'+cible).value,4);
}
function Appelle_Zone_Bapteme(cible) {
	x = Zone_Geo('Baptise'+cible,'idBaptiseZone'+cible,document.getElementsByName('idBaptiseZone'+cible).value,4);
}
function Appelle_Zone_Deces(cible) {
	x = Zone_Geo('Decede'+cible,'idDecedeZone'+cible,document.getElementsByName('idDecedeZone'+cible).value,4);
}
function Appelle_Zone_Union(cible) {
	x = Zone_Geo('Union'+cible,'idUnionZone'+cible,document.getElementsByName('idUnionZone'+cible).value,4);
}

// Ouverture d'une PopUp de saisie de zone géographique
function Zone_Geo(zoneLib,zoneValue,valZone,valNiveau) {
  var h=40; var w=430;
  var chParam="resizable=no, location=no, menubar=no, directories=no, scrollbars=no, status=no, ";
  chParam+='width='+w+', height='+h+', left=200, top=270';
  //window.alert('sel_zone_geo.php?zoneLib='+zoneLib+'&zoneValue='+zoneValue+'&valZone='+valZone+'&valNiveau='+valNiveau);
  FenCalend=window.open('sel_zone_geo.php?zoneLib='+zoneLib+'&zoneValue='+zoneValue+'&valZone='+valZone+'&valNiveau='+valNiveau,'FenCalend', chParam);
}

 // Vérification des zones obligatoires seulement sur le bouton ok
function verification_form(formulaire) {
	var retour = true;
	var absentes = 0;
	if (formulaire.cache.value == 'ok') {
		absentes += verification_zone_oblig(formulaire.mail);
		if (absentes > 0) {	
			window.alert('Pensez à remplir les champs obligatoires...');
			retour = false;
		}
	}
	return retour;
 }

//-->
</script> 
