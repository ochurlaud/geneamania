<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');

  $objet = 'Descendance directe d\'une personne';
  Ecrit_Meta($objet,$objet,'');

  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
Cette page permet de lister la descendance directe d'une personne vers le de cujus.
Pour cela, il faut que la personne soit dans l'ascendance directe du de cujus. G&eacute;n&eacute;amania consid&egrave;re que c'est le cas si le num&eacute;ro sosa 
de la personne est renseign&eacute; et s'il s'agit d'un nombre.
La descendance est recherch&eacute;e, non pas par les filiations, mais par les num&eacute;ros sosa successifs.<br />
La sortie peut se faire au format texte ou au format HTML avec des liens cliquables (personnes, 
<?php echo Affiche_Icone('arbre_asc','arbre ascendant');?> arbre ascendant, 
<?php echo Affiche_Icone('arbre_desc','arbre descendant');?> arbre descendant).<br />
Les conjoints sont affichables selon le choix de l'utilisateur.<br />
NB : l'affichage des personnes dont la visibilit&eacute; internet est restreinte est fonction du profil de l'utilisateur.
</body>
</html>
