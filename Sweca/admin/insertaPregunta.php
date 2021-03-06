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
	  <?php
        error_reporting(0);
  		$mysql_host = 'localhost';
			$mysql_username = 'root';
			$mysql_password = '';
			$mysql_db = 'p1sweca';
			$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_db) or die('Error en la conexión con el server MySQL: ' . mysqli_error());
			mysqli_set_charset($conn, "utf8");
			$env_estudio = $_POST['env_estudio'];
			$env_dim = $_POST['env_dim'];
			$end_insert = $_POST['end_insert'];
			$id_estudio = $_POST['id_estudio'];
			$id_dim = $_POST['id_dim'];
			$pregunta = $_POST['pregunta'];
			$tipoPregunta = $_POST['tipoPregunta'];
			$error = false;

			if(isset($env_estudio)){
				if(trim($id_estudio) == ""){
					$error = true;
					echo "Error al enviar el estudio.";
				}
			}if(isset($env_dim)){
				if(trim($id_dim) == ""){
					$error = true;
					echo "Error al enviar la dimension.";
				}
			}if(isset($end_insert)){
				if(trim($tipoPregunta) == ""){
					$error = true;
					echo "Error al enviar el tipo de pregunta.";
				}
				if(trim($pregunta) == ""){
					$error = true;
					echo "Error al enviar la pregunta.";
				}
			}
			if(isset($env_estudio) && !$error){
				if(isset($env_dim) && !$error){
					if(isset($end_insert) && !$error){
						$insert = "insert into Preguntas(id_dimension, id_tipoPregunta, pregunta) values('$id_dim', '$tipoPregunta', '$pregunta')";
						mysqli_query($conn, $insert) or (printf("%s", mysqli_error($conn)) and die ("Error al insertar Dimension_Nombre."));
						$querydim = "select nombre from Dimensiones where id='$id_dim'";
						$dimension = mysqli_query($conn, $querydim) or die ("Error al leer Dimension.");
						$nombre_dim = mysqli_fetch_array($dimension);
						echo "<h3>La nueva Pregunta '$pregunta',de la Dimensión '".$nombre_dim['nombre']."' se ha insertado correctamente.</h3>";
						mysqli_close($conn);
					}elseif(!isset($end_insert)){
						echo"<h2>Insertar nueva pregunta</h2>";
						echo "<form class='form-group' action='insertaPregunta.php' method='post' enctype='multipart/form-data'>";
						echo "<label><input type='hidden' name='env_estudio' value='$env_estudio'></label>";
						echo "<label><input type='hidden' name='id_estudio' value='$id_estudio'></label>";
						echo "<label><input type='hidden' name='env_dim' value='$env_dim'></label>";
						echo "<label><input type='hidden' name='id_dim' value='$id_dim'></label>";
						echo "<p class='insert_data'><label>Los Tipos de Preguntas disponibles son los siguientes:";
						$consulta = "select * from tipoPreguntas";
						$query = mysqli_query($conn, $consulta) or die("Error en consulta a la BD: tipoPregunta.");
						$restipo = mysqli_fetch_array($query);
						echo "<label class='radio col-md-offset-1'><input type='radio' name='tipoPregunta' value='".$restipo['id']."' checked>".$restipo['nombre']."</label>"; 
						while($restipo = mysqli_fetch_array($query)){
							echo "<label class='radio col-md-offset-1'><input type='radio' name='tipoPregunta' value=".$restipo['id'].">".$restipo['nombre']."</label>";
						}
						echo "</label></p>";
		?>
						<p><label>Describa su pregunta: <br><textarea class="form-control" name ='pregunta' cols='60' rows='5' placeholder='Escribe aquí la pregunta...'></textarea></label></p>
						<p><label><input class='btn btn-primary' type='submit' name='end_insert'></label></p></form>
			<?php
					
					}
				}elseif(!isset($env_dim)){
					echo"<h2>Insertar nueva pregunta</h2>";
					echo "<form class='form-group' action='insertaPregunta.php' method='post' enctype='multipart/form-data'>";
					echo "<label><input type='hidden' name='env_estudio' value='$env_estudio'></label>";
					echo "<label><input type='hidden' name='id_estudio' value='$id_estudio'></label>";
					echo "<p><label>Las Dimensiones disponibles son las siguientes:";
					$consulta = "select * from Dimensiones where id_Estudio='$id_estudio'";
					$query = mysqli_query($conn, $consulta) or die("Error en consulta a la BD: Preguntas.");
					$resdim = mysqli_fetch_array($query);
					echo "<label class='radio col-md-offset-1'><input type='radio' name='id_dim' value='".$resdim['id']."' checked>".$resdim['nombre']."</label>"; 
					while($resdim = mysqli_fetch_array($query)){
						echo "<label class='radio col-md-offset-1'><input type='radio' name='id_dim' value=".$resdim['id'].">".$resdim['nombre']."</label>";
					}
					echo "</label></p>";
					echo "<p><label><input class='btn btn-primary' type='submit' name='env_dim' value='Siguiente'></label></p></form>";
					
				}
			}elseif(!isset($env_estudio)){
				echo"<h2>Insertar nueva pregunta</h2>";
				
				echo "<form class='form-group' action='insertaPregunta.php' method='post' enctype='multipart/form-data'>";
				echo "<p><label>Los Estudios disponibles son los siguientes:";
				$consulta = "select * from Estudios";
				$query = mysqli_query($conn, $consulta) or die("Error en consulta a la BD: Preguntas.");
				$resestudio = mysqli_fetch_array($query);
				echo "<label class='radio col-md-offset-1'><input type='radio' name='id_estudio' value='".$resestudio['id']."' checked>".$resestudio['nombre']."</label>"; 
				while($resestudio = mysqli_fetch_array($query)){
					echo "<label class='radio col-md-offset-1'><input type='radio' name='id_estudio' value=".$resestudio['id'].">".$resestudio['nombre']."</label>";
				}
				echo "</label></p>";
				echo "<p><label><input class='btn btn-primary' type='submit' name='env_estudio' value='Siguiente'></label></p></form>";
				
			}
		?>
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