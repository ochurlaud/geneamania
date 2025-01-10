<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
  include('fonctions.php');
  $titre = 'Informations édition d\'un utilisateur';
  Ecrit_Meta($titre,$titre,'');
  echo "</head>\n";
  $x = Lit_Env();
  Ligne_Body();
?>

Cette page permet de d&eacute;finir un utilisateur qui sera utilis&eacute; dans la version Internet de G&eacute;n&eacute;amania.. Le <strong>nom</strong> est un rappel du nom r&eacute;el de la personne. Le <strong>code utilisateur</strong> et le <strong>mot de passe</strong> serviront pour s'identifier sur la page d'accueil de G&eacute;n&eacute;amania. Le <strong>niveau</strong> sert &agrave; d&eacute;finir les possibilit&eacute;s que vous accordez &agrave; cet utilisateur. On distingue 3 niveaux :
<ul>
    <li>invit&eacute; : il peut consulter toutes les pages en respectant les verrouillages l&eacute;gaux d'acc&egrave;s aux informations personnelles ;</li>
    <li>privil&eacute;gi&eacute; : cet utilisateur peut consulter toutes les pages sans qu'il y ait de verrouillage d'acc&egrave;s aux informations personnelles. Il peut signaler au gestionnaire  des modifications par le syst&egrave;me des contributions, accessible sur la fiche d'une personne; </li>
    <li>gestionnaire : c'est la personne qui peut tout faire sur le logiciel.</li>
</ul>
Un internaute qui acc&egrave;de &agrave; une g&eacute;n&eacute;alogie a des <strong>droits d'invit&eacute;</strong>. Cela correspond &agrave; toute personne qui veut consulter votre travail. Il n'est pas n&eacute;cessaire de cr&eacute;er un utilisateur invit&eacute;, cela est fait automatiquement. <br />
Vous d&eacute;clarerez en <strong>utilisateur privil&eacute;gi&eacute;</strong> une personne en qui vous avez confiance et qui pourra vous signaler des modifications par le syst&egrave;me des contributions. Ces personnes ne peuvent rien modifier. Vous pouvez cr&eacute;er autant d'utilisateurs privil&eacute;gi&eacute;s que vous voulez <br />
Seules les personnes ayant des <strong>droits de gestionnaire</strong> peuvent apporter toutes les modifications &agrave; la base de donn&eacute;es. Ces personnes ont donc totalement le contr&ocirc;le de l'&eacute;volution de le g&eacute;n&eacute;alogie.<br />
Pour travailler dans des conditions de s&eacute;curit&eacute; correctes, il faut &ecirc;tre vigilent lorsque vous d&eacute;finissez un mot de passe. Les recommandations habituelles en la mati&egrave;re sont :
  <ul>
    <li>qu'il contienne au moins 8 caract&egrave;res ;</li>
    <li>qu'il ne soit pas un mot d'une langue quelconque.</li>
  </ul>
M&eacute;langez les lettres majuscules, minuscules, les chiffres et utilisez les caract&egrave;res qui sont plus rarement utilis&eacute;s :
  <ul>
    <li>les diacritiques (&eacute;, &egrave;, &agrave;, &ccedil;, &acirc;, &ecirc;, &icirc;, &ocirc;, &ucirc;) ;</li>
    <li>les symboles (&amp;, #, $, &euro;, &sect;, @, \, /) ; </li>
    <li>les signes de ponctuation (, ; . : ! ? { } [ ] ( )) ; </li>
    <li>les symboles math&eacute;matiques (+, -, *, /, %).</li>
  </ul>
Pour m&eacute;moriser plus facilement un mot de passe efficace, vous pouvez prendre une phrase que vous m&eacute;moriserez facilement et vous conservez la premi&egrave;re lettre de chaque mot. Vous pouvez remplacer les s ou S par $, les o ou O par 0 (z&eacute;ro), les a par @. Par exemple, la phrase &laquo;J'ai achet&eacute; 5 oeufs pour 3 euros&raquo; peut donner &laquo;j@50p3&euro;&raquo;.<br />
</body>
</html>
