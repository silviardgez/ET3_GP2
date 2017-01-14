

<?php

class FUNCIONALIDAD_Consultar{
//VISTA PARA CONSULTAR FUNCIONALIDADES

	function __construct(){
		$this->render();
	}

	function render(){
		?>

<div class="wrap">
	<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
			<div>

				<?php
				include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';;

				$lista = array('FUNCIONALIDAD_NOM');

				?>


				<form action='FUNCIONALIDAD_Controller.php' method='post'>
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar Funcionalidad']?><br></span></div>
					<ul class="form-style-1">
					<?php

					include '../Functions/FUNCIONAddDefForm.php';



					createForm($lista,$form,$strings,$values='',false,false);
					?>

					<input type='submit' name='accion' value=<?php echo $strings['Consultar']; ?>><br>

				</form>
				<?php
				echo '<a class="form-link" href=\'FUNCIONALIDAD_Controller.php\'>' . $strings['Volver'] . '</a>';
				?>

			</h3>
			</p>

		</div>

		<?php
	} //fin metodo render

}
?>
