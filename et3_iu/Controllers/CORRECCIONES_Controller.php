<?php 

include '../Models/CORRECCIONES_Model.php';
include '../Views/MENSAJE_Vista.php';

if(!isAuthenticated())
{
	header('Location: ../index.php');
}

include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

//Generamos los includes correspondientes a las páginas a las que se tiene acceso
/*$pags=generarIncludes();
for ($z=0;$z<count($pags);$z++){
	include $pags[$z];
}*/
include '../Views/CORRECCIONES_ADD_ENTREGA_Vista.php';
include '../Views/CORRECCIONES_ADD_RUBRICA_Vista.php';
include '../Views/CORRECCIONES_ADD_Vista.php';
include '../Views/CORRECCIONES_DELETE_Vista.php';
include '../Views/CORRECCIONES_EDIT_Vista.php';
include '../Views/CORRECCIONES_SHOW_Vista.php';
include '../Views/CORRECCIONES_SHOWALL_Vista.php';
include '../Views/CORRECCIONES_SHOWCURRENT_Vista.php';
require_once('../Functions/LibraryFunctions.php');



if(isset($_REQUEST['ENTREGA_ID']))
{
	$ENTREGA_ID = $_REQUEST['ENTREGA_ID'];
}
if(isset($_REQUEST['RUBRICA_ID']))
{
	$RUBRICA_ID = $_REQUEST['RUBRICA_ID'];
}

if(isset($_REQUEST['NUMFILAS']))
{
	$numeroFilas = $_REQUEST['NUMFILAS'];
}

if(isset($_REQUEST['NUMNIV']))
{
	$numNiv = $_REQUEST['NUMNIV'];
}



$puntuaciones = array();
if(isset($_REQUEST['NUMFILAS']))
{
$numeroFilas = (integer)$_REQUEST['NUMFILAS'];
for($i = 0; $i<=$numeroFilas;$i++)
{
	if(isset($_REQUEST['Button'.$i]))
	{
		$puntuaciones[$i] = (integer)$_REQUEST['Button'.$i];
	}
}
}


function get_data_form(){

//recogemos la información del formulario
	isset($_REQUEST['CORRECCION_NOM']) ? $CORRECCION_NOM = $_REQUEST['CORRECCION_NOM'] : $CORRECCION_NOM = '';
	isset($_REQUEST['RUBRICA_ID']) ? $CORRECCION_RUBRICA = $_REQUEST['RUBRICA_ID'] : $CORRECCION_RUBRICA = '';
	isset($_REQUEST['ENTREGA_ID']) ? $CORRECCION_ENTREGA = $_REQUEST['ENTREGA_ID'] : $CORRECCION_ENTREGA = '';
    isset($_SESSION['login']) ? $CORRECCION_PROFESOR = $_SESSION['login'] : $CORRECCION_PROFESOR = '';
	isset($_REQUEST['CORRECCION_COMENTARIOS']) ? $CORRECCION_COMENTARIOS = $_REQUEST['CORRECCION_COMENTARIOS'] : $CORRECCION_COMENTARIOS = '';

	$accion = $_REQUEST['accion'];

	$correccion = new CORRECCIONES_Model( $CORRECCION_NOM,$CORRECCION_RUBRICA,$CORRECCION_ENTREGA,$CORRECCION_COMENTARIOS,$CORRECCION_PROFESOR);

	return $correccion;
}

if(!isset($_REQUEST['accion']))
{
	$_REQUEST['accion'] = '';
}

Switch($_REQUEST['accion'])
{
	    case $strings['Insertar']:
		if(!isset($_REQUEST['ENTREGA_ID']))
		{
			if(!tienePermisos('CORRECCION_Entrega'))
			{
				new Mensaje('No tienes los permisos necesarios','CORRECCIONES_Controller.php');
			}

			else
			{
				$correccion = new CORRECCIONES_Model('','','','','','');
				$datos = $correccion->consultarEntregas();
				new CORRECCION_Entrega($datos,'CORRECCIONES_Controller.php');
			}
		}
		else if(!isset($_REQUEST['RUBRICA_ID']))
		{
			if(!tienePermisos('CORRECCION_Rubrica'))
			{
				new Mensaje('No tienes los permisos necesarios','CORRECCIONES_Controller.php');
			}
			else
			{
				$correccion = new CORRECCIONES_Model('','','','','','');
				$datos = $correccion->consultarRubricas();
				new CORRECCION_Rubrica($ENTREGA_ID,$datos,'CORRECCIONES_Controller.php');
			}
		}
		else if(!isset($_REQUEST['CORRECCION_NOM']))
		{
			if(!tienePermisos('CORRECCION_Insertar'))
			{
				new Mensaje('No tienes los permisos necesarios','CORRECCIONES_Controller.php');
			}
			else
			{
				$correccion = new CORRECCIONES_Model('','','','','','');
				$items = $correccion->consultarItemsRubrica($RUBRICA_ID);
				$niveles = $correccion->consultarNivelesRubrica($RUBRICA_ID);
				$numNiveles = $correccion->consultarNumeroNiveles($RUBRICA_ID);
				new CORRECCION_Insertar($ENTREGA_ID,$RUBRICA_ID,$items,$niveles,$numNiveles,'CORRECCIONES_Controller.php');
			}

		}
		else
		{
			$correccion = get_data_form();
			$numeroNiveles = $correccion->consultarNumeroNiveles($RUBRICA_ID);
			$nota = $correccion->calcularNota($puntuaciones,(($numeroNiveles-1)*($numeroFilas)));
			$correccion->setNota($nota);
			$respuesta = $correccion->insertar();
			new Mensaje($respuesta,"CORRECCIONES_Controller.php");

		}
		
			
		//COMPLETAR ESTA PARTE.
		break;
			case  $strings['Consultar']:
			if (!isset($_REQUEST['CORRECCION_NOM'])){
				if(!tienePermisos('CORRECCION_Consultar')){
					new Mensaje('No tienes los permisos necesarios','CORRECCIONES_Controller.php');
				}
				else { //Se muestra el formulario de consulta
					new CORRECCION_Consultar();
				}
			}
			else{
				$correccion = get_data_form();
				$correccion->setNota($_REQUEST['CORRECCION_NOTA']);
				$datos = $correccion->Consultar();


				new CORRECCION_ShowConsulta($datos, 'CORRECCIONES_Controller.php');
			}
			break;
		case  $strings['Borrar']:
			if (!isset($_REQUEST['CORRECCION_NOTA'])){
				//Crea una correccion solo con la ID para rellenar posteriormente sus datos y mostrarlos en el formulario
				$correccion = new CORRECCIONES_Model($_REQUEST['CORRECCION_NOM'],'', '', '', '');
				$valores = $correccion->RellenaDatos($_REQUEST['CORRECCION_NOM']);
				if(!tienePermisos('CORRECCION_Borrar')){
					new Mensaje('No tienes los permisos necesarios','CORRECCION_Controller.php');
				}
				else {
					//muestra el formulario de borrado
					new CORRECCION_Borrar($valores, 'CORRECCIONES_Controller.php');
				}
			}
			else{ //Estos campos no se muestran en el formulario de borrado por lo que se ponen vacíos
				$correccion = get_data_form();
				$respuesta = $correccion->Borrar();
				new Mensaje($respuesta, 'CORRECCIONES_Controller.php');
			}
			break;
	    

	    default:
	         if(!isset($_REQUEST['CORRECCION_NOM']))
	         {
	         	$correccion = new CORRECCIONES_Model('','','','','','');
	         }
	         else
	         {
	         	$correccion = get_data_form();
	         }

	         $datos = $correccion->ConsultarTodo();

	         if(!tienePermisos('CORRECCION_Show'))
	         {
	         	new Mensaje('No tienes los permisos necesarios','../Views/DEFAULT_Vista.php');
	         }

	         else
	         {
	         	new CORRECCION_Show($datos,'../Views/DEFAULT_Vista.php');
	         }


}