<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head><?php
  include('fonctions.php');
  $objet = 'Personnes isolées';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>

  Cette page permet de lister les personnes isol&eacute;es de la base.<br />
  Par personne isol&eacute;e, on entend une personne sans filiation, ni union, ni relation avec une autre personne.<br />
  Cette page n'est accessible qu'au gestionnaire.
  </body>
</html>
