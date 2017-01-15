<?php

class CORRECCION_Modificar{

private $valores;
private $volver;
//VISTA PARA LA MODIFICACIÓN DE USUARIOS
function __construct($valores,$volver){
	$this->valores = $valores;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
	include '../Functions/CORRECCIONEditDefForm.php';
	//include '../Functions/LibraryFunctions.php';
	//Array con los nombres de los campos a modificar
	$lista = array('CORRECCION_NOM', 'CORRECCION_NOTA');

?>
<html>
	<head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script>
		<meta charset="UTF-8">
	</head>
	<div class="wrap">
<body>
<div id="centrado"><span class="form-title">
	<?php echo $strings['Modificar correccion']?></span></div>

<form id="form" name="form"  action = 'CORRECCIONES_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
	<ul class="form-style-1">
	<input type = 'text' name= "CORRECCION_ENTREGA" value = "<?php echo $this->valores['CORRECCION_ENTREGA']?>" min= '1' max = '40' required = 'true' readonly='true'><br>
	<input type = 'text' name = "CORRECCION_RUBRICA" value = '<?php echo $this->valores['CORRECCION_RUBRICA']?>'  min= '1' max = '40' required = 'true' readonly='true'><br>
	<?php
//Generación automática del formulario
createForm($lista,$defForm,$strings,$this->valores,false,false);
?>

<input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_USUARIO()" >
</form>


<a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
</p>
</body>
</div>

</html>
<?php
} // fin del metodo render
} // fin de la clase
?>
