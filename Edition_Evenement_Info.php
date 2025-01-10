<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $objet = 'Infos édition évènement';
  Ecrit_Meta($objet,$objet,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>
  Cette page permet de cr&eacute;er, modifier et supprimer un &eacute;v&egrave;nement.<br />
  Les zones obligatoires sont le titre de l'&eacute;v&egrave;nement et son type.<br />
  Le lieu de survenance de l'&eacute;v&egrave;nement peut &ecirc;tre choisi en cliquant sur l'icone <?php echo Affiche_Icone('localisation','localisation');?>.<br />
  Les dates de d&eacute;but et de fin peuvent &ecirc;tre choisis en cliquant sur l'icone <?php echo Affiche_Icone('calendrier','calendrier');?>
  alors que l'icone <?php echo Affiche_Icone('copie_calend','copie');?> permet de copier la date de début dans la date de fin.<br />
  La zone "Visibilit&eacute; Internet du commentaire" permet de masquer ou non l'affichage de la note sur internet ; elle n'a aucun effet en local.<br />
  Les boutons disponibles sont :<br />
    - <?php echo $lib_Okay;?> pour valider la cr&eacute;ation ou modification ;<br />
    - <?php echo $lib_Annuler;?> pour annuler les modifications sur la fiche ;<br />
    - <?php echo $lib_Supprimer;?> pour supprimer l'&eacute;v&egrave;nement ; ce bouton n'est affich&eacute; que si l'&eacute;v&egrave;nement n'est pas utilis&eacute;.<br />
  Cette page n'est accessible que pour le profil gestionnaire.
  </body>
</html>
