<?php

class USUARIO_Consultar{
	//VISTA QUE MUESTRA  USUARIOS CONSULTADOS


function __construct(){	
	$this->render();
}

function render(){
?>
<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
<div class="wrap">
<?php


	$lista = array('USUARIO_USER', 'USUARIO_NOMBRE', 'USUARIO_APELLIDO', 'USUARIO_DNI');

?>

	
	<form  id="form" name="form" action='USUARIO_Controller.php' method='post'>
<?php
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
include '../Functions/USUARIOShowAllDefForm.php';
include '../Functions/USUARIOShowDefForm.php';?>
		<div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar usuario']?><br></span></div>
		<ul class="form-style-1"><?php



		createForm($lista,$DefForm2,$strings,$values='',false,false);
?>
	<input type='submit' name='accion' value='<?php echo $strings['Consultar'] ?>'
			<ul>
	</form>
<?php
        	echo '<a class="form-link" href=\'USUARIO_Controller.php\'>' . $strings['Volver'] . '</a>';
?>


</div>
<?php
} //fin metodo render

}
?>
