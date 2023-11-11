<?php
//=====================================================================
// Liste référentiel (rôles, types d'évènements...)
// (c) JLS + Gérard Kester
// UTF-8
//=====================================================================

session_start();
include('fonctions.php');

// Recup de la variable passée dans l'URL : type de liste
$Type_Liste = Recup_Variable('Type_Liste','C','RTDCQOS');

switch ($Type_Liste) {
	case 'R' : $entete = LG_REF_LIST_ROLES; break;
	case 'T' : $entete = LG_REF_LIST_EV_TYPES; break;
	case 'D' : $entete = LG_REF_LIST_DOC_TYPES; break;
	case 'C' : $entete = LG_REF_LIST_CATEG; break;
	case 'Q' : $entete = LG_REF_LIST_REQ; break;
	case 'O' : $entete = LG_REF_LIST_REPO_SOURCES; break;
	default  : $entete = ''; break;
}

// Gestion standard des pages
$acces = 'L';						// Type d'accès de la page : (M)ise à jour, (L)ecture
$titre = $entete;					// Titre pour META
$niv_requis = 'P';					// Page réservée au profil privilégié
$x = Lit_Env();
include('Gestion_Pages.php');

// Verrouillage de la gestion des documents et des sources sur les gratuits non Premium
if (($SiteGratuit) and (!$Premium) and ($Type_Liste == 'D')) Retour_Ar();
if (($SiteGratuit) and (!$Premium) and ($Type_Liste == 'O')) Retour_Ar();

$compl = Ajoute_Page_Info(600,150);
Insere_Haut(my_html($entete),$compl,'Liste_Referentiel',$Type_Liste);

// Constitution de la requête d'extraction
switch ($Type_Liste) {
  case 'R' : // Requête pour la liste des rôles
             $sql = 'select Code_Role, Libelle_Role '.
             ' from '.nom_table('roles').
             ' where Code_Role <> \'\''.
             ' order by Libelle_Role';
             break;
  case 'T' : // Requête pour la liste des types d'évènements
             $sql = 'select Code_Type, Libelle_Type, Code_Modifiable '.
             ' from '.nom_table('types_evenement').
             ' order by Libelle_Type';
            break;
  case 'D' : // Requête pour la liste des types de documents
             $sql = 'select Id_Type_Document, Libelle_Type  '.
             ' from '.nom_table('types_doc').
             ' order by Libelle_Type';
             break;
  case 'C' : // Requête pour la liste des catégories
             $sql = 'select Identifiant, Titre, Image '.
             ' from '.nom_table('categories').
             ' order by Titre';
             break;
  case 'Q' : // Requête pour la liste des requêtes sur les personnes
             $sql = 'select Reference, Titre '.
             ' from '.nom_table('requetes').
             ' order by Titre';
             break;
  case 'O' : // Requête pour la liste des dépôts de sources
             $sql = 'select Ident, Nom '.
             ' from '.nom_table('depots').
             ' order by Nom';
             break;
  default  : break;
}

$res = lect_sql($sql);

// Possibilité d'insérer un code
// NB : pas d'insertion possible pour les catégories ou les requêtes sur les personnes
if ($est_contributeur) {
	switch ($Type_Liste) {
		case 'R' : $txt = $LG_Menu_Title['Role_Add']; echo $txt.' : '.affiche_Icone_Lien('href="Edition_Role.php?code=-----"','ajouter',$txt); break;
		case 'T' : $txt = $LG_Menu_Title['Event_Type_Add']; echo $txt.' : '.Affiche_Icone_Lien('href="Edition_Type_Evenement.php?code=-----"','ajouter',$txt); break;
		case 'D' : $txt = $LG_Menu_Title['Doc_Type_Add']; echo $txt.' : '.Affiche_Icone_Lien('href="Edition_Type_Document.php?code=-----"','ajouter',$txt); break;
		case 'O' : $txt = $LG_Menu_Title['Repo_Sources_Add']; echo $txt.' : '.Affiche_Icone_Lien('href="Edition_Depot.php?ident=-1"','ajouter',$txt); break;
	}
}

echo '<br /><br />'."\n";

if ($res->rowCount() > 0) {

	// Optimisation : préparation echo des images
	$echo_modif = Affiche_Icone('fiche_edition',my_html($LG_modify)).'</a>';

    while ($row = $res->fetch(PDO::FETCH_NUM)) {
      switch ($Type_Liste) {
        case 'R' : echo '<a href="Fiche_Role.php?code='.$row[0].'">'.my_html($row[1]).' ('.$row[0].')</a>';
                   if ($est_contributeur) {
                     echo '&nbsp;<a href="Edition_Role.php?code='.$row[0].'">'.$echo_modif."\n";
                   }
                   break;
        case 'T' : echo '<a href="Fiche_Type_Evenement.php?code='.$row[0].'">'.my_html($row[1]).' ('.$row[0].')</a>';
                   if (($est_contributeur) and ($row[2] == 'O')) {
                     echo '&nbsp;<a href="Edition_Type_Evenement.php?code='.$row[0].'">'.$echo_modif."\n";
                   }
                   break;
        case 'D' : echo '<a href="Fiche_Type_Document.php?code='.$row[0].'">'.my_html($row[1]).'</a>';
                   if (($est_contributeur)) {
                     echo '&nbsp;<a href="Edition_Type_Document.php?code='.$row[0].'">'.$echo_modif."\n";
                   }
                   break;
        case 'C' : $lib = my_html($row[1]);
        			echo '<img src="'.$chemin_images_icones.$Icones['tag_'.$row[2]].'" border="0" alt="'.$lib.'" title="'.$lib.'"/>'.'&nbsp;';
        			echo '<a href="Fiche_Categorie.php?categ='.$row[0].'">'.$lib.'</a>';
                   if (($est_gestionnaire)) {
                     echo '&nbsp;<a href="Edition_Categorie.php?categ='.$row[0].'">'.$echo_modif."\n";
                   }
                   break;
        case 'Q' : echo '<a href="Fiche_Requete.php?reference='.$row[0].'">'.my_html($row[1]).'</a>';
                   if ($est_gestionnaire) {
                     echo '&nbsp;<a href="Edition_Requete.php?reference='.$row[0].'">'.$echo_modif."\n";
                   }
                   break;
        case 'O' : echo '<a href="Fiche_Depot.php?ident='.$row[0].'">'.my_html($row[1]).'</a>';
                   if ($est_contributeur) {
                     echo '&nbsp;<a href="Edition_Depot.php?ident='.$row[0].'">'.$echo_modif."\n";
                   }
                   break;
        default  : break;
      }
      echo "<br />\n";
    }

  }

  $res->closeCursor();

  Insere_Bas($compl);
?>
</body>
</html>