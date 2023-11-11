<?php

//=====================================================================
// Recherche de cousinage entre 2 personnes
// La profondeur de recherche est paramétrable $max_gen_int/$max_gen_loc
// (c) JLS
// UTF-8
//=====================================================================

session_start();

include('fonctions.php');

// Récupération des variables de l'affichage précédent
$tab_variables = array('ok','annuler',
						'Ref_Pers1','Ref_Pers2','sauver','Sortie',
						'Horigine'
						);
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
  // Sécurisation des variables postées
$ok        = Secur_Variable_Post($ok,strlen($lib_Rechercher),'S');
$annuler   = Secur_Variable_Post($annuler,strlen($lib_Annuler),'S');
$Horigine  = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libellé du bouton pour être standard...
if ($ok == $lib_Rechercher) $ok = 'OK';

// Gestion standard des pages
$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Search_Related'];          // Titre pour META
$x = Lit_Env();
include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$Ref_Pers1 = Secur_Variable_Post($Ref_Pers1,1,'N');
$Ref_Pers2 = Secur_Variable_Post($Ref_Pers2,1,'N');
$Sortie    = Secur_Variable_Post($Sortie,1,'S');
$sauver    = Secur_Variable_Post($sauver,4,'S');

$bt_Sauver = false;
if ((isset($sauver) & $sauver == 'save')) $bt_Sauver = true;

// Retoune l'indice précédent dans le sens de la descente
function Ret_Prec($nb) {
  if (! pair($nb)) $nb++;
  $nb = intval($nb / 2) - 1;
  return $nb;
}

function ieme($nb) {
	if ($nb == 1) return 'er';
	else return '&egrave;me';
}

function Ligne_Fleche($classe) {
  echo '<tr><td '.$classe.'>'.Affiche_Icone('couple_donne',LG_CH_RELATED_THEN)."\n";
  return 1;
}

function Parents_Gen(&$Personne,&$Ind_Cour,$gen) {
  $presence = false;
  // Détermination des indices de la génération précédente
  $ind_dep = pow(2,$gen-2) - 1;
  $nPers   = $ind_dep + 1;
  $Rang_GP = 0;
  // Recherche des parents de la génération précédente
  for ($nb = 0; $nb < $nPers; $nb++) {
    $Pere_GP = 0; $Mere_GP = 0;
    $Pers = $Personne[$ind_dep+$nb];
    //echo 'Personne : '.$Pers.', ';
    // Recherche des parents si la personne est définie
    $P_Trouves = false;
    if ($Pers != 0) $P_Trouves = Get_Parents($Pers,$Pere_GP,$Mere_GP,$Rang_GP);
    $Personne[++$Ind_Cour] = $Pere_GP;
    $Personne[++$Ind_Cour] = $Mere_GP;
    if ($P_Trouves) $presence = true;
  }
  return $presence;
}

// Accède à une personne et l'affiche
function Affiche_Personne($Reference) {
	global $Sortie ,$LG_desc_tree, $LG_assc_tree, $LG_Data_noavailable_profile;
	$Sql = 'select Reference, Nom, Prenoms, Diff_Internet from '.nom_table('personnes').
			' where Reference = '.$Reference.' limit 1';
	$Res = lect_sql($Sql);
	if ($Personne = $Res->fetch(PDO::FETCH_NUM)) {
		if (($_SESSION['estPrivilegie']) or ($Personne[3])== 'O') {
			if ($Sortie == 'e') {
				$Ref_P = $Personne[0];
				echo '<a '.Ins_Ref_Pers($Ref_P).'>'.$Personne[1].' '.$Personne[2].'</a>&nbsp;';
				echo Affiche_Icone_Lien(Ins_Ref_Arbre($Ref_P),'arbre_asc',$LG_assc_tree) . '&nbsp;'.
				 Affiche_Icone_Lien(Ins_Ref_Arbre_Desc($Ref_P),'arbre_desc',$LG_desc_tree) . '&nbsp;';
			}
			else {
				echo $Personne[1].' '.$Personne[2];
			}
		}
		else {
			echo $LG_Data_noavailable_profile.'<br />';
		}
	}
}

$compl = Ajoute_Page_Info(600,200);
$Ind_Ref = 0;

if ($bt_OK) Ecrit_Entete_Page($titre,$contenu,$mots);

if ($Sortie != 't') Insere_Haut($titre,$compl,'Recherche_Cousinage','');
else                Insere_Haut_texte ('');

if ($Environnement == 'I') $max_gen = $max_gen_int;
else                       $max_gen = $max_gen_loc;

if (!$bt_OK) {
	$Ref_Pers1 = 0;
	$Ref_Pers2 = 0;
}

if ($Sortie != 't') {

	echo '<form id="saisie" method="post" action="'.my_self().'">'."\n";

	// Constitution de la liste des personnes
	$sql = 'select Reference, Nom, Prenoms, Ne_le, Decede_Le from '.nom_table('personnes').' where Reference <> 0';
	if (!$_SESSION['estPrivilegie']) $sql .= ' and Diff_Internet = \'O\'';
	$sql .= ' order by Nom, Prenoms';
	$res = lect_sql($sql);
	if ($res->rowCount() > 0) {

		$larg_titre = '30';

		echo '<table width="90%" class="table_form">'."\n";

		ligne_vide_tab_form(1);

		colonne_titre_tab(LG_CH_RELATED_BETWEEN);
		Liste_Pers($res,'Ref_Pers1',$Ref_Pers1);
		echo '</td></tr>'."\n";

		colonne_titre_tab(LG_CH_RELATED_AND);
		$res->closeCursor();
		$res = lect_sql($sql);
		Liste_Pers($res,'Ref_Pers2',$Ref_Pers2);
		echo '&nbsp;'.Affiche_Icone('tip','Information').'&nbsp;'.LG_CH_RELATED_TIP_BEG.$max_gen.'&nbsp;'.LG_CH_RELATED_TIP_END;
		echo '</td></tr>'."\n";

		colonne_titre_tab($LG_Ch_Output_Format);
		echo '<input type="radio" id="Sortie_e" name="Sortie" value="e" checked="checked"/><label for="Sortie_e">'.$LG_Ch_Output_Screen.'</label>&nbsp;';
		echo '<input type="radio" id="Sortie_t" name="Sortie" value="t"/><label for="Sortie_t">'.$LG_Ch_Output_Text.'</label>&nbsp;';
		echo '</td></tr>'."\n";

		// La sauvegarde dans un fichier texte n'est accessible qu'en local
		if ($Environnement == 'L') {
			colonne_titre_tab(LG_CH_RELATED_SAVE);
			echo '<input type="checkbox"';
			if ($bt_Sauver) echo ' checked="checked"';
			echo ' name="sauver" value="save"/></td></tr>'."\n";
		}

		ligne_vide_tab_form(1);
		bt_ok_an_sup($lib_Rechercher,$lib_Annuler,'','');

		echo '</table>'."\n";

	}
	$res->closeCursor();

	echo '</form>';

}

if ($bt_OK) {

	$erreur = 0;

	if ($Ref_Pers1 == $Ref_Pers2) {
		Affiche_Warning(LG_CH_RELATED_PERS_DIFF);
		$erreur = 1;
	}
	if (($Ref_Pers1 == 0) or ($Ref_Pers2 == 0)) {
		Affiche_Warning(LG_CH_RELATED_2PERS);
		$erreur = 1;
	}

	if (! $erreur) {
		// Initialisations
		$Ind_Cour1 = 0;
		$Ind_Cour2 = 0;
		$P1[$Ind_Cour1] = $Ref_Pers1;
		$P2[$Ind_Cour2] = $Ref_Pers2;

		$num_gen = 1;
		$Trouve = 0;
		$y1 = false;
		$y2 = false;

		// Phase de recherche sur $max_gen génération maximum
		do {

			++$num_gen;

			$x = Parents_Gen($P1,$Ind_Cour1,$num_gen);
			$x = Parents_Gen($P2,$Ind_Cour2,$num_gen);

			// Une référence de l'ensemble P1 est-elle dans l'ensemble P2 ?
			$nb = 0;
			do {
				$ref = $P1[$nb];
				if ($ref != 0) $y1 = array_search($ref,$P2);
				else           $y1 = false;
				if ($y1 === false) $nb++;
			} while (($y1 === false) and ($nb < count($P1)));
			if ($y1 !== false) $Trouve = 1;

			// Une référence de l'ensemble P2 est-elle dans l'ensemble P1 ?
			$nb = 0;
			do {
				$ref = $P2[$nb];
				if ($ref != 0) $y2 = array_search($ref,$P1);
				else           $y2 = false;
				if ($y2 === false) $nb++;
			} while (($y2 === false) and ($nb < count($P2)));
			if ($y2 !== false) $Trouve = 1;

		} while (($num_gen < $max_gen) and (! $Trouve));

		/*for ($nb = 0; $nb <= $Ind_Cour1; $nb++) {
		  echo 'P1 : '.$nb.' : '.$P1[$nb].'<br />';
		}
		for ($nb = 0; $nb <= $Ind_Cour2; $nb++) {
		  echo 'P2 : '.$nb.' : '.$P2[$nb].'<br />';
		}*/

		$gauche = 0;
		$droite = 0;
		if ($Trouve) {
			//echo 'y1 : '.$y1.' y2 : '.$y2.'<br />';
			if ($Sortie == 'e') {
				$classe = 'class="table_form"';
				$classe_lb = ' class="label"';
				$classe_vl = ' class="value"';
			}
			else {
				$classe = '';
				$classe_lb = '';
				$classe_vl = '';
			}
			echo '<br />';
			echo '<table width="80%" '.$classe.'>'."\n";
			echo '<tr><td align="center" colspan="2" '.$classe_lb.'>';
			$x = Affiche_Personne($P2[$y1]);
			echo '</td></tr>';
			echo '<tr>';
			echo '<td width="50%">';
			echo '<table width="100%">';
			$dep = Ret_Prec($y2);
			for ($nb = $dep; $nb > 0; $nb = Ret_Prec($nb)) {
				$x = Ligne_Fleche($classe_vl);
				$x = Affiche_Personne($P1[$nb]);
				echo '</td></tr>'."\n";
				$gauche++;
			}
			if ($P1[$y2] != $Ref_Pers1) {
				$x = Ligne_Fleche($classe_vl);
				$x = Affiche_Personne($P1[0]);
				$gauche++;
			}
			else echo '<tr><td class="value">'.my_html(LG_CH_RELATED_SAME);
			echo '</td></tr>'."\n";
			echo '</table>';
			echo '</td>';
			echo '<td width="50%">';
			// Libération de la mémoire
			$ref1 = $P1[0];
			unset($P1);

			echo '<table width="100%">';
			$dep = Ret_Prec($y1);

			for ($nb = $dep; $nb > 0; $nb = Ret_Prec($nb)) {
				$x = Ligne_Fleche($classe_vl);
				$x = Affiche_Personne($P2[$nb]);
				echo '</td></tr>'."\n";
				$droite++;
			}
			if ($P2[$y1] != $Ref_Pers2) {
				$x = Ligne_Fleche($classe_vl);
				$x = Affiche_Personne($P2[0]);
				$droite++;
			}
			else echo '&nbsp;'.my_html(LG_CH_RELATED_SAME);
			echo '</td></tr>'."\n";
			echo '</table>';
			echo '</td>';
			echo '</tr></table>';
			$ref2 = $P2[0];
			unset($P2);

			if ($bt_Sauver) {
				if ($fichier = fopen('rechCousinage.txt' , 'w'))
				{
					//	Ecriture de la personne de départ
					fwrite($fichier , $ref1 . "\n");
					//	Ecriture de la personne d'arrivée
					fwrite($fichier , $ref2);
					//	Fermeture du fichier
					fclose($fichier);
				}
			}

		}
		else {
			echo my_html(LG_CH_RELATED_NO_COMMON.' '.$max_gen.' '.LG_CH_RELATED_GENERATIONS);
		}
		if ($Sortie == 'e') {
			$h_deg = ' '.LG_CH_RELATED_DEGREE;
			if ($droite or $gauche) {
				echo '<br />'.LG_CH_RELATED_CANON_LAW.LG_SEMIC.$gauche.ieme($gauche);
				if ($droite != $gauche) echo ' '.LG_CH_RELATED_ON.' '.$droite.ieme($droite);
				echo $h_deg;
				$somme = $gauche + $droite;
				echo '<br />'.LG_CH_RELATED_CIVIL_LAW.LG_SEMIC.$somme.ieme($somme);
				echo $h_deg.'<br />';
			}
		}
	}
}

  if ($Sortie != 't') Insere_Bas($compl);

?>
</body>
</html>