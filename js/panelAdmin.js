// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
	// Definicion de Variable
	var inicio = 'inicio';


// Valida los Inputs del Formulario de Categoria
	function validarInputsCategoria(){
		var extencion = imagen.value.match(/\.([^\.]+)$/)[1];

				document.getElementById('archivo-subida').className = 'btn btn-success center-block';
				document.getElementById('cargar-imagen').className = 'btn btn-primary';
				
				document.getElementById('archivo-subida').className = 'btn btn-danger center-block';
				document.getElementById('cargar-imagen').className = 'btn btn-primary disabled';
			

	};

// Valida los Inputs del Formulario de Noticia
	function validarInputsNoticia(){
		var extencion = imagen.value.match(/\.([^\.]+)$/)[1];

				document.getElementById('archivo-subida').className = 'btn btn-success center-block';
				document.getElementById('cargar-imagen').className = 'btn btn-primary';
				
				document.getElementById('archivo-subida').className = 'btn btn-danger center-block';
				document.getElementById('cargar-imagen').className = 'btn btn-primary disabled';
			

	};

// Dispara la Funcion que Valida la Imagen Seleccionada
	$('#archivo-subida').on('change', function(event){
		event.preventDefault();
		validarImagen(this);
	});

});