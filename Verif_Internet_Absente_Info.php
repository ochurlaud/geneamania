<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Vérification de la diffusabilité Internet absente';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();

  $Lim_Diffu_Dec = $Lim_Diffu + 130;
 ?>

  Cette page permet de visualiser les personnes non visibles sur Internet mais n&eacute;es il y a plus <?php echo $Lim_Diffu;?> ou d&eacute;c&eacute;d&eacute;es il y a plus de <?php echo $Lim_Diffu_Dec;?> ans.
  L'utilisateur peut rectifier les incoh&eacute;rences en cliquant sur le bouton &quot;Rectifier&quot;.
  Seules sont modifi&eacute;es les lignes que l'utilisateur a coch&eacute;es.
  La visibilit&eacute; Internet des personnes coch&eacute;es passe alors &agrave; Oui, tout le monde pourra alors les visualiser.
</body>
</html>
