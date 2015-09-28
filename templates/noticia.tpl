<article>
	<h1>NOTICIAS</h1>
		{if !empty($noticia)}
			<section>
				<div class="page-header cabecera-seccion">
					<h2>{$noticia.titulo}</h2>
					<h4>Publicado el {$noticia.fecha} a las {$noticia.hora} UTC-03:00 en {$noticia.nombreCategoria}</h4>
				</div>
				<p>{$noticia.contenido}</p>
			</section>
		{else}
			<section>
				<div class="page-header cabecera-seccion">
					<h2>No Se Pudo Cargar la Noticia</h2>
				</div>
				<p>Sin Contenido</p>
			</section>
		{/if}
</article>