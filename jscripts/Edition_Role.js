<script type="text/javascript">
<!--

// Javascript spécialisé pour l'édition de rôle


function dupplique() {
	if (document.forms.saisie.LibelleInvF.value == "") {
		document.forms.saisie.LibelleInvF.value = document.forms.saisie.LibelleF.value;
	}
}

function verification_code(zone) {
	var codes = document.forms.saisie.codes.value;
	var posi  = codes.indexOf(zone.value);
	if (posi > -1) {
		window.alert('Attention, code déjà utilisé (codes présents :'+codes+').');
		zone.value = '';
	}

}


//-->
</script> 

