<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php
include('fonctions.php');
$x = Lit_Env();
$titre = 'Commentaire général sur le site';
Ecrit_Meta($titre,$titre,'');
echo "</head>\n";
Ligne_Body(false);

$Presence_Commentaire = Rech_Commentaire(0,'G');
if (($Presence_Commentaire) and (($_SESSION['estPrivilegie']) or ($Diffusion_Commentaire_Internet == 'O'))) {
	echo html_entity_decode($Commentaire, ENT_QUOTES, $def_enc);
}
?>
</body>
</html>
