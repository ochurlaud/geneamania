<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $x = Lit_Env();
  Ecrit_Meta('Informations sur l\'import d\'une sauvegarde','Infos import','');
  echo "</head>\n";
  Ligne_Body();
?>
  Cette page permet de recharger les donn&eacute;es de la base &agrave; partir d'un fichier de sauvegarde.<br />
  L'utilisateur peut demander &agrave; effacer pr&eacute;alablement le contenu de la base en cochant la case "Vidage pr&eacute;alable de la base actuelle".
  Attention, dans ce cas, il s'agit de toute la base dans laquelle les donn&eacute;es G&eacute;n&eacute;amania sont implant&eacute;es.
  N'utilisez pas cette option si G&eacute;n&eacute;amania partage la base d'une autre application !
  Cette option peut &ecirc;tre utilis&eacute;e dans le cas de la reprise d'une sauvegarde de version ant&eacute;rieure si vous voulez migrer cette sauvegarde vers la version actuelle.<br />
  Le fichier de sauvegarde peut &ecirc;tre t&eacute;l&eacute;charg&eacute; par l'utilisateur ou s&eacute;lectionn&eacute; parmi les fichiers pr&eacute;sents dans le r&eacute;pertoire des exports.
  Dans le cas o&ugrave; l'utilisateur t&eacute;l&eacute;charge un fichier et en s&eacute;lectionne un en m&ecirc;me temps, c'est le fichier t&eacute;l&eacute;charg&eacute; qui prime.<br />
  Sur un site h&eacute;berg&eacute; gratuit, seuls les fichiers .txt sont autoris&eacute;s ; dans les autres cas, les fichiers .txt et .sql sont autoris&eacute;s.<br />
  Attention : les donn&eacute;es pr&eacute;sentes en base sont supprim&eacute;es par le rechargement (en effet,
  la sauvegarde inclue des ordres de suppression et re-cr&eacute;ation de tables).<br />
  La sauvegarde peut &ecirc;tre recharg&eacute;e en local (sur votre ordinateur) ou sur votre site web distant
  si votre h&eacute;bergeur le permet (connexion distante possible sur le port 3306 par exemple).
  Il faut cependant noter que cette possibilit&eacute; de rechargement distant est consommatrice de ressources ; il est conseill&eacute; de diminuer le nombre de
  donn&eacute;es &agrave; charger sur votre base distante par exclusion de certaines tables (typiquement celles qui n'ont pas &eacute;volu&eacute; [pays, etc...]).<br />
  Sur Internet, l'utilisateur peut demander &agrave; pr&eacute;server la liste des utilisateurs pr&eacute;sents ; cela &eacute;vite par exemple lors d'un rechargement d'&eacute;craser cette liste &agrave; partir des utilisateurs locaux.<br />
  Cette page n'est disponible que pour le profil gestionnaire.
</body>
</html>
