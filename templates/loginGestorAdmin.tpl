<article>
	<h1>GESTOR DE ADMINISTRACION</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Control de Usuario</h2>
		</div>
		<h3>Completa el Formulario Para Iniciar Sesion</h3>
		<div class="gestor-admin">
			<form id="form_login" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
						<input class="form-control" type="text" maxlength="40" id="usuario" name="usuario" placeholder="Usuario">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
						<input class="form-control" type="password" maxlength="40" id="password" name="password" placeholder="Password">
					</div>
				</div>
				<div id="contenedor-alertas-login" class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3">
					<!-- Alertas Login -->
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
						<button type="submit" class="btn btn-success" id="acceder" disabled="disabled">Acceder</button>
					</div>
				</div>
			</form>
		</div>
	</section>
</article>
<!--//// JS DE MUSTACHE ////-->
	<script type="text/javascript" src="libs/mustache/mustache.min.js"></script>
<!--//// JS DEL LOGIN ////-->
	<script type="text/javascript" src="js/login.js"></script>