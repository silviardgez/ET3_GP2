<?php

class DOCUMENTACION_SHOWCURRENT{

//VISTA PARA CONSULTAR DOCUMENTACION
	function __construct(){
		$this->render();
	}

	function render(){
		?>

		<div class="wrap">
			<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
			<div></div>
			<?php

			include '../Functions/DOCUMENTACIONDefForm.php';
			include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';


			?>


			<form action='DOCUMENTACION_Controller.php' method='post'>
				<div id="centrado"><span class="form-title">
					<?php echo $strings['Consultar Documentación']?><br></span></div>
					<ul class="form-style-1">
						<?php

						createForm($lista,$DefForm,$strings,$values='',false,false);
						?>
						<input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
					</ul>
				</form>
				<?php
				echo '<a  class="form-link" href=\'DOCUMENTACION_Controller.php\'>' . $strings['Volver'] . '</a>';
				?>

			</div>

			<?php
		}

	}
	?>
