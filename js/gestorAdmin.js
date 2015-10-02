// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
// Definicion de Variables
	var id_categoria = '';
	var categoria = '';
	var id_noticia = '';
	var titulo = '';
	var contenido = '';
	var formCategoria = 'agregarCategoria';
	var eliminarCategoria = 'eliminarCategoria';
	var formNoticia = 'agregarNoticia';
	var eliminarNoticia = 'eliminarNoticia';
	var formImagenes = 'agregarImagenes';
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

	/* Funcion que Envia los Datos del Formulario
		de Imagenes Ajax para Ser Procesados */
	function procesarFormularioImagenesAJax(accion, id_noticia, formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'index.php?action=' + accion + '&id_noticia=' + id_noticia,
			success: function(){
						cargarSeccion(gestorAdmin);
					},
			error: function(){
						alert('Error al Procesar el Formulario');
					}
		});
	};

	/* Funcion que Envia los Datos del Formulario
		de Imagenes Ajax para Ser Procesados */
	function eliminarElemento(accion, id){
		$.ajax({
			type: 'POST',
			dataType: 'HTML',
			url: 'index.php?action=' + accion + '&id=' + id,
			success: function(data){
						if(data == 'errorEliminarCategoria'){
							$('#contenedor-alerta-categorias').append('<div id="alerta-categorias"></div>');
							$('#alerta-categorias').addClass('alert alert-danger fade in');
							$('#alerta-categorias').append('<a id="cerrar-alerta-categoria">&times;</a>');
							$('#cerrar-alerta-categoria').addClass('close');
							$('#cerrar-alerta-categoria').attr('href', '#');
							$('#cerrar-alerta-categoria').attr('data-dismiss', 'alert');
							$('#cerrar-alerta-categoria').attr('aria-label', 'close');
							$('#alerta-categorias').append('No se Puede Eliminar la Categoria; Contiene Noticias Asociadas.');
						} else {
							cargarSeccion(gestorAdmin);
						};
					},
			error: function(){
						alert('Error al Enviar la Solicitud');
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

// Dispara la Funcion que Envia los Datos del Formulario de Categoria para Ser Procesados
	$('#form_categoria').on('submit', function(event){
		event.preventDefault();
		procesarFormulario(formCategoria, new FormData(this));
	});

// Dispara la Funcion que Envia la Solicitud para Eliminar la Categoria
	$('.eliminar-categoria').on('click', function(event){
		event.preventDefault();
		if(confirm('¿Desea Borrar la Categoria con ID ' + $(this).val() + '?')){
			eliminarElemento(eliminarCategoria, $(this).val());
		};
	});

// Dispara la Funcion que Envia los Datos del Formulario de Noticia para Ser Procesados
	$('#form_noticia').on('submit', function(event){
		event.preventDefault();
		procesarFormulario(formNoticia, new FormData(this));
	});

// Dispara la Funcion que Envia la Solicitud para Eliminar la Noticia
	$('.eliminar-noticia').on('click', function(event){
		event.preventDefault();
		if(confirm('¿Desea Borrar la Noticia con ID ' + $(this).val() + '?')){
			eliminarElemento(eliminarNoticia, $(this).val());
		};
	});

// Dispara el Prompt de un Input File Oculto para Seleccionar las Imagenes
	$('.boton-imagen-ajax').on('click', function(event){
		event.preventDefault();
		id_noticia = $(this).val();
		$('#imagenesAjax').click();
	});

// Dispara el Envio del Formulario para Cargar una Imagen con Ajax
	$('#imagenesAjax').on('change', function(event){
		event.preventDefault();
		$('#form_imagen_ajax').submit();
	});

// Dispara la Funcion que Envia los Datos del Formulario de Imagen para Ser Procesados
	$('#form_imagen_ajax').on('submit', function(event){
		event.preventDefault();
		procesarFormularioImagenesAJax(formImagenes, id_noticia, new FormData(this));
	});

});