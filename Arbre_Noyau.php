<?php
//=====================================================================
// Graphe du noyau d'un couple
// Parents des conjoints
// Conjoints
// Enfants du couple
// (c) JL Servin
//=====================================================================

session_start();
include('fonctions.php');
$acces = 'L';						// Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Nuclear_Family'];			// Titre pour META
$x = Lit_Env();
$index_follow = 'IN';				// NOFOLLOW demandé pour les moteurs
include('Gestion_Pages.php');

// Recup de la variable passée dans l'URL : référence de l'union
$Reference = Recup_Variable('Reference','N');

if ($Reference == 0) {
	aff_erreur('KO');
}
else {
	// Récupération de l'union
	$sql = 'select Conjoint_1, Conjoint_2 from '.nom_table('unions').' where Reference = '.$Reference.' limit 1';
	if ($res = lect_sql($sql)) {
		if ($enr_union = $res->fetch(PDO::FETCH_NUM)) {
			$ref_1 = $enr_union[0];
			$ref_2 = $enr_union[1];
		}
	}

	include ('Commun_Arbre.php');

	// Coordonnée gauche par génération
	$Coord_X = Array(40,260,480,700);
	// Coordonnées verticales
	$Coord_Y = Array(255,
					115,395,
					45,185,325,465,
				10,80,150,220,290,360,430,500);

	$compl = Ajoute_Page_Info(600,150);
	Insere_Haut($titre,$compl,'Arbre_Noyau',$Reference);

	// Top pour savoir s'il existe des images à afficher
	$existe_images = false;

	$img_asc = '<img src="'.$chemin_images_icones.$Icones['arbre_asc'].'" border="0" title="'.$LG_assc_tree.'" alt="'.$LG_assc_tree.'"/>';
	$img_desc = '<img src="'.$chemin_images_icones.$Icones['arbre_desc'].'" border="0" title="'.$LG_desc_tree.'" alt="'.$LG_desc_tree.'"/>';
	$img_image = '&nbsp;&nbsp;&nbsp;<img src="'.$chemin_images_icones.$Icones['images'].'" border="0" ';

	if ($Comportement == 'C') $evenement = 'onclick';
	else $evenement = 'onmouseover';

	echo '<div style="position:absolute; top:50px; left:10px;">'."\n";

	// Cases des conjoints
	$left = $Coord_X[2];
	$top = $Coord_Y[1];
	$top1 = $top;
	case_pers($ref_1,true,true);
	$top = $Coord_Y[2];
	$top2 = $top;
	case_pers($ref_2,true,true);
	// Trait vertical entre les 2
	trait_vert($left + $Larg_Cellule + $Larg_Trait_Hor, $top1 + $Demie_Hauteur, $top2-$top1);

	// Cases des parents conjoints
	$Num_Pere = 0;
	$Num_Mere = 0;
	$Rang = 0;
	$left = $Coord_X[1];
	$x = get_Parents($ref_1,$Num_Pere,$Num_Mere,$Rang);
	$top = $Coord_Y[3];
	$top1 = $top;
	case_pers($Num_Pere,false,true);
	$top = $Coord_Y[4];
	$top2 = $top;
	case_pers($Num_Mere,false,true);
	// Trait vertical entre les 2
	trait_vert($left + $Larg_Cellule + $Larg_Trait_Hor, $top1 + $Demie_Hauteur, $top2-$top1);
	$x = get_Parents($ref_2,$Num_Pere,$Num_Mere,$Rang);
	$top = $Coord_Y[5];
	$top1 = $top;
	case_pers($Num_Pere,false,true);
	$top = $Coord_Y[6];
	$top2 = $top;
	case_pers($Num_Mere,false,true);
	// Trait vertical entre les 2
	trait_vert($left + $Larg_Cellule + $Larg_Trait_Hor, $top1 + $Demie_Hauteur, $top2-$top1);

	// Recherche des enfants
	$left = $Coord_X[3];
	$top = $Coord_Y[3];
	$sql = 'select Enfant from '.nom_table('filiations').
			' where pere = '.$ref_1.' and mere = '.$ref_2.
			' order by rang';
	$res = lect_sql($sql);
	$nb_enfants = $res->rowCount();
	$left += 2;
	$min_top = $top + $Demie_Hauteur;
	$max_top = $min_top;
	while ($row = $res->fetch(PDO::FETCH_NUM)) {
		//$left += $Larg_Trait_Hor / 2;
		case_pers($row[0],true,false,'dashed');
		$top += $Haut_Cellule;
		$max_top += $Haut_Cellule;
	}
	trait_vert($left-$Larg_Trait_Hor, $min_top, $max_top-$min_top-$Haut_Cellule, 'dashed');

	echo '<table cellpadding="0" width="100%"><tr><td>';
	$left += $Larg_Cellule;
	echo '<div style="position: absolute;  top: 570px; left:'.$left.'; width:200px;">'."\n";
	Insere_Bas($compl);
	echo '</div>';
	echo '</td></tr></table>';

	echo '</div>';

	if ($existe_images) {
		$action = $LG_Tree_Icon_Hover;
		if ($Comportement == 'C') $action = $LG_Tree_Icon_Click;
		$ch_def_image = Affiche_Icone('tip',$LG_tip).'&nbsp;'.$action.Affiche_Icone('images','Images').$LG_Tree_Show_Image;
		echo '<table>';
		echo '<tr><td>'.$ch_def_image.'</td></tr>'."\n";
		echo '<tr><td>';
		echo '<div id="image" style="display:none; visibility:hidden;">&nbsp;</div>';
		echo '</td></tr>';
		echo '</table>';
	}

	// Formulaire pour le bouton retour
	// Bouton_Retour($lib_Retour);
}

?>

</body>

<script type="text/javascript">
<!-- inspiré (de loin...) d'un script trouvé sur www.creation-de-site.net -->
<!--
function visib_image(contenu,haut,larg) {
	if (typeof(precedant) == 'undefined') precedant = '&nbsp;';
	cont_demande = '<img src="'+contenu+'" width='+larg+' height='+haut+' border="0"/>';
	var image2 = document.getElementById("image");
	if (precedant != contenu) {
		image2.innerHTML =' <a href="'+contenu+'" TARGET="_blank">'+cont_demande+'</a>';
		montre_div('image');
		precedant = contenu;
	}
	else {
		image2.innerHTML = '&nbsp;';
		cache_div('image');
		precedant = '&nbsp;';
	}
}
//-->
</script>

</html>