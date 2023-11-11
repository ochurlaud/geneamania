<?php

//=====================================================================
// Gerard KESTER
// Compléments JLS
// Affichage d'un utilisateur
// UTF-8
//=====================================================================

session_start();

include('fonctions.php');
$acces = 'L';                          // Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['User'];

$tab_variables = array('annuler');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}
// Sécurisation des variables postées
$annuler = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

$x = Lit_Env();
$niv_requis = 'G';

// Recup de la variable passée dans l'URL : référence de l'utilisateur
$code = Recup_Variable('code','N');
$req_sel = 'select * from ' . nom_table('utilisateurs') . " where idUtil = $code limit 1";

include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

else {

	if ((!$enreg_sel) or ($code == 0)) Retour_Ar();

	$enreg = $enreg_sel;
	$compl = Affiche_Icone_Lien('href="Edition_Utilisateur.php?code='.$code.'"','fiche_edition','Edition fiche utilisateur') . '&nbsp;';

	Insere_Haut($titre,$compl,'Fiche_utilisateur','');
	echo '<br />';
	//
	//  ========== Programme principal ==========
	//
	$mail = $enreg['Adresse'];
	if ($mail == '') $mail = '-';
	$larg_titre = 30;
	echo '<table width="60%" class="table_form" align="center">'."\n";
	echo colonne_titre_tab(LG_UTIL_NAME).$enreg['nom'].'</td></tr>'."\n";
	echo colonne_titre_tab(LG_UTIL_CODE).$enreg['codeUtil'].'</td></tr>'."\n";
	echo colonne_titre_tab(LG_UTIL_PROFILE).libelleNiveau($enreg['niveau']).'</td></tr>'."\n";
	echo colonne_titre_tab(LG_UTIL_EMAIL).$mail.'</td></tr>'."\n";
	
	//$Environnement = 'I';
	$Last_cnx = '';
	if ($Environnement == 'I') {
		$sql = 'select max(dateCnx) from '.nom_table('connexions').' where idUtil = '.$code;
		if ($res = lect_sql($sql)) {
			if ($row = $res->fetch(PDO::FETCH_NUM)) {
				$Last_cnx = $row[0];
				echo '<tr><td>'.$LG_Ch_Last_Cnx.' : </td><td>';
				if ($Last_cnx != '') echo DateTime_Fr($Last_cnx);
				else echo $LG_Ch_No_Cnx;
				echo '</td></tr>'."\n";
			}
		}
		$res->closeCursor();
	}
	echo '</table>'."\n";

	if (($Environnement == 'I') and ($Last_cnx != ''))
		echo '<br /><a href="'.Get_Adr_Base_Ref().'Liste_Connexions.php?Util='.$code.'">'.my_html(LG_UTIL_CONNEXIONS).'</a>';

	// Formulaire pour le bouton retour
	Bouton_Retour($lib_Retour,'?'.$_SERVER['QUERY_STRING']);

	Insere_Bas($compl);
}
?>
</body>
</html>