<?php

include '../Models/TRABAJO_Model.php';
include '../Views/MENSAJE_Vista.php';

if (!IsAuthenticated()) {
    header('Location:../index.php');
}

include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

//Genera los includes según las páginas a las que tiene acceso
$pags = generarIncludes();

for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

//Recoge la información procendente de un formulario.
function get_data_form()
{
    if (isset($_REQUEST['TRABAJO_ID'])) {
        $TRABAJO_ID = $_REQUEST['TRABAJO_ID'];
    } else {
        $TRABAJO_ID = '';
    }

    $TRABAJO_NOM = $_REQUEST['TRABAJO_NOM'];
    $TRABAJO_DESCRIPCION = $_REQUEST['TRABAJO_DESCRIPCION'];
    $TRABAJO_MATERIA = $_REQUEST['TRABAJO_MATERIA'];

    if (isset($_REQUEST['TRABAJO_PROFESOR'])) {
        $TRABAJO_PROFESOR = $_REQUEST['TRABAJO_PROFESOR'];
    } else {
        $TRABAJO_PROFESOR = $_SESSION['login'];
    }

    $TRABAJO_FECHA_INICIO = $_REQUEST['TRABAJO_FECHA_INICIO'];
    $TRABAJO_FECHA_FIN = $_REQUEST['TRABAJO_FECHA_FIN'];

    date_default_timezone_set("Europe/Madrid");
    $date1 = date("Y-m-d");
    $date2 = date("h:i");
    $TRABAJO_FECHA_CREACION = $date1 . "T" . $date2;

    $trabajo = new TRABAJO_Model($TRABAJO_ID, $TRABAJO_NOM, $TRABAJO_DESCRIPCION, $TRABAJO_MATERIA, $TRABAJO_PROFESOR,
        $TRABAJO_FECHA_INICIO, $TRABAJO_FECHA_FIN, $TRABAJO_FECHA_CREACION);

    return $trabajo;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) { //Según la acción que envíen los formularios, el controlador redirige el comportamiento del programa
    case $strings['Insertar']: //Inserción de nuevas Trabajos
        if (!isset($_REQUEST['TRABAJO_NOM'])) {
            if (!tienePermisos('TRABAJO_ADD')) {
                new Mensaje('No tienes los permisos necesarios', 'TRABAJO_Controller.php');
            } else {
                new TRABAJO_ADD();
            }
        } else {
            $trabajo = get_data_form();
            $respuesta = $trabajo->Insertar();

            new Mensaje($respuesta, 'TRABAJO_Controller.php');
        }
        break;

    case $strings['Borrar']: //Borrado de trabajos
        if (!isset($_REQUEST['TRABAJO_NOM'])) {
            $trabajo = new TRABAJO_Model($_REQUEST['TRABAJO_ID'], '', '', '', '', '', '', '');
            $valores = $trabajo->RellenaDatos();
            if (!tienePermisos('TRABAJO_DELETE')) {
                new Mensaje('No tienes los permisos necesarios', 'TRABAJO_Controller.php');
            } else {
                new TRABAJO_DELETE($valores, 'TRABAJO_Controller.php');
            }
        } else {
            $trabajo = get_data_form();
            $respuesta = $trabajo->Borrar();

            new Mensaje($respuesta, 'TRABAJO_Controller.php');
        }
        break;

    case $strings['Modificar']: //Modificación de trabajos
        if (!isset($_REQUEST['TRABAJO_NOM'])) {
            $trabajo = new TRABAJO_Model($_REQUEST['TRABAJO_ID'], '', '', '', '', '', '', '');
            $valores = $trabajo->RellenaDatos();
            if (!tienePermisos('TRABAJO_EDIT')) {
                new Mensaje('No tienes los permisos necesarios', 'TRABAJO_Controller.php');
            } else {
                new TRABAJO_EDIT($valores, 'TRABAJO_Controller.php');
            }
        } else {
            $trabajo = get_data_form();

            $respuesta = $trabajo->Modificar();

            new Mensaje($respuesta, 'TRABAJO_Controller.php');
        }
        break;


    case $strings['Consultar']:  //Consulta de Rúbricas
        if (!isset($_REQUEST['TRABAJO_NOM'])) {
            if (!tienePermisos('TRABAJO_SHOWCURRENT')) {
                new Mensaje('No tienes los permisos necesarios', 'TRABAJO_Controller.php');
            } else {
                new TRABAJO_SHOWCURRENT();
            }
        } else {
            $trabajo = get_data_form();
            $datos = $trabajo->Consultar();

            new TRABAJO_SHOWALL($datos, 'TRABAJO_Controller.php');
            // }
        }
        break;


    default: //Al entrar en la funcionalidad, se muestran todas las rúbricas 
        $trabajo = new TRABAJO_Model('', '', '', '', '', '', '', '');
        $datos = $trabajo->ConsultarTodo();
        if (!tienePermisos('TRABAJO_SHOWALL')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new TRABAJO_SHOWALL($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>