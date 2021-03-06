<?php

include '../Models/DOCUMENTACION_Model.php';
include '../Views/DOCUMENTACION_SHOW_CATEGORIA_Vista.php';
include '../Views/MENSAJE_Vista.php';
include '../Views/LOGIN_Vista.php';


if (!IsAuthenticated()){
	header('Location:../index.php');
}

include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

//Realizamos los includes de las p�ginas a las que tiene acceso
$pags=generarIncludes();

for ($z=0;$z<count($pags);$z++){
	include $pags[$z];
}

//M�todo que recoge la informaci�n del formulario
function get_data_form(){

	$DOCUMENTACION_NOM=$_REQUEST['DOCUMENTACION_NOM'];
	$DOCUMENTACION_PROFESOR=$_REQUEST['DOCUMENTACION_PROFESOR'];
	$DOCUMENTACION_MATERIA=ConsultarIDMateria($_REQUEST['DOCUMENTACION_MATERIA']);
	$DOCUMENTACION_FECHA=$_REQUEST['DOCUMENTACION_FECHA'];
	$DOCUMENTACION_CATEGORIA=$_REQUEST['DOCUMENTACION_CATEGORIA'];

	//Si no se ha introducido un nuevo archivo se deja el que hab�a
	if (isset($_FILES['DOCUMENTACION_ENLACE']['name']) && ($_FILES['DOCUMENTACION_ENLACE']['name']!=='')) {
		$DOCUMENTACION_ENLACE = '../Documents/Documentacion/' . str_replace(' ', '_', $_FILES['DOCUMENTACION_ENLACE']['name']);
	}
	else {
		
		$DOCUMENTACION_ENLACE='';
	}

	$accion = $_REQUEST['accion'];
	
	//crea la documentacion con los datos anteriores
	$documentacion = new DOCUMENTACION_Model($DOCUMENTACION_NOM, $DOCUMENTACION_PROFESOR, $DOCUMENTACION_MATERIA, $DOCUMENTACION_FECHA, $DOCUMENTACION_ENLACE, $DOCUMENTACION_CATEGORIA);

	return $documentacion;
}

if (!isset($_REQUEST['accion'])){
	$_REQUEST['accion'] = '';
}

//Act�a seg�n la acci�n elegida
Switch ($_REQUEST['accion']){

	case  $strings['Insertar']:
	if (!isset($_REQUEST['DOCUMENTACION_NOM'])){ 
			if(!tienePermisos('DOCUMENTACION_ADD')){//Siempre que no tenga los permisos mostrar� un mensaje de aviso
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php');
			}
			else {//Muestra el formulario para insertar
				new DOCUMENTACION_ADD();
			}
		}
		else{
			$materia = $_REQUEST['DOCUMENTACION_MATERIA'];
			$_REQUEST['DOCUMENTACION_MATERIA'] = ConsultarNomMateria($_REQUEST['DOCUMENTACION_MATERIA']);
			$_REQUEST['DOCUMENTACION_FECHA']='';


			$_REQUEST['DOCUMENTACION_PROFESOR']=ConsultarUserDNI($_SESSION['login']);

			$documentacion = get_data_form();


			//Creamos las carpetas para guardar los archivos
			$carpeta='../Documents/Documentacion/';


			if($_FILES['DOCUMENTACION_ENLACE']['name']!=='') {
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}

				move_uploaded_file($_FILES['DOCUMENTACION_ENLACE']['tmp_name'], $carpeta . $_FILES['DOCUMENTACION_ENLACE']['name']);
			}


			//Insertamos el usuario
			$respuesta = $documentacion->Insertar();
			new Mensaje($respuesta, 'DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $materia);
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
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . ConsultarIDMateria($valores['DOCUMENTACION_MATERIA']));
			}
			else {
				//muestra el formulario de borrado
				new DOCUMENTACION_DELETE($valores, 'DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . ConsultarIDMateria($valores['DOCUMENTACION_MATERIA']));
			}
		}
		else{ 

			$documento = get_data_form();
			$respuesta = $documento->Borrar();

			new Mensaje($respuesta, 'DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . ConsultarIDMateria($_REQUEST['DOCUMENTACION_MATERIA']));
		}
		break;


		case  $strings['Modificar']:

		if (!isset($_REQUEST['DOCUMENTACION_ID'])){
			//Crea un documento solo con el nombre para posteriormente rellenar el formulario con sus datos
			$documentacion = new DOCUMENTACION_Model($_REQUEST['DOCUMENTACION_NOM'], '', '', '', '', '');
			$valores = $documentacion->RellenaDatos();
			if(!tienePermisos('DOCUMENTACION_EDIT')){
				new Mensaje('No tienes los permisos necesarios','DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $valores['DOCUMENTACION_MATERIA']);
			}
			else {
				//Muestra el formulario de modificaci�n 
				new DOCUMENTACION_EDIT($valores, $valores['DOCUMENTACION_MATERIA'], 'DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $valores['DOCUMENTACION_MATERIA']);
			}
		}
		else{
			//Estos campos no se muestran en el formulario de modificar por lo que se ponen vac�os
			$_REQUEST['DOCUMENTACION_FECHA']='';
			
			$_REQUEST['DOCUMENTACION_PROFESOR']=ConsultarUserDNI($_SESSION['login']);

			
			$documentacion = get_data_form();

			$carpeta='../Documents/Documentacion/';


			//Se realizan las modificaciones tambi�n en las carpetas de documentos
			if(isset($_FILES['DOCUMENTACION_ENLACE']['name']) && $_FILES['DOCUMENTACION_ENLACE']['name']!=='') {
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}

				move_uploaded_file($_FILES['DOCUMENTACION_ENLACE']['tmp_name'], $carpeta . $_FILES['DOCUMENTACION_ENLACE']['name']);
			}

			$respuesta = $documentacion->Modificar($_REQUEST['DOCUMENTACION_ID']);
			new Mensaje($respuesta, 'DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $_REQUEST['DOCUMENTACION_MATERIA']);
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

			$materia = $_REQUEST['DOCUMENTACION_MATERIA'];

			$datos = $documentacion->Consultar($materia);
			$datos[0]['DOCUMENTACION_MATERIA']= $materia;
			new DOCUMENTACION_SHOWALL($datos, '../Controllers/DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $materia);
		}
		
		break;

		case $strings['Ver']:
		//Por defecto se realiza el show all

		if (!isset($_REQUEST['DOCUMENTACION_NOM'])){
			$documentacion = new DOCUMENTACION_Model('','',$_REQUEST['DOCUMENTACION_MATERIA'], '', '', $_REQUEST['DOCUMENTACION_CATEGORIA']);
		}
		else{
			$documentacion = get_data_form();
		}

		$materia = $documentacion->getMateria();
		$datos = $documentacion->ConsultarTodo();

		if(!tienePermisos('DOCUMENTACION_SHOWALL')){
			new Mensaje('No tienes los permisos necesarios','../Views/DEFAULT_Vista.php');
		}
		else {
			new DOCUMENTACION_SHOWALL($datos, '../Controllers/DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=' . $materia);
		}

		break;

		default:
		//Por defecto se ven las categor�as y los documentos que no tienen categor�a

		if (!isset($_REQUEST['DOCUMENTACION_NOM'])){
			$documentacion = new DOCUMENTACION_Model('','',$_REQUEST['DOCUMENTACION_MATERIA'], '', '', '');
		}
		else{
			$documentacion = get_data_form();
		}
		
		$nombre=$documentacion->getMateria();
		$datos = $documentacion->ConsultarCategorias();
		$datosMateria = $documentacion->MateriaSinCategoria();

		if(!tienePermisos('DOCUMENTACION_SHOWALL')){
			new Mensaje('No tienes los permisos necesarios','../Views/DEFAULT_Vista.php');
		}
		else {
			new DOCUMENTACION_SHOW_CATEGORIA($datos, $datosMateria, $nombre, '../Controllers/MATERIA_Controller.php');
		}

	}


	?>