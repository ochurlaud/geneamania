<?php

//=====================================================================
// Lors d'un import Gedcom, les commentaires vont être précédés de "Note sur la personne"
// Cette page va permettre de les supprimer
// On peut également remplacer cr+lf, cr, lf par <br />
// (c) JLS
//=====================================================================

session_start();

require('fonctions.php');

$n_commentaires = nom_table ('commentaires');
$lib_pers = 'Note sur la personne :<br />';

// Récupération des variables de l'affichage précédent
$tab_variables = array('ok', 'annuler', 'sup_lib', 'rectif_crlf', 'simulation'
                       );
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$ok        = Secur_Variable_Post($ok,strlen($lib_Okay),'S');
$annuler   = Secur_Variable_Post($annuler,strlen($lib_Annuler),'S');
$sup_lib 	= Secur_Variable_Post($sup_lib,2,'S');
$rectif_crlf 	= Secur_Variable_Post($rectif_crlf,2,'S');
$simulation 	= Secur_Variable_Post($simulation,2,'S');

$acces = 'M';                          // Type d'accès de la page : (M)ise à jour
$titre = $LG_Menu_Title['Rectif_Notes'];   // Titre pour META
$x = Lit_Env();
$niv_requis = 'G';						// Page accessible au gestionnaire
include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$compl = Ajoute_Page_Info(600,200);
Insere_Haut($titre,$compl,'Rectif_Notes','');

if ($bt_OK) {
	
	Ecrit_Entete_Page($titre,'','');
	
	// mode simulation
	if ($simulation == 'on') {
		
		if ($sup_lib == 'on') {
			$nb_enr = 0;
			$sql = 'select count(*) from '.$n_commentaires.' where Note like "'.$lib_pers.'%" and Type_Objet = "P"';
			if ($res = lect_sql($sql)) {
				if ($enreg = $res->fetch(PDO::FETCH_NUM)) {
					$nb_enr = $enreg[0];
				}
			}
			echo '<br>'.LG_RN_NOTE.'&nbsp;:&nbsp;'.$nb_enr.LG_RN_CMT_TO_UPD.'<br>';
		}
		
		if ($rectif_crlf == 'on') {
			// $deb_lec = 'select count(*) from '.$n_commentaires.' set Note = ';
			// $sql = 'select count(*) from '.$n_commentaires.' where Note like "'.$lib_pers.'%" and Type_Objet = "P"';
			// if ($res = lect_sql($sql)) {
				// if ($enreg = $res->fetch(PDO::FETCH_NUM)) {
					// $nb_enr += $enreg[0];
				// }
			// }
			
			// $sql = $deb_mod."replace(Note, char(13)+char(10)', '<br />')";
			// $sql = $deb_mod."replace(Note, char(10)', '<br />')";
			// $sql = $deb_mod."replace(Note, char(13)', '<br />'";
			// $res = maj_sql($sql);
			// $enr_mod_cr += $enr_mod;

			$nb_cr_lf = compte('char(13,10)');
			$nb_lf = compte('char(10)') - $nb_cr_lf; // partiellement compris dans cr+lf
			$nb_cr = compte('char(13)') - $nb_cr_lf;
			$nb_enr = $nb_cr_lf + $nb_lf + $nb_cr;
			
			echo '<br>'.LG_RN_CRLF.'&nbsp;:&nbsp;'.$nb_enr.LG_RN_CMT_TO_UPD.'<br>';
		}

	} else {
		$deb_mod = 'update '.$n_commentaires.' set Note = ';

		// Demande de suppression des libellés "Note sur la personne" ?
		// $Dem_Sup_Lib = ($sup_lib == 'on') ? true : false;
		if ($sup_lib == 'on') {

			// Suppression libellé "Note sur la personne"
			$long = strlen($lib_pers);
			$long++;
			$sql = $deb_mod.'substr(Note, '.$long.', length(Note)-'.$long.')'
				.' where Note like "'.$lib_pers.'%" and Type_Objet = "P"';
			$res = maj_sql($sql);
			echo '<br>'.$enr_mod.LG_RN_UPD_NOTE.'<br>';
		}
		
		// Demande de remplacement des cr+lf, cr, lf par <br /> (sauts de lignes "invisibles" ?
		// $Dem_Sup_Lib = ($rectif_crlf == 'on') ? true : false;
		if ($rectif_crlf == 'on') {

			// Remplacement des cr+lf & co
			// update commentaires set Note = replace(Note, char(13)+char(10), '<br />');
			// update commentaires set Note = replace(Note, char(10), '<br />');
			// update commentaires set Note = replace(Note, char(13), '<br />');
			$enr_mod_cr = 0;
			$sql = $deb_mod."replace(Note, char(13)+char(10), '<br />')";
			$res = maj_sql($sql);
			$enr_mod_cr += $enr_mod;
			$sql = $deb_mod."replace(Note, char(10), '<br />')";
			$res = maj_sql($sql);
			$enr_mod_cr += $enr_mod;
			$sql = $deb_mod."replace(Note, char(13), '<br />')";
			$res = maj_sql($sql);
			$enr_mod_cr += $enr_mod;
			echo '<br>'.$enr_mod.LG_RN_UPD_CRLF.'<br>';
		}
	}
}

$larg = '50';
echo '<form id="saisie" method="post" action="'.my_self().'">'."\n";

echo '<table width="70%" class="table_form">'."\n";

ligne_vide_tab_form(1);

trt_col_chk(LG_RN_NOTE,'sup_lib');
echo '<input type="checkbox" id="sup_lib" name="sup_lib"/></td></tr>'."\n";

trt_col_chk(LG_RN_CRLF,'rectif_crlf');
echo '<input type="checkbox" id="rectif_crlf" name="rectif_crlf"/></td></tr>'."\n";

// La simulation sera cochée par défaut
if ($ok != $lib_OK) $simulation = true;
ligne_vide_tab_form(1);
trt_col_chk(LG_RN_SIMULATE,'simulation');
echo '<input type="checkbox" ';
if ($simulation) echo ' checked="checked"';
echo ' id="simulation" name="simulation"/></td></tr>'."\n";

ligne_vide_tab_form(1);
bt_ok_an_sup($lib_Okay, $lib_Annuler, '', '');
ligne_vide_tab_form(1);

echo '</table>';
echo '</form>';
				
Insere_Bas($compl);

function trt_col_chk($lib, $chk) {
	global $larg;
	echo '<tr><td class="label" width="'.$larg.'%"><label for="'.$chk.'">&nbsp;'.ucfirst($lib).'&nbsp;</label></td>'
		.'<td class="value">';
}

function compte($crit) {
	global $n_commentaires;
	$compteur = 0;
	// $sql = 'select count(*) from '.$n_commentaires.' where Note like "%'.$crit.'%" and Type_Objet = "P"';
	$sql = "select count(*) from $n_commentaires where Note like CONCAT('%', $crit, '%') and Type_Objet = 'P'";
	if ($res = lect_sql($sql)) {
		if ($enreg = $res->fetch(PDO::FETCH_NUM)) {
			$compteur = $enreg[0];
		}
	}
	return $compteur;
}


//http://geneamania/Sup_Note_Pers_Ged.php

?>
</body>
</html>