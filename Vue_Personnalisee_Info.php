<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  $titre = 'Vue personnalisée';
  Ecrit_Meta($titre,$titre,'');
  echo "</head>\n";
  Ligne_Body();
?>
Cette page permet de de choisir un de cujus diff&eacute;rent de celui par d&eacute;faut pour les listes par g&eacute;n&eacute;rations et patronymique.<br />
Le de cujus personnalis&eacute; est m&eacute;moris&eacute; lorsque l'utilisateur clique sur bouton "<?php echo $lib_Okay?>". Il n'est valable que pour la session en cours.
</body>
</html>
