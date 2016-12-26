<?php

include '../Models/RUBRICA_Model.php';
include '../Views/MENSAJE_Vista.php';
//include '../Views/RECIBO_Vista.php'; //Eliminar???

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
    $RUBRICA_ID = $_REQUEST['RUBRICA_ID'];
    $RUBRICA_NOMBRE = $_REQUEST['RUBRICA_NOMBRE'];
    $RUBRICA_DESCRIPCION = $_REQUEST['RUBRICA_DESCRIPCION'];
    $RUBRICA_NIVELES = $_REQUEST['RUBRICA_NIVELES'];
    $RUBRICA_AUTOR = $_REQUEST['RUBRICA_AUTOR'];
    $rubrica = new RUBRICA_Model($RUBRICA_ID, $RUBRICA_NOMBRE, $RUBRICA_DESCRIPCION, $RUBRICA_NIVELES, $RUBRICA_AUTOR);
    return $rubrica;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}
Switch ($_REQUEST['accion']) {

    case $strings['Insertar']: //Inserción de pagos //----- WORKING!! -----
        if (!isset($_REQUEST['PAGO_CONCEPTO'])) {
            if (!tienePermisos('PAGO_Insertar')) {
                new Mensaje('No tienes los permisos necesarios', 'PAGO_Controller.php');
            } else {
                new PAGO_Insertar();
            }
        } else {
            $pago = get_data_form();
            $respuesta = $pago->Insertar();
            // $pago->generarRecibo(); //GENERA EL RECIBO
            new Mensaje($respuesta, 'PAGO_Controller.php');
        }
        break;


    case $strings['Borrar']: //Borrado de roles
        if (!isset($_REQUEST['PAGO_CONCEPTO'])) {
            $pago = new PAGO_MODEL($_REQUEST['PAGO_ID'], '', '', '', '', '', '', '');
            $valores = $pago->RellenaDatos();
            if (!tienePermisos('PAGO_Borrar')) {
                new Mensaje('No tienes los permisos necesarios', 'PAGO_Controller.php');
            } else {
                new PAGO_Borrar($valores, 'PAGO_Controller.php');
            }
        } else {
            $pago = get_data_form();
            $respuesta = $pago->Borrar();
//$pago->borrarRecibo();
            new Mensaje($respuesta, 'PAGO_Controller.php');
        }
        break;



    case $strings['Modificar']: //Modificación de pagos
        if (!isset($_REQUEST['PAGO_CONCEPTO'])) {
            $pago = new PAGO_MODEL($_REQUEST['PAGO_ID'], '', '', '', '', '', '', '');
            $valores = $pago->RellenaDatos();
            if (!tienePermisos('PAGO_Modificar')) {
                new Mensaje('No tienes los permisos necesarios', 'PAGO_Controller.php');
            } else {
                new PAGO_Modificar($valores, 'PAGO_Controller.php');
            }
        } else {
            $pago = get_data_form();
            $respuesta = $pago->Modificar();
            // $respuesta = $pago->Modificar($_REQUEST['ROL_ID'], $rol->rol_funcionalidades);
            new Mensaje($respuesta, 'PAGO_Controller.php');
        }


        break;


    case $strings['Consultar']:  //Consulta de pagos
        if (!isset($_REQUEST['PAGO_CONCEPTO'])) {
            if (!tienePermisos('PAGO_Consultar')) {
                new Mensaje('No tienes los permisos necesarios', 'PAGO_Controller.php');
            } else {
                new PAGO_Consultar();
            }
        } else {
            $pago = get_data_form();
            $datos = $pago->Consultar();
            new PAGO_Show($datos, 'PAGO_Controller.php');
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
