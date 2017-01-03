<?php

include '../Models/DOCUMENTACION_Model.php';
include '../Views/MENSAJE_Vista.php';
include '../Views/LOGIN_Vista.php';


if (!IsAuthenticated()){
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

	$DOCUMENTACION_NOM=$_REQUEST['DOCUMENTACION_NOM'];
	$DOCUMENTACION_PROFESOR=$_REQUEST['DOCUMENTACION_PROFESOR'];
	$DOCUMENTACION_MATERIA=ConsultarIDMateria($_REQUEST['DOCUMENTACION_MATERIA']);
	$DOCUMENTACION_FECHA=$_REQUEST['DOCUMENTACION_FECHA'];
	$DOCUMENTACION_ENLACE=$_REQUEST['DOCUMENTACION_ENLACE'];
	$DOCUMENTACION_CATEGORIA=$_REQUEST['DOCUMENTACION_CATEGORIA'];

	/*//Si no se ha introducido un nuevo archivo se deja el que habÃ­a
	if (isset($_FILES['USUARIO_FOTO']['name']) && ($_FILES['USUARIO_FOTO']['name']!=='')) {

		$USUARIO_FOTO = '../Documents/Empleados/' . $_REQUEST['USUARIO_DNI'] . '/Foto/' . $_FILES['USUARIO_FOTO']['name'];

	}
	else {

		$USUARIO_FOTO='';

	}*/

	$accion = $_REQUEST['accion'];
	
	//crea la documentacion con los datos anteriores
	$documentacion = new DOCUMENTACION_Model($DOCUMENTACION_NOM, $DOCUMENTACION_PROFESOR, $DOCUMENTACION_MATERIA, $DOCUMENTACION_FECHA, $DOCUMENTACION_ENLACE, $DOCUMENTACION_CATEGORIA);

	return $documentacion;
}

if (!isset($_REQUEST['accion'])){
	$_REQUEST['accion'] = '';
}

//Actúa según la acción elegida
Switch ($_REQUEST['accion']){

	case  $strings['Insertar']:
		if (!isset($_REQUEST['DOCUMENTACION_NOM'])){ //Si aún no se ha establecido el usuario
			if(!tienePermisos('DOCUMENTACION_Insertar')){//Siempre que no tenga los permisos mostrará un mensaje de aviso
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php');
			}
			else {//Muestra el formulario para insertar
				new DOCUMENTACION_Insertar();
			}
		}
		else{

			//$_REQUEST['USUARIO_ESTADO']='Activo'; //Siempre que se inserta estarÃ¡ activo en un principio
			$usuario = get_data_form();
			//Creamos las carpetas para guardar los archivos
			$carpeta='../Documents/Documentacion/';


			/*if($_FILES['DOCUMENTACION_ENLACE']['name']!=='') {
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}

				move_uploaded_file($_FILES['DOCUMENTACION_ENLACE']['tmp_name'], $carpeta . $_FILES['DOCUMENTACION_ENLACE']['name']);
			}*/

			//Insertamos el usuario
			$respuesta = $documentacion->Insertar();
			new Mensaje($respuesta, 'DOCUMENTACION_Controller.php');
		}
		break;


	case  $strings['Borrar']:
		if (!isset($_REQUEST['DOCUMENTACION_ID'])){
			//Crea un documento solo con el id para rellenar posteriormente sus datos y mostrarlos en el formulario
			$documento = new DOCUMENTACION_Model($_REQUEST['DOCUMENTACION_NOM'], '', '', '', '', '');
			$valores = $documento->RellenaDatos();
			$valores['DOCUMENTACION_PROFESOR'] = ConsultarNomProfesor($valores['DOCUMENTACION_PROFESOR']);
			$valores['DOCUMENTACION_MATERIA'] = ConsultarNomMateria($valores['DOCUMENTACION_MATERIA']);
			if(!tienePermisos('DOCUMENTACION_DELETE')){
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php');
			}
			else {
				//muestra el formulario de borrado
				new DOCUMENTACION_DELETE($valores, 'DOCUMENTACION_Controller.php');
			}
		}
		else{ 

			$documento = get_data_form();
			$respuesta = $documento->Borrar();
			new Mensaje($respuesta, 'DOCUMENTACION_Controller.php');
		}
		break;


	case  $strings['Modificar']:

		if (!isset($_REQUEST['DOCUMENTACION_ID'])){
			//Crea un documento solo con el nombre para posteriormente rellenar el formulario con sus datos
			$documentacion = new DOCUMENTACION_Model($_REQUEST['DOCUMENTACION_NOM'], '', '', '', '', '');
			$valores = $documentacion->RellenaDatos();
			if(!tienePermisos('DOCUMENTACION_EDIT')){
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php');
			}
			else {
				//Muestra el formulario de modificación
				new DOCUMENTACION_EDIT($valores, 'DOCUMENTACION_Controller.php');
			}
		}
		else{
			//Estos campos no se muestran en el formulario de borrado por lo que se ponen vacíos
			$_REQUEST['DOCUMENTACION_ENLACE']='';
			$_REQUEST['DOCUMENTACION_FECHA']='';
			$documentacion = get_data_form();
			$carpeta='../Documents/Documentos/';


			//Se realizan las modificaciones también en las carpetas de documentos
			/*if($_FILES['DOCUMENTACION_ENLACE']['name']!=='') {
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}

				move_uploaded_file($_FILES['DOCUMENTACION_ENLACE']['tmp_name'], $carpeta . $_FILES['DOCUMENTACION_ENLACE']['name']);
			}*/

			$respuesta = $documentacion->Modificar($_REQUEST['DOCUMENTACION_ID']);
			new Mensaje($respuesta, 'DOCUMENTACION_Controller.php');
		}
		break;


	case  $strings['Consultar']:
		if (!isset($_REQUEST['DOCUMENTACION_NOM'])){
			if(!tienePermisos('DOCUMENTACION_SHOWCURRENT')){
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php');
			}
			else { //Se muestra el formulario de consulta
				new DOCUMENTACION_SHOWCURRENT();
			}
		}
		else{
			$documentacion = get_data_form();
            $datos = $documentacion->Consultar();
            new DOCUMENTACION_SHOWALL($datos, '../Controllers/DOCUMENTACION_Controller.php');
        }
		
		break;

	default:
		//Por defecto se realiza el show all

		if (!isset($_REQUEST['DOCUMENTACION_NOM'])){
			$documentacion = new DOCUMENTACION_Model('','', '', '', '', '', '');
		}
		else{
			$documentacion = get_data_form();
		}
		$datos = $documentacion->ConsultarTodo();

		if(!tienePermisos('DOCUMENTACION_SHOWALL')){
			new Mensaje('No tienes los permisos necesarios','../Views/DEFAULT_Vista.php');
		}
		else {
			new DOCUMENTACION_SHOWALL($datos, '../Views/DEFAULT_Vista.php');
		}

}


?>