<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
	include('fonctions.php');
	$objet = 'Infos édition personne';
	$x = Lit_Env();
	Ecrit_Meta($objet,$objet,'');
	echo "</head>\n";
	Ligne_Body();
?>
Les zones obligatoires sont le nom et les pr&eacute;noms.<br />
Cette page permet de cr&eacute;er ou modifier une personne.<br />
La date de naissance ou de d&eacute;c&egrave;s peut &ecirc;tre choisie en cliquant sur l'ic&ocirc;ne <?php echo Affiche_Icone('calendrier','calendrier');?>.<br />
Les professions sont g&eacute;r&eacute;es dans les &eacute;v&egrave;nements.<br />
L'ic&ocirc;ne <?php echo Affiche_Icone('ajout','ajout ville');?> permet d'ajouter dynamiquement une ville aux listes des villes de naissance ou de d&eacute;c&egrave;s.<br />
L'ic&ocirc;ne <?php echo Affiche_Icone('calculette','calculette');?> permet de calculer le num&eacute;ro sosa &agrave; partir de la saisie effectu&eacute;e par l'utilisateur dans le num&eacute;ro.
Les calculs disponibles sont &quot;p&egrave;re&quot; (P), &quot;m&egrave;re&quot; (M), &quot;enfant&quot; (E) ou &quot;conjoint&quot; (C). Par exemple, si l'utilisateur veut calculer la m&egrave;re de la personne de num&eacute;ro
sosa 10, il saisit =M10 dans le num&eacute;ro ; un clic sur l'ic&ocirc;ne transforme le num&eacute;ro saisi en 21 (m&egrave;re de 10 dans la num&eacute;rotation sosa). Il est &agrave; noter que le
calcul est insensible &agrave; la casse ; ainsi =m10 a le m&ecirc;me effet que =M10.
<br />
L'ic&ocirc;ne <?php echo Affiche_Icone('decujus','de cujus');?> permet d'attribuer automatiquement le num&eacute;ro 1 (de cujus) &agrave; la personne.<br />
L'ic&ocirc;ne <?php echo Affiche_Icone('copier','copie');?> permet de coller le nom, la ville de naissance ou de d&eacute;c&egrave;s de la fiche pr&eacute;c&eacute;dente sur laquelle &eacute;tait l'utilisateur en cr&eacute;ation ou modification.<br />
<br />
Les boutons disponibles sont :<br />
- <?php echo $lib_Okay;?> pour valider la cr&eacute;ation ou modification ;<br />
- <?php echo $lib_Annuler;?> pour annuler les modifications sur la fiche ;<br />
- <?php echo $lib_Supprimer;?> pour supprimer la personne ; ce bouton n'est affich&eacute; que si la personne n'est pas dans une union, qu'elle n'a pas de filiation
   et qu'elle n'est pas dans une filiation en tant que parent.<br /><br />
Cette page n'est accessible que pour le profil contributeur.
</body>
</html>
