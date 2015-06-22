// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
	// Definicion de Variables con los Nombres de las Secciones
	inicio = 'inicio';
	actividades = 'actividades';
	galeria = 'galeria';
	contacto = 'contacto';

	/* Funcion que Carga en el Contenedor Principal la 
		Seccion que se le pase como Parametro */
	function cargarSeccion(seccion){
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: seccion + '.html',
			success: function(data){
						$('#contenedor-principal').html(data);
					},
			error: function(){
						alert('Error al Cargar la Pagina de ' + seccion);
					}
		});
	};

	// Carga la Pagina de Inicio al Ingresar o Recargar el Sitio
	cargarSeccion(inicio);

	// Carga la Seccion Inicio al Presionar Inicio en el NAV
	$('#inicio').on('click', function(event){
		event.preventDefault();
		$(".nav").find(".active").removeClass("active");
		$(this).addClass("active");
		cargarSeccion(inicio);
	});

	// Carga la Seccion Actividades al Presionar Actividades en el NAV
	$('#actividades').on('click', function(event){
		event.preventDefault();
		$(".nav").find(".active").removeClass("active");
		$(this).addClass("active");
		cargarSeccion(actividades);
	});

	// Carga la Seccion Galeria al Presionar Galeria en el NAV
	$('#galeria').on('click', function(event){
		event.preventDefault();
		$(".nav").find(".active").removeClass("active");
		$(this).addClass("active");
		cargarSeccion(galeria);
	});

	// Carga la Seccion Contacto al Presionar Contacto en el NAV
	$('#contacto').on('click', function(event){
		event.preventDefault();
		$(".nav").find(".active").removeClass("active");
		$(this).addClass("active");
		cargarSeccion(contacto);
	});
});