<?php
// UTF-8
// Appel de l'image g�n�r�e pour un arbre ascendant

session_start();
include('fonctions.php');
$acces = 'L';					// Type d'acc�s de la page : (M)ise � jour, (L)ecture
$titre = $LG_assc_tree;			// Titre pour META
$x = Lit_Env();
include('Gestion_Pages.php');

$compl = '';

// Recup de la variable pass�e dans l'URL : r�f�rence de la personne
$Refer = Recup_Variable('Refer','N');

Insere_Haut_texte ('&nbsp;');

echo '<table width="90%">';
echo '<tr><td align="center"><img src="image_arbre_asc.php?Refer='.$Refer.'" alt="Image"/></td></tr>';
echo '</table>';

?>
</body>
</html>