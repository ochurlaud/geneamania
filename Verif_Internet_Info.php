<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Vérification de la diffusabilité Internet';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
  Cette page permet de visualiser les personnes visibles sur Internet mais n&eacute;es ou d&eacute;c&eacute;d&eacute;es il y a moins de <?php echo $Lim_Diffu;?> ans.
  Cela peut mettre en lumi&egrave;re des probl&egrave;mes de confidentialit&eacute; de donn&eacute;es.<br />
  L'utilisateur peut rectifier les incoh&eacute;rences en cliquant sur le bouton &quot;Rectifier&quot;.
  Seules sont modifi&eacute;es les lignes que l'utilisateur a d&eacute;coch&eacute;es.
  La visibilit&eacute; Internet des personnes d&eacute;coch&eacute;es passe alors &agrave; Non et ces personnes ne sont visibles que des utilisateurs ayant un profil au minimum privil&eacute;gi&eacute;.
</body>
</html>
