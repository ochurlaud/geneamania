<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
$objet = 'Infos calculette sosa';
Ecrit_Meta($objet,$objet,'');
echo "</head>\n";
$x = Lit_Env();
Ligne_Body();
?>
Cette page permet de calculer le num&eacute;ro <?php echo '<a href="'.Get_Adr_Base_Ref().'glossaire_gen.php#SOSA">Sosa</a>';?>
&nbsp;du conjoint, du p&egrave;re, de la m&egrave;re ou de l'enfant d'une personne.<br />
De m&ecirc;me, on peut calculer &agrave; quelle g&eacute;n&eacute;ration correspond un num&eacute;ro et si celui-ci est du c&ocirc;t&eacute; paternel ou maternel.<br />
L'utilisateur tape un num&eacute;ro via le clavier ou en cliquant sur les boutons ad hoc ;
il doit ensuite cliquer sur le bouton voulu.<br />
L'ic&ocirc;ne <?php echo Affiche_Icone('efface','efface');?> permet d'effacer la zone de saisie.<br />
</body>
</html>
