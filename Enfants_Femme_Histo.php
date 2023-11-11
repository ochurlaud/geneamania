<?php

//=====================================================================
// Affichage de l'historique du nombre d'enfants par femme
// en fonction de l'année de naissance
// (c) JLS
// UTF-8
//=====================================================================

session_start();

$tab_variables = array('annuler','Horigine');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}

include('fonctions.php');              // Appel des fonctions générales

// Sécurisation des variables postées
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

// Gestion standard des pages
$acces = 'L';										// Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Children_Per_Mother'];		// Titre pour META
$x = Lit_Env();
include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$compl = Ajoute_Page_Info(600,220);

Insere_Haut($titre,$compl,'Enfants_Femme_Histo','');

$bloc_annees = 20;
$larg_maxi = 200;

$deb_barre = '<img src="'.$barre_femme.'" height="15" width="';

$max_nb_enfants = 0;
$ref_femme_max_nb_enfants = 0;

// Compatge des enfants par femme dont on connait la date de naissance
$sql = 'select count(*), f.Mere, p.Ne_le'
		.' from '.nom_table('filiations').' f, '.nom_table('personnes').' p'
		.' where Mere <> 0'
		.' and f.Mere = p.Reference'
		.' and Ne_le LIKE "_________L"';
if (!$est_privilegie) {
	$sql = $sql ." and Diff_Internet = 'O' ";
}
$sql = $sql
		.' group by Mere, p.Ne_le'
		.' order by Ne_Le';
// Stockage des cumuls d'âges des hommes et des femmes dans des tableaux
$presence = false;
if ($res = lect_sql($sql)) {
	while ($row = $res->fetch(PDO::FETCH_NUM)) {
		$presence = true;
		$nb = $row[0];
		$annee = intval(substr($row[2],0,4));
		$ref_annee = intval($annee / $bloc_annees) * $bloc_annees;
		if ($debug) {
			var_dump($row);
			var_dump($ref_annee);
		}
		if (!isset($nb_femmes[$ref_annee])) {
			$nb_femmes[$ref_annee] = 0;
			$nb_enfants[$ref_annee] = 0;
		}
		$nb_femmes[$ref_annee] ++;
		$nb_enfants[$ref_annee] += $nb;
		if ($nb > $max_nb_enfants) {
			$max_nb_enfants = $nb;
			$ref_femme_max_nb_enfants = $row[1];
		}
	}
}

if ($debug) {
	var_dump($nb_femmes);
	var_dump($nb_enfants);
}

if ($presence) {
	echo '<br />';
	echo '<table width="50%" border="0" class="classic" align="center" >'."\n";
	echo '<tr>';
	echo '<th>'.LG_CH_PER_MOTHER_BORN.'</th>';
	echo '<th colspan="2">'.LG_CH_PER_MOTHER_AVG.'</th>';
	echo '</tr>'."\n";

	// Calcul des moyennes par période
	foreach ($nb_femmes as $key => $value) {
		$moyennes[$key] = $nb_enfants[$key]/$nb_femmes[$key];
		if ($debug) {
			echo 'key : '. $key.', value : '.$value.'<br />';
			echo 'nb de femmes : '.$nb_femmes[$key].', nb enfants : '.$nb_enfants[$key].'<br />';
			echo 'moyenne : '.$nb_enfants[$key]/$nb_femmes[$key].'<br />';
		}
	}
	// Moyenne maxi ?
	if (isset($moyennes)) {
		$maxi = max($moyennes);
	}
	else {
		$maxi = 1;
	}
	if ($debug) {
		echo 'Moyenne maxi : '.$maxi.'<br />';
	}

	foreach ($moyennes as $key => $value) {
		$borne_sup = $key+$bloc_annees-1;
		echo '<tr valign="middle">'."\n";
		echo '<td align="center">'.$key.' - '.$borne_sup.'</td>';
		$larg = intval($value/$maxi*$larg_maxi);
		echo '<td>';
		echo $deb_barre.$larg.'" alt="Moyenne" title=""/>';
		//if ($value == $maxi) echo ' *';
		echo '</td>';
		$moy_fr = number_format($value, 2, ',', ' ');
		echo '<td align="center">'.$moy_fr.'</td>';
		echo '</tr>';
	}
	echo '</table>';

	$Nom = '';
	$Prenoms = '';
	if (Get_Nom_Prenoms($ref_femme_max_nb_enfants,$Nom,$Prenoms)) {
		echo '<br />'.LG_CH_PER_MOTHER_MAX_WOMAN.' : <a '.Ins_Ref_Pers($ref_femme_max_nb_enfants).'>'.$Prenoms.'&nbsp;'.$Nom.'</a>';
		echo ' ; '.LG_CH_PER_MOTHER_SHE_HAD.' '.$max_nb_enfants.' '.LG_CHILD.pluriel($max_nb_enfants).'.';
	}
}

// Formulaire pour le bouton retour
Bouton_Retour($lib_Retour);

Insere_Bas($compl);
?>
</body>
</html>