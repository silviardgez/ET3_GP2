<?php

    include '../Models/ENTREGAS_Model.php';
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

        $ENTREGA_ID = '';
        $ENTREGA_NOM = $_REQUEST['ENTREGA_NOMBRE'];
        $ENTREGA_TRABAJO = $_REQUEST['ENTREGA_TRABAJO'];
        $ENTREGA_HORA = '';
        $ENTREGA_ALUM = '';
        $ENTREGA_FECHA = '';
        $ENTREGA_HORAS_DEDIC = $_REQUEST['ENTREGA_HORAS_DEDIC'];

        //Si no se ha introducido un nuevo archivo se deja el que había
        if (isset($_FILES['ENTREGA_FOTO']['name']) && ($_FILES['ENTREGA_FOTO']['name']!=='')) {

            $ENTREGA_FOTO = '../Documents/Archivos/' . $_REQUEST['ENTREGA_NOMBRE'] . '/Foto/' . $_FILES['ENTREGA_FOTO']['name'];

        }
        else {

            $ENTREGA_FOTO='';

        }
        //Crea la entrega con  los datos anteriores.
        $entrega = new ENTREGAS_Model($ENTREGA_ID, $ENTREGA_NOM, $ENTREGA_TRABAJO, $ENTREGA_HORA, $ENTREGA_FECHA, $ENTREGA_ALUM,$ENTREGA_HORAS_DEDIC,$ENTREGA_FOTO);
        return $entrega;
    }

    if (!isset($_REQUEST['accion'])){
        $_REQUEST['accion'] = '';
    }

    Switch ($_REQUEST['accion']) {
        case $strings['Insertar']: //Inserción de entregas
            if (!isset($_REQUEST['ENTREGA_NOMBRE'])) {

                if (!tienePermisos('ENTREGAS_Insertar')) {
                    new Mensaje('No tienes los permisos necesarios', 'ENTREGAS_Controller.php');
                } else {
                    //Mostramos el formulario para insertar la entrega
                    new ENTREGAS_Insertar();
                }
            } else {

                $entrega = get_data_form();
                //Creamos las carpetas para guardar los archivos
                $carpetaFoto='../Documents/Archivos/'.$_REQUEST['ENTREGA_NOMBRE'].'/Foto/';


                if($_FILES['ENTREGA_FOTO']['name']!=='') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }

                    move_uploaded_file($_FILES['ENTREGA_FOTO']['tmp_name'], $carpetaFoto . $_FILES['ENTREGA_FOTO']['name']);
                }

                //Insertamos la entrega
                $entrega = get_data_form();
                $respuesta = $entrega->Insertar();
                new Mensaje($respuesta, 'ENTREGAS_Controller.php');

            }
            break;
        case $strings['Borrar']: //Borrado de entregas
            if (!isset($_REQUEST['ENTREGA_ID'])) {
                $entrega = new ENTREGAS_Model('', $_REQUEST['ENTREGA_NOMBRE'], '', '', '', '','','');
                $valores = $entrega->RellenaDatos();

                if (!tienePermisos('Entrega_Delete')) {
                    new Mensaje('No tienes los permisos necesarios', 'ENTREGAS_Controller.php');
                } else {
                    new Entrega_Delete($valores, 'ENTREGAS_Controller.php');
                }
            } else {
                $entrega = get_data_form();
                $respuesta = $entrega->Borrar($_REQUEST['ENTREGA_ID']);
                new Mensaje($respuesta, 'ENTREGAS_Controller.php');
            }
            break;
        case $strings['Modificar']: //Modificación de entregas

            if (!isset($_REQUEST['ENTREGA_ID'])) {

                $entrega = new ENTREGAS_Model('', $_REQUEST['ENTREGA_NOMBRE'], '', '', '', '','','');
                $valores = $entrega->RellenaDatos();


                if (!tienePermisos('Entrega_Edit')) {
                    new Mensaje('No tienes los permisos necesarios', 'ENTREGAS_Controller.php');
                } else {

                    new Entrega_Edit($valores, 'ENTREGAS_Controller.php');
                }
            } else {

                $entrega = get_data_form();
                $carpetaFoto='../Documents/Archivos/'.$_REQUEST['ENTREGA_NOMBRE'].'/Foto/';


                //Se realizan las modificaciones también en las carpetas de documentos
                if($_FILES['ENTREGA_FOTO']['name']!=='') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }

                    move_uploaded_file($_FILES['ENTREGA_FOTO']['tmp_name'], $carpetaFoto . $_FILES['ENTREGA_FOTO']['name']);
                }


                $respuesta = $entrega->Modificar($_REQUEST['ENTREGA_ID']);
                new Mensaje($respuesta, 'ENTREGAS_Controller.php');

            }
            break;
        case $strings['Consultar']: //Consulta de entregas

            if (!isset($_REQUEST['ENTREGA_ID'])){

                if(!tienePermisos('Entrega_Show')){
                    new Mensaje('No tienes los permisos necesarios','ENTREGAS_Controller.php');
                }
                else { //Se muestra el formulario de consulta

                    new Entrega_Show();
                }
            }
            else{

                //Establecemos la cadena vacía con la información que no se obtiene del formulario

                $_REQUEST['ENTREGA_HORAS_DEDIC']='';
                $_REQUEST['ENTREGA_HORA']='';
                $_REQUEST['ENTREGA_FECHA']='';

                $entrega = get_data_form();
                $datos = $entrega->Consultar($_REQUEST['ENTREGA_ID']);


                new ENTREGAS_Show($datos, 'ENTREGAS_Controller.php');
            }
            break;

        default:
            //La vista por defecto lista todas las entregas
            if (!isset($_REQUEST['ENTREGA_NOMBRE'])) {
                $entrega = new ENTREGAS_Model('', '', '', '', '', '','','');
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