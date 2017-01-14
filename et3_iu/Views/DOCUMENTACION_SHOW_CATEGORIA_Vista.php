<?php
class DOCUMENTACION_SHOW_CATEGORIA {
	
	// VISTA PARA LISTAR TODOS LOS DOCUMENTOS
	private $datos;
	private $datosMateria;
	private $volver;
	function __construct($array, $arrayMaterias, $materia, $volver) {
		$this->datos = $array;
		$this->datosMateria = $arrayMaterias;
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
								if($this->datos[$j]['DOCUMENTACION_CATEGORIA'] != NULL){
									?>
									<div><img class="carpeta" src="../images/folder1.png" width="25" height="25"><a href='./DOCUMENTACION_Controller.php?DOCUMENTACION_CATEGORIA=<?php echo $this->datos[$j]['DOCUMENTACION_CATEGORIA'] . '&DOCUMENTACION_MATERIA=' . $this->materia . '&accion='. $strings['Ver'] ?>'><?php echo $this->datos [$j][0] ?></a></div>
									<?php		
								}
							}
							?>

						</div>
						
						<div class="container">
							<div class="separado">
								<div id="centrado">
									<table class="table" id="btable" border=1>
										<tr>
											<?php
											$lista = array ('DOCUMENTACION_NOM', 'DOCUMENTACION_PROFESOR', 'DOCUMENTACION_FECHA', 'DOCUMENTACION_ENLACE');
											foreach ( $lista as $titulo ) {
												echo "<th>";
												echo $strings [$titulo];
												?>
											</th>
											<?php
										}
										?>
									</tr>
									<?php

									for($j = 0; $j < count ( $this->datosMateria ); $j++) {
										echo "<tr>";
										foreach ( $this->datosMateria [$j] as $clave => $valor ) {
											for($i = 0; $i < count ( $lista ); $i++) {
												if ($clave === $lista [$i]) {
													echo "<td>";
													if ($clave==='DOCUMENTACION_PROFESOR') {
														if(isset($strings[ConsultarNomProfesor($valor)])){
															echo $strings[ConsultarNomProfesor($valor)];}
															else{
																echo ConsultarNomProfesor($valor);
															}
														} else {
															echo $valor;
														}
														echo "</td>";
													}
												}
											}
											?>


											<td><a href='DOCUMENTACION_Controller.php?DOCUMENTACION_NOM=<?php echo $this->datos[$j]['DOCUMENTACION_NOM'] . '&accion='.$strings['Modificar']; ?>'><?php echo $strings['Modificar']?></a></td>
											<td><a href='DOCUMENTACION_Controller.php?DOCUMENTACION_NOM=<?php echo $this->datos[$j]['DOCUMENTACION_NOM'] . '&accion='.$strings['Borrar']; ?>'><?php echo $strings['Borrar']?></a></td>

											<?php
											echo "</tr>";
										}
										?>

									</table>
								</div>
							</div>
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