<?php

class CORRECCION_Consultar{
	//VISTA QUE MUESTRA  CORRECCIONES consultadas.


function __construct(){	
	$this->render();
}

function render(){
?>
<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
<div class="wrap">
<?php


	$lista = array('CORRECCION_ID', 'CORRECCION_NOM', 'CORRECCION_ENTREGA', 'CORRECCION_RUBRICA','CORRECCION_NOTA');

?>

	
	<form  id="form" name="form" action='CORRECCIONES_Controller.php' method='post'>
<?php
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
include '../Functions/CORRECCIONShowDefForm.php';?>
		<div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar correccion']?><br></span></div>
		<ul class="form-style-1"><?php



		createForm($lista,$DefForm2,$strings,$values='',false,false);
?>
	<input type='submit' name='accion' value='<?php echo $strings['Consultar'] ?>'
			<ul>
	</form>
<?php
        	echo '<a class="form-link" href=\'CORRECCIONES_Controller.php\'>' . $strings['Volver'] . '</a>';
?>


</div>
<?php
} //fin metodo render

}
?>
