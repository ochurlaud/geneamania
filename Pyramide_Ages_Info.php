<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Infos pyramide des âges au décès','Infos pyramide des âges au décès','');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de visualiser la pyramide des &acirc;ges au d&eacute;c&egrave;s des personnes contenues dans la base.<br />
  Si l'utilisateur n'a pas de profil privil&eacute;gi&eacute;, seules sont prises en compte les personnes dont la la visibilit&eacute; Internet est n'est pas restreinte.
  Le survol &agrave; la souris des barres du graphique permet de visualiser le nombre de personnes concern&eacute;es pour un &acirc;ge donn&eacute;.
  De plus, on peut se d&eacute;brancher sur la fiche de la doyenne ou du doyen.
</body>
</html>
