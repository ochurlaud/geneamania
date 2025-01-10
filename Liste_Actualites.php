<?php
//====================================================================
// 
//  Affichage de la liste des actualités (évènements spécialisés)
//
// (c) JLS 2009
//=====================================================================

// Gestion standard des pages
session_start();
include('fonctions.php');
$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = 'Liste des actualités';       // Titre pour META
$x = Lit_Env();
$niv_requis = 'I';
include('Gestion_Pages.php');

$t = $titre;
$compl = Ajoute_Page_Info(600,150);

Insere_Haut($t,$compl,'Liste_Actualites','');

// Pour les sites gratuits non Premium, les actualités sont centralisées
$centralise = false;
if (($SiteGratuit) and (!$Premium)) $centralise = true;

echo '<br />';

// Optimisation : préparation echo des images
$texte = 'Modifier';
$echo_modif = '<img src="'.$chemin_images.$Icones['fiche_edition'].'" border="0" alt="'.$texte.'" title="'.$texte.'"/></a>';

$memo_pref = $pref_tables;
if ($centralise) $pref_tables = 'gra_sg_';
$requete = 'SELECT Reference , Titre, Debut, Fin ' . 'from '. nom_table('evenements') .
	       ' where Code_Type = "'.$TypeEv_actu.'" ORDER BY Reference desc';
$result = lect_sql($requete);
$pref_tables = $memo_pref;	          

if (($est_gestionnaire) and (!$centralise)) {
	echo 'Ajouter une actualit&eacute; : '.Affiche_Icone_Lien('href="Edition_Evenement.php?refPar=-1&amp;actu=o"','ajouter','Insérer').'<br /><br />'."\n";
}

//  Affichage des actualités
if ($result->rowCount() > 0) { 
    while ($enreg = $result->fetch(PDO::FETCH_NUM)) 
		$ref_evt = $enreg[0];
		echo '<a href="Fiche_Actualite.php?refPar=' . $ref_evt . '">' . htmlentities($enreg[1], ENT_QUOTES, $def_enc) . '</a> ';
		if (($enreg[2] != '') or ($enreg[3]))
			echo '(' . Etend_2_dates($enreg[2],$enreg[3]) . ')';
		echo "\n";
			
		if (($est_gestionnaire) and (!$centralise)) {
			echo '&nbsp;<a href="Edition_Evenement.php?refPar='. $ref_evt . '">'.$echo_modif."\n";
		}
		echo '<br />';
    }
}

Insere_Bas($compl);
?>
</body>
</html>
