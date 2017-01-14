<?php

class Pagina_delete{
	//VISTA PARA BORRAR PAGINAS

	private $valores;

	function __construct($valores){
		$this->valores=$valores;
		$this->render();
	}

	function render(){
		?>

		<div class="wrap">
			<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>

				<?php
				include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
				include '../Functions/PAGINADefForm.php';


				$lista = array('PAGINA_ID','PAGINA_LINK','PAGINA_NOM');





				?>


				<form action='PAGINA_Controller.php' method='post' >
					<div id="centrado"><span class="form-title">
			<?php echo $strings['Borrar Pagina']?><br></span></div>
					<ul class="form-style-1">
					<?php

					createForm($lista,$DefForm,$strings,$this->valores,false,true);

					?>
					<input type='submit' name='accion' value=<?php echo $strings['Borrar'] ?>>
				</form>
				<?php
				echo '<a class="form-link" href=\'PAGINA_Controller.php\'>' . $strings['Volver'] . " </a>";
				?>
			</h3>
			</p>

		</div>

		<?php
	} //fin metodo render

}
?>
