<?php

include '../Functions/LibraryFunctions.php';

//Clase que define las materias
class MATERIA_Model
{
    var $MATERIA_ID;
    var $MATERIA_NOM;
	var $MATERIA_CREDITOS;
	var $MATERIA_DEPARTAMENTO;
    var $MATERIA_TITULACION;
	var $MATERIA_RESPONSABLE;
	var $MATERIA_DESCRIPCION;
	var $mysqli;	

	//Constructor al que se le pasa el nombre de la materia y los atributos
    function __construct($MATERIA_ID, $MATERIA_NOM, $MATERIA_CREDITOS, $MATERIA_DEPARTAMENTO, $MATERIA_TITULACION, $MATERIA_RESPONSABLE, $MATERIA_DESCRIPCION){

		$this->MATERIA_ID = $MATERIA_ID;//id de la materia
        $this->MATERIA_NOM = $MATERIA_NOM;//nombre de la materia
		$this->MATERIA_CREDITOS = $MATERIA_CREDITOS;//créditos asignados a la materia
        $this->MATERIA_DEPARTAMENTO = $MATERIA_DEPARTAMENTO;//departamento al que pertenece la materia
        $this->MATERIA_TITULACION = $MATERIA_TITULACION;//titulación a la que pertenece la materia
		$this->MATERIA_RESPONSABLE = $MATERIA_RESPONSABLE;//profesor responsable de la materia
        $this->MATERIA_DESCRIPCION = $MATERIA_DESCRIPCION;//descripción breve de la materia

    }

    //Conectarse a la BD
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "ET3Grupo2", "ET3Grupo2", "ET3Grupo2");
        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    //Anadir una materia
	function Insertar() { 
        $this->ConectarBD();
        if ($this->MATERIA_ID === FALSE) {
            return 'No existe ninguna materia con el ID introducido';
        } else {
            $sql = "INSERT INTO MATERIA (MATERIA_NOM, MATERIA_CREDITOS, MATERIA_DEPARTAMENTO, MATERIA_TITULACION, MATERIA_RESPONSABLE, MATERIA_DESCRIPCION) VALUES ('" . $this->MATERIA_NOM . "', '" . $this->MATERIA_CREDITOS . "', '" . $this->MATERIA_DEPARTAMENTO . "', '" . $this->MATERIA_TITULACION . "', '" . $this->MATERIA_RESPONSABLE . "', '" . $this->MATERIA_DESCRIPCION . "')";
            if (!$result = $this->mysqli->query($sql)) {
                return 'No se ha podido conectar con la base de datos';
            } else {
                $sql = "INSERT INTO IMPARTE_MATERIA (MATERIA_ID, PROFESOR_USER) VALUES ('" . $this->MATERIA_ID . "', '" . $this->MATERIA_RESPONSABLE . "')";
				if (!$result = $this->mysqli->query($sql)) {
					return 'No se ha podido conectar con la base de datos';
				} else {
					return 'Materia añadida con exito';
            }
            }
        }
    }




    //Funcion de destruccion del objeto: se ejecuta automaticamente
    function __destruct()
    {

    }

    //Consultar una materia
    function Consultar()
    {
        $this->ConectarBD();
        $sql = "SELECT * FROM MATERIA WHERE MATERIA_ID ='" . $this->MATERIA_ID . "' OR MATERIA_NOM LIKE'" . $this->MATERIA_NOM . "' OR MATERIA_CREDITOS = '" . $this->MATERIA_CREDITOS . "' OR MATERIA_DEPARTAMENTO = '" . $this->MATERIA_DEPARTAMENTO . "' OR MATERIA_TITULACION = '" . $this->MATERIA_TITULACION . "' OR MATERIA_RESPONSABLE = '" . $this->MATERIA_RESPONSABLE . "' OR MATERIA_DESCRIPCION = '" . $this->MATERIA_DESCRIPCION . "'";
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
		}else{
			$toret=array();
			$i=0;
			while ($fila= $resultado->fetch_array()) {
				$toret[$i]=$fila;
				$i++;
			}
			return $toret;
		}
    }


    //Borrarado de una materia
    function Borrar() {
        $this->ConectarBD();
        $sql = "DELETE FROM MATERIA WHERE MATERIA_ID='" . $this->MATERIA_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            return 'La materia ha sido borrada correctamente';
        }
    }

    //Devuelve la información correspondiente a una página
    function RellenaDatos() { //Completa el formulario visible con los datos de una materia
        $this->ConectarBD();
        $sql = "SELECT MATERIA_ID, MATERIA_NOM, MATERIA_CREDITOS, MATERIA_DEPARTAMENTO, MATERIA_TITULACION, MATERIA_RESPONSABLE, MATERIA_DESCRIPCION FROM MATERIA WHERE MATERIA_ID = '" . $this->MATERIA_ID . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }


    //Modificar una materia
	function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM MATERIA WHERE MATERIA_ID='" . $this->MATERIA_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'El ID introducido no pertenece a ninguna materia';
        } else {
            $sql = "UPDATE MATERIA SET MATERIA_NOM = '" . $this->MATERIA_NOM ."', MATERIA_CREDITOS = '" . $this->MATERIA_CREDITOS . "', MATERIA_DEPARTAMENTO = '" . $this->MATERIA_DEPARTAMENTO . "', MATERIA_TITULACION = '" . $this->MATERIA_TITULACION . "', MATERIA_RESPONSABLE = '" . $this->MATERIA_RESPONSABLE . "', MATERIA_DESCRIPCION ='" . $this->MATERIA_DESCRIPCION . "' WHERE MATERIA_ID ='" .$this->MATERIA_ID . "'";
            if (!$resultado = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                return 'Materia modificada correctamente';
            }
        }
    }

    //Listar todas las materias
    function ConsultarTodo()
    {
        $this->ConectarBD();
        if (consultarRol($_SESSION['login']) != 1 && consultarRol($_SESSION['login']) != 3){
            $sql = "SELECT * FROM MATERIA WHERE MATERIA_RESPONSABLE='" . $_SESSION['login']."'";

      }
    else {
        $sql = "SELECT * FROM MATERIA";
    }
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{
            $toret=array();
            $i=0;
            while ($fila= $resultado->fetch_array()) {
                $toret[$i]=$fila;
                $i++;
            }
            return $toret;
        }
    }
	
	//Recoge todos los ids de profesores responsables que hay y los inserta en un array
function getIDResp(){
    $this->ConectarBD();
    $sql = "select USUARIO_USER from USUARIO WHERE USUARIO_TIPO=4";
    $result = $this->mysqli->query($sql);

    $toRet = array();
    foreach ($result as $b){
        array_push($toRet,$b['USUARIO_USER']);
    }

    return $toRet;

}

function insertarProfesores($profesores){

    $this->ConectarBD();
    for($u=0;$u<count($profesores);$u++){
        $profesor=$profesores[$u];
        $sql2 = "INSERT INTO IMPARTE_MATERIA (MATERIA_ID, PROFESOR_USER) VALUES ('".$this->MATERIA_ID."', '".$profesor."')";

        $this->mysqli->query($sql2);
    }
    return 'confirmacion profesores';
}
    function ConsultarProfesores()
    {
        $this->ConectarBD();

        $sql = "select PROFESOR_USER from IMPARTE_MATERIA WHERE MATERIA_ID=".$this->MATERIA_ID;

        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{


            $toret=array();
            $i=0;

            while ($fila= $resultado->fetch_array()['PROFESOR_USER']) {


                $toret[$i]=$fila;
                $i++;

            }


            return $toret;

        }
    }
    function ConsultarAlumnos()
    {
        $this->ConectarBD();

        $sql = "select MATRICULA_ALUMNO from MATRICULA WHERE MATRICULA_MATERIA=".$this->MATERIA_ID;

        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{


            $toret=array();
            $i=0;

            while ($fila= $resultado->fetch_array()['MATRICULA_ALUMNO']) {


                $toret[$i]=$fila;
                $i++;

            }


            return $toret;

        }
    }
    function Inscribirse()
    {
        $this->ConectarBD();

        $sql = "select INSCRIPCION_ID from INSCRIPCION WHERE INSCRIPCION_ALUMNO='".$_SESSION['login']."' AND INSCRIPCION_MATERIA='".$this->MATERIA_ID."'";
        $resultado = $this->mysqli->query($sql);
        if ($resultado->num_rows==0){


            $sql = "INSERT INTO  INSCRIPCION (INSCRIPCION_ALUMNO,INSCRIPCION_MATERIA) VALUES ('".$_SESSION['login']."','".$this->MATERIA_ID."')";
            $this->mysqli->query($sql);

                return 'inscrito con exito';
        }
        else {
            return 'ya inscrito';
        }
    }
    function Desinscribirse()
    {
        $this->ConectarBD();

        $sql = "select INSCRIPCION_ID from INSCRIPCION WHERE INSCRIPCION_ALUMNO='".$_SESSION['login']."' AND INSCRIPCION_MATERIA='".$this->MATERIA_ID."'";
        $resultado = $this->mysqli->query($sql);
        if ($resultado->num_rows!=0){


            $sql = "DELETE FROM INSCRIPCION WHERE INSCRIPCION_ALUMNO='".$_SESSION['login']."' AND INSCRIPCION_MATERIA='".$this->MATERIA_ID."'";
            $this->mysqli->query($sql);

            return 'desinscrito con exito';
        }
        else {
            return 'no inscrito';
        }
    }

}