<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
$x = Lit_Env();
$titre = 'Liste des évènements';
Ecrit_Meta($titre,$titre,'');
echo "</head>\n";
Ligne_Body();
?>
Cette page permet de lister les &eacute;v&egrave;nements.<br />
L'utilisateur peut choisir le type de d'&eacute;v&egrave;nement pour lequel il veut la liste (par d&eacute;faut tous les types sont visualis&eacute;s). Il dispose alors en plus du titre de l'&eacute;v&egrave;nement
d'informations sur les personnes concern&eacute;es par l'&eacute;v&egrave;nement (&eacute;ventuellement au travers de la filiation ou de l'union).<br />
Seul le gestionnaire a acc&egrave;s &agrave; la modification de l'&eacute;v&egrave;nement.
</body>
</html>