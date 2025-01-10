<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  $objet = 'Infos historique des âges de premier mariage';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de visualiser la r&eacute;partition des &acirc;ges de premier mariage des personnes contenues dans la base pour une p&eacute;riode de naissance donn&eacute;e.
  Si l'utilisateur n'a pas de profil privil&eacute;gi&eacute;, seules sont prises en compte les personnes dont la visibilit&eacute; Internet n'est pas restreinte.<br />
  Pour chaque tranche d'&acirc;ge sont pr&eacute;cis&eacute;s le nombre de personnes et le pourcentage que cela repr&eacute;sente.
</body>
</html>
