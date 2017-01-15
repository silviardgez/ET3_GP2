<?php

include '../Models/ALUMNO_ENTREGA_Model.php';
include '../Locates/Strings_Castellano.php';
//include '../Functions/LibraryFunctions.php';
include '../Views/MENSAJE_Vista.php';

if (!IsAuthenticated()){
    header('Location:../index.php');
}

include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';

//Genera los includes según las páginas a las que tiene acceso
$pags=generarIncludes();
for ($z=0;$z<count($pags);$z++){
    include $pags[$z];
}

//Método que recoge la información del formulario
function get_data_form(){

    $ENTREGA_ID = $_REQUEST['ENTREGA_ID'];
    $USUARIO_USER = $_SESSION['login'];
    $HORAS_DEDIC = $_REQUEST['HORAS_DEDIC'];
    $FECHA = '';
    $HORA = '';

    if (isset($_FILES['DOCUMENTO']['name']) && ($_FILES['DOCUMENTO']['name']!=='')) {

        $DOCUMENTO = '../Documents/Entregas/' . $_SESSION['login'] . '/Doc/' . $_FILES['DOCUMENTO']['name'];

    }
    else {

        $DOCUMENTO='';

    }

    //Crea la entrega con  los datos anteriores.
    $entrega = new ALUMNO_ENTREGA_Model($ENTREGA_ID, $USUARIO_USER, $HORAS_DEDIC,$FECHA,$HORA,$DOCUMENTO);
    return $entrega;
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {

    case $strings['Añadir']: //Caso añadir alumno una archivo

        if (!isset($_REQUEST['HORAS_DEDIC'])){
        //Si aún no se ha establecido el usuario

            //Muestra el formulario para insertar
            include '../Views/ALUMNO_ENTREGA_ADD_Vista.php';
                new ALUMNO_ENTREGA_Añadir($_REQUEST['ENTREGA_ID']);

        }
        else{

            $entrega = get_data_form();
            //Creamos las carpetas para guardar los archivos
            $carpeta='../Documents/Entregas/'.$_SESSION['login'].'/Doc/';


            if($_FILES['DOCUMENTO']['name']!=='') {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                move_uploaded_file($_FILES['DOCUMENTO']['tmp_name'], $carpeta . $_FILES['DOCUMENTO']['name']);
            }


            //Insertamos el usuario
            $respuesta = $entrega->Insertar();
            new Mensaje($respuesta, 'ALUMNO_ENTREGA_Controller.php');
        }
        break;
    default:
        //La vista por defecto lista todas las entregas
        if (!isset($_REQUEST['HORAS_DEDIC'])) {
            include '../Models/ENTREGAS_Model.php';
            $entrega = new ENTREGAS_Model('', '', '');
        } else {
            $entrega = get_data_form();
        }
        $datos = $entrega->ConsultarTodo();

        if(!tienePermisos('ENTREGAS_Show')){
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        }else {
            new ENTREGAS_Show($datos, '../Views/DEFAULT_Vista.php');

        }

}

?>