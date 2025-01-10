<?php
//=====================================================================
// Export pour recherche des dates de décès sur https://deces.matchid.io/link
// (c) JLS
//=====================================================================

session_start();
include('fonctions.php');
$acces = 'L';

$lib_ok = $lib_Exporter;
$lib_an = $lib_Retour;

$tab_variables = array('ok', 'annuler', 'export_dead','min_year','Sortie');

foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$ok = Secur_Variable_Post($ok,strlen($lib_ok),'S');
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');
$export_dead = Secur_Variable_Post($export_dead,2,'S');
$min_year = Secur_Variable_Post($min_year,1,'N');
if ($min_year == 0) 
	$min_year = $death_def_min_year;

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

$titre = $LG_Menu_Title['Export_Death'];     // Titre pour META
$x = Lit_Env();
$niv_requis = 'G';		// Niveau minimum : Gestionnaire

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;
if ($ok == $lib_ok) $ok = 'OK';

// Appel de la gestion standard des pages
include('Gestion_Pages.php');

// Page interdite sur les gratuits non Premium
if (($SiteGratuit) and (!$Premium)) Retour_Ar();

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$compl = Ajoute_Page_Info(600,300);
if ($bt_OK) Ecrit_Entete_Page($titre,$contenu,$mots);
Insere_Haut($titre,$compl,'Export_Pour_Deces','');

if ($bt_OK) {

	echo '<br>'.LG_EXPORT_DEATH_DEAD.' : ';
	if ($export_dead == 'ID')
		echo $LG_Yes;
	else
		echo $LG_No;
    echo '<br>'.LG_EXPORT_DEATH_MIN_YEAR.' : '.$min_year.'<br>';

	$req = ' SELECT p.Nom, p.Prenoms, p.Ne_le, p.Decede_Le, v.Nom_Ville, p.Sexe, p.Reference'
			.' FROM '.nom_table('personnes').' p, '.nom_table('villes').' v'
			.' where Ne_le is not null'
			.'   and Ville_Naissance <> 0'
			."   and substr(Ne_le, 10, 1) = 'L'"
			."   and substr(Ne_le, 1, 4) >= '".$min_year."'"
			.'   and p.Ville_Naissance = v.Identifiant_zone';
	if ($export_dead == 'ID')
		$req .= " and (Decede_Le = '' or substr(Decede_Le, 10, 1) <> 'L')";
	  
	$res = lect_sql($req.' order by 1, 2');
	$nb_enr = $res->RowCount();

	echo '<br>'.$nb_enr.' '.LG_EXPORT_DEATH_EXTRACT.'<br>';

	if ($nb_enr > 0) {
		if ($Sortie == 'c') {
			$champs = get_fields($req,true);
			$nb_champs = count($champs);

			// Ouverture du fichier et écriture de l'entête
			$nom_fic = $chemin_exports.'export_deces';
			$nom_fic .= '.csv';
			$fp = ouvre_fic($nom_fic,'w+');
			if ($fp) {
				ecrire($fp,$LG_Name.';'.$LG_birth.';'.LG_EXPORT_DEATH_BIRTH_PLACE.';'.LG_FIRST_NAME.';');
				while ($row = $res->fetch(PDO::FETCH_NUM)) {
					$row[1] = str_replace(' ', ",", $row[1]);
					$ligne = '';
					// p.Nom, p.Prenoms, p.Ne_le, p.Decede_Le, v.Nom_Ville'
					// nom;date naissance;commune;prenoms
					// var_dump($row);echo '<br/>';
					$ligne .= $row[0].';';
					$ligne .= trt_date($row[2]).';';
					$ligne .= $row[4].';';
					$ligne .= $row[1].';';
					ecrire($fp,$ligne);
				}
				if ($nb_enr > 0) {
					fclose($fp);
					echo '<br>'.my_html($LG_csv_available_in).' <a href="'.$nom_fic.'">'.$nom_fic.'</a> '
						.LG_EXPORT_DEATH_GOTO1. ' <a href=" '. $url_matchid_link. '">'.$url_matchid_link.'</a> '.LG_EXPORT_DEATH_GOTO2
						;
				}
			}
			// On n'a pas pu écrire le fichier...
			else {
				echo '<br>';
				$Message = my_html(LG_EXPORT_DEATH_ERROR1.' '.$nom_fic.' '.LG_EXPORT_DEATH_ERROR2);
				Affiche_Stop($Message);		
			}
		}
		// Sortie à lécran demandée
		else {
			
			echo '<br>'.Affiche_Icone('tip','Information').'&nbsp;'.LG_EXPORT_DEATH_INTERNET.'<br><br>';
			$echo_modif = Affiche_Icone('fiche_edition',$LG_modify).'</a>';

			while ($row = $res->fetch(PDO::FETCH_NUM)) {		
				// $row[1] = str_replace(' ', ",", $row[1]);
				echo $row[0].' '
					.UnPrenom($row[1]).' '
					.lib_sexe_born($row[5]).' '.etend_date($row[2]).' '.LG_AT.' '.$row[4];
				echo '&nbsp;<a '.Ins_Edt_Pers($row[6]).'>'.$echo_modif;
				echo LG_SEMIC.'<a href="Recherche_MatchId_Unitaire.php'
					.'?ref='.$row[6].'"'
					.' target="_blank">'
					.$LG_Menu_Title['MatchId_Sch'].'</a>';
				echo '<br>'."\n";
			}
		}
	}

	Bouton_Retour($lib_Retour);
	Insere_Bas($compl);
}
else {

	echo '<form id="saisie" method="post" action="'.my_self().'">'."\n";
	$larg_titre = '30';
	echo '<table width="70%" class="table_form">'."\n";
    ligne_vide_tab_form(1);

    colonne_titre_tab(LG_EXPORT_DEATH_DEAD);
	echo '<input type="checkbox" id="export_dead" name="export_dead" value="ID"/>';
	echo '</td></tr>'."\n";

    colonne_titre_tab(LG_EXPORT_DEATH_MIN_YEAR);
	echo '<input type="text" name="min_year" value="'.$death_def_min_year.'" size="4"/>';
	echo '</td></tr>'."\n";

    colonne_titre_tab($LG_Ch_Output_Format);
	echo '<input type="radio" id="Sortie_e" name="Sortie" value="e" checked="checked"/><label for="Sortie_e">'.$LG_Ch_Output_Screen.'</label>&nbsp;';
	echo '<input id="Sortie_c" type="radio" name="Sortie" value="c"/><label for="Sortie_c">'.$LG_Ch_Output_CSV.'</label>';
	echo '</td></tr>'."\n";
	ligne_vide_tab_form(1);

	bt_ok_an_sup($lib_ok, $lib_Annuler, '', '');

	echo '</table></form>';
	
	Insere_Bas($compl);
}


function trt_date($ladate) {
	$res = '';
	if (strlen($ladate) == 10)
		$res = substr($ladate,6,2). '/' . substr($ladate,4,2). '/' . substr($ladate,0,4);
	return $res;
}
?>
</body>
</html>