<?php
//=====================================================================
// Affichage d'un document, quel que soit sa nature
// JGérard 2009
//	paramètre : refDoc = référence du document à afficher
//=====================================================================

// Gestion standard des pages
session_start();                       // Démarrage de la session

include('fonctions.php');              // Appel des fonctions générales
$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = 'Voir un document'; 		   // Titre pour META
$x = Lit_Env();                        // Lecture de l'indicateur d'environnement
include('Gestion_Pages.php');          // Appel de la gestion standard des pages

// Récupération des variables de l'affichage précédent
$tab_variables = array('Horigine');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// Recup de la variable passée dans l'URL : référence de la personne
$refDoc = Recup_Variable('refDoc','N');

$compl = "";
//	if ($_SESSION['estGestionnaire']) {
///		$compl = Affiche_Icone_Lien('href="Edition_Lien.php?Ref='.$Ref.'"','fiche_edition','Edition fiche lien') . '&nbsp;';
///	}
Insere_Haut($titre,$compl,'Fiche_Lien','');
//	---------------------------------------------------------------------------------------------------
function affErreur($messageErreur)
{
	global $chemin_images , $Icones;
	$image = 'error.png';
	echo '<h3><img src="'.$chemin_images.$Icones['stop'].'" BORDER=0 alt="'.$image.'" title="'.$image.'">';
	echo '&nbsp;Erreur : '.$messageErreur.'</h3><br>';

}
//	Affichage d'un fichier HTML
function afficheHTM()
{
	global $natureDoc , $nomFichier , $titreDoc;
	$nomComplet = 'documents/' . $natureDoc . '/' . $nomFichier;
	if (!file_exists($nomComplet))
	{
		affErreur('Le fichier ' . $nomFichier . ' n\'existe pas');
		return;
	}
	if (!($fichier = fopen($nomComplet , "r")))
	{
		affErreur('Impossible d\'ouvrir le fichier ' . $nomFichier);
		return;
	}
	$contenu = stream_get_contents($fichier);
	fclose($fichier);  
	//	Suppression de tout ce qui est avant la balise BODY
	$position = stripos($contenu , "<body>");
	if ($position)
	{
		$position = stripos($contenu , '>' , $position);
		$contenu = substr($contenu , $position + 1 , strlen($contenu));
	}
	//	Suppression de tout ce qui est après la balise de fin BODY
	$position = stripos($contenu , "</body>");
	if ($position)
	{
		$contenu = substr($contenu , 0 , $position);
	}
	echo '<fieldset><legend>' . $titreDoc . '</legend>' . $contenu . '</fieldset>';
}
//	---------------------------------------------------------------------------------------------------
//
//  ========== Programme principal ==========
//
$sql = 'SELECT * FROM '.nom_table('documents').' WHERE id_document = '.$refDoc;
$res = lect_sql($sql);
$enreg        = $res->fetch(PDO::FETCH_ASSOC)
$natureDoc    = $enreg['Nature_Document'];
$titreDoc     = $enreg['Titre'];
$nomFichier   = $enreg['Nom_Fichier'];
$diffInternet = $enreg['Diff_Internet'];
if ($natureDoc == 'HTM')
{
	afficheHTM();
}

if ($natureDoc == 'PDF') {
	/*echo '<div style="height: 600px;width: 400px;">';
	echo '<object data="documents/PDF/Geneamania.pdf" codetype="application/pdf" ></object>';
	//<object width="xxx" height="yyy" data="document.pdf"></object>
	echo '</div>';*/
	
	echo '<div style="text-align: center"><br />';
	echo '<object width="800" height="600" type="application/pdf" data="Geneamania.pdf">
		alt : <a href="Geneamania.pdf">Geneamania.pdf</a> 
		Votre navigateur ne permet pas l\'affichage d\'un fichier pdf. T&eacute;l&eacute;chargez adobe reader sur le site d\'adobe</object><br />';
	echo '&nbsp;<br />';
	echo '&nbsp;</div>';
	
	//<a href="chemin/vers/ton/document.doc" type="application/msword">intitulé de ton document (format Word, poids du document)</a>
	
	/*
	<iframe
src="test.pdf" width="500" height="800" align="middle">
</iframe>
	*/
}
  
Insere_Bas($compl);   
?>
</body>
</html>
