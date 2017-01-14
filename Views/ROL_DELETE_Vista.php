<?php

class ROL_Borrar{
	//VISTA PARA BORRAR ROLES

	private $valores;

	function __construct($valores){
		$this->valores=$valores;
		$this->render();
	}

	function render(){
		?>

<div class="wrap">
	<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>

				<?php
				include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
				include '../Functions/RolShowDefForm.php';


				$list = array('ROL_ID','ROL_NOM');
				$lista=AñadirFuncionesTitulos($list);




				?>




				<form action='ROL_Controller.php' method='post' >
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Borrar Rol']?><br></span></div>
					<ul class="form-style-1">
					<?php

					createForm($lista,$form2,$strings,$this->valores,false,true);

					?>
					<input type='submit' name='accion' value=<?php echo $strings['Borrar'] ?>>
				</form>
				<?php
				echo '<a class="form-link" href=\'ROL_Controller.php\'>' . $strings['Volver'] . " </a>";
				?>


		</div>

		<?php
	} //fin metodo render

}
?>
