// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Funcion que Agrega una Categoria por Medio de la API Categorias
	function agregarCategoria(formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'api/categoria',
			success: function(id){
						if(id === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(id === 'error'){
							crearAlertaCategoria('alert-danger', 'Error al Crear la Categoria: Nombre Duplicado.');
						} else {
							if($('#tablaCategorias .noCategoria')){
								$('#tablaCategorias .noCategoria').remove();
								$('#id_categoria .noCategoria').remove();
							};
							var categoria = {'id': id, 'nombre': $('#categoria').val()};
							crearItemTablaCategoria(categoria);
							crearItemDesplegableCategoria(categoria);
							crearAlertaCategoria('alert-success', 'Categoria Creada Exitosamente.');
							$('#form_categoria')[0].reset();
							validarInputsCategoria();
						};
					},
			error: function(){
						crearAlertaCategoria('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Modifica una Categoria por Medio de la API Categorias
	function modificarCategoria(id, formData){
		$.ajax({
			type: 'PUT',
			data: JSON.stringify(formData),
			contentType: false,
			processData: false,
			url: 'api/categoria/' + id,
			success: function(estado){
						if(estado === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(estado === 'error'){
							crearAlertaCategoria('alert-danger', 'Error al Modificar la Categoria: Nombre Duplicado.');
						} else {
							$('#tablaCategorias .categoria' + id + " td:nth-child(2)").text(formData.categoria);
							$('#form_noticia .categoria' + id).text(formData.categoria);
							crearAlertaCategoria('alert-success', 'Categoria Modificada Exitosamente.');
							$('#form_categoria')[0].reset();
							validarInputsCategoria();
						};
					},
			error: function(){
						crearAlertaCategoria('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Elimina la Categoria Indicada por Medio de la API Categorias
	function eliminarCategoria(id){
		$.ajax({
			type: 'DELETE',
			url: 'api/categoria/' + id,
			success: function(estado){
						if(estado === 'sesionCaducada'){
							$('#gestor-admin').click();
						} else if(estado === 'error'){
							crearAlertaCategoria('alert-danger', 'Error al Eliminar la Categoria: Noticias Asociadas.');
						} else {
							$('.categoria' + id).remove();
							if(!$('#tablaCategorias').children().length){
								crearNoItemTablaCategoria();
								crearNoItemDesplegableCategoria();
							};
							crearAlertaCategoria('alert-success', 'Categoria Eliminada Exitosamente.');
						};
					},
			error: function(){
						crearAlertaCategoria('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Lee la Lista de Categorias por Medio de la API Categorias
	function leerCategorias(){
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: 'api/categoria',
			success: function(categorias){
						if(categorias[0]){
							$('#tablaCategorias #noCategoria').remove();
							for(var key in categorias){
								crearItemTablaCategoria(categorias[key]);
								crearItemDesplegableCategoria(categorias[key]);
							}
						} else {
							crearNoItemTablaCategoria();
							crearNoItemDesplegableCategoria();
						};
					},
			error: function(){
						crearAlertaCategoria('alert-danger', 'Error de Comunicacion con la API.');
					}
		});
	};

	// Funcion que Crea un Item y lo Añade a la Tabla de Categorias
	function crearItemTablaCategoria(categoria){
		$.ajax({
			url: 'js/templates/categoria/itemTablaCategoria.mst',
			success: function(template){
						var categoriaItem = Mustache.render(template, categoria);
						$('#tablaCategorias').append(categoriaItem);
					 }
		});
	};

	// Funcion que Crea un Item para Cuando no Hay Categorias y lo Añade a la Tabla de Categorias
	function crearNoItemTablaCategoria(){
		$.ajax({
			url: 'js/templates/categoria/noItemTablaCategoria.mst',
			success: function(template){
						var categoriaItem = Mustache.render(template);
						$('#tablaCategorias').append(categoriaItem);
					 }
		});
	};

	// Funcion que Crea un Item y lo Añade al Desplegable de Categorias
	function crearItemDesplegableCategoria(categoria){
		$.ajax({
			url: 'js/templates/categoria/itemDesplegableCategoria.mst',
			success: function(template){
						var categoriaItem = Mustache.render(template, categoria);
						$('#id_categoria').append(categoriaItem);
					 }
		});
	};

	// Funcion que Crea un Item para Cuando no Hay Categorias y lo Añade al Desplegable de Categorias
	function crearNoItemDesplegableCategoria(){
		$.ajax({
			url: 'js/templates/categoria/noItemDesplegableCategoria.mst',
			success: function(template){
						var categoriaItem = Mustache.render(template);
						$('#id_categoria').append(categoriaItem);
					 }
		});
	};

	// Funcion que Crea una Alerta del Tipo y Mensaje Indicado y lo Añade al Contenedor de Alertas de Categorias
	function crearAlertaCategoria(tipo, mensaje){
		$.ajax({
			url: 'js/templates/categoria/alertaCategoria.mst',
			success: function(template){
						var parametros = {'tipo': tipo, 'mensaje': mensaje};
						var alertaCategoria = Mustache.render(template, parametros);
						$('#contenedor-alertas-categoria').empty();
						$('#contenedor-alertas-categoria').append(alertaCategoria);
					 }
		});
	};

	// Valida los Inputs del Formulario de Categoria
	function validarInputsCategoria(){
		var categoria = $('#categoria').val();
		if(categoria.length > 4){
			$('#agregarCategoria').removeAttr('disabled');
			$('.modificar-categoria').removeAttr('disabled');
		} else {
			$('#agregarCategoria').attr('disabled', 'disabled');
			$('.modificar-categoria').attr('disabled', 'disabled');
		};
	};

	// Dispara la Funcion que Valida los Inputs del Formulario de Categoria
	$('#categoria').on('input', function(event){
		event.preventDefault();
		validarInputsCategoria();
	});

	// Dispara la Funcion que Envia la Solicitud para Crear una Categoria
	$('#form_categoria').on('submit', function(event){
		event.preventDefault();
		agregarCategoria(new FormData(this));
	});

	// Clona la Informacion de la Categoria en el Formulario para Poder Modificarla
	$('#tablaCategorias').on('click', '.clonar-categoria', function(event){
		event.preventDefault();
		$('#categoria').val($('#tablaCategorias .categoria' + $(this).val() + " td:nth-child(2)").text());
		validarInputsCategoria();
		$('#agregarCategoria').attr('disabled', 'disabled');
	});

	// Dispara la Funcion que Envia la Solicitud para Modificar la Categoria
	$('#tablaCategorias').on('click', '.modificar-categoria', function(event){
		event.preventDefault();
		var formData = {'categoria': $('#categoria').val()};
		if(confirm('¿Desea Modificar la Categoria con ID ' + $(this).val() + '?')){
			modificarCategoria($(this).val(), formData);
		};
	});

	// Dispara la Funcion que Envia la Solicitud para Eliminar la Categoria
	$('#tablaCategorias').on('click', '.eliminar-categoria', function(event){
		event.preventDefault();
		if(confirm('¿Desea Borrar la Categoria con ID ' + $(this).val() + '?')){
			eliminarCategoria($(this).val());
		};
	});

	// Carga las Categorias al Inicializarse el JS
	leerCategorias();

});