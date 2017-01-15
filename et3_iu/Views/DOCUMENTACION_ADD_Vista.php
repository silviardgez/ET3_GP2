<?php
//VISTA PARA LA INSERCIÓN DE USUARIOS
class DOCUMENTACION_ADD{


	function __construct(){	
		$this->render();
	}

	function render(){

		?><div class="wrap">

		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
			<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
			<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>

			<?php
			include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
			include '../Functions/DOCUMENTACIONShowAllDefForm.php';
				//Array con los nombres de los campos a insertar
			$lista = array('DOCUMENTACION_NOM', 'DOCUMENTACION_ENLACE', 'DOCUMENTACION_CATEGORIA');

			?>
			

			<form  id="form" name="form" action='DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=<?php echo $_REQUEST['DOCUMENTACION_MATERIA'] ?>' method='post'   enctype="multipart/form-data">
				<div id="centrado"><span class="form-title">
					<?php echo $strings['Insertar documentación']?><br></span></div>

					<ul class="form-style-1">
						<?php
					//Generación automática del formulario
						createForm($lista,$DefForm,$strings,'',array('DOCUMENTACION_CATEGORIA'=>false),false);

						?>
						<input type='submit' onclick="return valida_envia_DOCUMENTACION()" name='accion'  value=<?php echo $strings['Insertar'] ?>
						<ul>
						</form>
						<?php
						echo '<a class="form-link" href=\'DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $_REQUEST['DOCUMENTACION_MATERIA'] . '\'>' . $strings['Volver'] . " </a>";
						?>


					</div>

					<?php
} //fin metodo render

}