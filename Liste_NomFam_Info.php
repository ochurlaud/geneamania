<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  $titre = 'Liste des noms de famille';
  Ecrit_Meta($titre,$titre,'');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de lister les noms de famille.<br />
  &Agrave; partir de la liste, vous pouvez afficher un nom de famille et &eacute;ventuellement le modifier.
  L'acc&egrave;s &agrave; la modificaiton d&eacute;pend du profil de l'utilisateur.
</body>
</html>
