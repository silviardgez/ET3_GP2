<?php
	include '../Models/USUARIO_Model.php';

	if (isset($_REQUEST['accion'])){

		if ($_REQUEST['accion'] == 'Login'){

			$usuario = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], $_REQUEST['USUARIO_PASSWORD'], '', '', '', '', '', '', '', '', '', '', '', '');
			$respuesta = $usuario->Login(); //Comprueba que se pueda loguear
			if ($respuesta == 'true'){

				session_start();
				$_SESSION['IDIOMA']=$_REQUEST['IDIOMA']; //Establece el idioma de la sesión

				$_SESSION['login'] = $usuario->USUARIO_USER;//Establece el login de la sesión


				header('Location:../index.php');
			}
			else{
				include '../Views/MENSAJE_Vista.php';
				$_SESSION['IDIOMA']=$_REQUEST['IDIOMA'];
        			new Mensaje($respuesta, '../index.php');
			}
		}
	

	}

?>
