<?php

include '../Models/MATERIA_Model.php';
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

    if(isset($_REQUEST['MATERIA_ID'])){
        $MATERIA_ID = $_REQUEST['MATERIA_ID'];
    }else{
        $MATERIA_ID ='';
    }
	$MATERIA_NOM = $_REQUEST['MATERIA_NOM'];
	$MATERIA_CREDITOS = $_REQUEST['MATERIA_CREDITOS'];
    $MATERIA_DEPARTAMENTO = $_REQUEST['MATERIA_DEPARTAMENTO'];
	$MATERIA_TITULACION = $_REQUEST['MATERIA_TITULACION'];
	$MATERIA_RESPONSABLE = $_REQUEST['MATERIA_RESPONSABLE'];
    $MATERIA_DESCRIPCION = $_REQUEST['MATERIA_DESCRIPCION'];

    $materia = new MATERIA_Model($MATERIA_ID, $MATERIA_NOM, $MATERIA_CREDITOS, $MATERIA_DEPARTAMENTO, $MATERIA_TITULACION, $MATERIA_RESPONSABLE, $MATERIA_DESCRIPCION);
    return $materia;
}

if (!isset($_REQUEST['accion'])){
    $_REQUEST['accion'] = '';
}

Switch ($_REQUEST['accion']) {
    case $strings['Insertar']:
	//Inserción de materias
        if (!isset($_REQUEST['MATERIA_NOM'])) {
            if (!tienePermisos('MATERIA_ADD')) {
                new Mensaje('No tienes los permisos necesarios', 'MATERIA_Controller.php');
            } else {
                new MATERIA_ADD();
            }
        } else {
            $materia = get_data_form();
            $respuesta = $materia->Insertar();
            new Mensaje($respuesta, 'MATERIA_Controller.php');
        }
        break;
    case $strings['Borrar']: //Borrado de materias
        if (!isset($_REQUEST['MATERIA_NOM'])) {
            $materia = new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
            $valores = $materia->RellenaDatos();
            if (!tienePermisos('MATERIA_DELETE')) {
                new Mensaje('No tienes los permisos necesarios', 'MATERIA_Controller.php');
            } else {
                new MATERIA_DELETE($valores, 'MATERIA_Controller.php');
            }
        } else {
            $materia = get_data_form();
            $respuesta = $materia->Borrar();
            new Mensaje($respuesta, 'MATERIA_Controller.php');
        }
        break;
    case $strings['Modificar']: //Modificación de materias
        if (!isset($_REQUEST['MATERIA_NOM'])) {
            $materia = new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
            $valores = $materia->RellenaDatos();
            if (!tienePermisos('MATERIA_EDIT')) {
                new Mensaje('No tienes los permisos necesarios', 'MATERIA_Controller.php');
            } else {
                new MATERIA_EDIT($valores, 'MATERIA_Controller.php');
            }
        } else {
            $materia = get_data_form();
            $respuesta = $materia->Modificar();
            new Mensaje($respuesta, 'MATERIA_Controller.php');
        }
        break;
    case $strings['Consultar']: //Consulta de materias
        if (!isset($_REQUEST['MATERIA_NOM'])){
                if(!tienePermisos('MATERIA_SHOWCURRENT')){
                    new Mensaje('No tienes los permisos necesarios','MATERIA_Controller.php');
                }else { //Se muestra el formulario de consulta
                    new MATERIA_SHOWCURRENT();
                }
            }else{
                $materia = get_data_form();
                $datos = $materia->Consultar();
                new MATERIA_SHOWALL($datos, 'MATERIA_Controller.php');
            }

        break;

    case $strings['Profesores']: //Añadir profesores a la materia
        if (!isset($_REQUEST['MATERIA_NOM'])){
            $materia = new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
            $valores = $materia->RellenaDatos();
            if(!tienePermisos('MATERIA_ADD_Profesor')){

                new Mensaje('No tienes los permisos necesarios','MATERIA_Controller.php');
            }else { //Se muestra el formulario
                new MATERIA_ADD_Profesor( $valores);
            }
        }else{
            $_REQUEST['MATERIA_CREDITOS']='';
            $_REQUEST['MATERIA_DEPARTAMENTO']='';
            $_REQUEST['MATERIA_TITULACION']='';
            $_REQUEST['MATERIA_RESPONSABLE']='';
            $_REQUEST['MATERIA_DESCRIPCION']='';
            $materia = get_data_form();
            $datos = $materia->InsertarProfesores($_REQUEST['materia_profesores']);
            new Mensaje($datos, 'MATERIA_Controller.php');
        }

        break;
    case $strings['Profes']: //Nos muestra los profesores  que tiene asociada una materia
        $materia=new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
        $valores=$materia->ConsultarProfesores();
        if(!tienePermisos('MATERIA_Show_Profesores')){
            new Mensaje('No tienes los permisos necesarios','MATERIA_Controller.php');
        }
        else {
            new MATERIA_Show_Profesores($valores, 'MATERIA_Controller.php');
        }
        break;
    case $strings['Matriculados']: //Nos muestra los alumnos  matriculados en una materia
        $materia=new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
        $valores=$materia->ConsultarAlumnos();
        if(!tienePermisos('MATERIA_Show_Alumnos')){
            new Mensaje('No tienes los permisos necesarios','MATERIA_Controller.php');
        }
        else {
            new MATERIA_Show_Profesores($valores, 'MATERIA_Controller.php');
        }
        break;
    case $strings['Inscribirse']: //Permite al alumno inscribirse en una materia
        $materia=new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
        $valores=$materia->Inscribirse();

            new Mensaje($valores, 'MATERIA_Controller.php');

        break;
        case $strings['Desinscribirse']: //Permite al alumno desinscribirse de una materia
        $materia=new MATERIA_Model($_REQUEST['MATERIA_ID'], '','','','','','');
        $valores=$materia->Desinscribirse();

        new Mensaje($valores, 'MATERIA_Controller.php');

        break;
    default:
        //La vista por defecto lista todas las materias
        $materia = new MATERIA_Model('','','','','','','');
        $datos = $materia->ConsultarTodo();
        if (!tienePermisos('MATERIA_SHOWALL')) {

            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new MATERIA_SHOWALL($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>