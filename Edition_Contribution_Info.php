<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  $titre = 'Edition d\'une contribution';
  Ecrit_Meta($titre,$titre,'');
  echo "</head>\n";
  Ligne_Body();
?>
Cette page permet de prendre en compte une contribution propos&eacute;e par un utilisateur du net.<br />
L'ensemble des traitements est d&eacute;clench&eacute; si l'utilisateur clique sur le bouton <?php echo $lib_Okay; ?>.<br />
En r&egrave;gle g&eacute;n&eacute;rale, l'utilisateur peut choisir de modifier une personne existante, d'en cr&eacute;er une (selon les cas) ou d'ignorer la proposition pour la personne.<br />
<ul>
<li>Pour le p&egrave;re :<br />
Si le p&egrave;re existe, l'utilisateur peut remplacer le p&egrave;re connu ou ignorer la proposition.
Si le p&egrave;re n'existe pas, l'utilisateur peut cr&eacute;er le p&egrave;re (la filiation est automatiquement cr&eacute;&eacute;e) ou ignorer la proposition.
La page pr&eacute;sente en gras les zones du p&egrave;re qui sont modifi&eacute;es et en italique, les zones absentes de la proposition et qui sont reprises du p&egrave;re existant.</li>
<li>Pour la m&egrave;re :<br />
Le comportement est le m&ecirc;me. A l'issue du traitement des parents, l'union des parents est &eacute;ventuellement cr&eacute;&eacute;e (s'il y a eu cr&eacute;ation du p&egrave;re et / ou de la m&egrave;re) ou modifi&eacute;e.
</li>
<li>Pour le conjoint :<br />
La page pr&eacute;sente la liste des conjoints connus pour la personne. L'utilisateur peut alors choisir de remplacer un conjoint existant, d'en cr&eacute;er un nouveau ou d'ignorer la proposition ;
dans ce cas, il y a cr&eacute;ation automatique de l'union entre le conjoint cr&eacute;&eacute; et la personne.
</li>
<li>Pour les enfants :<br />
La page pr&eacute;sente la liste des enfants connus pour la personne. L'utilisateur peut alors choisir de remplacer un (ou deux) enfant existant(s), d'en cr&eacute;er un (ou deux) nouveau(x) ou d'ignorer la proposition ;
dans ce cas, il y a cr&eacute;ation automatique de la filiation entre l'enfant cr&eacute;&eacute; et la personne.
Attention, la filiation cr&eacute;&eacute;e ne r&eacute;f&eacute;rence pas le conjoint dans la mesure o&ugrave; le syst&egrave;me ne saurait pas forc&eacute;ment &agrave; quel conjoint rattacher la filiation.
</li>
</ul>

A l'issue du traitement, la contribution est r&eacute;put&eacute;e trait&eacute;e si l'utilisateur clique sur  <?php echo $lib_Okay; ?>.<br /><br />

Cette page n'est disponible que pour le profil gestionnaire.
</body>
</html>
