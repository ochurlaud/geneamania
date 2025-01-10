<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
$objet = 'Import CSV';
Ecrit_Meta($objet,$objet,'');
echo "</head>\n";
$x = Lit_Env();
Ligne_Body();
?>
Cette option permet d'int&eacute;grer dans la base des donn&eacute;es issues d'un tableur (Libre Office, Excel...).<br />
A ce jour, il est possible d'int&eacute;grer des donn&eacute;es concernant les personnes uniquement (&agrave; l'exclusion des filiations et unions).<br />
L'utilisateur doit indiquer la correspondance entre les colonnes du tableur et les champs de G&eacute;n&eacute;mania. Seules sont obligatoires les zones contenant les noms et pr&eacute;noms.<br />
Le s&eacute;parateur de champs est le caract&egrave;re « ; ». Les dates sont au format JJ/MM/AAAA ou JJ-MM-AAAA. Les zones textuelles ne sont pas entour&eacute;es de guillemets.<br />
Voici un exemple de contenu de fichier :<br />
Durand;Robert 1;30/11/1965;Amiens;m;27C<br />
Durand;Marcel;3-5-1966;Amiens;m;27D<br />
</body>
</html>
