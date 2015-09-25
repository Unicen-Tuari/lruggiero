<article>
	<h1>GESTOR DE NOTICIAS</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Categorias</h2>
		</div>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>CATEGORIA</th>
				</tr>
			</thead>
			<tbody>
				{foreach $categorias as $categoria}
					<tr>
						<td>{$categoria.id}</td>
						<td>{$categoria.nombre}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		<p>Completa el Formulario para Poder Crear una Nueva Categoria.</p>
		<div class="gestor-admin">
			<form class="form-horizontal" role="form" action="index.php?action=agregarCategoria" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="40" id="categoria" name="categoria" placeholder="Nombre de la Categoria">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Restablecer</button>
						<button type="submit" class="btn btn-success">Crear Categoria</button>
					</div>
				</div>
			</form>
		</div>
	</section>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Crear Noticia</h2>
		</div>
		<p>Completa el Formulario para Poder Crear una Nueva Noticia.</p>
		<div class="gestor-admin">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="40" name="titulo" placeholder="Titulo de la Noticia">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<textarea class="form-control" maxlength="200" rows="8" name="texto" placeholder="Texto de la Noticia"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="btn btn-default" type="file" name="imagen">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Restablecer</button>
						<button type="submit" class="btn btn-success">Crear Noticia</button>
					</div>
				</div>
			</form>
		</div>
	</section>
</article>