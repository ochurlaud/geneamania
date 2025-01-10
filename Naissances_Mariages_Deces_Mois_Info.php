<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  $titre = 'Infos naissances, mariages et décès par mois';
  Ecrit_Meta($titre,$titre,'');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de visualiser la r&eacute;partition mensuelle des naissances, des mariages et des d&eacute;c&egrave;s des personnes contenues dans la base.
  Si l'utilisateur n'a pas de profil privil&eacute;gi&eacute;, seules sont prises en compte les personnes dont la diffusion Internet est autoris&eacute;e ; les mariages sont comptabilis&eacute;s si la diffusion Internet des 2 personnes est autoris&eacute;e.<br />
  Le survol &agrave; la souris des barres du graphique permet de visualiser le nombre de personnes concern&eacute;es pour un mois donn&eacute;.

</body>
</html>
