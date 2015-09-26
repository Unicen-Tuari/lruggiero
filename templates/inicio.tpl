<article>
	<h1>NOTICIAS</h1>
		{if !empty($noticias)}
			{foreach $noticias as $noticia}
				<section>
					<div class="page-header cabecera-seccion">
						<h2>{$noticia.titulo}<span>{$noticia.nombreCategoria}</span></h2>
					</div>
					<p>{$noticia.contenido}</p>
				</section>
			{/foreach}
		{else}
				<section>
					<div class="page-header cabecera-seccion">
						<h2>No Existen Noticias</h2>
					</div>
					<p>Sin Contenido</p>
				</section>
		{/if}
</article>