<?php
class DOCUMENTACION_SHOW_CATEGORIA {
	
	// VISTA PARA LISTAR TODOS LOS DOCUMENTOS
	private $datos;
	private $volver;
	function __construct($array, $materia, $volver) {
		$this->datos = $array;
		$this->materia = $materia;
		$this->volver = $volver;
		$this->render ();
	}
	function render() {
		include '../Locates/Strings_' . $_SESSION ['IDIOMA'] . '.php';
		?>
		<head>
			<title>FaitIUc</title>
			<meta charset="utf-8">
			<meta name="description" content="Place your description here">
			<meta name="keywords" content="put, your, keyword, here">
			<meta name="author" content="Templates.com - website templates provider">
			<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
			<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
			<script type="text/javascript" src="../js/cufon-yui.js"></script>
			<script type="text/javascript" src="../js/cufon-replace.js"></script>
			<script type="text/javascript" src="../js/Myriad_Pro_300.font.js"></script>
			<script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
			<script type="text/javascript" src="../js/script.js"></script>
		</head>
		<body id="page2">
			<div class="wrap">
				<header>
					<div class="container">
						<h1>
							<a href="../Views/DEFAULT_Vista.php"></a>
						</h1>
						<nav>
							<ul>
								<li><?php echo '<a href=\'' . $this->volver . "' class='m5'>" . $strings['Volver'] . " </a>"; ?></li>
								<li><a
									href='./DOCUMENTACION_Controller.php?accion=<?php echo $strings['Consultar']?>'
									class="m4"><?php echo $strings['Consultar']?></a></li>
								<li><a
									href='./DOCUMENTACION_Controller.php?accion=<?php echo $strings['Insertar'] ?>'
									class="m3"><?php echo $strings['Insertar']?></a></li>
								<li><a href="../Functions/Desconectar.php" class="m2"><?php echo  $strings['Cerrar Sesión']?></a></li>
							</ul>
						</nav>

					</div>

				</header>
				<div>
				<h2 class="materia"><?php echo ConsultarNomMateria($this->materia) ?></h2>
					<?php

						for($j = 0; $j < count ( $this->datos ); $j++) {
					?>
						<div><img class="carpeta" src="../images/folder1.png" width="25" height="25"><a href='./DOCUMENTACION_Controller.php?DOCUMENTACION_CATEGORIA=<?php echo $this->datos[$j]['DOCUMENTACION_CATEGORIA'] . '&DOCUMENTACION_MATERIA=' . $this->materia . '&accion='. $strings['Ver'] ?>'><?php echo $this->datos [$j][0] ?></a></div>
					<?php		
							}
					?>

				</div>
			</div>
			<footer>
				<div class="container">
					<div class="inside">
						<div class="wrapper">
							<div class="aligncenter">Servizo de Teledocencia copyright © 2016</div>
						</div>
					</div>
				</div>
			</footer>
			<script type="text/javascript"> Cufon.now(); </script>
		</body>
	<?php
	} // fin metodo render
}
?>