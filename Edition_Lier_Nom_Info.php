<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Infos assigner un nom secondaire à une personne';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
Cette page permet d'assigner un nom secondaire &agrave; une personne.<br />
Le nom secondaire est oppos&eacute; au nom principal de la personne en ce sens qu'il en repr&eacute;sente des variantes trouv&eacute;es sur certains actes.<br />
Vous pouvez commenter chaque lien vers un nom secondaire, par exemple en indiquant l'acte sur lequel a &eacute;t&eacute; trouv&eacute; le nom.<br />
Il est &agrave; noter que si le lien existe, seule la modification du commentaire sera autoris&eacute;e.<br />
Les boutons disponibles sont :<br />
- <?php echo $lib_Okay;?> pour valider la cr&eacute;ation ou la modification du lien vers le nom ;<br />
- <?php echo $lib_Annuler;?> pour annuler les modifications ;<br />
- <?php echo $lib_Supprimer;?> pour supprimer le lien vers le nom .<br />
</body>
</html>
