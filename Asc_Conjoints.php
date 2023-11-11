<?php
//=====================================================================
// Ascendants des 2 conjoints d'une union
// (c) JL Servin
// Paramètres :
// - $Reference : référence de l'union
// UTF-8
//=====================================================================

session_start();

include('fonctions.php');

// Récupération des variables de l'affichage précédent
$tab_variables = array('annuler');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

$acces = 'L';				// Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Partners_Ancestors'];	// Titre pour META
$x = Lit_Env();				// Lecture de l'indicateur d'environnement

include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

// Recup de la variable passée dans l'URL : référence de l'union
$Reference = Recup_Variable('Reference','N');

// $Reference = 1;

$compl = Ajoute_Page_Info(600,300);
Insere_Haut($titre,$compl,'Asc_Conjoints','');

$Ref_Pers_A = 0;
$Ref_Pers_B = 0;

// $aff_req = true;

// Récupération de l'union
$sql = 'select Conjoint_1, Conjoint_2 from '.nom_table('unions').' where Reference = '.$Reference.' limit 1';
if ($res = lect_sql($sql)) {
	if ($enr_union = $res->fetch(PDO::FETCH_NUM)) {
		$Ref_Pers_A = $enr_union[0];
		$Ref_Pers_B = $enr_union[1];
	}
}

$larg_image = 1000;
$haut_image = 600;

	echo '<table border="0">';
	echo '<tr>';
	echo '<td><canvas id="canvas6" width="'.$larg_image.'" height="'.$haut_image.'" /></td>';
	echo '</tr>';
	echo '</table>';

	$_SESSION['estPrivilegie'] = true;

	$Info_Pers_A = '';
	$Info_Pere_A = '';
	$Info_Mere_A = '';
	$Info_Pere_Pere_A = '';
	$Info_Mere_Pere_A = '';
	$Info_Pere_Mere_A = '';
	$Info_Mere_Mere_A = '';

	$Info_Pers_B = '';
	$Info_Pere_B = '';
	$Info_Mere_B = '';
	$Info_Pere_Pere_B = '';
	$Info_Mere_Pere_B = '';
	$Info_Pere_Mere_B = '';
	$Info_Mere_Mere_B = '';

	// $Ref_Pers = 3;
	$Info_Pers_A = getDetail($Ref_Pers_A);	
	$x = Get_Parents($Ref_Pers_A,$Pere,$Mere,$Rang);
	if ($Pere != 0) {
		$Info_Pere_A = getDetail($Pere);
		$x = Get_Parents($Pere,$Pere,$Mere,$Rang);
		if ($Pere != 0) {
			$Info_Pere_Pere_A = getDetail($Pere);
		}
		if ($Mere != 0) {
			$Info_Mere_Pere_A = getDetail($Mere);
		}
	}
	// echo $Info_Pere_Pere_A;
	if ($Mere != 0) {
		$Info_Mere_A = getDetail($Mere);
		$x = Get_Parents($Mere,$Pere,$Mere,$Rang);
		if ($Pere != 0) {
			$Info_Pere_Mere_A = getDetail($Pere);
		}
		if ($Mere != 0) {
			$Info_Mere_Mere_A = getDetail($Mere);
		}
	}
	
	$Info_Pers_B = getDetail($Ref_Pers_B);	
	$x = Get_Parents($Ref_Pers_B,$Pere,$Mere,$Rang);
	if ($Pere != 0) {
		$Info_Pere_B = getDetail($Pere);
		$x = Get_Parents($Pere,$Pere,$Mere,$Rang);
		if ($Pere != 0) {
			$Info_Pere_Pere_B = getDetail($Pere);
		}
		if ($Mere != 0) {
			$Info_Mere_Pere_B = getDetail($Mere);
		}
	}
	if ($Mere != 0) {
		$Info_Mere_B = getDetail($Mere);
		$x = Get_Parents($Mere,$Pere,$Mere,$Rang);
		if ($Pere != 0) {
			$Info_Pere_Mere_B = getDetail($Pere);
		}
		if ($Mere != 0) {
			$Info_Mere_Mere_B = getDetail($Mere);
		}
	}
	// echo $pers.'<br />';

	echo '<script type="text/javascript" src="jscripts/arbre.js"></script>'."\n";
	echo '<script type="text/javascript">'."\n";
	echo '	var HautCase = 40;'."\n";
	echo '	var LargCase = 200;'."\n";
	echo "  var Info_Pers_A = '".$Info_Pers_A."';\n";
	echo "  var Info_Pere_A = '".$Info_Pere_A."';\n";
	echo "  var Info_Mere_A = '".$Info_Mere_A."';\n";
	echo "  var Info_Pere_Pere_A = '".$Info_Pere_Pere_A."';\n";
	echo "  var Info_Mere_Pere_A = '".$Info_Mere_Pere_A."';\n";
	echo "  var Info_Pere_Mere_A = '".$Info_Pere_Mere_A."';\n";
	echo "  var Info_Mere_Mere_A = '".$Info_Mere_Mere_A."';\n";
	echo "  var Info_Pers_B = '".$Info_Pers_B."';\n";
	echo "  var Info_Pere_B = '".$Info_Pere_B."';\n";
	echo "  var Info_Mere_B = '".$Info_Mere_B."';\n";
	echo "  var Info_Pere_Pere_B = '".$Info_Pere_Pere_B."';\n";
	echo "  var Info_Mere_Pere_B = '".$Info_Mere_Pere_B."';\n";
	echo "  var Info_Pere_Mere_B = '".$Info_Pere_Mere_B."';\n";
	echo "  var Info_Mere_Mere_B = '".$Info_Mere_Mere_B."';\n";

	// Grands-parents du conjoint 1
	echo "  var abcisse = 10;\n";
	echo "  var ordonnee = 10;\n";
	echo "  var abs1 = abcisse;\n";
	echo "  var x1a = abcisse;\n";
	echo "  var x2a = x1a+LargCase+Ecart_Case;\n";
	echo "  var memo_gauche_niv3 = x1a;\n";
	echo "  couple(x1a, x2a, ordonnee, Info_Pere_Pere_A, Info_Mere_Pere_A);\n";
	echo "  var x1b = x1a + (LargCase*2) + Ecart_Case + 20;\n";
	echo "  var x2b = x1b + LargCase + Ecart_Case;\n";
	echo "  couple(x1b, x2b, ordonnee, Info_Pere_Mere_B, Info_Mere_Mere_B);\n";
	
	// Parents du conjoint 1
	echo "  ordonnee = ordonnee + (HautCase * 2);\n";
	echo "  var x1c = (x2a-x1a+Ecart_Case)/2;\n";
	echo "  var x2c = (x2b-x1b+Ecart_Case)/2 + x1b;\n";
	echo "  var memo_gauche_niv2 = x1c;\n";
	echo "  couple(x1c, x2c, ordonnee, Info_Pere_A, Info_Mere_A);\n";

	// Conjoint 1
	echo "  ordonnee = ordonnee + (HautCase * 2);\n";
	echo "  var gauche = (x1c+x2c)/2;\n";
	echo "  var memo_gauche_niv1 = gauche;\n";
	echo "  aff_case(gauche, ordonnee, LargCase, HautCase, radius, Info_Pers_A, 'black', 'CR');\n";
	
	// Conjoint 2
	echo "  ordonnee = ordonnee + (HautCase * 2);\n";
	echo "  aff_case(memo_gauche_niv1, ordonnee, LargCase, HautCase, radius, Info_Pers_B, 'black', 'CR');\n";
	
	// Parents du conjoint 2
	echo "  ordonnee = ordonnee + (HautCase * 2);\n";
	echo "  var x1c = (x2a-x1a+Ecart_Case)/2;\n";
	echo "  var x2c = (x2b-x1b+Ecart_Case)/2 + x1b;\n";
	echo "  couple(x1c, x2c, ordonnee, Info_Pere_B, Info_Mere_B);\n";

	// Grands-parents du conjoint 2
	echo "  ordonnee = ordonnee + (HautCase * 2);\n";
	echo "  var x1a = memo_gauche_niv3;\n";
	echo "  var x2a = x1a+LargCase+Ecart_Case;\n";
	echo "  couple(x1a, x2a, ordonnee, Info_Pere_Pere_B, Info_Mere_Pere_B);\n";
	echo "  var x1b = x1a + (LargCase*2) + Ecart_Case + 20;\n";
	echo "  var x2b = x1b + LargCase + Ecart_Case;\n";
	echo "  couple(x1b, x2b, ordonnee, Info_Pere_Mere_B, Info_Mere_Mere_B);\n";

	// echo '	deux_couples();'."\n";
	echo '</script>'."\n";

// Formulaire pour le bouton retour
Bouton_Retour($lib_Retour,'?'.$_SERVER['QUERY_STRING']);

function getDetail($LaRef) {
	// Accès aux données de la personne
	$sql='select Nom, Prenoms, Ne_Le, Decede_Le, Diff_Internet from '.nom_table('personnes').' where reference = '.$LaRef.' limit 1';
	if ($res = lect_sql($sql)) {
		if ($infos = $res->fetch(PDO::FETCH_NUM)) {
			// Affichage des données si autorisé
			if (($_SESSION['estPrivilegie']) or ($infos[4] == 'O')) {
				$Nom    = trim($infos[0]);
				$Prenom = trim($infos[1]);
				$D_Nais = trim($infos[2]);
				$D_Dec  = trim($infos[3]);
				// On ne retient que le premier prénom
				if ($Prenom != '')
					$Prenom = UnPrenom($Prenom);
				$N_P = $Nom.' '.$Prenom;
				$max_car = 20;
				if (strlen($N_P) > $max_car)
					$N_P = substr($N_P,0,$max_car);
				if($D_Nais != '')
					$N_P .= ' °'. affiche_date($D_Nais);
				if($D_Dec != '')
					$N_P .= " +" . affiche_date($D_Dec);
				return $N_P;
			}
			return '';
		}
	}
}

?>