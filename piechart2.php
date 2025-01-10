<?php
//=====================================================================
// Affichage d'un camembert de statistiques
// (c) JL Servin
// Paramètres :
// - $data : liste des données séparées par des *
// - $label : liste des libellés séparées par des *
// - $couleur : couleur du dégradé Rouge, Vert, Bleu...
// - larg_image : largeur de l'image
// - haut_image : hauteur de l'image
// - scale : essai pour anti-aliasing ; plutôt bien sur les cercles, KO sur le reste
//=====================================================================

include_once('fonctions.php');
$x = Lit_Env();

$debug = false;

if ($debug) {
	$gz = false;
	$_fputs = ($gz) ? @gzputs : @fputs;
	$fp = fopen('log.txt', 'wb');
	ecrire($fp,'log');
}

// Recup des variables passées dans l'URL
$data = Recup_Variable('data','S');
$label = Recup_Variable('label','S');
$couleur = Recup_Variable('couleur','C','RVBJMvGOr');
$larg_image = Recup_Variable('L','N');
$haut_image = Recup_Variable('H','N');
$scale = Recup_Variable('S','N');

$Zooming_Trick = false;
//$scale = 4;
if ($scale > 1) 
	$Zooming_Trick = true;
if ($Zooming_Trick) {
	$scale = 2;
	$larg_image_init = $larg_image;
	$haut_image_init = $haut_image;
	$larg_image *= $scale;
	$haut_image *= $scale;
}

$data = explode('*',$data);
$label = explode('*',$label);

//$larg_image = 400;
//$haut_image = 200;

// Création de l'image
$image = imagecreatetruecolor ($larg_image, $haut_image);
imageSaveAlpha($image, true);
ImageAlphaBlending($image, false);
$transparentColor = imagecolorallocatealpha($image, 200, 200, 200, 127);
imagefill($image, 0, 0, $transparentColor);

if ($Zooming_Trick)
	imagesetthickness($image, $scale);

// Allocation des couleurs en fonction du dégradé du site
include_once('Degrades_inc.php');
$la_couleur = '';
$couleurs = '';
$la_couleur = Charge_Couleur($couleur);

if ($debug) {
	ecrire($fp,'count la_couleur : '.count($la_couleur));
	for ($nb = 0 ; $nb < count($la_couleur) ; $nb ++)
		ecrire($fp,'la_couleur : '.$la_couleur[$nb]);
}
$blanc = ImageColorAllocate($image, 255 , 255 , 255 );
$noir  = ImageColorAllocate($image, 0, 0, 0);
$gris  = imagecolorallocate($image, 0xB7, 0xB7, 0xB7);

// On prend grosso modo une couleur sur 2 ; une décennie par couleur
for ($r = 11; $r > 0 ; $r--) {
	$x = $r * 2;
	$rvb = strtoupper($la_couleur[$x]);
	$couleurs[] = ImageColorAllocate($image, hexdec(substr($rvb,1,2)), hexdec(substr($rvb,3,2)), hexdec(substr($rvb,5,2)));
	if ($debug) ecrire($fp,'rvb : '.$rvb);
}

// Calcul du nombre de datas
$nb_datas = count($data);

// Calcul du nombre total
$nb_tot = 0;
for ($nb = 0; $nb < $nb_datas; $nb++) $nb_tot += $data[$nb];

if ($nb_tot > 0) {

	if ($debug) {
		for ($nb = 0 ; $nb < $nb_datas ; $nb ++)
			ecrire($fp,'data avant : '.$data[$nb]);
	}

	// Transformation pourcentage en degrés
	$data_p = '';
	for ($nb = 0; $nb < $nb_datas; $nb++) $data_p[] = round(($data[$nb]/$nb_tot)*100*3.6);

	if ($debug) {
		for ($nb = 0 ; $nb < $nb_datas ; $nb ++)
			ecrire($fp,'data après : '.$data[$nb]);
	}

	// Affichage des données
	$pivot_x = $larg_image / 4;
	$pivot_y = $haut_image / 2;
	$max_x = ($larg_image / 2)- 1;
	$max_y = $haut_image - 1;
	$abs_txt = $max_x + 30;
	$y = 20;

	$font = Get_Font();
	$taille_font = 10 * $scale;

	$angle_deb = 0;
	$fact_10 = 10 * $scale;
	for ($nb = 0; $nb < $nb_datas; $nb++) {
		if ($data[$nb] != 0) {
			if ($debug) {
				ecrire($fp,'$angle_deb : '.$angle_deb.', $data_p[$nb] : '.$data_p[$nb]);
			}
			imagefilledarc($image, $pivot_x, $pivot_y, $max_x, $max_y, $angle_deb, $angle_deb + $data_p[$nb] , $couleurs[$nb], IMG_ARC_PIE);
			imagearc($image, $pivot_x, $pivot_y, $max_x, $max_y, $angle_deb, $angle_deb + $data_p[$nb] , $noir);
				
			// x : axe horizontal, b : axe vertical
			// Centre : pivot_x, pivot_y
			// Bordure du cercle : $max_x, pivot_x
			
			// IL faut calculer la longueur de la ligne en fonction de l'angle
		
			$angle_deb += $data_p[$nb];
			$pourcent = round($data[$nb]/$nb_tot*100);
			imagefilledrectangle($image, $abs_txt, $y-$fact_10, $abs_txt+$fact_10, $y, $couleurs[$nb]);
			imagerectangle($image, $abs_txt, $y-$fact_10, $abs_txt+$fact_10, $y, $noir);
			ImageTTFText($image, $taille_font, 0, $abs_txt+$fact_10 + 10, $y, $noir, $font, 
			$label[$nb].' ans : '.$data[$nb].' ('.$pourcent.' %)'
			//' mxy'.$max_x.'/'.$max_y.'pxy'.$pivot_x.'/'.$pivot_y
			);
			$y += (18*$scale);
		}
	}
	// Anneau au centre
	imagefilledellipse($image, $larg_image / 4, $haut_image / 2, $haut_image / 4, $haut_image / 4, $transparentColor);
	//imageellipse($image, $larg_image / 4, $haut_image / 2, $haut_image / 4, $haut_image / 4, $transparentColor);
	//imagefilledellipse($image, $larg_image / 4, $haut_image / 2, $haut_image / 5, $haut_image / 5, $blanc);
}

if ($debug) fclose($fp);

// flush image
header('Content-type: image/png');

if ($Zooming_Trick) {
	$img2 = imagecreatetruecolor($larg_image_init, $haut_image_init); 
	imageSaveAlpha($img2, true);
	ImageAlphaBlending($img2, false);
	imagecopyresampled($img2, $image, 0,0, 0,0, $larg_image_init,$haut_image_init, $larg_image,$haut_image);
	/*
	$image = imagecreatetruecolor ($larg_image, $haut_image);
	imageSaveAlpha($image, true);
	ImageAlphaBlending($image, false);
	$transparentColor = imagecolorallocatealpha($image, 200, 200, 200, 127);
	imagefill($image, 0, 0, $transparentColor);
	*/
	
	@imagepng($img2);
	@imagedestroy($img2);
	@imagedestroy($image);
}
else {
	@imagepng($image);
	@imagedestroy($image);
}
?>
