// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
// Definicion de Variables
	var categoria = '';
	var id_categoria = '';
	var titulo = '';
	var contenido = '';
	var formCategoria = 'agregarCategoria';
	var formNoticia = 'agregarNoticia';
	var gestorAdmin = 'gestorAdmin';

// Valida los Inputs del Formulario de Categoria
	function validarInputsCategoria(){
		categoria = $('#categoria').val();
		if (categoria.length > 4){
			$('#agregarCategoria').removeAttr('disabled');
		} else {
			$('#agregarCategoria').attr('disabled', 'disabled');
		};
	};

// Valida los Inputs del Formulario de Noticia
	function validarInputsNoticia(){
		id_categoria = $('#id_categoria').val();
		titulo = $('#titulo').val();
		contenido = $('#contenido').val();
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

	/* Funcion que Envia los Datos del Formulario
		Indicado para Ser Procesados */
	function procesarFormulario(accion, formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'index.php?action=' + accion,
			success: function(){
						cargarSeccion(gestorAdmin);
					},
			error: function(){
						alert('Error al Procesar el Formulario');
					}
		});
	};

	/* Funcion que Carga en el Contenedor Principal la 
		Seccion que se le pase como Parametro */
	function cargarSeccion(seccion){
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: 'index.php?action=' + seccion,
			success: function(data){
						$('#contenedor-principal').html(data);
					},
			error: function(){
						alert('Error al Cargar la Pagina de ' + seccion);
					}
		});
	};

// Dispara la Funcion que Envia los Datos del Formulario de Categoria para Ser Procesados
	$('#form_categoria').on('submit', function(event){
		event.preventDefault();
		procesarFormulario(formCategoria, new FormData(this));
	});

// Dispara la Funcion que Envia los Datos del Formulario de Noticia para Ser Procesados
	$('#form_noticia').on('submit', function(event){
		event.preventDefault();
		procesarFormulario(formNoticia, new FormData(this));
	});

});