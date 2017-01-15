<?php

include '../Models/INSCRIPCION_Model.php';
include '../Views/MENSAJE_Vista.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
//Genera los includes según las páginas a las que tiene acceso
$pags=generarIncludes();

for ($z=0;$z<count($pags);$z++){
	include $pags[$z];
}


function get_data_form(){
//Recoge la información del formulario

	if(isset($_REQUEST['INSCRIPCION_ID'])){
        $INSCRIPCION_ID = $_REQUEST['INSCRIPCION_ID'];
    }else{
        $INSCRIPCION_ID ='';
    }
    if(isset($_REQUEST['INSCRIPCION_ALUMNO'])){
        $INSCRIPCION_ALUMNO = $_REQUEST['INSCRIPCION_ALUMNO'];
    }else{
        $INSCRIPCION_ALUMNO ='';
    }
	if(isset($_REQUEST['INSCRIPCION_MATERIA'])){
        $INSCRIPCION_MATERIA = $_REQUEST['INSCRIPCION_MATERIA'];
    }else{
        $INSCRIPCION_MATERIA ='';
    }

    $inscripcion = new INSCRIPCION_Model($INSCRIPCION_ID, $INSCRIPCION_ALUMNO, $INSCRIPCION_MATERIA);
    return $inscripcion;
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {
    case $strings['Insertar']: //Inserción de inscripciones
        if (!isset($_REQUEST['INSCRIPCION_MATERIA'])) {
            if (!tienePermisos('INSCRIPCION_ADD')) {
                new Mensaje('No tienes los permisos necesarios', 'INSCRIPCION_Controller.php');
            } else {
                new INSCRIPCION_ADD();
            }
        } else {
            $inscripcion = get_data_form();
            $respuesta = $inscripcion->Insertar();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php');
        }
        break;
    case $strings['Borrar']: //Borrado de inscripciones
        if (!isset($_REQUEST['INSCRIPCION_ID'])) {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['INSCRIPCION_ID'],'','');
            $valores = $inscripcion->RellenaDatos();
            if (!tienePermisos('INSCRIPCION_DELETE')) {
                new Mensaje('No tienes los permisos necesarios', 'INSCRIPCION_Controller.php');
            } else {
                new INSCRIPCION_DELETE($valores, 'INSCRIPCION_Controller.php');
            }
        } else {
            $inscripcion = get_data_form();
            $respuesta = $inscripcion->Borrar();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php');
        }
        break;
    case $strings['Modificar']: //Modificación de inscripción
        if (!isset($_REQUEST['INSCRIPCION_ID'])) {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['INSCRIPCION_ID'],'','');
            $valores = $inscripcion->RellenaDatos();
            if (!tienePermisos('INSCRIPCION_EDIT')) {
                new Mensaje('No tienes los permisos necesarios', 'INSCRIPCION_Controller.php');
            } else {
                new INSCRIPCION_EDIT($valores, 'INSCRIPCION_Controller.php');
            }
        } else {
            $inscripcion = get_data_form();
            $respuesta = $inscripcion->Modificar();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php');
        }
        break;
	case $strings['Aceptar']: //Aceptación de inscripciones
        if (!isset($_REQUEST['INSCRIPCION_ID'])) {
            $inscripcion = new INSCRIPCION_Model($_REQUEST['INSCRIPCION_ID'],'','');
            $valores = $inscripcion->RellenaDatos();
            if (!tienePermisos('INSCRIPCION_ACCEPT')) {
                new Mensaje('No tienes los permisos necesarios', 'INSCRIPCION_Controller.php');
            } else {
                new INSCRIPCION_ACCEPT($valores, 'INSCRIPCION_Controller.php');
            }
        } else {
            $inscripcion = get_data_form();
            $respuesta = $inscripcion->Aceptar();
            new Mensaje($respuesta, 'INSCRIPCION_Controller.php');
        }
        break;
    case $strings['Consultar']: //Consulta de inscripciones
        if (!isset($_REQUEST['INSCRIPCION_ID'])){
                if(!tienePermisos('INSCRIPCION_SHOWCURRENT')){
                    new Mensaje('No tienes los permisos necesarios','INSCRIPCION_Controller.php');
                }else { //Se muestra el formulario de consulta
                    new INSCRIPCION_SHOWCURRENT();
                }
            }else{
                $inscripcion = get_data_form();
                $datos = $inscripcion->Consultar();
                new INSCRIPCION_SHOWALL($datos, 'INSCRIPCION_Controller.php');
            }
            break;
        break;
    case $strings['Matricularse']: //Matricula al alumno en una materia
        $inscripcion=new INSCRIPCION_Model('', $_REQUEST['INSCRIPCION_ALUMNO'],$_REQUEST['INSCRIPCION_MATERIA']);
        $valores=$inscripcion->Matricularse();
            new Mensaje($valores, 'INSCRIPCION_Controller.php');

        break;
    case $strings['Desmatricularse']: //Desmatricula al alumno  de una materia
        $inscripcion=new INSCRIPCION_Model('', $_REQUEST['INSCRIPCION_ALUMNO'],$_REQUEST['INSCRIPCION_MATERIA']);
        $valores=$inscripcion->Desmatricularse();

        new Mensaje($valores, 'INSCRIPCION_Controller.php');

        break;
    default:
        //La vista por defecto lista todas las inscripciones
        $inscripcion = new INSCRIPCION_Model('','','');
        $datos = $inscripcion->ConsultarTodo();
        if (!tienePermisos('INSCRIPCION_SHOWALL')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new INSCRIPCION_SHOWALL($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>