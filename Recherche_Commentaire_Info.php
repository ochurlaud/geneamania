<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');

  $objet = 'Information recherche dans les commenatires';
  Ecrit_Meta($objet,$objet,'');

  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();

?>
Cette page, accessible aux personnes de profil gestionnaire, permet &agrave; l'utilisateur d'effectuer une recherche dans les commentaires stock&eacute;s dans la base,
quel que soit l'objet point&eacute; par le commentaire (personne, union, zone g&eacute;ographique...).<br />
L'utilisateur n'est pas oblig&eacute; de saisir le contenu complet du commentaire ; de m&ecirc;me, la casse n'est pas prise en compte.<br />
E.g., si l'utilisateur saisit le mot "ancien" (sans les guillemets), les commentaires suivants pourront &ecirc;tre trouv&eacute;s :
<ul>
<li>Ancien d&eacute;partement de la Seine et Oise</li>
<li>Naissance sur l'ancienne commune de ...</li>
</ul>
<p>La sortie du r&eacute;sultat de la recherche peut s'effectuer sous forme de liste cliquable (sortie &eacute;cran) ou sous format destin&eacute; &agrave; &ecirc;tre imprim&eacute; (sortie texte).</p>
</body>
</html>
