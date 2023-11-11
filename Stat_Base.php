<?php
//=====================================================================
// Statistiques de la base
// et lien vers d'autres pages de statistiques
// (c) JLS
// UTF-8
//=====================================================================

session_start();

include('fonctions.php');
$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Statistics'];    // Titre pour META
$x = Lit_Env();
include('Gestion_Pages.php');

$compl = Ajoute_Page_Info(600,150);
Insere_Haut($titre,$compl,'Stat_Base','');

if ($_SESSION['estGestionnaire']) $largeur = '35%';
else                              $largeur = '25%';

$n_personnes = nom_table('personnes');

// Restriction aux personnes diffusibles pour les profils non privilégiés
$crit_diff = '';
if (!$_SESSION['estPrivilegie']) $crit_diff = " and Diff_Internet = 'O' ";

$sql = '';
$sql .= ' select "PER", count(*) from '.$n_personnes.' where Reference <> 0'.$crit_diff;
$sql .= ' union all';
$sql .= ' select "SOS", count(*) from '.$n_personnes.' where length(convert(Numero, unsigned integer)) = length(Numero)'.$crit_diff;
$sql .= ' union all';
$sql .= ' select "NFA", count(*) from '.nom_table('noms_famille');
$sql .= ' union all';
$sql .= ' select "VIL", count(*) from '.nom_table('villes').' where Identifiant_zone <>0';
$sql .= ' union all';
$sql .= ' select "UNI", count(*) from '.nom_table('unions');
$sql .= ' union all';
$sql .= ' select "FIL", count(*) from '.nom_table('filiations');
$sql .= ' union all';
$sql .= ' select "EVE", count(*) from '.nom_table('evenements');

echo '<br />';
echo '<table border="0" class="classic" width="'.$largeur.'" align="center">'."\n";
echo '<tr><th width="30%">Type</th>';
echo '<th>Nombre</th></tr>'."\n";

$res = lect_sql($sql);
while ($row = $res->fetch(PDO::FETCH_NUM)) {
	//echo $row[0].' : '.$row[1].'<br />';
	switch ($row[0]) {
		case 'PER' : $nb_pers = $row[1];
				entete_ligne(LG_STAT_ALL_PERSONS,$nb_pers);
				if (($_SESSION['estGestionnaire']) and ($nb_pers > 0)) get_pourcentage($nb_pers);
				echo "</td></tr>\n";
				break;
		case 'SOS' : entete_ligne(LG_STAT_ALL_SOSA, $row[1]); echo "</td></tr>\n"; break;
		case 'NFA' : entete_ligne(LG_STAT_ALL_NAMES, $row[1]); echo "</td></tr>\n"; break;
		case 'VIL' : entete_ligne(LG_STAT_ALL_TOWNS, $row[1]); echo "</td></tr>\n"; break;
		case 'UNI' : entete_ligne(LG_STAT_ALL_UNIONS, $row[1]); echo "</td></tr>\n"; break;
		case 'FIL' : entete_ligne(LG_STAT_ALL_CHILDREN, $row[1]); echo "</td></tr>\n"; break;
		case 'EVE' : entete_ligne(LG_STAT_ALL_EVENTS, $row[1]); echo "</td></tr>\n"; break;
	}
}
echo '</table>'."\n";

$res->closeCursor();

echo '<hr/>'."\n";
$base_ref = Get_Adr_Base_Ref();

echo '<div id="liste">';

echo '<ul class="puces">'.my_html(LG_STAT_ALL_BY_AGE);
ligne_menu('Pyramide_Ages.php',$LG_Menu_Title['Death_Age']);
ligne_menu('Pyramide_Ages_Histo.php',$LG_Menu_Title['Histo_Death']);
ligne_menu('Pyramide_Ages_Mar_Histo.php?Type=U',$LG_Menu_Title['Histo_First_Wedding']);
ligne_menu('Pyramide_Ages_Mar_Histo.php?Type=F',$LG_Menu_Title['Histo_First_Child']);
echo '</ul>';

echo '<ul class="puces">'.my_html(LG_STAT_ALL_BY_PLACE);
ligne_menu('Stat_Base_Villes.php',$LG_Menu_Title['BDM_Per_Town']);
ligne_menu('Stat_Base_Depart.php',$LG_Menu_Title['BDM_Per_Depart']);
echo '</ul>';

echo '<ul class="puces">'.my_html(LG_STAT_ALL_OCC);
ligne_menu('Liste_Nom_Pop.php',$LG_Menu_Title['Most_Used_Names']);
ligne_menu('Liste_Prof_Pop.php',$LG_Menu_Title['Most_Used_jobs'] );
if ((!$SiteGratuit) or ($Premium)) 
	ligne_menu('Histo_Prenoms.php',LG_STAT_SURNAMES);
echo '</ul>';

echo '<ul class="puces">'.my_html('Divers');
ligne_menu('Enfants_Femme_Histo.php',$LG_Menu_Title['Children_Per_Mother']);
ligne_menu('Naissances_Mariages_Deces_Mois.php',$LG_Menu_Title['BDM_Per_Month']);
if ($est_privilegie)
	ligne_menu('Stat_Base_Generations.php',$LG_Menu_Title['Gen_Is_Complete']);
ligne_menu('Liste_Pers_Mod.php',$LG_Menu_Title['Last_Mod_Pers']);
echo '</ul>';

echo '</div>';
Insere_Bas($compl);

function entete_ligne($lib,$nombre) {
	echo '<tr><td>'.my_html($lib).'</td><td>'.$nombre;
}

// Calcul du pourcentage de personnes visibles sur le net
function get_pourcentage($nb_pers) {
	global $n_personnes, $SiteGratuit, $Premium, $chemin_images_icones, $Icones;
	$sql = 'select count(*) from '.$n_personnes.' where Reference <> 0 and Diff_Internet = "O"';
	if ($res = lect_sql($sql)) {
		if ($enreg = $res->fetch(PDO::FETCH_NUM)) {
			$nb_pers_visible = $enreg[0];
			$pourcent_N = $nb_pers_visible / $nb_pers * 100;
			echo ', '.LG_STAT_ALL_VISIBLE_WITH.' '.$nb_pers_visible.' '.LG_STAT_ALL_VISIBLE.pluriel($nb_pers_visible).' ( '.sprintf("%01.2f %%",$pourcent_N).' )';
			if (($SiteGratuit) and (!$Premium)) {
			// if (0==0) {
				if ($pourcent_N < 50) 
					echo '&nbsp;<img src="'.$chemin_images_icones.$Icones['drapeau_orange']
							. '" alt="'.LG_STAT_ALL_FLAG_ORANGE_ALT.'" title="'.LG_STAT_ALL_FLAG_ORANGE_TITLE.'" border="0"/>';
				else  
					echo '&nbsp;<img src="'.$chemin_images_icones.$Icones['drapeau_vert']
							. '" alt="'.LG_STAT_ALL_FLAG_GREEN_ALT.'" title="'.LG_STAT_ALL_FLAG_GREEN_TITLE.'" border="0"/>';
			}
		}
	}
}

function ligne_menu($url,$libelle) {
	global $base_ref;
	echo '<li><a href="'.$base_ref.$url.'">'.my_html($libelle).'</a></li>'."\n";
}
?>
</body>
</html>