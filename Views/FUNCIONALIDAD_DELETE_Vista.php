<?php

class FUNCIONALIDAD_Borrar{
	//VISTA PARA BORRAR FUNCIONALIDADES

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
				include '../Functions/FUNCIONShowDefForm.php';


				$list = array('FUNCIONALIDAD_ID','FUNCIONALIDAD_NOM');
				$lista=AñadirPaginasTitulos($list);




				?>


				<form action='FUNCIONALIDAD_Controller.php' method='post' >
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Borrar Funcionalidad']?><br></span></div>
					<ul class="form-style-1">
					<?php

					createForm($lista,$form2,$strings,$this->valores,false,true);

					?>
					<input type='submit' name='accion' value=<?php echo $strings['Borrar'] ?>>
				</form>
				<?php
				echo '<a class="form-link" href=\'FUNCIONALIDAD_Controller.php\'>' . $strings['Volver'] . " </a>";
				?>
			</h3>
			</p>

		</div>

		<?php
	} //fin metodo render

}
?>
