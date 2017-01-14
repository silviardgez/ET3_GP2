<?php

include '../Models/USUARIO_Model.php';
include '../Views/USUARIO_EDIT_ACCIONES_Vista.php';

include '../Views/MENSAJE_Vista.php';
include '../Views/LOGIN_Vista.php';



if (!IsAuthenticated()  ){
	header('Location:../index.php');
}

include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
//Realizamos los includes de las páginas a las que tiene acceso
$pags=generarIncludes();

for ($z=0;$z<count($pags);$z++){
	include $pags[$z];
}
//Método que recoge la información del formulario
function get_data_form(){


	$USUARIO_USER=$_REQUEST['USUARIO_USER'];
	$USUARIO_PASSWORD=$_REQUEST['USUARIO_PASSWORD'];
	$USUARIO_CUENTA=$_REQUEST['USUARIO_CUENTA'];
	$USUARIO_TIPO=ConsultarIDRol($_REQUEST['USUARIO_TIPO']);

	$USUARIO_ESTADO=$_REQUEST['USUARIO_ESTADO'];
	$USUARIO_DNI = $_REQUEST['USUARIO_DNI'];
	$USUARIO_EMAIL = $_REQUEST['USUARIO_EMAIL'];
	$USUARIO_FECH_NAC = $_REQUEST['USUARIO_FECH_NAC'];
	$USUARIO_DIRECCION = $_REQUEST['USUARIO_DIRECCION'];
	$USUARIO_NOMBRE = $_REQUEST['USUARIO_NOMBRE'];
	$USUARIO_APELLIDO = $_REQUEST['USUARIO_APELLIDO'];
	$USUARIO_TELEFONO = $_REQUEST['USUARIO_TELEFONO'];
	$USUARIO_COMENTARIOS = $_REQUEST['USUARIO_COMENTARIOS'];

//Si no se ha introducido un nuevo archivo se deja el que había
	if (isset($_FILES['USUARIO_FOTO']['name']) && ($_FILES['USUARIO_FOTO']['name']!=='')) {

		$USUARIO_FOTO = '../Documents/Empleados/' . $_REQUEST['USUARIO_DNI'] . '/Foto/' . $_FILES['USUARIO_FOTO']['name'];

	}
	else {

		$USUARIO_FOTO='';

	}

	$accion = $_REQUEST['accion'];
//crea el empleado con los datos anteriores
	$usuario = new USUARIO_Modelo($USUARIO_USER, $USUARIO_PASSWORD, $USUARIO_FECH_NAC, $USUARIO_EMAIL, $USUARIO_NOMBRE, $USUARIO_APELLIDO, $USUARIO_DNI, $USUARIO_TELEFONO, $USUARIO_CUENTA, $USUARIO_DIRECCION, $USUARIO_COMENTARIOS, $USUARIO_TIPO, $USUARIO_ESTADO,$USUARIO_FOTO);

	return $usuario;
}

if (!isset($_REQUEST['accion'])){
	$_REQUEST['accion'] = '';
}
//Actúa según la acción elegida
	Switch ($_REQUEST['accion']){
		case  $strings['Insertar']:
			if (!isset($_REQUEST['USUARIO_USER'])){ //Si aún no se ha establecido el usuario
				if(!tienePermisos('USUARIO_Insertar')){//Siempre que no tenga los permisos mostrará un mensaje de aviso
					new Mensaje('No tienes los permisos necesarios','USUARIO_Controller.php');
				}
				else {//Muestra el formulario para insertar
					new USUARIO_Insertar();
				}
			}
			else{


				$_REQUEST['USUARIO_ESTADO']='Activo'; //Siempre que se inserta estará activo en un principio
				$usuario = get_data_form();
				//Creamos las carpetas para guardar los archivos
				$carpetaFoto='../Documents/Empleados/'.$_REQUEST['USUARIO_DNI'].'/Foto/';


				if($_FILES['USUARIO_FOTO']['name']!=='') {
					if (!file_exists($carpetaFoto)) {
						mkdir($carpetaFoto, 0777, true);
					}

					move_uploaded_file($_FILES['USUARIO_FOTO']['tmp_name'], $carpetaFoto . $_FILES['USUARIO_FOTO']['name']);
				}


				 //Insertamos el usuario
				$respuesta = $usuario->Insertar();
				new Mensaje($respuesta, 'USUARIO_Controller.php');
			}
			break;
		case  $strings['Registro']:
			if (!isset($_REQUEST['USUARIO_USER'])){ //Si aún no se ha establecido el usuario
				if(!tienePermisos('USUARIO_Insertar')){//Siempre que no tenga los permisos mostrará un mensaje de aviso
					new Mensaje('No tienes los permisos necesarios','USUARIO_Controller.php');
				}
				else {//Muestra el formulario para insertar
					new USUARIO_Registrar();
				}
			}
			else{


				$_REQUEST['USUARIO_ESTADO']='Activo'; //Siempre que se inserta estará activo en un principio
				$_REQUEST['USUARIO_TIPO']='3';
				$_REQUEST['USUARIO_COMENTARIOS']='';
				$usuario = get_data_form();
				//Creamos las carpetas para guardar los archivos
				$carpetaFoto='../Documents/Empleados/'.$_REQUEST['USUARIO_DNI'].'/Foto/';


				if($_FILES['USUARIO_FOTO']['name']!=='') {
					if (!file_exists($carpetaFoto)) {
						mkdir($carpetaFoto, 0777, true);
					}

					move_uploaded_file($_FILES['USUARIO_FOTO']['tmp_name'], $carpetaFoto . $_FILES['USUARIO_FOTO']['name']);
				}


				//Insertamos el usuario
				$respuesta = $usuario->Insertar();
				new Mensaje($respuesta, 'USUARIO_Controller.php');
			}
			break;
		case  $strings['Borrar']:
			if (!isset($_REQUEST['USUARIO_NOMBRE'])){
				//Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
				$usuario = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], '', '', '', '', '', '', '', '','','', '', '', '');
				$valores = $usuario->RellenaDatos($_REQUEST['USUARIO_USER']);
				if(!tienePermisos('USUARIO_Borrar')){
					new Mensaje('No tienes los permisos necesarios','USUARIO_Controller.php');
				}
				else {
					//muestra el formulario de borrado
					new USUARIO_Borrar($valores, 'USUARIO_Controller.php');
				}
			}
			else{ //Estos campos no se muestran en el formulario de borrado por lo que se ponen vacíos
				$_REQUEST['USUARIO_PASSWORD']='';

				$_REQUEST['USUARIO_ESTADO']='';
				$_REQUEST['USUARIO_TIPO']='';
				$usuario = get_data_form();
				$respuesta = $usuario->Borrar();
				new Mensaje($respuesta, 'USUARIO_Controller.php');
			}
			break;
		case  $strings['Modificar']:


			if (!isset($_REQUEST['USUARIO_DNI'])){
				//Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
				$usuario = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], '', '', '', '', '', '', '', '','','', '', '', '');
				$valores = $usuario->RellenaDatos($_REQUEST['USUARIO_USER']);
				if(!tienePermisos('USUARIO_Modificar')|| (consultarRol($_SESSION['login'])=='4' && (!mismaMateria($_REQUEST['USUARIO_USER']) || (consultarRol($_REQUEST['USUARIO_USER'])=='4')))){
					new Mensaje('No tienes los permisos necesarios','USUARIO_Controller.php');
				}
				else {
					//Muestra el formulario de modificación
					new USUARIO_Modificar($valores, 'USUARIO_Controller.php');
				}
			}
			else{


				$usuario = get_data_form();
				$carpetaFoto='../Documents/Empleados/'.$_REQUEST['USUARIO_DNI'].'/Foto/';


					//Se realizan las modificaciones también en las carpetas de documentos
				if($_FILES['USUARIO_FOTO']['name']!=='') {
					if (!file_exists($carpetaFoto)) {
						mkdir($carpetaFoto, 0777, true);
					}

					move_uploaded_file($_FILES['USUARIO_FOTO']['tmp_name'], $carpetaFoto . $_FILES['USUARIO_FOTO']['name']);
				}

				$respuesta = $usuario->Modificar();
				new Mensaje($respuesta, 'USUARIO_Controller.php');
			}
			break;
		case  $strings['Consultar']:
			if (!isset($_REQUEST['USUARIO_USER'])){
				if(!tienePermisos('USUARIO_Consultar')){
					new Mensaje('No tienes los permisos necesarios','USUARIO_Controller.php');
				}
				else { //Se muestra el formulario de consulta
					new USUARIO_Consultar();
				}
			}
			else{

//Establecemos a cadena vacía la información que no se obtiene del formulario

				$_REQUEST['USUARIO_TIPO']='';
			$_REQUEST['USUARIO_ESTADO']='';


				$_REQUEST['USUARIO_PASSWORD']='';
		$_REQUEST['USUARIO_COMENTARIOS']='';

				$_REQUEST['USUARIO_FOTO']='';


				$usuario = get_data_form();
				$datos = $usuario->Consultar();


				new USUARIO_ShowConsulta($datos, 'USUARIO_Controller.php');
			}
			break;
		case $strings['Modificar acciones']:

if (!isset($_REQUEST['funcionalidad_paginas'])) { //Consulta de las páginas asociadas
	$empleado = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], '', '', '', '', '', '', '', '', '', '', '', '', '');

	$valores = $empleado->ConsultarPaginas();


	if (!tienePermisos('USUARIO_Edit_Accion')) {
		new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
	} else {

		new USUARIO_Edit_Accion($_REQUEST['USUARIO_USER'],$valores, 'USUARIO_Controller.php');
	}
}
else{
	$empleado = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], '', '', '', '', '', '', '', '', '', '', '', '', '');
 		$empleado->ModificarPaginas($_REQUEST['funcionalidad_paginas']);
	new Mensaje('El usuario se ha modificado con éxito', 'USUARIO_Controller.php');
}
			break;

		default:
//Por defecto se realiza el show all

			if (!isset($_REQUEST['USUARIO_USER'])){
				$usuario = new USUARIO_Modelo('','', '', '', '', '', '', '', '','','', '', '', '');
			}
			else{
				$usuario = get_data_form();
			}
				$datos = $usuario->ConsultarTodo();

			if(!tienePermisos('USUARIO_Show')){
				new Mensaje('No tienes los permisos necesarios','../Views/DEFAULT_Vista.php');
			}
			else {
				new USUARIO_Show($datos, '../Views/DEFAULT_Vista.php');
			}
						
	}



?>
