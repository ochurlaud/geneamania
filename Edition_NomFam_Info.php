<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  $titre = 'Infos édition d\'un nom de famille';
  Ecrit_Meta($titre,$titre,'');
  echo "</head>\n";
  Ligne_Body();
?>
Cette page permet de modifier un nom de famille ainsi que sa prononciation.<br /><br />
<b>Saisie du nom de famille</b><br />
Vous pouvez modifier le nom de famille. Pour placer des caract&egrave;res accentu&eacute;s, vous pouvez les saisir
en minuscules puis cliquer sur l'ic&ocirc;ne <?php echo Affiche_Icone('majuscule','majuscule');?> pour mettre le nom en majuscules.<br />
<br /><b>Prononciation</b><br />
Pour la prononciation du nom, le bouton &laquo; Prononciation calcul&eacute;e &raquo; d&eacute;termine une prononciation du nom &agrave; partir des r&egrave;gles de prononciation du fran&ccedil;ais.
Ces r&egrave;gles sont complexes et parfois difficiles &agrave; appliquer, ainsi la prononciation propos&eacute;e peut ne pas &ecirc;tre correcte.
Vous pouvez la corriger.<br />
Vous pouvez d&eacute;placer le curseur en cliquant sur les fl&egrave;ches &laquo; <-- &raquo; et &laquo; --> &raquo;.<br />
Pour supprimer un son, placez le curseur apr&egrave;s celui-ci et cliquez sur &laquo; Effacer &raquo;.<br />
Les boutons marqu&eacute;s d'une ou deux lettres permettent d'ajouter le son correspondant &agrave; l'endroit du curseur.<br />
Quand votre souris arrive sur un de ces boutons, quelques exemples de mots contenant le son s'affichent en dessous du tableau.
</body>
</html>
