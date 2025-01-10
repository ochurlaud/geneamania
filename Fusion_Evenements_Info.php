<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Fusion d\'évènements';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();

?>

Cette page permet de fusionner les &eacute;v&egrave;nements pr&eacute;sents en base. 
Les &eacute;v&egrave;nements pr&eacute;sentant les m&ecirc;mes lieux, type, titre et dates peuvent &ecirc;tre fusionn&eacute;s automatiquement par G&eacute;n&eacute;amania.<br />
La page s'affiche dans un premier temps en mode visualisation pour permettre &agrave; l'utilisateur de voir ce que G&eacute;n&eacute;amania va faire en terme de fusion.<br />
Cette page pr&eacute;sente une liste des groupes d'&eacute;v&egrave;nements qui peuvent &ecirc;tre fusionn&eacute;s. 
Pour chaque groupe, le titre de l'&eacute;v&egrave;nement est pr&eacute;cis&eacute; ; ensuite vient l'&eacute;v&egrave;nement de r&eacute;f&eacute;rence et chaque &eacute;v&egrave;nement &quot;doublon&quot;. 
L'utilisateur peut visualiser la r&eacute;f&eacute;rence et les doublons en cliquant sur le lien ad-hoc.
De plus, G&eacute;n&eacute;amania indique le nombre de participations (donc de personnes), d'images et de documents rattach&eacute;s &agrave; cet &eacute;v&egrave;nement.<br />
La fusion sera effective lorsque l'utilisateur d&eacute;cochera la case &quot;Mode simulation&quot; et cliquera sur le bouton &quot;Fusionner&quot;.
  
</body>
</html>
