<?php
//=====================================================================
// Fiche d'un nom de famille
// (c) Gérard KESTER - Avril 2009
// Intégration JLS
// UTF-8
//=====================================================================

session_start();

include('fonctions.php');
$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Name'];       // Titre pour META

$tab_variables = array('annuler','Horigine');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

$contenu = 'Codage phon&eacute;tique'; // Mots clés supplémentaires

// Recup de la variable passée dans l'URL : identifiant du nom de famille
$idNomFam = Recup_Variable('idNom','N');
$req_sel = 'SELECT * FROM ' . nom_table('noms_famille') . ' WHERE idNomFam =' . $idNomFam. ' limit 1';

$x = Lit_Env();                        // Lecture de l'indicateur d'environnement
include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();
else {

	if ((!$enreg_sel) or ($idNomFam == -1)) Retour_Ar();

	include_once('phonetique.php');		//	Traitements phonétiques

	//	Initialisation d'un objet de la classe
	$codePho = new phonetique();
	//

	$compl = Ajoute_Page_Info(600,150);
	if ($est_gestionnaire) {
		$compl = Affiche_Icone_Lien('href="'.Get_Adr_Base_Ref().'Edition_NomFam.php?idNom=' .$idNomFam.'"','fiche_edition',$LG_Menu_Title['Name_Edit']) . '&nbsp;';
	}
	Insere_Haut($titre,$compl,'Fiche_NomFam',$idNomFam);

	if ($idNomFam > -1) {
		$row = $enreg_sel;

		$r_nom = $row['nomFamille'];

		echo '<br />';
		$larg_titre = 25;
		echo '<table width="70%" class="table_form">'."\n";

		col_titre_tab(LG_NAME,$larg_titre);
		echo '<td class="value">'.$r_nom.'</td></tr>'."\n";

		col_titre_tab(LG_NAME_PHONETIC,$larg_titre);
		echo '<td class="value">'.$codePho->codeVersPhon($row['codePhonetique']).'</td></tr>'."\n";

		echo '</table>';

		//  ===== Affichage du commentaire
		if (Rech_Commentaire($idNomFam,'O')) {
			Aff_Comment_Fiche($Commentaire,$Diffusion_Commentaire_Internet);
		}

		$sql = 'select 1 from '.nom_table('noms_personnes').' where idNom = '.$idNomFam.' limit 1';
		$res = lect_sql($sql);
		$utilise = ($enreg = $res->fetch(PDO::FETCH_ASSOC));
		$res->closeCursor();
		if ($utilise) {
			$deb_lien = '<a href="'.Get_Adr_Base_Ref().'Liste_Pers2.php?Type_Liste=';
			$fin_lien = '&amp;idNom='.$idNomFam.'&amp;Nom='.$r_nom.'">';
			echo '<br />'.$deb_lien.'P'.$fin_lien.LG_LPERS_OBJ_P.' '.$r_nom.'</a>';
			echo '<br />'.$deb_lien.'p'.$fin_lien.LG_LPERS_OBJ_PC.' '.$r_nom.'</a>';
			echo '<br />'."\n";
			if ((!$SiteGratuit) or ($Premium))
			if ($est_contributeur)
				echo '<br /><a href="'.Get_Adr_Base_Ref().'Completude_Nom.php?idNom='.$idNomFam.'&amp;Nom='.$r_nom.'">'.my_html($LG_Menu_Title['Name_Is_Complete']).$r_nom.'</a><br />'."\n";
		}

		// Recherche du nom sur les sites gratuits ; pas sur les sites gratuits non premium
		if ((!$SiteGratuit) or ($Premium)) {
			if ($r_nom != '') {
				echo '<br /><a href="'.$adr_rech_gratuits.'?ok=ok&amp;NomP='.$r_nom.'" target="_blank">'.my_html(LG_NAME_SEARCH).'</a>'."\n";
			}
		}

		// Formulaire pour le bouton retour
		Bouton_Retour($lib_Retour,'?'.Query_Str());

	}
	Insere_Bas($compl);
}
?>
</body>
</html>