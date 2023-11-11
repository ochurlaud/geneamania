<?php
//=====================================================================
// Liste des x dernières personnes modifiées
// (c) JLS
// UTF-8
//=====================================================================

session_start();

$tab_variables = array('annuler','Horigine');
foreach ($tab_variables as $nom_variables) {
  if (isset($_POST[$nom_variables])) $$nom_variables = $_POST[$nom_variables];
  else $$nom_variables = '';
}

include('fonctions.php');

// Sécurisation des variables postées
$annuler  = Secur_Variable_Post($annuler,strlen($lib_Retour),'S');
$Horigine = Secur_Variable_Post($Horigine,100,'S');

// On retravaille le libellé du bouton pour effectuer le retour...
if ($annuler == $lib_Retour) $annuler = $lib_Annuler;

// Gestion standard des pages
$acces = 'L';                          		// Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $LG_Menu_Title['Last_Mod_Pers']; 	// Titre pour META
$x = Lit_Env();

include('Gestion_Pages.php');

// Retour sur demande d'annulation
if ($bt_An) Retour_Ar();

$compl = Ajoute_Page_Info(600,300);

Insere_Haut($titre,$compl,'Liste_Pers_Mod','');

// Préparation sur la clause de diffusabilité
$p_diff_int = '';
if (!$est_privilegie) $p_diff_int = " and Diff_Internet = 'O' ";

$sql = 'SELECT Reference, Nom, Prenoms, Date_Modification FROM '.nom_table('personnes').
		' WHERE Reference <> 0'.
		$p_diff_int.
		' order by Date_Modification desc '.
		' limit '.$nb_pers_mod;

$res = lect_sql($sql);
$nb_lignes = $res->rowCount();

if ($nb_lignes > 0) {
	echo '<br />'."\n";
	echo '<table width="50%" border="0" class="classic" align="center" >'."\n";
	echo '<tr align="center">';
	echo '<th>'.my_html(LG_PERS_MOD_PERS).'</th>';
	echo '<th>'.my_html(LG_PERS_MOD_WHEN).'</th>';
	echo '</tr>'."\n";
	$num_lig = 0;
	$echo_modif = Affiche_Icone('fiche_edition',my_html($LG_modify)).'</a>';

	while ($enr = $res->fetch(PDO::FETCH_NUM)) {

		echo '<tr>';
		echo '<td>&nbsp;<a '.Ins_Ref_Pers($enr[0]).'>'.my_html($enr[2].' '.$enr[1]).'</a>';

		// Lien vers la modification
		if ($est_gestionnaire) echo '&nbsp;<a '.Ins_Edt_Pers($enr[0]).'>'.$echo_modif;

		echo '</td>';
		echo '<td align="center">'.DateTime_Fr($enr[3]).'</td>';
		echo '</tr>'."\n";

	}

	$res->closeCursor();

	echo '</table>'."\n";
	echo '<br />'."\n";
}

// Formulaire pour le bouton retour
Bouton_Retour($lib_Retour,'');

Insere_Bas($compl);

?>
</body>
</html>