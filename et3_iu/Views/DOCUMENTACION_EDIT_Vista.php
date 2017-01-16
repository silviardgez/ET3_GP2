<?php

class DOCUMENTACION_EDIT {

	private $valores;
	private $volver;

//VISTA PARA LA MODIFICACIÓN DE UN DOCUMENTO
	function __construct($valores, $materia, $volver) {
		$this->valores = $valores;
		$this->materia = $materia;
		$this->volver = $volver;
		$this->render();
	}

	function render() {

		include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
		include '../Functions/DOCUMENTACIONDefForm.php';

        //Array con los nombres de los campos a modificar
		$lista = array('DOCUMENTACION_ID','DOCUMENTACION_NOM', 'DOCUMENTACION_CATEGORIA', 'DOCUMENTACION_ENLACE', 'DOCUMENTACION_PROFESOR', 'DOCUMENTACION_FECHA', 'DOCUMENTACION_MATERIA');

		?>
		<html>
		<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
			<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
			<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>
			<meta charset="UTF-8">
		</head>
		<div class="wrap">
			<body>
				<form  id="form" name="form" action='DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=<?php echo $this->materia ?>' method='post' enctype="multipart/form-data">
					<div id="centrado"><span class="form-title">
						<?php echo $strings['Modificar Documentación'] ?></span></div>
						<ul class="form-style-1">

							<?php

							createForm($lista, $DefForm, $strings, $this->valores, array('DOCUMENTACION_CATEGORIA' => false, 'DOCUMENTACION_ENLACE' => false), array('DOCUMENTACION_ID' => true));

							?>

							<input type = 'submit' name = 'accion' value = <?php echo $strings['Modificar'] ?>  onclick="return valida_envia_DOCUMENTACION()" >

						</form>

						<a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
					</ul>
				</body>
			</div>

			</html>
			<?php
		}


	}

	?>
