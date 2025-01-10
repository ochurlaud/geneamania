<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Infos créer des relations entre deux personnes';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>

Cette page permet de créer des relations entre deux personnes.<br />
Vous pouvez d&eacute;finir plusieurs liens d'une personne avec une autre avec des r&ocirc;les diff&eacute;rents, mais pas avec le m&ecirc;me r&ocirc;le. <br />
Les zones obligatoires sont la personne li&eacute;e et le r&ocirc;le.<br />
Les dates de d&eacute;but et de fin peuvent &ecirc;tre choisies en cliquant sur l'ic&ocirc;ne <?php echo Affiche_Icone('calendrier','calendrier');?>&nbsp;
alors que l'ic&ocirc;ne <?php echo Affiche_Icone('copie_calend','copie');?> permet de copier la date de début dans la date de fin.<br />
Les boutons disponibles sont :<br />
- <?php echo $lib_Okay;?> pour valider la cr&eacute;ation, modification ou suppression de la relation ;<br />
- <?php echo $lib_Annuler;?> pour annuler les modifications sur la relation ;<br />
- <?php echo $lib_Supprimer;?> pour supprimer la relation entre les deux personnes.<br />
Cette page n'est accessible que pour le profil gestionnaire.
</body>
</html>
