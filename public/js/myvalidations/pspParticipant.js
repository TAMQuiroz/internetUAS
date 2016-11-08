
var sel = document.getElementById('sel');
sel.onchange = function () {
	var comp = this.value;
	
	if(comp.localeCompare("0")!=0){
		document.getElementById("ruta").href = "supervisor/participant/" + comp ;	
	}
	else{
		document.getElementById("ruta").href = "" ;	
	}
}

