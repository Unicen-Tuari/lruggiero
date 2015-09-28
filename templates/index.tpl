<!DOCTYPE html>
<html>
<head>
	<title>ENDURO TANDIL</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/imagenes/favicon.ico"/>
<!--//// CDN PARA CSS DE BOOTSTRAP ////-->
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/bootstrap.min.css">
<!--	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
<!--//// CSS PROPIO ////-->
	<link rel="stylesheet" type="text/css" href="css/default.css">
<!--//// CDN PARA JS DE JQUERY ////-->
	<script type="text/javascript" src="libs/jquery/jquery-1.11.3.min.js"></script>
<!--	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> -->
<!--//// CDN PARA JS DE BOOTSTRAP ////-->
	<script type="text/javascript" src="libs/bootstrap/bootstrap.min.js"></script>
<!--	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
<!--//// JS DEL MENU ////-->
	<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">

			<!-- BANNER PRINCIPAL -->
			<div class="hidden-xs col-md-10 col-md-offset-1">
				<header>
					<div id="myCarousel" class="carousel slide banner" data-ride="carousel">

						<!-- BOTONES SLIDES -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>
						<!-- FIN BOTONES SLIDES -->

						<!-- IMAGENES SLIDES-->
						<a href="/">
							<div class="carousel-inner" role="listbox">
								<div class="item active">
							 		<img src="css/imagenes/header.jpg" alt="Enduro Tandil 1">
								</div>

								<div class="item">
								 	<img src="css/imagenes/header.jpg" alt="Enduro Tandil 2">
								</div>

								<div class="item">
									<img src="css/imagenes/header.jpg" alt="Enduro Tandil 3">
								</div>
							</div>
						</a>
						<!-- FIN IMAGENES SLIDEES -->

					</div>
				</header>
			</div>
			<!-- FIN BANNER PRINCIPAL-->

		</div>
		<div class="row">

			<!-- BARRA DE NAVEGACION -->
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<nav class="navbar navbar-inverse menu">
					<div class="container-fluid">

						<!-- BOTONES COLAPSADOS -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle menu-resumen" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand navbar-toggle menu-home" data-toggle="collapse" href="/">ENDURO TANDIL</a>
						</div>
						<!-- FIN BOTONES COLAPSADOS -->

						<!-- BOTONES NORMALES -->
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav nav-justified menu-botonera">
								<li id="inicio" class="active"><a href="#">INICIO</a></li>
								<li id="actividades"><a href="#">ACTIVIDADES</a></li>
								<li id="galeria"><a href="#">GALERIA</a></li>
								<li id="contacto"><a href="#">CONTACTO</a></li>
							</ul>
						</div>
						<!-- FIN BOTONES NORMALES -->

					</div>
				</nav>
			</div>
			<!-- FIN BARRA DE NAVEGACION -->

		</div>
		<div class="row">

			<!-- CONTENEDOR PRINCIPAL -->
			<div id="contenedor-principal" class="col-xs-12 col-md-10 col-md-offset-1">
				<!-- ESTE CONTENEDOR SERA
					 LLENADO DESDE JS CON
					 LA SECCION CORRECTA
					 A MEDIDA QUE EL USUARIO
					 VAYA NAVEGANDO POR EL SITIO -->
			</div>
			<!-- FIN CONTENEDOR PRINCIPAL -->

		</div>
		<div class="row">
			<!-- FOOTER -->
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<footer class="pie-pagina">
					<button class="btn btn-default boton-admin" id="gestor-admin">Admin</button>
					<p>&copy Todos los Derechos Reservados</p>
				</footer>
			</div>
			<!-- FIN FOOTER -->

		</div> 
	</div>
</body>
</html>