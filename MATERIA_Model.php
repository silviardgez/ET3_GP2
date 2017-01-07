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
	var $MATERIA_DESCRIPCION;
	var $mysqli;	

	//Constructor al que se le pasa el nombre de la materia y los atributos
    function __construct($MATERIA_ID, $MATERIA_NOM, $MATERIA_CREDITOS, $MATERIA_DEPARTAMENTO, $MATERIA_TITULACION, $MATERIA_DESCRIPCION){

		$this->MATERIA_ID = $MATERIA_ID;//id de la materia
        $this->MATERIA_NOM = $MATERIA_NOM;//nombre de la materia
		$this->MATERIA_CREDITOS = $MATERIA_CREDITOS;//créditos asignados a la materia
        $this->MATERIA_DEPARTAMENTO = $MATERIA_DEPARTAMENTO;//departamento al que pertenece la materia
        $this->MATERIA_TITULACION = $MATERIA_TITULACION;//titulación a la que pertenece la materia
        $this->MATERIA_DESCRIPCION = $MATERIA_DESCRIPCION;//descripción breve de la materia

    }

    //Conectarse a la BD
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
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
            $sql = "INSERT INTO MATERIA (MATERIA_NOM, MATERIA_CREDITOS, MATERIA_DEPARTAMENTO, MATERIA_TITULACION, MATERIA_DESCRIPCION) VALUES ('" . $this->MATERIA_NOM . "', '" . $this->MATERIA_CREDITOS . "', '" . $this->MATERIA_DEPARTAMENTO . "', '" . $this->MATERIA_TITULACION . "', '" . $this->MATERIA_DESCRIPCION . "')";
            if (!$result = $this->mysqli->query($sql)) {
                return 'No se ha podido conectar con la base de datos';
            } else {
                return 'Materia añadida con exito';
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
        $sql = "SELECT * FROM MATERIA WHERE MATERIA_ID ='" . $this->MATERIA_ID . "' OR MATERIA_NOM LIKE'" . $this->MATERIA_NOM . "' OR MATERIA_CREDITOS = '" . $this->MATERIA_CREDITOS . "' OR MATERIA_TITULACION = '" . $this->MATERIA_TITULACION . "' OR MATERIA_DEPARTAMENTO = '" . $this->MATERIA_DEPARTAMENTO . "' OR MATERIA_DESCRIPCION = '" . $this->MATERIA_DESCRIPCION . "'";
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
        $sql = "SELECT MATERIA_ID, MATERIA_NOM, MATERIA_CREDITOS, MATERIA_DEPARTAMENTO, MATERIA_TITULACION, MATERIA_DESCRIPCION FROM MATERIA WHERE MATERIA_ID = '" . $this->MATERIA_ID . "'";
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
            $sql = "UPDATE MATERIA SET MATERIA_NOM = '" . $this->MATERIA_NOM ."', MATERIA_CREDITOS = '" . $this->MATERIA_CREDITOS . "', MATERIA_DEPARTAMENTO = '" . $this->MATERIA_DEPARTAMENTO . "', MATERIA_TITULACION = '" . $this->MATERIA_TITULACION . "', MATERIA_DESCRIPCION ='" . $this->MATERIA_DESCRIPCION . "' WHERE MATERIA_ID ='" .$this->MATERIA_ID . "'";
            if (!$resultado = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                return 'Materia modificada correctamente';
            }
        }
    }

    //Listar todas las materias
    function ConsultarTodo(){
        $this->ConectarBD();
        $sql = "SELECT * FROM MATERIA";
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
}