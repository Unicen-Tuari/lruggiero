// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
// Definicion de Variables
	var nombre = '';
	var email = '';
	var consulta = '';
	var formContacto = 'agregarConsulta';
	var inicio = 'inicio';

// Valida los Inputs del Formulario de Categoria
	function validarInputsContacto(){
		nombre = $('#nombre').val();
		email = $('#email').val();
		consulta = $('#consulta').val();
		if(nombre.length > 1 && email.length > 5 && consulta.length > 49){
			$('#enviarConsulta').removeAttr('disabled');
		} else {
			$('#enviarConsulta').attr('disabled', 'disabled');
		};
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

/* Funcion que Envia los Datos del Formulario
   Indicado para Ser Procesados */
	function procesarFormulario(accion, formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'index.php?action=' + accion,
			success: function(data){
						window.prompt('El N° de Tracking de su Consulta es: ', data);
						cargarSeccion(inicio);
					},
			error: function(){
						alert('Error al Procesar el Formulario');
					}
		});
	};

// Dispara la Funcion que Valida los Inputs del Formulario de Contacto
	$('#nombre, #consulta').on('input', function(event){
		event.preventDefault();
		validarInputsContacto();
	});

// Dispara la Funcion que Envia los Datos del Formulario de Contacto para Ser Procesados
	$('#form_contacto').on('submit', function(event){
		event.preventDefault();
		procesarFormulario(formContacto, new FormData(this));
	});

});