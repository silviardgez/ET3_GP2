<?php

include '../Models/RUBRICA_Model.php';
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
function get_data_form() {
    if(isset($_REQUEST['RUBRICA_ID'])){
          $RUBRICA_ID = $_REQUEST['RUBRICA_ID'];
    }
    else {
        $RUBRICA_ID ='';
    }
    $RUBRICA_NOMBRE = $_REQUEST['RUBRICA_NOMBRE'];
    $RUBRICA_DESCRIPCION = $_REQUEST['RUBRICA_DESCRIPCION'];
    $RUBRICA_NIVELES = $_REQUEST['RUBRICA_NIVELES'];
     if(isset($_REQUEST['RUBRICA_AUTOR'])){
          $RUBRICA_AUTOR = $_REQUEST['RUBRICA_AUTOR'];
    }
    else {
        $RUBRICA_AUTOR =$_SESSION['login'];
    }
    $rubrica = new RUBRICA_Model($RUBRICA_ID, $RUBRICA_NOMBRE, $RUBRICA_DESCRIPCION, $RUBRICA_NIVELES, $RUBRICA_AUTOR);
    return $rubrica;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}
Switch ($_REQUEST['accion']) {

    case $strings['Insertar']:
        if (!isset($_REQUEST['RUBRICA_NOMBRE'])) {
            if (!tienePermisos('RUBRICA_ADD')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new RUBRICA_ADD();
            }
        } else {
            $rubrica = get_data_form();
            $respuesta = $rubrica->Insertar();
            new Mensaje($respuesta, 'RUBRICA_Controller.php');
        }
        break;


    case $strings['Borrar']: //Borrado de roles
        if (!isset($_REQUEST['RUBRICA_NOMBRE'])) {
            $rubrica = new RUBRICA_Model($_REQUEST['RUBRICA_ID'], '', '', '', '');
            $valores = $rubrica->RellenaDatos();
            if (!tienePermisos('RUBRICA_DELETE')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new RUBRICA_DELETE($valores, 'RUBRICA_Controller.php');
            }
        } else {
            $rubrica = get_data_form();
            $respuesta = $rubrica->Borrar();
            new Mensaje($respuesta, 'RUBRICA_Controller.php');
        }
        break;



    case $strings['Modificar']: //Modificación de pagos
        if (!isset($_REQUEST['RUBRICA_NOMBRE'])) {
        $rubrica = new RUBRICA_Model($_REQUEST['RUBRICA_ID'], '', '', '', '');
            $valores = $rubrica->RellenaDatos();
            if (!tienePermisos('RUBRICA_EDIT')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new RUBRICA_EDIT($valores, 'RUBRICA_Controller.php');
            }
        } else {
            $rubrica = get_data_form();
            $respuesta = $rubrica->Modificar();
            new Mensaje($respuesta, 'RUBRICA_Controller.php');
        }
        break;


    case $strings['Consultar']:  //Consulta de Rúbricas
        if (!isset($_REQUEST['RUBRICA_NOMBRE'])) {
            if (!tienePermisos('RUBRICA_SHOWCURRENT')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new RUBRICA_SHOWCURRENT();
            }
        } else {
            $rubrica = get_data_form();
            $datos = $rubrica->Consultar();
           new RUBRICA_SHOWALL($datos, 'RUBRICA_Controller.php');
            // }
        }
        break;


    default: //Al entrar en la funcionalidad, se muestran todas las rúbricas 
        $rubrica = new RUBRICA_Model('', '', '', '', '');
        $datos = $rubrica->ConsultarTodo();
        if (!tienePermisos('RUBRICA_SHOWALL')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new RUBRICA_SHOWALL($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
