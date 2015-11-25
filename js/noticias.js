// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Funcion que Agrega una Noticia por Medio de la API Noticias
	function agregarNoticia(formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'api/noticia',
			success: function(datos){
						if(datos === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(datos === 'error'){
							crearAlertaNoticia('alert-danger', 'Error al Crear la Noticia: Titulo Duplicado.');
						} else {
							if($('#tablaNoticias .noNoticia')){
								$('#tablaNoticias .noNoticia').remove();
							};
							var noticia = {'id': datos.id,
										   'id_categoria': $('#id_categoria').val(),
   										   'nombreCategoria': $('#id_categoria option:selected').text(),
										   'titulo': $('#titulo').val(),
										   'contenido': $('#contenido').val(),
										   'cantidadImagenes': $('#imagenes').get(0).files.length,
										   'fecha': datos.fecha,
										   'hora': datos.hora};
							crearItemTablaNoticia(noticia);
							crearAlertaNoticia('alert-success', 'Noticia Creada Exitosamente.');
							$('#form_noticia')[0].reset();
							validarInputsNoticia();
						};
						
					},
			error: function(){
						crearAlertaNoticia('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Agrega Imagenes a una Noticia Existente por Medio de la API Noticias
	function agregarImagenesAJax(id, formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'api/noticia/' + id,
			success: function(estado){
						if(estado === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(estado === 'error'){
							crearAlertaNoticia('alert-danger', 'Error al Agregar Imagenes a la Noticia.');
						} else {
							cantidadImagenes = parseInt($('#tablaNoticias .noticia' + id + " td:nth-child(4) .cantidad").text());
							cantidadImagenes = cantidadImagenes + $('#imagenesAjax').get(0).files.length;
							$('#tablaNoticias .noticia' + id + " td:nth-child(4) .cantidad").text(cantidadImagenes);
							crearAlertaNoticia('alert-success', 'Imagenes Agregadas a la Noticia Exitosamente.');
						}
					},
			error: function(){
						crearAlertaNoticia('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Modifica una Noticia por Medio de la API Noticias
	function modificarNoticia(id, formData){
		$.ajax({
			type: 'PUT',
			data: JSON.stringify(formData),
			contentType: false,
			processData: false,
			url: 'api/noticia/' + id,
			success: function(estado){
						if(estado === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(estado === 'error'){
							crearAlertaNoticia('alert-danger', 'Error al Modificar la Noticia: Nombre Duplicado.');
						} else {
							$('#tablaNoticias .noticia' + id + " td:nth-child(2)").text($('#id_categoria option:selected').text());
							$('#tablaNoticias .noticia' + id + " td:nth-child(3)").text($('#titulo').val());
							$('#tablaNoticias .noticia' + id).attr('data-contenido', $('#contenido').val());
							crearAlertaNoticia('alert-success', 'Noticia Modificada Exitosamente.');
							$('#form_noticia')[0].reset();
							validarInputsNoticia();
						};
					},
			error: function(){
						crearAlertaNoticia('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Elimina la Noticia Indicada por Medio de la API Noticias
	function eliminarNoticia(id){
		$.ajax({
			type: 'DELETE',
			url: 'api/noticia/' + id,
			success: function(estado){
						if(estado === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(estado === 'error'){
							crearAlertaNoticia('alert-danger', 'Error al Eliminar la Noticia.');
						} else {
							$('.noticia' + id).remove();
							if(!$('#tablaNoticias').children().length){
								crearNoItemTablaNoticia();
							};
							crearAlertaNoticia('alert-success', 'Noticia Eliminada Exitosamente.');
						};
					},
			error: function(){
						crearAlertaNoticia('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Lee la Lista de Noticias por Medio de la API Noticias
	function leerNoticias(){
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: 'api/noticia',
			success: function(noticias){
						if(noticias[0]){
							$('#tablaNoticias #noNoticia').remove();
							for(var key in noticias){
								crearItemTablaNoticia(noticias[key]);
							}
						} else {
							crearNoItemTablaNoticia();
						};
					},
			error: function(){
						crearAlertaNoticia('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Crea un Item y lo Añade a la Tabla de Noticias
	function crearItemTablaNoticia(noticia){
		$.ajax({
			url: 'js/templates/noticia/itemTablaNoticia.mst',
			success: function(template){
						var noticiaItem = Mustache.render(template, noticia);
						$('#tablaNoticias').append(noticiaItem);
					 }
		});
	};

	// Funcion que Crea un Item para Cuando no Hay Noticias y lo Añade a la Tabla de Noticias
	function crearNoItemTablaNoticia(){
		$.ajax({
			url: 'js/templates/noticia/noItemTablaNoticia.mst',
			success: function(template){
						var noticiaItem = Mustache.render(template);
						$('#tablaNoticias').append(noticiaItem);
					 }
		});
	};

	// Funcion que Crea una Alerta del Tipo y Mensaje Indicado y lo Añade al Contenedor de Alertas de Noticias
	function crearAlertaNoticia(tipo, mensaje){
		$.ajax({
			url: 'js/templates/noticia/alertaNoticia.mst',
			success: function(template){
						var parametros = {'tipo': tipo, 'mensaje': mensaje};
						var alertaNoticia = Mustache.render(template, parametros);
						$('#contenedor-alertas-noticia').empty();
						$('#contenedor-alertas-noticia').append(alertaNoticia);
					 }
		});
	};

	// Valida los Inputs del Formulario de Noticia
	function validarInputsNoticia(){
		id_categoria = $('#id_categoria').val();
		titulo = $('#titulo').val();
		contenido = $('#contenido').val();
		if(id_categoria > 0 && titulo.length > 9 && contenido.length > 139){
			$('#agregarNoticia').removeAttr('disabled');
			$('.modificar-noticia').removeAttr('disabled');
		} else {
			$('#agregarNoticia').attr('disabled', 'disabled');
			$('.modificar-noticia').attr('disabled', 'disabled');
		};
	};

	// Dispara la Funcion que Valida los Inputs del Formulario de Noticia
	$('#id_categoria, #titulo, #contenido').on('input', function(event){
		event.preventDefault();
		validarInputsNoticia();
	});

	// Dispara la Funcion que Envia la Solicitud para Crear una Noticia
	$('#form_noticia').on('submit', function(event){
		event.preventDefault();
		agregarNoticia(new FormData(this));
	});

	// Clona la Informacion de la Noticia en el Formulario para Poder Modificarla
	$('#tablaNoticias').on('click', '.clonar-noticia', function(event){
		event.preventDefault();
		$('#id_categoria').val($('#tablaNoticias .noticia' + $(this).val() + " td:nth-child(2)").attr('id'));
		$('#titulo').val($('#tablaNoticias .noticia' + $(this).val() + " td:nth-child(3)").text());
		$('#contenido').val($('.noticia' + $(this).val()).attr('data-contenido'));
		validarInputsNoticia();
		$('#agregarNoticia').attr('disabled', 'disabled');
	});

	// Dispara la Funcion que Envia la Solicitud para Modificar la Noticia
	$('#tablaNoticias').on('click', '.modificar-noticia', function(event){
		event.preventDefault();
		var formData = {'id_categoria': $('#id_categoria').val(),
					   'titulo': $('#titulo').val(),
					   'contenido': $('#contenido').val()};
		if(confirm('¿Desea Modificar la Noticia con ID ' + $(this).val() + '?')){
			modificarNoticia($(this).val(), formData);
		};
	});

	// Dispara la Funcion que Envia la Solicitud para Eliminar la Noticia
	$('#tablaNoticias').on('click', '.eliminar-noticia', function(event){
		event.preventDefault();
		if(confirm('¿Desea Borrar la Noticia con ID ' + $(this).val() + '?')){
			eliminarNoticia($(this).val());
		};
	});

	// Dispara el Prompt de un Input File Oculto para Seleccionar las Imagenes
	var id_noticia = '';
	$('#tablaNoticias').on('click', '.boton-imagen-ajax', function(event){
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
		agregarImagenesAJax(id_noticia, new FormData(this));
	});

	// Carga las Noticias al Inicializarse el JS
	leerNoticias();

});