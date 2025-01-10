<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Infos ajout rapide';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
Cette page permet de cr&eacute;er des personnes et les liens associ&eacute;s de mani&egrave;re automatique.<br />
A partir d'un personne, on peut :
<ul>
<li>Cr&eacute;er une soeur ou un fr&egrave;re. Dans ce cas, la personne cr&eacute;&eacute;e b&eacute;n&eacute;ficiera automatiquement de la m&ecirc;me filiation que la personne d'origine.
    Cette fonction  n'est accessible que si la filiation de la personne d'origine est connue.</li>
<li>Cr&eacute;er un conjoint. Dans ce cas, l'union avec la personne d'origine sera automatiquement cr&eacute;&eacute;e.</li>
<li>Cr&eacute;er les parents. Les parents et leur union sont cr&eacute;&eacute;s dans la m&ecirc;me page ; la filiation avec la personne d'origine est automatiquement cr&eacute;&eacute;e.
    Cette fonction  n'est accessible que si la filiation de la personne d'origine n'est pas connue.</li>
</ul>
Les listes de villes sont aliment&eacute;es &agrave; partir des villes de naissance, bapt&ecirc;me et d&eacute;c&egrave;s de la personne d'origine.<br />
Les dates peuvent &ecirc;tre choisies en cliquant sur l'icone <?php echo Affiche_Icone('calendrier','calendrier');?>.<br />
Les boutons disponibles sont :<br />
- <?php echo $lib_Okay; ?> pour valider les cr&eacute;ations ;<br />
- <?php echo $lib_Annuler; ?> pour annuler les cr&eacute;ations ;<br />
Cette page n'est accessible que pour le profil gestionnaire.
</body>
</html>
