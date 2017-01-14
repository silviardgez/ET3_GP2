<?php

class Pagina_Show{
//VISTA PARA MOSTRAR CONSULTA DE PAGINAS

function __construct(){	
	$this->render();
}

function render(){
?>

	<div class="wrap">
	<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
	<div>


<?php
include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
	include '../Functions/PAGINADefForm.php';


	$lista = array('PAGINA_NOM');

?>

	<form action='PAGINA_Controller.php' method='post'>
		<div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar Pagina']?><br></span></div>
		<ul class="form-style-1">
		<?php
		createForm($lista,$DefForm,$strings,$values='',false,false);
?>
	<input type='submit' name='accion' value='<?php echo $strings['Consultar']; ?>'><br>
	
	</form>
	<br>
<?php
        	echo '<a class="form-link" href=\'PAGINA_Controller.php\'>' . $strings['Volver'] . '</a>';
?>

	</h3>
	</p>

	</div>

<?php
}

}