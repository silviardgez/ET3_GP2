<?php

include '../Models/ITEM_Model.php';
include '../Functions/LibraryFunctions.php';
include '../Views/MENSAJE_Vista.php';
include '../Views/MENSAJE_ALT_Vista.php';

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
    if(isset($_REQUEST['ITEM_ID'])){
          $ITEM_ID = $_REQUEST['ITEM_ID'];
    }
    else {
        $ITEM_ID ='';
    }
    
    $ITEM_NOMBRE = $_REQUEST['ITEM_NOMBRE'];
    $ITEM_RUBRICA = $_REQUEST['ITEM_RUBRICA'];
    $ITEM_PORCENTAJE = $_REQUEST['ITEM_PORCENTAJE'];

    $item = new ITEM_Model($ITEM_ID, $ITEM_NOMBRE, $ITEM_RUBRICA, $ITEM_PORCENTAJE);
    
    return $item;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}
Switch ($_REQUEST['accion']) { //Según la acción que envíen los formularios, el controlador redirige el comportamiento del programa

    case $strings['Insertar']: //Inserción de nuevas Rubricas
        if (!isset($_REQUEST['ITEM_NOMBRE'])) {
            if (!tienePermisos('ITEM_ADD')) {
                new Mensaje('No tienes los permisos necesarios', 'ITEM_Controller.php');
            } else {
                new ITEM_ADD($_REQUEST['RUBRICA_ID']);
            }
        } else {
            $item = get_data_form();
            $respuesta = $item->Insertar();
            new Mensaje_ALT($respuesta, 'ITEM_Controller.php?RUBRICA_ID=', $_REQUEST['ITEM_RUBRICA']);
        }
        break;


    case $strings['Borrar']: //Borrado de items de una rubrica
        if (!isset($_REQUEST['ITEM_NOMBRE'])) {
            //$rubrica = new RUBRICA_Model($_REQUEST['RUBRICA_ID'], '', '', '', '');
            $item = new ITEM_Model($_REQUEST['ITEM_ID'], '', $_REQUEST['ITEM_RUBRICA'], '');
            $valores = $item->RellenaDatos();
            if (!tienePermisos('ITEM_DELETE')) {
                new Mensaje('No tienes los permisos necesarios', 'ITEM_Controller.php');
            } else {
                new ITEM_DELETE($valores, $_REQUEST['ITEM_RUBRICA'] );
            }
        } else {
            $item = get_data_form();
            $respuesta = $item->Borrar();
            new Mensaje_ALT($respuesta, 'ITEM_Controller.php?RUBRICA_ID=', $_REQUEST['ITEM_RUBRICA']);
        }
        break;



    case $strings['Modificar']: //Modificación de items de una rubrica
        if (!isset($_REQUEST['ITEM_NOMBRE'])) {
        $item = new ITEM_Model($_REQUEST['ITEM_ID'], '', $_REQUEST['ITEM_RUBRICA'], '');
            $valores = $item->RellenaDatos();
            if (!tienePermisos('ITEM_EDIT')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new ITEM_EDIT($valores, $_REQUEST['ITEM_RUBRICA']);
            }
        } else {
            $item = get_data_form();
            $respuesta = $item->Modificar();
            new Mensaje_ALT($respuesta, 'ITEM_Controller.php?RUBRICA_ID=', $_REQUEST['ITEM_RUBRICA']);
        }
        break;


    case $strings['Consultar']:  //Consulta de Item de una rubrica
        if (!isset($_REQUEST['ITEM_NOMBRE'])) {
            if (!tienePermisos('ITEM_SHOWCURRENT')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new ITEM_SHOWCURRENT($_REQUEST['RUBRICA_ID']);
            }
        } else {
            $item = get_data_form();
            $datos = $item->Consultar();
           new ITEM_SHOWALL($datos, '../Controllers/RUBRICA_Controller.php', $_REQUEST['ITEM_RUBRICA']);
        }
        break;


    default: //Al entrar en la funcionalidad, se muestran todas los items d euna rubrica 
        $item = new ITEM_Model('', '', $_REQUEST['RUBRICA_ID'], '');
        $datos = $item->ConsultarTodo();
//        $nivel = new NIVEL_Model('', '', '', $_REQUEST['RUBRICA_ID'], '');
//        $datos2 = $nivel->ConsultarTodo();
        if (!tienePermisos('ITEM_SHOWALL')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new ITEM_SHOWALL($datos, '../Controllers/RUBRICA_Controller.php', $_REQUEST['RUBRICA_ID']);
        }
}
?>
