<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
//  ===========================================
//    Gerard KESTER le 02/11/2006
//  ===========================================
//
  include('fonctions.php');
  Ecrit_Meta('Vérification d\'une fiche personne','Vérification d\'une fiche personne','');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>

<br />Cette page affiche le r&eacute;sultat du contr&ocirc;le de la fiche d'une personne. Ils se font &agrave; plusieurs niveaux.
<br /><strong>Pour la personne</strong><br />
- que la fiche soit visible sur Internet ;<br />
- que la fiche soit valid&eacute;e ;<br />
- que les dates de naissance et de d&eacute;c&egrave;s (dans le cas des personnes non vivantes) soient pr&eacute;sentes et qu'elles correspondent &agrave; un jour pr&eacute;cis (le ...) ;<br />
- que la date de naissance pr&eacute;c&egrave;de ou soit &eacute;gale &agrave; la date de d&eacute;c&egrave;s.
<br /><strong>Avec ses parents :</strong><br />
- que les dates de d&eacute;c&egrave;s du p&egrave;re et de la m&egrave;re soient pr&eacute;sentes (dans le cas des personnes non vivantes) et qu'elles correspondent &agrave; un jour pr&eacute;cis (le ...) ;<br />
- que la personne soit n&eacute;e apr&egrave;s que le p&egrave;re et la m&egrave;re aient 15 ans ; <br />
- que la personne soit n&eacute;e au plus tard 9 mois apr&egrave;s le d&eacute;c&egrave;s du p&egrave;re ou de la m&egrave;re.
<br /><strong>Avec ses unions :</strong><br />
- que la personne ait plus de 15 ans quand elle s'unit &agrave; une autre personne ;<br />
- que la personne avec qui elle s'unit soit vivante lors de cette union.
 <br /><strong>Avec les enfants :</strong><br />
- que les dates de naissance des enfants  soient soient pr&eacute;sentes et qu'elles correspondent &agrave; un jour pr&eacute;cis (le ...) ;<br />
- que la personne ait au moins 15 ans &agrave; la naissance des enfants ;<br />
- que la personne soit d&eacute;c&eacute;d&eacute;e depuis moins de 9 mois lors de la naissance des enfants.
</body>
</html>
