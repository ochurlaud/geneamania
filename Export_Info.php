<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Infos export','Infos export','');
  echo "</head>\n";
  Ligne_Body();
?>
Cette page permet d'exporter les donn&eacute;es de la base.
L'export peut &ecirc;tre de type sauvegarde ou Internet.
Ce dernier mode permet d'exporter ses donn&eacute;es dans un fichier afin de les recharger sur un site Internet.<br />
En export Internet, les donn&eacute;es de la table 'compteurs' ne sont pas export&eacute;es ; en effet, il s'agit des statistiques
de fr&eacute;quentation du site. De plus, la table 'general' est modifi&eacute;e afin de positionner le mode Internet.<br />
L'export 'Site gratuit' permet d'exporter ses donn&eacute;es au format texte afin de les charger sur un site personnel h&eacute;berg&eacute; sur la plateforme G&eacute;n&eacute;amania.<br />
L'option 'Masquage des dates r&eacute;centes' permet de ne pas exporter les dates trop r&eacute;centes afin de pr&eacute;server la confidentialit&eacute; de certaines donn&eacute;es (personnes vivantes par exemple).<br />
L'utilisateur peut sp&eacute;cifier un pr&eacute;fixe &agrave; attacher au nom du fichier (cette possibilit&eacute; n'est pas offerte sur les sites gratuits standard).<br />
L'ic&ocirc;ne <?php echo Affiche_Icone('oeil','oeil');?> permet de visualiser la liste des tables &agrave; exporter ; l'utilisateur
peut ainsi choisir les tables qu'il souhaite exporter.<br />
Le nom du fichier de sauvegarde par d&eacute;faut est Export_Sauvegarde.sql (Export_Complet.sql pour les versions antérieures à la 2.1) pour
la sauvegarde et Export_Internet.sql pour l'export Internet ; le suffixe &eacute;ventuel est ins&eacute;r&eacute; avant le point ; 
le modificateur de nom de fichier &eacute;ventuel est ins&eacute;r&eacute; apr&egrave;s la cha&icirc;ne "Export_".<br />
Cette page n'est disponible que pour le profil gestionnaire.
</body>
</html>
