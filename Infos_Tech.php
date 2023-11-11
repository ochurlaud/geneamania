<?php

//=====================================================================
// Affichage des informations techniques
// (c) JLS
// UTF-8
//=====================================================================

session_start();

function affiche($indice) {
	global $match;
	echo '<td>';
	if (isset($match[$indice])) echo $match[$indice];
	else echo '&nbsp;';
	echo '</td>';
}

include('fonctions.php');
$acces = 'L';
$titre = $LG_Menu_Title['Tech_Info'];
$niv_requis = 'G';
$x = Lit_Env();

include('Gestion_Pages.php');

$compl = Ajoute_Page_Info(600,150);
Insere_Haut($titre,$compl,'Infos_Tech','');

echo '<br />'."\n";
echo my_html(LG_TECH_INFO_VERSION).LG_SEMIC.$Version.'<br />';
if ($Environnement == 'I') echo my_html(LG_TECH_INFO_ENVIR_INTERNET);
else echo my_html(LG_TECH_INFO_ENVIR_LOCAL);
echo '<br /><br /><br />'."\n";

ob_start();
/*
INFO_GENERAL 1 The configuration line, php.ini location, build date, Web Server, System and more.
INFO_CREDITS 2 PHP Credits. See also phpcredits().
INFO_CONFIGURATION 4 Current Local and Master values for PHP directives. See also ini_get().
INFO_MODULES 8 Loaded modules and their respective settings. See also get_loaded_extensions().
INFO_ENVIRONMENT 16 Environment Variable information that's also available in $_ENV.
INFO_VARIABLES 32 Shows all predefined variables from EGPCS (Environment, GET, POST, Cookie, Server).
INFO_LICENSE 64 PHP License information. See also the license FAQ.
INFO_ALL -1 Shows all of the above. This is the default value.
*/
phpinfo(
 INFO_GENERAL
//+INFO_CREDITS
+INFO_CONFIGURATION
+INFO_MODULES
+INFO_ENVIRONMENT
+INFO_VARIABLES
);

preg_match ('%<style type="text/css">(.*?)</style>.*?(<body>.*</body>)%s', ob_get_clean(), $matches);

# $matches [1]; # Style information
# $matches [2]; # Body information

echo "<div class='phpinfodisplay'><style type='text/css'>\n",
    join( "\n",
        array_map(
            create_function(
                '$i',
                'return ".phpinfodisplay " . preg_replace( "/,/", ",.phpinfodisplay ", $i );'
                ),
            preg_split( '/\n/', $matches[1] )
            )
        ),
    "</style>\n",
    $matches[2],
    "\n</div>\n";

echo '<br />'."\n";

Insere_Bas($compl);
?>
</body>
</html>