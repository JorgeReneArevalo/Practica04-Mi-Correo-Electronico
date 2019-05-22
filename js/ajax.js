

function buscarPorCedula() {
	
    var buscar= document.getElementById("caja_busqueda").value;
    var usuario= document.getElementById("usuario").value;

	if (buscar == "") {
		document.getElementById("informacion").innerHTML="";
	}else{
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}else{
			//CODE FOR FIREFOX, OPERA
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status ==200) {
				//alet("llegue");
				document.getElementById('informacion').innerHTML=this.responseText;
			}
		};
		///RESPECTO AL INDEX
		xmlhttp.open("GET","buscar.php?valorBuscar="+buscar+ "&"+"usuario="+usuario,true);
		xmlhttp.send();
		
	}
	return false;
}

function buscarPorCedula2() {
	
    var buscar= document.getElementById("caja_busqueda2").value;
    var usuario= document.getElementById("usuario").value;

	if (buscar == "") {
		document.getElementById("informacion").innerHTML="";
	}else{
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}else{
			//CODE FOR FIREFOX, OPERA
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if (this.readyState==4 && this.status ==200) {
				//alet("llegue");
				document.getElementById('informacion').innerHTML=this.responseText;
			}
		};
		///RESPECTO AL INDEX
		xmlhttp.open("GET","buscar2.php?valorBuscar="+buscar+ "&"+"usuario="+usuario,true);
		xmlhttp.send();
		
	}
	return false;
}






