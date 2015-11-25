// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Funcion que Envia los Datos del Formulario para Ser Procesados
	function enviarConsulta(formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'index.php?action=agregarConsulta',
			success: function(retorno){
						if(!retorno){
							confirm('Consulta Enviada Exitosamente: Recibira un e-mail a la Brevedad.');
						} else {
							confirm('Se ha Producido un Error al Enviar la Consulta.');
						};
						$('#inicio').click();
					},
			error: function(){
						alert('Error al Procesar el Formulario');
					}
		});
	};

	// Valida los Inputs del Formulario de Categoria
	function validarInputsContacto(){
		var nombre = $('#nombre').val();
		var email = $('#email').val();
		var consulta = $('#consulta').val();
		if(nombre.length > 1 && email.length > 5 && consulta.length > 49){
			$('#enviarConsulta').removeAttr('disabled');
		} else {
			$('#enviarConsulta').attr('disabled', 'disabled');
		};
	};

	// Dispara la Funcion que Valida los Inputs del Formulario de Contacto
	$('#nombre, #consulta').on('input', function(event){
		event.preventDefault();
		validarInputsContacto();
	});

	// Dispara la Funcion que Envia los Datos del Formulario de Contacto para Ser Procesados
	$('#form_contacto').on('submit', function(event){
		event.preventDefault();
		enviarConsulta(new FormData(this));
	});

});