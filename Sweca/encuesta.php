<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SWECA</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/Sweca.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                        <a href="index.html">Inicio</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br><br><br>
    
		<?php
			function getIP(){
				if(!empty($_SERVER['HTTP_CLIENT_IP']))
					return $_SERVER['HTTP_CLIENT_IP'];
	    	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	    		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	    	return $_SERVER['REMOTE_ADDR'];
			}
		?>
		<div>
			<?php
				date_default_timezone_set("Europe/Madrid");
				error_reporting(E_ALL & ~E_NOTICE);
				$error = false;
				$id_estudio = 1;
				$respuestas = $_POST['respuestas'];
				$estudio = $_POST['estudio'];
				$end_encuesta = $_POST['end_encuesta'];
				$hora_comienzo = $_POST['hora_comienzo'];
				$ip = $_POST['ip'];

				$mysql_host = 'localhost';
				$mysql_username = 'root';
				$mysql_password = '';
				$mysql_db = 'p1sweca';
				$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_db) or die('Error en la conexión con el server MySQL: ' . mysqli_error());
				mysqli_set_charset($conn, "utf8");
				
				if(isset($end_encuesta)){
					if(trim($estudio) == ""){
						$error = true;
						echo "Error en encuesta seleccionada.";
					}if(count($respuestas) == 0){
						$error = true;
						echo "Error en envío de encuesta: no se han dado respuestas.";
					}if(count($respuestas) != 0){
						$preg4idpreg3 = "select id_Preg3 from RespuestasPreg4 where respuesta='".$respuestas[3]."'";
						$residcentropreg4 = mysqli_query($conn, $preg4idpreg3) or die("Error en consulta preg4.");
						$idcentropreg4 = mysqli_fetch_array($residcentropreg4);
						$preg3idcentro = "select id from RespuestasPreg123 where respuesta='".$respuestas[2]."'";
						$residcentropreg3 = mysqli_query($conn, $preg3idcentro) or die("Error en consulta preg4.");
						$idcentropreg3 = mysqli_fetch_array($residcentropreg3);
						if($idcentropreg4['id_Preg3'] != $idcentropreg3['id']){
							$errores = "No existe ese Grado en el Centro elegido.";
							$error = true;
							$id_estudio = $estudio;
						}
					}if(trim($hora_comienzo) == ""){
						$error = true;
						echo "Error en envío de hora de comienzo.";
					}if(trim($ip) == ""){
						$error = true;
						echo "Error al obtener IP.";
					}
				}if(isset($end_encuesta) && $error == false){
					$hora_fin = date("d/m/y H:i:s");
					$insertER = "insert into EncuestasRellenas(id_Estudio, ip, hora_comienzo, hora_fin) values('$estudio', '$ip', '$hora_comienzo', '$hora_fin')";
					mysqli_query($conn, $insertER) or die ("Error en inserción a EncuestasRellenas.");
					
					$queryencuesta = "select max(id) as id from EncuestasRellenas";
					$resenc = mysqli_query($conn, $queryencuesta) or die("Error en consulta a EncuestasRellenas (max id");
					$id_EncuestasRellenas = mysqli_fetch_array($resenc);
					
					$consultadims = "select * from Dimensiones where id_Estudio = '$estudio'";
					$dims = mysqli_query($conn, $consultadims) or die ("Error en consulta de Dimensiones");
					$i = 0;
					while($i < count($respuestas)){
						while($resdims = mysqli_fetch_array($dims)){
							$consultapregs = "select * from Preguntas where id_Dimension = ".$resdims['id'];
							$pregs = mysqli_query($conn, $consultapregs) or die ("Error en consulta de Preguntas");
							while($respregs = mysqli_fetch_array($pregs)) {
								$insertrespuestas = "insert into Respuestas(id_Preguntas, id_EncuestasRellenas, respuesta) values('".$respregs['id']."', '".$id_EncuestasRellenas['id']."', '".$respuestas[$i]."')";
								mysqli_query($conn, $insertrespuestas) or die ("Error en inserción de respuesta.");
								$i++;
							}
						}
					}
					echo "<br><br><div class='well col-md-offset-1'><strong>Encuesta enviada correctamente.</strong><br>Gracias por realizar
                    esta encuesta.</div>";
				
				}else{
			?>
            <div class="well col-md-offset-1">
			<form class="form-group" action="encuesta.php" method="post" enctype="multipart/form-data">
				<?php
					echo "<p>Le recordamos que la realización de esta encuesta es anónima. Una vez haya terminado, pulse el botón \"Enviar\" y se enviarán los resultados de su encuesta. El tiempo de realización de la encuesta es ilimitado.</p>
			<p><strong>Es obligatoria la respuesta a todas las preguntas.</strong></p>";
					
					echo "<label><input type='hidden' name='estudio' value='$id_estudio'></label>";
					$ip = getIP();
					echo "<label><input type='hidden' name='ip' value='$ip'></label>";
					$hora_comienzo = date("d/m/y H:i:s");
					echo "<label><input type='hidden' name='hora_comienzo' value='$hora_comienzo'></label>";
					
					if($error && trim($errores)!="") echo "<p class='error'>$errores</p>";
					$consultadims = "select * from Dimensiones where id_Estudio = '$id_estudio'";
					$dims = mysqli_query($conn, $consultadims) or die ("Error en consulta de Dimensiones");
					$k=0;
					while($resdims = mysqli_fetch_array($dims)){
						echo "<h3>".$resdims['nombre']."</h2>";
						echo "<h4>".$resdims['comentario']."</h3>";
						$consultapregs = "select * from Preguntas where id_Dimension = ".$resdims['id'];
						$pregs = mysqli_query($conn, $consultapregs) or die ("Error en consulta de Preguntas");
						while($respregs = mysqli_fetch_array($pregs)){
							
							echo "<p><label>".$respregs['pregunta']."<br>";
							if($respregs['id_tipoPregunta'] == 1){
								$consultaP1dim1 = "select * from RespuestasPreg123 where id_Pregunta = ".$respregs['id'];
								$resps1 = mysqli_query($conn, $consultaP1dim1) or die ("Error en consulta de RespuestasPreg123 Pregunta 1");
								while($resr1 = mysqli_fetch_array($resps1)){
									if($resr1['respuesta']==$respuestas[$k]){
										echo "<label class='radio-inline'><input type='radio' name='respuestas[$k]' value='".$resr1['respuesta']."' checked>".$resr1['respuesta']." </label>";
									}else {
                                        echo "<label class='radio-inline'><input type='radio' name='respuestas[$k]' value='".$resr1['respuesta']."'>".$resr1['respuesta']." </label>";
                                    }
                                    
								}
							}elseif($respregs['id_tipoPregunta'] == 2){
								$consultaP2dim1 = "select * from RespuestasPreg123 where id_Pregunta = ".$respregs['id'];
								$resps2 = mysqli_query($conn, $consultaP2dim1) or die ("Error en consulta de RespuestasPreg123 Pregunta 2");
								while($resr2 = mysqli_fetch_array($resps2)){
									if($resr2['respuesta']==$respuestas[$k]){
										echo "<label class='radio-inline'><input type='radio' name='respuestas[$k]' value='".$resr2['respuesta']."' checked>".$resr2['respuesta']." </label>";
									}else
                                        echo "<label class='radio-inline'><input type='radio' name='respuestas[$k]' value='".$resr2['respuesta']."'>".$resr2['respuesta']." </label>";
								}
							}elseif($respregs['id_tipoPregunta'] == 3){
								echo "<select class='form-control' name='respuestas[$k]'>";
								$consultaP3dim1 = "select * from RespuestasPreg123 where id_Pregunta = ".$respregs['id'];
								$resps3 = mysqli_query($conn, $consultaP3dim1) or die ("Error en consulta de RespuestasPreg123 Pregunta 3");
								while($resr3 = mysqli_fetch_array($resps3)){
									if($resr3['respuesta']==$respuestas[$k]){
										echo "<option value='".$resr3['respuesta']."' selected>".$resr3['respuesta']."</option>";
									}else
                                        echo "<option value='".$resr3['respuesta']."'>".$resr3['respuesta']."</option>";
								}
								echo "</select>";
							}elseif($respregs['id_tipoPregunta'] == 4){
								echo "<select class='form-control' name='respuestas[$k]'>";
								$consultaP4dim1 = "select * from RespuestasPreg4 where id_Dimension='".$resdims['id']."'";
								$resps4 = mysqli_query($conn, $consultaP4dim1) or die ("Error en consulta de RespuestasPreg4");
								while($resr4 = mysqli_fetch_array($resps4)){
									if($resr4['respuesta']==$respuestas[$k]){
									echo "<option value='".$resr4['respuesta']."' selected>".$resr4['respuesta']."</option>";
								}else
                                        echo "<option value='".$resr4['respuesta']."'>".$resr4['respuesta']."</option>";
								}
								echo "</select>";
							}elseif($respregs['id_tipoPregunta'] == 5){
								for($i=0;$i<=9;$i++){
									if($i==$respuestas[$k]){
										echo "<label class='radio-inline'><input type='radio' name='respuestas[$k]' value='".$i."' checked>".$i." </label>";
									}else
                                        echo "<label class='radio-inline'><input type='radio' name='respuestas[$k]' value='".$i."'>".$i." </label>";
									}
								echo "</select>";
							}elseif($respregs['id_tipoPregunta'] == 6){
								$texto = "Escriba sus observaciones aquí...";
								if(trim($respuestas[$k])!=""){
									echo "<p><textarea class='form-control' name='respuestas[$k]' cols='100' rows='10'>".$respuestas[$k]."</textarea></p>";
								}else
                                    echo "<p><textarea class='form-control' name='respuestas[$k]' cols='100' rows='10' placeholder='$texto'></textarea></p>";
							}
							echo "</label></p>";
							$k++;
						}
					}
					mysqli_close($conn);
				?>
				<p>
				<label><input class="btn btn-primary" type="submit" name="end_encuesta" value="Terminar encuesta"></label>
				</p><br>
			</form>
            </div>
			<?php
				}//else de encuesta aún no enviada o con fallos.
			?>
		</div>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">

                        <li>
                            <a href="index.html">Inicio</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; GestionaStock S.A &amp; JulyTheFrog. <br>All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>