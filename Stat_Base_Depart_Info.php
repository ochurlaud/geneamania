<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Infos statistiques par département','Infos statistiques par département','');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de visualiser la r&eacute;partition des naissances et des d&eacute;c&egrave;s par d&eacute;partement.
  En mode Internet, seules sont prises en compte les personnes dont la diffusion Internet est autoris&eacute;e si l'utilisateur n'a pas un profil privil&eacute;gi&eacute;.
  L'icone <?php echo Affiche_Icone('carte_france','Carte de France');?> permet de visualiser la r&eacute;partition g&eacute;ographique sur la carte de la France.<br />
</body>
</html>
