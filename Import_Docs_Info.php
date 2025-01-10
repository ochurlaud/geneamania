<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
	include('fonctions.php');
	$objet = 'Infos import documents';
	$x = Lit_Env();
	Ecrit_Meta($objet,$objet,'');
	echo "</head>\n";
	Ligne_Body();
?>
Lorsqu'un utilisateur a &agrave; la fois un site local sur son ordinateur et un site internet, il remonte les donn&eacute;es de son site local
vers son site internet en utilisant les fonctions d'export. Toutefois, ceci permet de remonter les donn&eacute;es mais pas les images ou autres documents.
L'utilisateur doit alors remonter ces images et documents via un logiciel de transfert de fichiers (exemple Filezilla) lorsque cela est possible.
Lorsque cela n'est pas possible, il doit remonter ces fichiers via la fonction d'import de documents.<br />
Les images et documents absents sont ceux qui ont &eacute;t&eacute; trouv&eacute;s dans les donn&eacute;es mais pour lequel le fichier n'est pas pr&eacute;sent.<br />
L'option "Remplacer" permet de ne pas &eacute;craser les fichiers de m&ecirc;me noms pr&eacute;sents.
</body>
</html>
