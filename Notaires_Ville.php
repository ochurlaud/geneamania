<?php
//=====================================================================
// Notaires dans les unions sur la ville
// (c) JLS
// UTF-8
//=====================================================================

session_start();
include('fonctions.php');
$acces = 'L';

$tab_variables = array('annuler','Horigine');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

// Recup des variables passées dans l'URL :
$idVille = Recup_Variable('Ville','N');             // Ville
$NomL    = Recup_Variable('Nom','S');               // Nom de ville
$texte   = Dem_Texte();                             // texte ou non

$objet = stripcslashes(LG_NOTARY_TITLE.$NomL);

$titre = $objet;     // Titre pour META
$x = Lit_Env();

// Sortie en pdf ?
$sortie_pdf = false;
if ((!$SiteGratuit) or ($Premium)) {
	$s_pdf = Recup_Variable('pdf','C','O');
	if (!$s_pdf) $s_pdf = 'n';
	if ($s_pdf == 'O') $sortie_pdf = true;
	if ($sortie_pdf) $no_entete = true;
}

// Appel de la gestion standard des pages
include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$lien = 'href="'.my_self().'?texte=O'.
							'&amp;Ville='.$idVille.
							'&amp;Nom='.StripSlashes(str_replace(' ','%20',$NomL));

$compl = Ajoute_Page_Info(600,150).
		 Affiche_Icone_Lien_TXT_PDF($lien.'"',$LG_printable_format,'T').'&nbsp;';
if ((!$SiteGratuit) or ($Premium))
	$compl .= Affiche_Icone_Lien_TXT_PDF($lien.'&amp;pdf=O"',$LG_pdf_format,'P').'&nbsp;';

$sortie = 'H';

if (! $texte) {
	Insere_Haut(my_html($objet),$compl,'Notaires_Ville','');
	}
else {
	// Sortie dans un PDF
	if($sortie_pdf) {
		require('html2pdfb.php');
		$sortie = 'P';
		$pdf = new PDF_HTML();
		$pdf->SetFont($font_pdf,'',12);
		$pdf->AddPage();
		$pdf->SetFont($font_pdf,'B',14);
		PDF_Set_Def_Color($pdf);
		$pdf->Cell(0, 5, $objet, 'LTRB' , 1, 'C');
		$pdf->SetFont($font_pdf,'',11);
		$pdf->Ln();
	}
	// Sortie au format texte
	else {
	    // Affichage du titre : numéros + génération
	    Insere_Haut_texte ($objet);
		echo '<br />';
	}
}

$n_personnes = nom_table('personnes');
$n_unions = nom_table('unions');

// Requête d'extraction
$sql = 'select c1.Reference, c1.Nom, c1.Prenoms, c2.Reference as Reference2, c2.Nom as Nom2, c2.Prenoms as Prenoms2, u.Notaire_K, u.Date_K '.
		'from '.$n_unions.' u,'.$n_personnes.' c1,'.$n_personnes.' c2'.
		' where c1.Reference = u.Conjoint_1 and c2.Reference = u.Conjoint_2 '.
			' and u.Ville_Notaire = '.$idVille;
if (!$est_privilegie) $sql = $sql ." and c1.Diff_Internet = 'O'and c2.Diff_Internet = 'O' ";
$sql = $sql .' order by u.Notaire_K, u.Date_K';

$res = lect_sql($sql);
$nb_lig = 0;
$nb_lig = $res->rowCount();

//$tab = '&nbsp;&nbsp;&nbsp;&nbsp;';
$tab = '-';

// Balayage
if ($nb_lig > 0) {
	$anc_not = '';
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    	if ($debug) print_r($row);
    	$nouv_not = $row['Notaire_K'];
    	if ($nouv_not != $anc_not) {
    		$anc_not = $nouv_not;
    		if ($anc_not != '') echo HTML_ou_PDF('<br /><br />',$sortie);
    		echo HTML_ou_PDF( $nouv_not.'<br />',$sortie);
    	}
		$Ref = $row['Reference'];
		HTML_ou_PDF("<br />\n",$sortie);
		if (! $texte) echo $tab.'&nbsp;<a '.Ins_Ref_Pers($Ref).'>'.my_html($row['Prenoms']. ' '.$row['Nom'].' x '.$row['Prenoms2']. ' '.$row['Nom2']).'</a>'."\n";
		else echo HTML_ou_PDF(my_html($tab.' '.$row['Prenoms']. ' '.$row['Nom'].' x '.$row['Prenoms2']. ' '.$row['Nom2'])."\n",$sortie);
		$Date_K = $row['Date_K'];
		if ($Date_K != '') {
			HTML_ou_PDF(' ( '.Etend_date($Date_K).' )',$sortie);
		}
	}
	HTML_ou_PDF("<br />\n",$sortie);
}

if($sortie_pdf) {
	$pdf->Output();
	exit;
}

$res->closeCursor();

if (! $texte) {
	// Formulaire pour le bouton retour
	Bouton_Retour($lib_Retour,'?'.Query_Str());
	Insere_Bas($compl);
}
?>
</body>
</html>