<article>
	<h1>CONTACTO</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Formulario de Contacto</h2>
		</div>
		<h3>Dejanos tu inquietud y con gusto responderemos a la brevedad.</h3>
		<div class="contacto">
			<form id="form_contacto" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<h6>* Campos Obligatorios</h6>
						<input class="form-control" type="text" maxlength="100" id="nombre" name="nombre" placeholder="* Nombre Real">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="100" id="nick" name="nick" placeholder="Nick en el Server">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<input class="form-control" type="email" maxlength="100" id="email" name="email" placeholder="* Direccion de E-Mail">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="100" id="ubicacion" name="ubicacion" placeholder="Ubicacion Geografica">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<textarea class="form-control" maxlength="1000" rows="8" id="consulta" name="consulta" placeholder="* Texto de la Consulta (Minimo 50 Caracteres)"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Limpiar</button>
						<button type="submit" class="btn btn-success" id="enviarConsulta" disabled="disabled">Enviar Consulta</button>
					</div>
				</div>
			</form>
		</div>
	</section>
</article>
<!--//// JS DE CONTACTO ////-->
	<script type="text/javascript" src="js/contacto.js"></script>