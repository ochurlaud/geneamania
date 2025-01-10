<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  Ecrit_Meta('Infos recherche de personnes','Infos recherche de personnes','');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
  Cette page permet &agrave; l'utilisateur d'effectuer une recherche multi-crtit&egrave;re sur les personnes de la base.
  Elle ram&egrave;ne toutes les personnes r&eacute;pondant aux crit&egrave;res demand&eacute;s.
  En mode non privil&eacute;gi&eacute;, seules sont prises en compte les personnes dont la visibilt&eacute; Internet n'est pas restreinte.<br />
  Les crit&egrave;res portant sur des zones de type &quot;caract&egrave;res&quot; sont automatiquement mis en majuscules ; ainsi les pr&eacute;noms 'jean' et 'Jean' sont &eacute;quivalents.<br />
  Par d&eacute;faut, le champ recherch&eacute; doit &ecirc;tre &eacute;quivalent au champ saisi (sans consid&eacute;ration de casse) ;
  cependant, sur les zones de type &quot;caract&egrave;res&quot;, il est possible de faire des recherches partielles en introduisant un ou plusieurs caract&egrave;res &quot;joker&quot; * ;
  ainsi la recherche sur le nom 'du*' donne les personnes s'appelant 'Durand', 'Dupond', 'Dumoulin'...
  Demander '*du*' ram&egrave;nera toutes les personnes dont le nom contient la chaine de caract&egrave;res 'du' &agrave; un emplacement quelconque.<br />
  Exemple : pour avoir toutes les femmes de la base, on coche le bouton &quot;Femme&quot; et on lance la recherche.
  Si on veut affiner la recherche et obtenir les femmes dont l'un des pr&eacute;noms est &quot;Marie', on ajoutera '*marie*' dans la zone Pr&eacute;noms.<br />

  <br />La recherche sur le nom peut &ecirc;tre orthographique, phon&eacute;tique exacte ou phon&eacute;tique approch&eacute;e.<br />
  La recherche phonétique exacte donne tous les noms se pronon&ccedil;ant de la m&ecirc;me fa&ccedil;on.<br />
  La recherche phon&eacute;tique approch&eacute;e fait des approximations sur la prononciation. Cela permet de rapprocher les sons suivants :
  <ul>
    <li>&laquo; a &raquo; et &laquo; &acirc; &raquo; ;</li>
    <li>&laquo; &eacute; &raquo; et &laquo; &egrave; &raquo; ;</li>
    <li>&laquo; o &raquo; et &laquo; &ocirc; &raquo; ;</li>
    <li>&laquo; in &raquo; et &laquo; un &raquo; ;</li>
    <li>&laquo; en &raquo; et &laquo; on &raquo; ;</li>
    <li>&laquo; n &raquo; et &laquo; gn &raquo;.</li>
  </ul>
  La recherche donne alors tous les noms de famille dont la prononciation correspond à celle du nom saisi tout en tenant compte des approximations.

  
  <p>La sortie du résultat de la recherche peut s'effectuer sous liste cliquable (sortie &eacute;cran), sous format destin&eacute; &agrave; &ecirc;tre imprim&eacute; (sortie texte) ou sous forme de fichier CSV (pour un tableur, le s&eacute;parateur &eacute;tant le ";" ; disponible à partir du profil privilégié).</p>
  
 </body>
</html>
