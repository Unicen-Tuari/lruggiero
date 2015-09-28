// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
// Definicion de Variables con los Nombres de las Secciones
	var categoria = '';
	var id_categoria = '';
	var titulo = '';
	var contenido = '';

// Valida los Inputs del Formulario de Categoria
	function validarInputsCategoria(){
		categoria = document.getElementById('categoria').value;
		if (categoria.length > 4){
			$('#agregarCategoria').removeAttr('disabled');
		} else {
			$('#agregarCategoria').attr('disabled', 'disabled');
		};
	};

// Valida los Inputs del Formulario de Noticia
	function validarInputsNoticia(){
		id_categoria = document.getElementById('id_categoria').value;
		titulo = document.getElementById('titulo').value;
		contenido = document.getElementById('contenido').value;
		if (id_categoria > 0 && titulo.length > 9 && contenido.length > 139){
			$('#agregarNoticia').removeAttr('disabled');
		} else {
			$('#agregarNoticia').attr('disabled', 'disabled');
		};
	};

// Dispara la Funcion que Valida los Inputs del Formulario de Categoria
	$('#categoria').on('input', function(event){
		event.preventDefault();
		validarInputsCategoria();
	});

// Dispara la Funcion que Valida los Inputs del Formulario de Noticia
	$('#id_categoria, #titulo, #contenido').on('input', function(event){
		event.preventDefault();
		validarInputsNoticia();
	});

});