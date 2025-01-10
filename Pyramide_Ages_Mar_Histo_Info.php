<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Infos historique de l\'âge au décès','Infos historique de l\'âge au décès','');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de visualiser l'&eacute;volution (en fonction de l'année de naissance) de l'&acirc;ge de premier mariage des personnes contenues dans la base.
  Si l'utilisateur n'a pas de profil privil&eacute;gi&eacute;, seules sont prises en compte les personnes dont la visibilit&eacute; Internet est n'est pas restreinte.
  Le survol &agrave; la souris des barres du graphique permet de visualiser le nombre de personnes concern&eacute;es sur la p&eacute;riode.<br />
  En cliquant sur la p&eacute;riode mentionn&eacute;e au milieu, l'utilisateur peut visualiser la r&eacute;partition des &acirc;ges de premier mariage des personnes pour la p&eacute;riode concern&eacute;e.

</body>
</html>
