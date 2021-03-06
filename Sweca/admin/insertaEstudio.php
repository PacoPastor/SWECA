<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SWECA</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/Sweca.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <link rel="apple-touch-icon" sizes="57x57" href="../img/favico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../img/favico//apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../img/favico//apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../img/favico//apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../img/favico//apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../img/favico//apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../img/favico//apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../img/favico//apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../img/favico//apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../img/favico//android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../img/favico//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../img/favico//favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favico//favicon-16x16.png">
	<link rel="manifest" href="../img/favico//manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../img/favico/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">SWECA 2016</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="estadisticas.php">Estadísticas</a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Insertar <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="insertaEstudio.php">Estudio</a></li>
                        <li><a href="insertaDimension.php">Dimensión</a></li>
                        <li><a href="insertaPregunta.php">Pregunta</a></li>
                        <li><a href="insertaRespuesta.php">Respuesta</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br><br><br>
		<div class="well col-md-offset-1">
			<h2>Insertar nuevo estudio</h2>
			<form action="estudioEnviado.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nombre del estudio:</label>
                <input class="user_entrada" type="text" name="nombre" placeholder="Nombre de estudio" >
            </div>
			<p><label><input class='btn btn-primary' type="submit" name="end_insert" value="Insertar en la BD"></label></p>
			</form>
		</div>
   <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">

                        <li>
                            <a href="../index.html">Inicio</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="estadisticas.php">Estadísticas</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <div class="dropup">
                                <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">Insertar
                                <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="insertaEstudio.php">Estudio</a></li>
                                    <li><a href="insertaDimension.php">Dimensión</a></li>
                                    <li><a href="insertaPregunta.php">Pregunta</a></li>
                                    <li><a href="insertaRespuesta.php">Respuesta</a></li>
                                  </ul>
                                  </ul>
                              </div>
                            </div>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; GestionaStock S.A &amp; JulyTheFrog. <br>All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

<!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>