<?php

class FUNCIONALIDAD_Modificar{
//VISTA PARA MODIFICAR FUNCIONALIDADES
    private $valores;

	function __construct($valores){
	    $this->valores=$valores;
		$this->render();
	}

	function render(){
		?>
<div class="wrap">
	<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
			<link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
			<script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>
		<div>

				<?php
				include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
				include '../Functions/FUNCIONShowDefForm.php';
				//include '../Functions/LibraryFunctions.php';

				$list = array('FUNCIONALIDAD_ID','FUNCIONALIDAD_NOM');
				$lista=AñadirPaginasTitulos($list);




				?>



				<form  id="form" name="form" action='FUNCIONALIDAD_Controller.php' method='post' >
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Modificar Funcionalidad']?><br></span></div>
					<ul class="form-style-1">
					<?php
					$id=$this->valores['FUNCIONALIDAD_ID'];
					createForm3($lista,$DefForm2,$strings,$this->valores,false,array('FUNCIONALIDAD_ID'=>true,'FUNCIONALIDAD_NOM'=>true),consultarPaginasFuncionalidad($id));

					?>
					<input type='submit' name='accion' onclick="return valida_envia_FUNCIONALIDAD()" value=<?php echo $strings['Modificar'] ?>>
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
