<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Infos statistiques par ville','Infos statistiques par ville','');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de visualiser la r&eacute;partition des naissances, mariages et des d&eacute;c&egrave;s par villes.<br />
  En cliquant sur une ville, on peut se d&eacute;brancher sur la fiche de la ville.
  En cliquant sur un nombre, on peut se d&eacute;brancher sur la liste des personnes n&eacute;es, mari&eacute;es ou d&eacute;c&eacute;d&eacute;es dans la ville.<br />
  En mode Internet, seules sont prises en compte les personnes dont la diffusion Internet est autoris&eacute;e si l'utilisateur n'a pas un profil privil&eacute;gi&eacute;.
</body>
</html>
