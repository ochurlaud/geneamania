<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  Ecrit_Meta('Vérification des numéros Sosa','Vérification des numéros Sosa','');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
  Cette page permet de visualiser les incoh&eacute;rences entre les num&eacute;ros Sosa saisis par l'utilisateur et ceux calcul&eacute;s par G&eacute;n&eacute;amania.
  La d&eacute;tection d'incoh&eacute;rence peut &ecirc;tre incorrecte dans le cas de personnes apparaissant plusieurs fois dans l'arbre (implexes).<br />
  Il est d'autre part &agrave; noter que cette v&eacute;rification ne balaye que les personnes dans l'ascendance du de cujus ; ainsi une personne hors de cette ascendance ne verra pas son num&eacute;ro contr&ocirc;l&eacute;.<br />
  La personne de r&eacute;f&eacute;rence sur laquelle s'appuie le calcul est le de cujus (num&eacute;ro 1).
  En cas d'absence de de cujus, G&eacute;n&eacute;amania affiche un message d'erreur.<br />
  L'utilisateur peut rectifier les incoh&eacute;rences en cliquant sur le bouton &quot;Rectifier&quot;.
  Seules sont modifi&eacute;es les lignes que l'utilisateur a coch&eacute;es (la case &quot;tous&quot; permet de cocher / d&eacute;cocher toutes les lignes.
</body>
</html>
