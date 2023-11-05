if(document.getElementById("registrar")){
	var modal = document.getElementById("registro");
	var boton = document.getElementById("registrar");
	var spam = document.getElementById("close");
	var body = document.getElementsByTagName("body");
	boton.onclick=function(){
		modal.style.display="block";
	}
	spam.onclick=function(){
		modal.style.display="none";
	}
}
$("#lista li").click(function (event) {
    var gen;
    gen=($(this).text());
    window.location.href="index.php?genero="+gen;
});

document.getElementById('buscar').onclick = function() {
    var value = document.getElementById('buscartexto').value;
    if (!value) {
    	alert("Ingrese parametro de busqueda");
    }else{
    	window.location.href="index.php?buscar="+value;
    }
    
}

