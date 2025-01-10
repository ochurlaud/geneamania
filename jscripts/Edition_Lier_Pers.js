<script type="text/javascript">

// Javascript spécialisé pour l'édition des liens de personnes

<!--

function updatePersonnes(id) {
	//window.alert('rpc_Personne.php?idNomFam=' + id);
	xhr.open('get', 'rpc_Personne.php?idNomFam=' + id);
	//xhr.open('get', 'rpc.php?type_evt=' + types_evt + '&ref=' + document.getElementById('ref').value);
	xhr.onreadystatechange = handleResponse;
	xhr.send(null);
}

function handleResponse() {
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
		// Récupération de la liste des évènements
		var data = xhr.responseXML.getElementsByTagName('personnes');
		document.getElementById('personnes').innerHTML = '';
		for(var i=0;i<data.length;i++) {
			//window.alert(data[i].getAttribute("id"));
			var option = document.createElement('option');
			option.setAttribute('value',data[i].getAttribute("id"));
			option.appendChild(document.createTextNode(data[i].firstChild.nodeValue));
			document.getElementById('personnes').appendChild(option);
		}
		//window.alert(document.getElementById('personnes').innerHTML);
		// Récupération du maxi des évènements
		var data2 = xhr.responseXML.getElementsByTagName('maxi');
		document.getElementById('maxi').value = data2[0].firstChild.nodeValue;

	}
}

function initForm() {
	if (document.getElementById('creation').value == 'o') {
		document.getElementById('noms').selectedIndex = 0;
		updatePersonnes(document.getElementById('noms').value);
	}
}

if (window.addEventListener) {
	window.addEventListener("load", initForm, false);
} else if (window.attachEvent){
	window.attachEvent("onload", initForm);
}

function dDebPart() {
  x=Calendrier('dDebCache',document.forms.saisie.dDebCache.value,'dDebAff');
}

function dFinPart() {
  x=Calendrier('dFinCache',document.forms.saisie.dFinCache.value,'dFinAff');
}

function sel_der() {
  document.forms.saisie.refPers2F.value = document.forms.saisie.refMax.value;
}

function copieDate() {
  document.forms.saisie.dFinAff.value = document.forms.saisie.dDebAff.value;
  document.forms.saisie.dFinCache.value = document.forms.saisie.dDebCache.value;
}

var xhr = getXMLHttpRequest();

//-->
</script>
