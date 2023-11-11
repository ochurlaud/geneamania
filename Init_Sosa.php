<?php

//=====================================================================
// Ré-init de la numérotation Sosa
// UTF-8
//=====================================================================

session_start();

// Récupération des variables de l'affichage précédent
$tab_variables = array('ok','annuler','modif',
						'Horigine','Garder'
						);
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}

// Gestion standard des pages
include('fonctions.php');

// Sécurisation des variables postées
$ok       = Secur_Variable_Post($ok,strlen($lib_Rectifier),'S');
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Annuler),'S');
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libellé du bouton pour être standard...
if ($ok == $lib_Supprimer) $ok = 'OK';

$acces = 'M';								// Type d'accès de la page : (M)ise à jour, (L)ecture
$niv_requis = 'G';							// Niveau gestionnaire requis
$titre = $LG_Menu_Title['Delete_Sosa'];	// Titre pour META
$x = Lit_Env();
include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$Garder = Secur_Variable_Post($Garder,1,'S');

// Demande d'effacement
if ($bt_OK) {
	$req = 'update '.nom_table('personnes').' set Numero = ""';
	if ($Garder == 'O')
		$req .= ' where Numero <> "1"';
	$Res = maj_sql($req);
	Retour_Ar();
}

$compl = Ajoute_Page_Info(600,200);
Insere_Haut(my_html($titre),$compl,'Init_Sosa','');

echo '<form id="saisie" method="post" action="'.my_self().'">'."\n";
aff_origine();
echo '<br /><br />';
echo '<table width="50%" class="table_form">'."\n";
col_titre_tab(LG_DEL_SOSA_KEEP,60);
echo '<td class="value">';
echo '<input type="checkbox" name="Garder" value="O"/>';
echo '</td></tr>'."\n";
bt_ok_an_sup($lib_Supprimer,$lib_Annuler,'','');
echo '</table>';
echo '<br />';
echo '</form>';

echo '<br /><a href="Verif_Sosa.php">'.my_html($LG_Menu_Title['Check_Sosa']).'</a>';

Insere_Bas($compl);
?>
</body>
</html>