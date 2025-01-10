<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
$x = Lit_Env();
$objet = 'Infos anniversaires';
Ecrit_Meta($objet,$objet,'');
echo "</head>\n";
Ligne_Body();
?>
Cette page permet de visualiser les anniversaires de naissance, mariage et d&eacute;c&egrave;s sur le mois en cours ou un mois choisi par l'utilisateur.
Les anniversaires sont tri&eacute;s par ordre chronologique.<br />
Les ic&ocirc;nes <?php echo Affiche_Icone('anniv_nai','Anniversaire de naissance').'&nbsp;'.
                    Affiche_Icone('anniv_mar','Anniversaire de mariage').'&nbsp;'.
                    Affiche_Icone('anniv_dec','Anniversaire de décès');
         ?> signifient que l'anniversaire de naissance, mariage ou d&eacute;c&egrave;s a lieu le jour m&ecirc;me du mois en cours.<br />
 L'utilisateur a la possibilit&eacute; de ne pas afficher les personnes d&eacute;c&eacute;d&eacute;es ou pr&eacute;sum&eacute;es d&eacute;c&eacute;d&eacute;es (sur les anniversaires de naissance ou de mariage).<br />
NB : l'affichage des personnes dont la visibilit&eacute; internet est restreinte est fonction du profil de l'utilisateur.
</body>
</html>
