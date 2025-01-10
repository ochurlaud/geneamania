<?php

//=====================================================================
// Vidage de la base : reset
// (c) JLS
// +UTF-8
//=====================================================================

session_start();

function suppression($lib, $n_table, $genre, $where, $affichage=true) {
	global $debug;
    if ($affichage) echo '&nbsp;&nbsp;- ';
	if ($where != '')
		$req = 'DELETE FROM '.$n_table.' where '.$where;
	else 
		$req = 'TRUNCATE TABLE '.$n_table;
	if ($debug) $req.'<br>';
    $res = maj_sql($req);
    if ($affichage) {
		echo LG_RESET_DATA_BEG.' '.$lib.' '.LG_RESET_DATA_END.'<br>';
    }	
}

include('fonctions.php');

// Fonction de recctification UTF8
include('Rectif_Utf8_Commun.php');

// Récupération des variables de l'affichage précédent
$tab_variables = array('ok', 'annuler', 'init_base'
                       );
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$ok        = Secur_Variable_Post($ok,strlen($lib_Okay),'S');
$annuler   = Secur_Variable_Post($annuler,strlen($lib_Annuler),'S');
$init_base = Secur_Variable_Post($init_base,2,'S');

$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Reset_DB'];   // Titre pour META
$x = Lit_Env();                        // Lecture de l'indicateur d'environnement
$niv_requis = 'G';						// Page accessible au gestionnaire
include('Gestion_Pages.php');          // Appel de la gestion standard des pages

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

if ($bt_OK) Ecrit_Entete_Page($titre,'','');

$compl = Ajoute_Page_Info(600,300);
Insere_Haut($titre,$compl,'Vide_Base','');

if ($bt_OK) {
	// Demande d'initialisation de la base ou non ?
	$Init = ($init_base == 'on') ? true : false;

	echo '<br>';

	//Demande de reset
	if ($Init) {

		include('fonctions_maj.php');
		
		// Optimisation : calcul des noms de tables
		$n_filiations     = nom_table('filiations');
		$n_unions         = nom_table('unions');
		$n_participe      = nom_table('participe');
		$n_personnes      = nom_table('personnes');
		$n_evenements     = nom_table('evenements');
		$n_villes         = nom_table('villes');
		$n_departements   = nom_table('departements');
		$n_regions        = nom_table('regions');
		$n_pays           = nom_table('pays');
		$n_commentaires   = nom_table('commentaires');
		$n_noms           = nom_table('noms_famille');
		$n_liens_noms     = nom_table('noms_personnes');
		$n_images         = nom_table('images');
		$n_sources        = nom_table('sources');
		$n_conc_source    = nom_table('concerne_source');
		$n_depots         = nom_table('depots');
		$n_concerne_objet = nom_table('concerne_objet');
				
		suppression('filiations',$n_filiations,'f','');
		suppression('unions',$n_unions,'f','');
		suppression('images',$n_images,'f','Type_Ref  in ("P","V","U")');
		suppression('participations',$n_participe,'f','',false);
		suppression('personnes',$n_personnes,'f','reference > 0');
		suppression('noms',$n_noms,'m','');
		suppression('lien noms',$n_liens_noms,'m','',false);
		suppression('évènements',$n_evenements,'m','Code_Type <> "AC3U"');
		suppression('villes',$n_villes,'f','identifiant_zone > 0');
		suppression('commentaires',$n_commentaires,'m','(Type_Objet <> "G" and Type_Objet <> "E")'.
											' or (Type_Objet = "E" and Reference_Objet not in (select Reference from '.$n_evenements.' where Code_Type = "AC3U"))');
		suppression('dépôts',$n_depots,'m','Ident > 0');
		suppression('sources',$n_sources,'f','');
		suppression('liens sources',$n_conc_source,'m','',false);
		suppression('liens docs',nom_table('concerne_doc'),'m','Type_Objet  in ("P","V","U")',false);
		suppression('liens objets',$n_concerne_objet,'m','Type_Objet  in ("P","V","U")',false);

		$req = 'update '.nom_table('general').' set date_modification = current_timestamp';
		$res = maj_sql($req);

		// RàZ des variables de session
		if (isset($_SESSION['decujus'])) 
			unset($_SESSION['decujus']);
		if (isset($_SESSION['mem_pers'])) 
			unset($_SESSION['mem_pers']);
		
	}
	else {
		echo LG_RESET_NOT_CONFIRMED.'<br>';
	}
	// Formulaire pour le bouton retour
	Bouton_Retour($lib_Retour);
}

if ($_SESSION['estGestionnaire']) {
	// Première entrée : affichage pour saisie
	if (($ok == '') && ($annuler == '')) {

		echo '<br />';

		$larg_titre = '50';
		echo '<form id="saisie" method="post" action="'.my_self().'">'."\n";

   		echo '<table width="70%" class="table_form">'."\n";

		ligne_vide_tab_form(1);

		colonne_titre_tab(LG_RESET_CONFIRM);
		echo '<input type="checkbox" name="init_base"/></td></tr>'."\n";

		ligne_vide_tab_form(1);
		bt_ok_an_sup($lib_Okay, $lib_Annuler, '', '');
		ligne_vide_tab_form(1);

		echo '</table>';
		echo '</form>';
    }
}
else aff_erreur($LG_function_noavailable_profile);

Insere_Bas($compl);

?>
</body>
</html>