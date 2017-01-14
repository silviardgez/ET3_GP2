

<?php

class ROL_Consultar{

//VISTA PARA CONSULTAR ROLES
	function __construct(){
		$this->render();
	}

	function render(){
		?>

		<div class="wrap">
			<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
		<div></div>
				<?php

				include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
				$lista = array('ROL_NOM');

				?>



				<form action='ROL_Controller.php' method='post'>
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar Rol']?><br></span></div>
					<ul class="form-style-1">
					<?php

					include '../Functions/ROLDefForm.php';


					createForm($lista,$form,$strings,$values='',false,false);
					?>
					<input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
					</ul>
				</form>
				<?php
				echo '<a  class="form-link" href=\'ROL_Controller.php\'>' . $strings['Volver'] . '</a>';
				?>



		</div>

		<?php
	} //fin metodo render

}
?>
