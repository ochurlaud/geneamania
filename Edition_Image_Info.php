<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Informations sur l\'édition d\'une image';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
Cette page permet de rattacher, modifier ou supprimer le rattachement d'une image &agrave; une personne, une ville, une union ou un &eacute;v&egrave;nement.<br />
En cr&eacute;ation, si la description ou le nom du fichier de l'image sont absents, aucun lien ne sera cr&eacute;&eacute;.
En modification, la re-saisie du nom de l'image n'est pas n&eacute;cessaire.<br />
L'image est limit&eacute;e &agrave; <?php echo ($taille_maxi_images['s']/1024);?> 
Ko (param&eacute;trable) pour des dimensions maximum de <?php echo $taille_maxi_images['w'].' x '.$taille_maxi_images['h'].' pixels';?>.<br />
Le bouton radio "Image par d&eacute;faut" permet de sp&eacute;cifier si cette image s'affichera pas d&eacute;faut pour l'objet concern&eacute; (e.g. pour une personne sur la fiche familiale, l'arbre).
La valeur par d&eacute;faut est "Non".<br />
La case &agrave; cocher "Visibilit&eacute; de l'image sur internet " permet de sp&eacute;cifier si cette image s'affichera ou non sur Internet pour un profil invit&eacute; ; 
si elle n'est pas coch&eacute;e, l'utilisateur devra avoir un profil au moins privil&eacute;gi&eacute; pour la voir sur Internet.<br />
Les boutons disponibles sont :<br />
- <?php echo $lib_Okay;?> pour valider la cr&eacute;ation ou la modification du lien;<br />
- <?php echo $lib_Annuler;?> pour annuler les modifications saisies ;<br />
- <?php echo $lib_Supprimer;?> pour supprimer le lien.<br />
Cette page n'est accessible que pour le profil gestionnaire.
</body>
</html>
