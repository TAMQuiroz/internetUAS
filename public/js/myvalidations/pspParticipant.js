
var sel = document.getElementById('sel');
sel.onchange = function () {
    document.getElementById("ruta").href = "supervisor/participant/" + this.value ;
}

