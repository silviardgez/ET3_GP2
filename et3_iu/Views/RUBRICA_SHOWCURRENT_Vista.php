

<?php

class RUBRICA_SHOWCURRENT{

//VISTA PARA CONSULTAR RUBRICAS
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
                                include '../Locates/Strings_'.$_SESSION['IDIOMA'].'_Rubrica.php';
                                $lista = array('RUBRICA_ID', 'RUBRICA_NOMBRE', 'RUBRICA_DESCRIPCION', 'RUBRICA_NIVELES', 'RUBRICA_AUTOR');

				?>



				<form action='RUBRICA_Controller.php' method='post'>
					<div id="centrado"><span class="form-title">
			<?php echo $stringsRubrica['Consultar Rubrica']?><br></span></div>
					<ul class="form-style-1">
					<?php

					include '../Functions/RUBRICAShowDefForm.php';


					createForm($lista,$form,$stringsRubrica,$values='',false,false);
					?>
					<input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
					</ul>
				</form>
				<?php
				echo '<a  class="form-link" href=\'RUBRICA_Controller.php\'>' . $strings['Volver'] . '</a>';
				?>



		</div>

		<?php
	} //fin metodo render

}
?>
