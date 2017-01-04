<?php

class Correccion_Insertar
{
	function __construct()
	{
		$this->render();
	}
	function render()
	{
		?>
		<div class="wrap">
		<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../js/<?php  echo $_SESSION['IDIOMA']?>_validate.js"></script></head>

		<?php
		include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
		include '../Functions/CORRECCIONDefForm.php';

		$lista = array('CORRECCION_ID');
		?>

		<form  id="form" name="form" action='CORRECCIONES_Controller.php' method='post'>
					<div id="centrado"><span class="form-title">
		<?php echo $strings['Insertar correccion'];?><br></span></div>
		<ul class="form-style-1">
		<?php
					createForm($lista,$DefForm,$strings,'',true,false);
					?>
		<input type='submit' name='accion' onclick="return valida_envia_PAGINA()" value=<?php echo $strings['Insertar'] ?>>
				</form>
				<br>
				<?php
				echo '<a class="form-link" href=\'CORRECCIONES_Controller.php\'>' . $strings['Volver'] . " </a>";
?>
			</h3>
		</p>

	</div>

<?php
	}
}