<?php
//=====================================================================
// Recherche d'une ville sur les sites h�berg�s
// (c) JLS
//=====================================================================

// Gestion standard des pages
session_start();
include('fonctions.php');
$acces = 'L';                          // Type d'acc�s de la page : (M)ise � jour, (L)ecture
$titre = 'Recherche d\'une ville sur les sites h�berg�s'; // Titre pour META

$tab_variables = array('annuler','Horigine', 'Nom');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// S�curisation des variables post�es
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libell� du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

$x = Lit_Env();
$niv_requis = 'P';						// Page accessible � partir du niveau privil�gi�
include('Gestion_Pages.php');          // Appel de la gestion standard des pages

// Verrouillage de la recherche sur les gratuits non Premium
if (($SiteGratuit) and (!$Premium)) Retour_Ar();
// Valable uniquement pour les sites h�berg�s
if (!$SiteGratuit) Retour_Ar();

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

// Recup des variables pass�es dans l'URL :
$NomL  = Recup_Variable('Nom','S');               // Nom de ville
$NomL = str_replace(' ','-',$NomL);
$NomL = strtoupper($NomL);

// On repasse sur l'utilisateur g�n�rique...
include('../connexion_inc.php');

$linkid = mysql_connect ($nserveur,$nutil,$nmdp);
if ($linkid) {
	$x = mysql_select_db ($ndb);
}

$compl = Ajoute_Page_Info(600,300);
Insere_Haut($titre,$compl,'Recherche_Ville_Heberges',$NomL);

echo '<br /><br />R&eacute;sultat pour la ville : '.stripslashes($NomL).'<br /><br />';

$req2 = ' where upper(replace( Nom_Ville, " ", "-" )) = "'.$NomL.'" order by Nom_Ville';

// R�cup�ration du num�ro du site
$eclate = explode('_',$pref_tables);
$num_site = $eclate[1];

$aff_res = false;
$num_lig = 0;
$sql = 'SELECT ident, nom_site, base FROM genealogies where actif = "O" and ident <> '.$num_site.' ORDER BY ident';
if ($res = lect_sql($sql)) {
	while ($enr_site = $res->fetch(PDO::FETCH_NUM)) {
		$aff = false;
		$db_cible = 'geneamania_'.$enr_site[2];
		$x = mysql_select_db ($db_cible);
		$sql2 = 'select Nom_Ville, Identifiant_zone from sg_'.$enr_site[0].'_villes '.$req2;
		if ($res2 = send_sql($db_cible,$sql2)) {
			while ($enr2 = $res2->fetch(PDO::FETCH_NUM)) {
				if (!$aff_res) {
					echo '<table width="80%" border="0" class="classic" cellspacing="1" cellpadding="3" align="center">';
					$aff_res = true;
				}
				if (!$aff) {
					echo '<tr class="rupt_table" align="center"><td>Site : '.$enr_site[1].'</td></tr>'."\n";
					$aff = true;
				}
				if (pair($num_lig++)) $style = 'liste';
				else $style = 'liste2';
				$Ne = affiche_date($enr2[3]);
				$Decede = affiche_date($enr2[4]);
				$Dates = '';
				if (($Ne != '?') or ($Decede != '?'))
					$Dates = '( '.$Ne.' - '.$Decede.' )';
				echo '<tr class="'.$style.'">';
				//echo $enr['ident'].';'.$enr2[1].'/'.$enr2[0].'<br>';
				echo '<td><a href="http://genealogies.geneamania.net/'.$enr_site[1].'/Fiche_Ville.php?Ident='.$enr2[1].'">'.$enr2[0].'</a></td></tr>'."\n";
			}
		}
  	}
}

if ($aff_res) {
	echo '</table>';
}

switch ($num_lig) {
	case 0  : echo 'Aucun site ne contient'; break;
	case 1  : echo '<br />Un site ne contient'; break;
	default : echo '<br />'.$num_lig.' sites contiennent';
}
echo ' ce nom.<br />';

// Formulaire pour le bouton retour
Bouton_Retour($lib_Retour,'?'.$_SERVER['QUERY_STRING']);

Insere_Bas($compl);
?>
</body>
</html>