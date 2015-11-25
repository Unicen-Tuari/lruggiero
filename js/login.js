// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Funcion que Envia la Solicitud de Inicio de Sesion
	function iniciarSesion(formData){
		$.ajax({
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			url: 'index.php?action=iniciarSesion',
			success: function(retorno){
						if(retorno === 'error'){
							crearAlertaLogin('alert-danger', 'Error al Iniciar Sesion: Usuario y/o Password Incorrectos.');
						} else {
							$('#contenedor-principal').html(retorno);
						};
					},
			error: function(){
						crearAlertaLogin('alert-danger', 'Error al Procesar la Solicitud.');
					}
		});
	};

	// Funcion que Crea una Alerta del Tipo y Mensaje Indicado y lo Añade al Contenedor de Alertas de Login
	function crearAlertaLogin(tipo, mensaje){
		$.ajax({
			url: 'js/templates/login/alertaLogin.mst',
			success: function(template){
						var parametros = {'tipo': tipo, 'mensaje': mensaje};
						var alertaLogin = Mustache.render(template, parametros);
						$('#contenedor-alertas-login').empty();
						$('#contenedor-alertas-login').append(alertaLogin);
					 }
		});
	};

	// Valida los Inputs del Formulario de Login
	function validarInputsLogin(){
		var usuario = $('#usuario').val();
		var password = $('#password').val();
		if(usuario.length > 4 && password.length > 5){
			$('#acceder').removeAttr('disabled');
		} else {
			$('#acceder').attr('disabled', 'disabled');
		};
	};

	// Dispara la Funcion que Valida los Inputs del Formulario de Login
	$('#usuario, #password').on('input', function(event){
		event.preventDefault();
		validarInputsLogin();
	});

	// Dispara la Funcion que Envia la Solicitud para Iniciar Sesion
	$('#form_login').on('submit', function(event){
		event.preventDefault();
		iniciarSesion(new FormData(this));
	});

});