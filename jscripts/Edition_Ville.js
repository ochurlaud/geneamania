<script type="text/javascript">

// Javascript spécialisé pour l'édition des villes, sorti du PHP pour en conditionner l'appel

<!--

//== Appel d'une carte OpenStreetMap
function apelle_carte() {
  var longitude = document.forms.saisie.LongitudeV.value;
  var latitude = document.forms.saisie.LatitudeV.value;
  var h=500; var w=700;
  var chParam="resizable=yes, location=no, menubar=no, directories=no, scrollbars=yes, status=no, ";
  chParam+='width='+w+', height='+h;
  if ((longitude != 0) || (latitude != 0))
	  Fenetre=window.open('http://www.openstreetmap.org/?lat='+latitude +
	                                                   '&lon='+longitude +
	                                                   '&mlat='+latitude +
	                                                   '&mlon='+longitude +
	                                                   '&zoom=10',
	                                                   '_blank', chParam);
}

//-->
</script> 

