<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Infos lien évènement à une personne';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>

  Cette page permet de lier un &eacute;v&egrave;nement &agrave; une personne.<br />
  Vous pouvez d&eacute;finir plusieurs participations d'une persone &agrave; un &eacute;v&egrave;nement avec des r&ocirc;les diff&eacute;rents. Par contre, une personne ne peut pas participer plusieurs fois &agrave; un m&ecirc;me &eacute;v&egrave;nement avec le m&ecirc;me r&ocirc;le. <br />
  Les boutons disponibles sont :<br />
    - <?php echo $lib_Okay; ?> pour valider la cr&eacute;ation, modification ou suppression du lien ;<br />
    - <?php echo $lib_Annuler; ?> pour annuler les modifications sur le lien ;<br />
    - <?php echo $lib_Supprimer; ?> pour supprimer le lien entre l'&eacute;v&egrave;nement  et la personne.<br />
  Cette page n'est accessible que pour le profil gestionnaire.
  </body>
</html>
