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
        $ENTREGA_TRABAJO = ConsultarIDTrabajo($_REQUEST['ENTREGA_TRABAJO']);


        //Crea la entrega con  los datos anteriores.
        $entrega = new ENTREGAS_Model($ENTREGA_ID, $ENTREGA_NOM, $ENTREGA_TRABAJO);
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

                $entrega = new ENTREGAS_Model('', $_REQUEST['ENTREGA_NOMBRE'], '');
                $valores = $entrega->RellenaDatos();

                $valores['ENTREGA_TRABAJO']=$entrega->nombreTrabajo( $valores['ENTREGA_TRABAJO']);


                if (!tienePermisos('Entrega_Edit')) {
                    new Mensaje('No tienes los permisos necesarios', 'ENTREGAS_Controller.php');
                } else {

                    new Entrega_Edit($valores, 'ENTREGAS_Controller.php');
                }
            } else {

                $entrega = get_data_form();


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

                $entrega = get_data_form();
                $datos = $entrega->Consultar($_REQUEST['ENTREGA_ID']);


                new ENTREGAS_Show($datos, 'ENTREGAS_Controller.php');
            }
            break;

        default:
            //La vista por defecto lista todas las entregas
            if (!isset($_REQUEST['ENTREGA_NOMBRE'])) {
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