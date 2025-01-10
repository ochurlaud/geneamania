<script type="text/javascript">
// Contrôle au clic sur le bouton pour afficher 2 personnes
function controle(formulaire)
{
	nbRef1 = 0;
	nbRef2 = 0;
	refForm = document.forms[formulaire];
	for (i=0 ; i < refForm.ref1.length ; i++)
	{
		if (refForm.ref1[i].checked)
		{
			nbRef1 ++;
		}
		if (refForm.ref2[i].checked)
		{
			nbRef2 ++;
		}
	}
	if (nbRef1 != 1 || nbRef2 != 1)
	{
		alert('Veuillez saisir une personne dans chaque colonne');
		return false;
	}
	return true;
	//	submit();
}

//-->
</script> 

