<?php

//=====================================================================
// Affichage des informations techniques
// (c) JLS
//=====================================================================

session_start();

// Verrouillage sur le site de téléchargement
if (strpos($_SERVER['SERVER_NAME'],'tech.geneamania.net') !== false) {
	echo '<!DOCTYPE html><html lang="fr"><head><title>Informations techniques</title></head><body>';
	echo 'Good bye my friend';
}
else {
	require('fonctions.php');
	$acces = 'L';
	$titre = $LG_Menu_Title['Tech_Info'];
	$niv_requis = 'G';
	$x = Lit_Env();
	
	if ($x) {
		require('Gestion_Pages.php');

		$compl = Ajoute_Page_Info(600,150);
		Insere_Haut($titre,$compl,'Infos_Tech','');

		echo '<br>'."\n";
		echo my_html(LG_TECH_INFO_VERSION).LG_SEMIC.$Version.'<br>';
		if ($Environnement == 'I') echo my_html(LG_TECH_INFO_ENVIR_INTERNET);
		else echo my_html(LG_TECH_INFO_ENVIR_LOCAL);
		echo '<br><br><br>'."\n";

		// $x = getPhpinfo();
		// var_dump($x);

		if (!$SiteGratuit) {
			phpinfo(
			 INFO_GENERAL
			//+INFO_CREDITS
			+INFO_CONFIGURATION
			+INFO_MODULES
			+INFO_ENVIRONMENT
			+INFO_VARIABLES
			);
		}
		else aff_erreur($LG_Data_noavailable_profile);

		Insere_Bas($compl);
	}
}
?>
</body>
</html>