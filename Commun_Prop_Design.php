<?php
//=====================================================================
// Code commun à
// - Démarrage_Rapide
// - Prop_Design
// Partie proposition de design
// (c) JLS
//=====================================================================

// Graphisme
$dominante = 'marron';
//echo 'Proposition de graphismes (des param&egrave;tres plus complets sont disponibles dans Gestion du site / graphisme du site)<br /><br />'."\n";
echo '<table width="85%" class="table_form">'."\n";
echo '<tr align="center">';
echo '<td width="30%">';
echo 'Fond de page et premi&egrave;re lettre accueil<br />';
echo '<table width="95%" border="0" class="classic" cellspacing="1" cellpadding="3" align="center">';
echo '<tr align="center">';
echo '<td id="fond" style="background-color:white; background-image:url(\''.$gra_fond[$dominante].'\'); background-repeat:repeat;">';
echo '<img id="lettre" src="'.$gra_lettre[$dominante].'" alt="B" title="B" border="0" />ienvenue sur le site de ...';
echo '</td></tr>';
echo '</table>'."\n";
echo '</td>';
echo '<td width="33%">';
echo 'Formulaire de saisie<br />';
echo '<table width="100%">';
echo '<tr>';
echo '<td id="case_form_lib" width="40%" style="background-color:'.$gra_coul_lib[$dominante].';">Couleur de fond de la case libell&eacute;</td>';
echo '<td id="case_form_val" style="background-color:'.$gra_coul_val[$dominante].';">Couleur de fond de la case valeur</td>';
echo '</tr>';
echo '</table>';
echo '</td>';
echo '<td width="37%">';
echo 'Barre et liste<br />';
echo '<table width="95%" border="0" class="classic" cellspacing="1" cellpadding="3" align="center">';
echo '<tr align="center">';
echo '<td id="barre" style="background-image:url(\''.$gra_barre[$dominante].'\'); background-repeat:repeat-x;">';
echo '3&egrave;me G&eacute;n&eacute;ration&nbsp;&nbsp;<img id="ajout3" src="Images/eye.png" alt="Afficher / masquer" title="Afficher / masquer"/>';
echo '</td></tr></table>';
echo '<table width="95%" border="0" class="classic" cellspacing="1" cellpadding="3" align="center">';
echo '<tr id="liste_ligne1_1" style="background-color:'.$gra_coul_lib[$dominante].';">';
echo '<td width="12%">4</td>';
echo '<td width="48%">DUPOND Prosper Joseph Antoine</td>';
echo '<td width="20%">le 12 mars 1902</td>';
echo '<td width="20%">le 18 mai 1973</td>';
echo '</tr>';
echo '<tr id="liste_ligne2_1" style="background-color:'.$gra_coul_val[$dominante].';">';
echo '<td width="12%">5</td>';
echo '<td width="48%">DURAND Ambroisine Augustine</td>';
echo '<td width="20%">le 7 mars 1899</td>';
echo '<td width="20%">le 12 mai 1971</td>';
echo '</tr>';
echo '<tr id="liste_ligne1_2" style="background-color:'.$gra_coul_lib[$dominante].';">';
echo '<td width="12%">6</td>';
echo '<td width="48%">MARTIN Maurice Th&eacute;odule Fran&ccedil;ois</td>';
echo '<td width="20%">le 16 avril 1905</td>';
echo '<td width="20%">le 23 juin 1979</td>';
echo '</tr>';
echo '<tr id="liste_ligne2_2" style="background-color:'.$gra_coul_val[$dominante].';">';
echo '<td width="12%">7</td>';
echo '<td width="48%">DULAC Solange Eug&eacute;nie</td>';
echo '<td width="20%">le 16 juin 1907</td>';
echo '<td width="20%">le 20 mai 1979</td>';
echo '</tr>';
echo '</table>';	
echo '</td>';
echo '</tr>';
echo '</table>'."\n";

foreach ($dominantes as $dominante) {
	affiche_radio_prop($dominante);
}
?>