<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Information recherche de parenté';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();

  if ($Environnement == 'I') $max_gen = $max_gen_int;
  else                       $max_gen = $max_gen_loc;

?>
  Cette page permet de rechercher l'anc&ecirc;tre commun &agrave; 2 personnes.
  Cette recherche s'effectue sur <?php echo $max_gen ?> g&eacute;n&eacute;rations au maximum.
  Si l'anc&ecirc;tre commun est trouv&eacute;, l'utilisateur peut visualiser sa fiche familiale, sous
  r&eacute;serve de diffusabilit&eacute;, ou ses arbres descendant ou ascendant.
  De m&ecirc;me pour toutes les personnes pr&eacute;sentes dans les 2 filiations.<br />
  En local, une case &agrave; cocher permet de sauvegarder la recherche. Cette sauvegarde peut &ecirc;tre utilis&eacute;e dans G&eacute;n&eacute;graphe pour g&eacute;n&eacute;rer le graphique correspondant &agrave; la recherche.
</body>
</html>
