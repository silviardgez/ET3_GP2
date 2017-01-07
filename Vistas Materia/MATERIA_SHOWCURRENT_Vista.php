<?php

class MATERIA_SHOWCURRENT{
//VISTA PARA MOSTRAR CONSULTA DE MATERIA

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
				$lista = array('MATERIA_ID','MATERIA_NOM', 'MATERIA_CREDITOS', 'MATERIA_DEPARTAMENTO', 'MATERIA_TITULACION', 'MATERIA_DESCRIPCION');
            ?>



				<form action='MATERIA_Controller.php' method='post'>
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar materia']?><br></span></div>
					<ul class="form-style-1">
					<?php

					include '../Functions/MATERIAShowDefForm.php';


					createForm($lista,$DefForm,$strings,$values='',false,false);
					?>
					<input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
					</ul>
				</form>
				<?php
				echo '<a  class="form-link" href=\'MATERIA_Controller.php\'>' . $strings['Volver'] . '</a>';
				?>



		</div>

		<?php
	}

}
?>
