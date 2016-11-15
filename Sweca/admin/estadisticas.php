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
                        <li><a href="insertaRespuesta">Respuesta</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <div class="texto"><div class="insert_data">
	  <h2>Filtrado de estadísticas</h2>
	  <?php
  		$mysql_host = 'localhost';
			$mysql_username = 'root';
			$mysql_password = '';
			$mysql_db = 'p1sweca';
			$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_db) or die('Error en la conexión con el server MySQL: ' . mysqli_error());
			mysqli_set_charset($conn, "utf8");

			error_reporting(E_ALL & ~E_NOTICE);
			$error = false;
			$env_estudio = $_POST['env_estudio'];
			$id_estudio = $_POST['id_estudio'];
			$env_filtro = $_POST['env_filtro'];
			$tipouser = $_POST['tipouser'];
			$sexo = $_POST['sexo'];
			$centro = $_POST['centro'];
			$titulacion = $_POST['titulacion'];

			if(isset($env_estudio)){
				if(trim($id_estudio) == ""){
					$error = true;
					echo "Error al enviar el estudio.";
				}
			}
			if(isset($env_estudio) && !$error){
				if(isset($env_filtro) && !$error){
					$lamegaconsulta = "select DISTINCT id_EncuestasRellenas from Respuestas where ";
                    $filtroUser = false;
                    $filtroSexo = false;
                    $filtroCentro = false;
                    $filtroTitulacion = false;
                    $contfiltros = 0;
					if(!empty($tipouser)) {
						$filtroUser = true;
                        $contfiltros++;
                    }
					if(!empty($sexo)) {
						$filtroSexo = true;
                        $contfiltros++;
                    }
					if(!empty($centro)) {
						$filtroCentro = true;
                        $contfiltros++;
                    }
					if(!empty($titulacion)) {
						$filtroTitulacion = true;
                        $contfiltros++;
                    }
                    $i = $contfiltros;
					while($i>1){
						$lamegaconsulta .= "id_EncuestasRellenas in (select id_EncuestasRellenas from Respuestas where ";
					}
					$i = 0;
                    if ($filtroUser) {
                        while ($i < count($tipouser)){
                            $lamegaconsulta .= "respuesta = '".$tipouser[$i]."' or ";
                            $i++;
                        }

                        $lamegaconsulta = substr($lamegaconsulta, 0, -4);
                    }
					$i = 0;
                    if ($filtroSexo) {
                        if ($filtroUser) {
                            $lamegaconsulta .= ") and ";

                            $lamegaconsulta .= "(";
                        }
                        while ($i < count($sexo)){
                            $lamegaconsulta .= "respuesta = '".$sexo[$i]."' or ";
                            $i++;
                        }
                        $lamegaconsulta = substr($lamegaconsulta, 0, -4);
                    }
					$i = 0;
                    if ($filtroCentro) {
                        if ($filtroUser or $filtroSexo) {
                            $lamegaconsulta .= ")) and ";
                            $lamegaconsulta .= "(";
                        }
                        while ($i < count($centro)){
                            $lamegaconsulta .= "respuesta = '".$centro[$i]."' or ";
                            $i++;
                        }
                        $lamegaconsulta = substr($lamegaconsulta, 0, -4);
                    }
					$i = 0;
                    if ($filtroTitulacion) {
                        if ($filtroUser or $filtroSexo or $filtroCentro) {
                            $lamegaconsulta .= ")) and ";
                            $lamegaconsulta .= "(";
                        }
                        while ($i < count($titulacion)){
                            $lamegaconsulta .= "respuesta = '".$titulacion[$i]."' or ";
                            $i++;
                        }
                        $lamegaconsulta = substr($lamegaconsulta, 0, -4);
                    }
                    if ($contfiltros > 1)
                            $lamegaconsulta .= ")";

					$resmegaquery = mysqli_query($conn, $lamegaconsulta) or die("Error en consulta de filtrado.");
					$querydims = "select * from Dimensiones where id_Estudio = '$id_estudio'";
					$dims= mysqli_query($conn, $querydims) or die ("Error en consulta de Dimensiones");
					$dim = mysqli_fetch_array($dims);
					$querypregs = "select id from Preguntas where id_tipoPregunta = 5 and (";
					while($dim = mysqli_fetch_array($dims)){
						$querypregs .= "id_Dimension = ".$dim['id']." or ";
					}
					$querypregs = substr($querypregs, 0, -4);
					$querypregs .= ")";
					$id_preg = mysqli_query($conn, $querypregs) or die ("Error en consulta de Preguntas de Dim!=general (datos user)");
					$queryrespuestas = "select DISTINCT r1.id, r1.respuesta from Respuestas r1, Respuestas r2 where r1.id = r2.id";
					if(mysqli_num_rows($resmegaquery)>0){
						$queryrespuestas .= " and (";
						while($respuesta = mysqli_fetch_array($resmegaquery)){
							$queryrespuestas .= "r1.id_EncuestasRellenas = ".$respuesta['id_EncuestasRellenas']." or ";
						}
						$queryrespuestas = substr($queryrespuestas, 0, -4);
						$queryrespuestas .= ")";
					}
			?>
					<table class='table table-striped table-bordered table-hover'>
						<tr><td>Pregunta</td><td>Media</td><td>Desv. típica</td><td>Num. Encuestas realizadas</td></tr>
			<?php
					while($respuesta = mysqli_fetch_array($id_preg)){
						$queryres_tmp = $queryrespuestas." and r2.id_Preguntas = ".$respuesta['id'];
						$resp_preg = mysqli_query($conn, $queryres_tmp) or die("Error en consulta tmp.");
						$suma = 0;
						$k = 0;
						for($k; $respuesta_aux = mysqli_fetch_array($resp_preg) ; $k++){
					
							$suma += (integer)$respuesta_aux['respuesta'];
						
							$v[$k] = (integer)$respuesta_aux['respuesta'];
						}
						$media = $suma/$k;
						$dvt = 0;
						for($i = 0; $i < $k ; $i++)
							$dvt += pow($v[$i] - $media, 2);
						$dvt = sqrt($dvt/$k);
						
						$querypregtabla = "select pregunta from Preguntas where id = ".$respuesta['id'];
						$pregunta = mysqli_query($conn, $querypregtabla) or die("Error en consulta de pregunta para tabla.");
						$preg_td = mysqli_fetch_array($pregunta);
						echo "<tr><td>".$preg_td['pregunta']."</td><td>$media</td><td>$dvt</td><td>$k</td></tr>";
					}
					echo "</table><br>";
					
					$queryobs = "select respuesta from Respuestas where id_Preguntas in (select id from Preguntas where id_tipoPregunta = 6) and id_EncuestasRellenas in ($lamegaconsulta)";
					$observaciones = mysqli_query($conn, $queryobs)	or die ("Error en la consulta de observaciones");
					echo "<table class='tabla_stats'><tr><td>Observaciones</td></tr>";
					
					while ($obs = mysqli_fetch_array($observaciones)){
						echo"<tr><td>".$obs['respuesta']."</td></tr>";
					}
					echo "</table>";
					mysqli_close($conn);
				}else{
                    echo "<div class='well col-md-offset-1'>";
					echo "<form class='form-group' action='estadisticas.php' method='post' enctype='multipart/form-data'>";
					echo "<label><input type='hidden' name='env_estudio' value='$env_estudio'></label>";
					echo "<label><input type='hidden' name='id_estudio' value='$id_estudio'></label>";
			?>
					<p>A continuación se le muestran todas las opciones de filtrado disponibles. Seleccione las que considere más convenientes y pulse en "Mostrar estadísticas" para que se muestren los datos solicitados.</p>
					<h3>Tipo de usuario</h3>
			<?php
					$querydims = "select * from Dimensiones where id_Estudio = '$id_estudio'";
					$dims= mysqli_query($conn, $querydims) or die ("Error en consulta de Dimensiones");
					$dimgen = mysqli_fetch_array($dims);
					$querypregs = "select * from Preguntas where id_Dimension = ".$dimgen['id']." and id_tipoPregunta = 1";
					$pregs= mysqli_query($conn, $querypregs) or die ("Error en consulta de Preguntas");
					$preg = mysqli_fetch_array($pregs);
					$query123 = "select * from RespuestasPreg123 where id_Pregunta = ".$preg['id'];
					$resps = mysqli_query($conn, $query123) or die ("Error en consulta de RespuestasPreg123");
					while($res = mysqli_fetch_array($resps)){
						echo "<label class='checkbox-inline'><input type='checkbox' name='tipouser[]' value='".$res['respuesta']."'>".$res['respuesta']." </label>";
					}
					echo "<h3>Sexo</h3>";
					$querypregs = "select * from Preguntas where id_Dimension = ".$dimgen['id']." and id_tipoPregunta = 2";
					$pregs= mysqli_query($conn, $querypregs) or die ("Error en consulta de Preguntas");
					$preg = mysqli_fetch_array($pregs);
					$query123 = "select * from RespuestasPreg123 where id_Pregunta = ".$preg['id'];
					$resps = mysqli_query($conn, $query123) or die ("Error en consulta de RespuestasPreg123");
					while($res = mysqli_fetch_array($resps)){
						echo "<label class='checkbox-inline'><input type='checkbox' name='sexo[]' value='".$res['respuesta']."'>".$res['respuesta']." </label>";
					}
					echo "<h3>Centro</h3>";
					$querypregs = "select * from Preguntas where id_Dimension = ".$dimgen['id']." and id_tipoPregunta = 3";
					$pregs= mysqli_query($conn, $querypregs) or die ("Error en consulta de Preguntas");
					$preg = mysqli_fetch_array($pregs);
					$query123 = "select * from RespuestasPreg123 where id_Pregunta = ".$preg['id'];
					$resps = mysqli_query($conn, $query123) or die ("Error en consulta de RespuestasPreg123");
					while($res = mysqli_fetch_array($resps)){
						echo "<label class='checkbox'><input type='checkbox' name='centro[]' value='".$res['respuesta']."'>".$res['respuesta']."</label>";
					}
					echo "<h3>Titulación</h3>";
					$preg = mysqli_fetch_array($pregs);
					$query4 = "select * from RespuestasPreg4 where id_Dimension = ".$dimgen['id'];
					$resps = mysqli_query($conn, $query4) or die ("Error en consulta de RespuestasPreg4");
					while($res = mysqli_fetch_array($resps)){
						echo "<label class='checkbox'><input type='checkbox' name='titulacion[]' value='".$res['respuesta']."'>".$res['respuesta']."</label>";
					}
					echo "<p><label><input class='btn btn-primary' type='submit' name='env_filtro' value='Ver estadísiticas'></label></p></form>";
                    echo "</div>"
		?>
		<?php
				}
			}elseif(!isset($env_estudio)){
				echo "<div class='well col-md-offset-1'><form class='form-group' action='estadisticas.php' method='post' enctype='multipart/form-data'>";
				$consulta = "select * from Estudios";
				$query = mysqli_query($conn, $consulta) or die("Error en consulta a la BD: Estudios.");
				echo "<p><label> Los estudios disponibles son los siguientes:";
				$resestudio = mysqli_fetch_array($query);
				echo "<label class='radio col-md-offset-1'><input type='radio' name='id_estudio' value='".$resestudio['id']."' checked>".$resestudio['nombre']."</label>";
				while($resestudio = mysqli_fetch_array($query)){
					echo "<label class='radio col-md-offset-1'><input type='radio' name='id_estudio' value=".$resestudio['id'].">".$resestudio['nombre']."</label>";
				}
				echo "</label></p>";
				echo "<p class='insert_data'><label><input class='btn btn-primary' type='submit' name='env_estudio' value='Siguiente'></label></p></form></div>";
			}
		?>
		</div></div>
    
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