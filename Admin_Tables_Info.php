<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
$objet = 'Administration des tables';
Ecrit_Meta($objet,$objet,'');
echo "</head>\n";
$x = Lit_Env();
Ligne_Body();
?>

Cette page permet de r&eacute;parer ou optimiser les tables de la base G&eacute;n&eacute;amania.<br />
La r&eacute;paration d'une table est n&eacute;cessaire lorsque le logiciel indique 'Table 'nom de la table' is marked as crashed and should be repaired '. Ceci peut arriver lorsqu'il se produit un probl&egrave;me 
technique sur l'ordinateur. La r&eacute;paration de la table est une solution au m&ecirc;me titre que l'import d'une sauvegarde.<br />
L'optimisation d'une table peut &ecirc;tre n&eacute;cessaire lorsqu'il y a de fr&eacute;quentes suppressions sur la table ; la table est alors r&eacute;organis&eacute;e. 
Normalement, cette op&eacute;ration est inutile dans l'utilisation standard de G&eacute;n&eacute;amania.<br /><br />
Cette page n'est disponible que pour le profil gestionnaire.
</body>
</html>
