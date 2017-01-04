<?php 

include '../Models/CORRECCIONES_Model.php';
include '../Views/MENSAJE_Vista.php';

if(!isAuthenticated())
{
	header('Location: ../index.php');
}

include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

//Generamos los includes correspondientes a las páginas a las que se tiene acceso
$pags=generarIncludes();
for ($z=0;$z<count($pags);$z++){
	include $pags[$z];
}

if(isset($_REQUEST['ENTREGA_ID']))
{
	$ENTREGA_ID = $_REQUEST['ENTREGA_ID'];
}
if(isset($_REQUEST['RUBRICA_ID']))
{
	$RUBRICA_ID = $_REQUEST['RUBRICA_ID'];
}
function get_data_form(){

//recogemos la información del formulario
	isset($_REQUEST['CORRECCION_NOM']) ? $CORRECCION_NOM = $_REQUEST['CORRECCION_NOM'] : $CORRECCION_NOM = '';
	isset($_REQUEST['CORRECCION_RUBRICA']) ? $CORRECCION_RUBRICA = $_REQUEST['CORRECCION_RUBRICA'] : $CORRECCION_RUBRICA = '';
	isset($_REQUEST['CORRECCION_ENTREGA']) ? $CORRECCION_ENTREGA = $_REQUEST['CORRECCION_ENTREGA'] : $CORRECCION_ENTREGA = '';
	isset($_REQUEST['CORRECCION_ID']) ? $CORRECCION_ID = $_REQUEST['CORRECCION_ID'] : $CORRECCION_ID = '';
	isset($_REQUEST['CORRECCION_NOTA']) ? $CORRECCION_NOTA = $_REQUEST['CORRECCION_NOTA'] : $CORRECCION_NOTA = '';

	$accion = $_REQUEST['accion'];

	$correccion = new CORRECCIONES_Model( $CORRECCION_NOM,$CORRECCION_RUBRICA,$CORRECCION_ID,$CORRECCION_ENTREGA,$CORRECCION_NOTA);

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
				$correccion = new CORRECCIONES_Model('','','','','');
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
				$correccion = new CORRECCIONES_Model('','','','','');
				$datos = $correccion->consultarRubricas();
				new CORRECCION_Rubrica($ENTREGA_ID,$datos,'CORRECCION_Controller.php');
			}
		}
		
			
		//COMPLETAR ESTA PARTE.
		break;
			case  $strings['Consultar']:
			if (!isset($_REQUEST['CORRECCION_ID'])){
				if(!tienePermisos('CORRECCION_Consultar')){
					new Mensaje('No tienes los permisos necesarios','CORRECCIONES_Controller.php');
				}
				else { //Se muestra el formulario de consulta
					new CORRECCION_Consultar();
				}
			}
			else{
				$correccion = get_data_form();
				$datos = $correccion->Consultar();


				new CORRECCION_ShowConsulta($datos, 'CORRECCIONES_Controller.php');
			}
			break;
		case  $strings['Borrar']:
			if (!isset($_REQUEST['CORRECCION_NOM'])){
				//Crea una correccion solo con la ID para rellenar posteriormente sus datos y mostrarlos en el formulario
				$correccion = new CORRECCIONES_Model('','', $_REQUEST['CORRECCION_ID'], '', '');
				$valores = $correccion->RellenaDatos($_REQUEST['CORRECCION_ID']);
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
	         if(!isset($_REQUEST['CORRECCION_ID']))
	         {
	         	$correccion = new CORRECCIONES_Model('','','','','');
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