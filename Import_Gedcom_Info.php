<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Informations sur l\'import Gedcom','Infos import Gedcom','');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de recharger les donn&eacute;es de la base &agrave; partir d'un fichier Gedcom
  ou d'afficher les donn&eacute;es pr&eacute;sentes dans le fichier.<br />
  Le nom du fichier de sauvegarde par d&eacute;faut est export_gedcom.ged et se situe dans le r&eacute;pertoire Gedcom.<br />
  Signification des cases &agrave; cocher :
  <ul>
  <li>"Charger les donn&eacute;es dans la base" permet de charger le fichier dans la base ;&nbsp;
  lorsqu'elle n'est pas coch&eacute;e, le fichier est juste lu et les donn&eacute;es contenues dans le fichier sont affich&eacute;es &agrave; l'&eacute;cran.</li>
  <li>"Vidage pr&eacute;alable de la base actuelle" permet de vider la base avant de charger le fichier. Attention, les donn&eacute;es pr&eacute;-existantes seront donc effac&eacute;es.</li>
  <li>"Visibilit&eacute; internet autoris&eacute;e par d&eacute;faut" permet d'indiquer que les personnes charg&eacute;es &agrave; partir du fichier seront visibles sur Internet sans restriction.</li>
  <li>"Visibilit&eacute; internet des notes autoris&eacute;e par d&eacute;faut" permet d'indiquer que les notes charg&eacute;es &agrave; partir du fichier seront visibles sur Internet de profil.</li>
  <li>"Visibilit&eacute; internet des images autoris&eacute;e par d&eacute;faut" permet d'indiquer que les images reprises &agrave; partir du fichier seront visibles sur Internet, si elles ont &eacute;t&eacute; charg&eacute;es par ailleurs.</li>
  <li>"Valeur par d&eacute;faut des fiches cr&eacute;&eacute;es" permet de sp&eacute;cifier le statut que prendront les fiches cr&eacute;&eacute;es lors de l'import.</li>
  <li>"Reprise des dates de modification du fichier" permet d'indiquer que les dates de modification des personnes et des autres donn&eacute;es seront celles du fichier ;
  si la case n'est pas coch&eacute;e, la date de modification sera la date du jour.</li>
  </ul>
Le format des lieux permet de s&eacute;lectionner l'arborescence des zones g&eacute;ographiques pr&eacute;sentes dans le fichier. Par d&eacute;faut, le format est compos&eacute; uniquement des villes.
Le format est sp&eacute;cifi&eacute; en s&eacute;lectionnant successivement chaque niveau (e.g. ville, d&eacute;partement, r&eacute;gion, pays) dans la liste d&eacute;roulante.
L'ic&ocirc;ne <?php echo Affiche_Icone('efface','Efface le format des lieux') ?> permet d'effacer le format des lieux pr&eacute;c&eacute;demment s&eacute;l&eacute;ctionn&eacute;.
L'arborescence est prise automatiquement en compte si elle est sp&eacute;cifi&eacute;e dans l'ent&ecirc;te du fichier &agrave; charger (balises PLAC/FORM).
<br /><br />Cette page n'est disponible que pour le profil gestionnaire.
</body>
</html>
