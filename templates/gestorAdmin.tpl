<article>
	<h1>GESTOR DE NOTICIAS</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Categorias</h2>
		</div>
		<h3>Completa el Formulario y Agrega una Categoria o Modifica una Existente</h3>
		<div class="gestor-admin">
			<form id="form_categoria" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="40" id="categoria" name="categoria" placeholder="Nombre de la Categoria (Minimo 5 Caracteres)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Limpiar</button>
						<button type="submit" class="btn btn-success" id="agregarCategoria" disabled="disabled">Agregar Categoria</button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-responsive">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div id="contenedor-alertas-categoria">
					<!-- Alertas Categoria -->
				</div>
				<table class="table table-bordered table-condensed tabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>CATEGORIA</th>
							<th>MODIFICAR</th>
							<th>ELIMINAR</th>
						</tr>
					</thead>
					<tbody id="tablaCategorias">
						<!-- Categorias -->
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Noticias</h2>
		</div>
		<h3>Completa el Formulario para Poder Agregar una Nueva Noticia</h3>
		<div class="gestor-admin">
			<form  id="form_noticia" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<select id="id_categoria" name="id_categoria" class="form-control">
							<option value="0" selected disabled>Seleccione la Categoria de la Noticia</option>
							<!-- Categorias -->
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="80" id="titulo" name="titulo" placeholder="Titulo de la Noticia (Minimo 10 Caracteres)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<textarea class="form-control" maxlength="5000" rows="8" id="contenido" name="contenido" placeholder="Texto de la Noticia (Minimo 140 Caracteres)"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<input class="btn btn-default" type="file" id="imagenes" name="imagenes[]" multiple>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Limpiar</button>
						<button type="submit" class="btn btn-success" id="agregarNoticia" disabled="disabled">Agregar Noticia</button>
					</div>
				</div>
			</form>
			<form id="form_imagen_ajax">
				<input type="file" id="imagenesAjax" name="imagenesAjax[]" multiple>
			</form>
		</div>
		<div class="table-responsive">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div id="contenedor-alertas-noticia">
					<!-- Alertas Noticia -->
				</div>
				<table class="table table-bordered table-condensed tabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>CATEGORIA</th>
							<th>TITULO</th>
							<th>IMAGENES</th>
							<th>FECHA</th>
							<th>HORA</th>
							<th>VISUALIZAR</th>
							<th>MODIFICAR</th>
							<th>ELIMINAR</th>
						</tr>
					</thead>
					<tbody id="tablaNoticias">
						<!-- Noticias -->
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<button class="btn btn-primary center-block" id="cerrar-sesion">Cerrar Sesion</button>
</article>
<!--//// JS DE MUSTACHE ////-->
	<script type="text/javascript" src="libs/mustache/mustache.min.js"></script>
<!--//// JS DE CATEGORIAS ////-->
	<script type="text/javascript" src="js/categorias.js"></script>
<!--//// JS DE NOTICIAS ////-->
	<script type="text/javascript" src="js/noticias.js"></script>
<!--//// JS DE NOTICIA COMPLETA ////-->
	<script type="text/javascript" src="js/noticiaFull.js"></script>
<!--//// JS DE LOGIN ////-->
	<script type="text/javascript" src="js/login.js"></script>