<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
Ecrit_Meta('Complétude des informations','Complétude des informations','');
echo "</head>\n";
$x = Lit_Env();
Ligne_Body();
?>
Cette page permet de v&eacute;rifier la compl&eacute;tude des informations sur les personnes portant un nom.<br /><br />
Sont v&eacute;rifi&eacute;es :
<ul>
<li>la pr&eacute;sence de la date et du lieu de naissance ;</li>
<li>la pr&eacute;sence de la date et du lieu de d&eacute;c&egrave;s si la personne est d&eacute;c&eacute;d&eacute;e (une personne n&eacute;e il y a plus de 130 ans est r&eacute;put&eacute;e d&eacute;c&eacute;d&eacute;e) ;</li>
<li>la pr&eacute;sence des 2 parents ;</li>
<li>	la pr&eacute;sence d'un conjoint avec une date et un lieu d'union (si la personne est d&eacute;c&eacute;d&eacute;e apr&egrave;s l'&acirc;ge de 15 ans).</li>
</ul>
Une information pr&eacute;sente et pr&eacute;cise est mat&eacute;rialis&eacute;e par un drapeau vert ; une information absente par un drapeau rouge. Une date approximative est mat&eacute;rialis&eacute;e par un drapeau orange.<br /><br />
Cette page ne permet pas de valider la pertinence des informations pr&eacute;sentes ; ceci est r&eacute;alis&eacute; via la fonction de v&eacute;rification des personnes.<br />
</body>
</html>
