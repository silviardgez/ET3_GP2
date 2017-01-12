<?php

include '../Models/NIVEL_Model.php';
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

    if (isset($_REQUEST['NIVEL_ID'])) {
        $NIVEL_ID = $_REQUEST['NIVEL_ID'];
    } else {
        $NIVEL_ID = '';
    }
    //Recogemos el dato del dato del formulario
    $NIVEL_DESCRIPCION = $_REQUEST['NIVEL_DESCRIPCION'];
    $NIVEL_ITEM = $_REQUEST['NIVEL_ITEM'];
    if (isset($_REQUEST['NIVEL_RUBRICA'])) {
        $NIVEL_RUBRICA = $_REQUEST['NIVEL_RUBRICA'];
    } else {
        $NIVEL_RUBRICA = ConsultarIDRubrica($NIVEL_ITEM); //Como tenemos el ID del Item, realizamos una consulta que nos devuelva el ID de la Rubrica a la que esta asociado
    }
    $NIVEL_PORCENTAJE = $_REQUEST['NIVEL_PORCENTAJE'];

    $nivel = new NIVEL_Model($NIVEL_ID, $NIVEL_DESCRIPCION, $NIVEL_ITEM, $NIVEL_RUBRICA, $NIVEL_PORCENTAJE);  //Instanciamos un nuevo nivel con los datos 

    return $nivel;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}
Switch ($_REQUEST['accion']) { //Según la acción que envíen los formularios, el controlador redirige el comportamiento del programa

    case $strings['Modificar']: //Modificación de rubricas
        if (!isset($_REQUEST['NIVEL_DESCRIPCION'])) {
            $nivel = new NIVEL_Model($_REQUEST['NIVEL_ID'], '', $_REQUEST['NIVEL_ITEM'], '', '');
            $valores = $nivel->RellenaDatos();
            if (!tienePermisos('NIVEL_EDIT')) {
                new Mensaje('No tienes los permisos necesarios', 'ITEM_Controller.php');
            } else {
                new NIVEL_EDIT($valores, $_REQUEST['NIVEL_ITEM']);
            }
        } else {
            $nivel = get_data_form();

            $respuesta = $nivel->Modificar();
            new Mensaje_ALT($respuesta, 'NIVEL_Controller.php?ITEM_ID=', $_REQUEST['NIVEL_ITEM']);
        }
        break;


    case $strings['Consultar']:  //Consulta de Rúbricas

        if (!isset($_REQUEST['NIVEL_DESCRIPCION'])) {
            if (!tienePermisos('NIVEL_SHOWCURRENT')) {
                new Mensaje('No tienes los permisos necesarios', 'RUBRICA_Controller.php');
            } else {
                new NIVEL_SHOWCURRENT($_REQUEST['ITEM_ID']);
            }
        } else {
            $nivel = get_data_form();
            $datos = $nivel->Consultar();
            new NIVEL_SHOWALL($datos, '../Controllers/NIVEL_Controller.php?ITEM_ID=', $_REQUEST['NIVEL_ITEM']);

        }
        break;


    default: //Al entrar en la funcionalidad, se muestran todos los niveles de dicho item
        $nivel = new NIVEL_Model('', '', $_REQUEST['ITEM_ID'], '', '');
        $datos = $nivel->ConsultarTodo();
        if (!tienePermisos('NIVEL_SHOWALL')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new NIVEL_SHOWALL($datos, '../Controllers/ITEM_Controller.php?RUBRICA_ID=', $_REQUEST['ITEM_ID']);
        }
}
?>
