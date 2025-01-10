<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Infos convertisseur romain - arabe';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
  Cette page permet de convertir des nombres romains en nombres arabes et inversement.<br />
  L'utilisateur tape un nombre romain ou arabe via le clavier ou en cliquant sur les boutons ad hoc ;
  il doit ensuite cliquer sur le bouton conversion ou se positionner dans la zone de saisie et appuyer sur la touche "Entr&eacute;e".<br />
  L'ic&ocirc;ne <?php echo Affiche_Icone('efface','efface');?> permet d'effacer la zone de saisie.<br />
  Les nombres arabes sont limit&eacute;s &agrave; 3999.<br />
  Les saisies de lettres romaines peuvent &ecirc;tre faites en minuscules ou majuscules.
  </body>
</html>
