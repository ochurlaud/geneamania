<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $lib = 'Infos recherche de villes';
  Ecrit_Meta($lib,$lib,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
  Cette page permet &agrave; l'utilisateur d'effectuer une recherche multicrit&egrave;res sur les villes de la base.
  Elle ram&egrave;ne toutes les villes r&eacute;pondant aux crit&egrave;res demand&eacute;s.<br />
  Le nom de la ville recherch&eacute;e est automatiquement mis en majuscules ; ainsi les villes 'paris' et 'Paris' sont &eacute;quivalentes.<br />
  Par d&eacute;faut, le nom de la ville recherch&eacute; doit &ecirc;tre &eacute;quivalent au champ saisi (sans consid&eacute;ration de casse) ;
  il est cependant possible de faire des recherches partielles en introduisant un ou plusieurs caract&egrave;res &quot;joker&quot; * ;
  ainsi la recherche sur le nom 'p*' donne les villes 'Paris', 'Perpignan'...
  Demander '*ar*' ram&egrave;nera toutes les villes dont le nom contient la chaine de caract&egrave;res 'ar' &agrave; un emplacement quelconque.<br />

  <p>La sortie du r&eacute;sultat de la recherche peut s'effectuer sous liste cliquable (sortie &eacute;cran), sous format destin&eacute; &agrave; &ecirc;tre imprim&eacute; (sortie texte) ou sous forme de fichier CSV (pour un tableur, le s&eacute;parateur &eacute;tant le ";" ; disponible &agrave; partir du profil privil&eacute;gi&eacute;).</p>
  
 </body>
</html>
