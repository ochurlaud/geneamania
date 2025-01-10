<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  Ecrit_Meta('Infos édition des rangs','Infos édition des rangs','');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
Cette page permet rectifier les rangs des enfants d'un couple.<br />
Pour chaque enfant, G&eacute;n&eacute;amania calcule un rang th&eacute;orique <b>si la date de naissance est connue de mani&egrave;re pr&eacute;cise</b>.<br />
En cas de divergence entre le rang th&eacute;orique et le rang saisi, la zone du rang calcul&eacute; est suivie de l'icône <?php echo Affiche_Icone('warning','Alerte')?>.
L'utilisateur peut rectifier en masse les rangs en cliquant sur le bouton &quot;Accepter les rangs calcul&eacute;s&quot;.
La mise &agrave; jour n'est effective qu'apr&egrave;s avoir cliqu&eacute; sur le bouton &quot;<?php echo $lib_Okay; ?>&quot;.<br />
De m&ecirc;me, si les dates de naissance sont connues, G&eacute;n&eacute;amania calcule un &eacute;cart th&eacute;orique en mois / ann&eacute;es entre les naissances.
Si l'&eacute;cart avec l'enfant pr&eacute;c&eacute;dent est de moins de 9 mois, la zone "Ecart calcul&eacute;" est suivie de l'ic&ocirc;ne <?php echo Affiche_Icone('warning','Alerte')?>.<br />
</body>
</html>
