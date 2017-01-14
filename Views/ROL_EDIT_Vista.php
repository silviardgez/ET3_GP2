<?php

class ROL_Modificar{
//VISTA PARA MODIFICAR ROLES
    private $valores;

	function __construct($valores){
	    $this->valores=$valores;
		$this->render();
	}

	function render(){
		?>
<div class="wrap">
	<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
			<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>
		<div>

				<?php
				include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
				include '../Functions/RolShowDefForm.php';
				//include '../Functions/LibraryFunctions.php';

				$list = array('ROL_ID','ROL_NOM');

				$lista=AñadirFuncionesTitulos($list);




				?>



				<form  id="form" name="form" action='ROL_Controller.php' method='post' >
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Modificar Rol']?><br></span></div>
					<ul class="form-style-1">
					<?php
						$id=$this->valores['ROL_ID'];
					createForm3($lista,$DefForm2,$strings,$this->valores,array('ROL_NOM'=>true),array('ROL_ID'=>true),consultarFuncionalidadesRol($id));

					?>
					<input type='submit' name='accion' onclick="return valida_envia_ROL()" value=<?php echo $strings['Modificar'] ?>>
				</form>
				<?php
				echo '<a  class="form-link" href=\'ROL_Controller.php\'>' . $strings['Volver'] . " </a>";
				?>
			</h3>
			</p>

		</div>

		<?php
	} //fin metodo render

}
?>
