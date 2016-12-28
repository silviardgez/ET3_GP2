<?php

include '../Functions/LibraryFunctions.php';

//Clase que maneja la informacion una rubrica 
class RUBRICA_Model {

    var $RUBRICA_ID;  //ATRIBUTOS OK!
    var $RUBRICA_NOMBRE;
    var $RUBRICA_DESCRIPCION;
    var $RUBRICA_NIVELES;
    var $RUBRICA_AUTOR;
    var $mysqli;

//Constructor de la clase pago
    function __construct($RUBRICA_ID, $RUBRICA_NOMBRE, $RUBRICA_DESCRIPCION, $RUBRICA_NIVELES, $RUBRICA_AUTOR) { // CONSTRUCTOR OK!
        $this->RUBRICA_ID = $RUBRICA_ID;
        $this->RUBRICA_NOMBRE = $RUBRICA_NOMBRE;
        $this->RUBRICA_DESCRIPCION = $RUBRICA_DESCRIPCION;
        $this->RUBRICA_NIVELES = $RUBRICA_NIVELES;
        $this->RUBRICA_AUTOR = $RUBRICA_AUTOR;
    }

//Destructor del objeto
    function __destruct() {
        
    }

//Función para la conexión a la base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Inserción de nuevas Rúbricas
    function Insertar() { 
        $this->ConectarBD();
        if ($this->RUBRICA_ID === FALSE) {
            return 'No existe ningún cliente con el DNI introducido'; //Corregir String
        } else {
            $sql = "INSERT INTO RUBRICA (RUBRICA_NOMBRE, RUBRICA_DESCRIPCION, RUBRICA_NIVELES, RUBRICA_AUTOR) VALUES ('" . $this->RUBRICA_NOMBRE . "', '" . $this->RUBRICA_DESCRIPCION . "', '" . $this->RUBRICA_NIVELES . "', '" . $_SESSION['login'] . "')";
            if (!$result = $this->mysqli->query($sql)) {
                return 'No existe ningún cliente con el DNI introducido'; //Corregir String
            } else {
                return 'Rubrica creada correctamente';
            }
        }
    }

    //Borrado de una rubrica
    function Borrar() {
        $this->ConectarBD();
        $sql = "DELETE FROM RUBRICA WHERE RUBRICA_ID='" . $this->RUBRICA_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            return 'La rúbrica ha sido borrada correctamente';
        }
    }

//Nos devuelve la información de los pagos realizados por un determinado cliente o id
    function Consultar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM RUBRICA WHERE RUBRICA_ID ='" . $this->RUBRICA_ID . "' OR RUBRICA_NOMBRE LIKE'" . $this->RUBRICA_NOMBRE . "' OR RUBRICA_DESCRIPCION = '" . $this->RUBRICA_DESCRIPCION . "' OR RUBRICA_NIVELES = '" . $this->RUBRICA_NIVELES . "' OR RUBRICA_AUTOR = '" . $this->RUBRICA_AUTOR . "'";

        if (!$resultado = $this->mysqli->query($sql)) {
            return FALSE;
        } else {
            $toret = array();
            $i = 0;
            while ($fila = $resultado->fetch_array()) {
                $toret[$i] = $fila;
                $i++;
            }
            return $toret;
        }
    }

//Devuelve la lista de todos los pagos realizados
    function ConsultarTodo() {
        $this->ConectarBD();
        $sql = "SELECT * FROM RUBRICA";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $toret = array();
            $i = 0;
            while ($fila = $resultado->fetch_array()) {
                $toret[$i] = $fila;
                //----- AÑADIR CAMPOS -----
                $i++;
            }
            return $toret;
        }
    }

//Modifica los datos de una rubrica
    function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM RUBRICA WHERE RUBRICA_ID='" . $this->RUBRICA_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'El DNI introducido no pertenece a ningun cliente'; //CorregirStrings
        } else {
            $sql = "UPDATE RUBRICA SET RUBRICA_NOMBRE = '" . $this->RUBRICA_NOMBRE . "', RUBRICA_DESCRIPCION ='" . $this->RUBRICA_DESCRIPCION . "', RUBRICA_NIVELES ='" . $this->RUBRICA_NIVELES . "' WHERE RUBRICA_ID='".$this->RUBRICA_ID."'";
            if (!$resultado = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                return 'Rubrica modificada correctamente';
            }
        }
    }

    function RellenaDatos() { //Completa el formulario visible con los datos del pago
        $this->ConectarBD();
        $sql = "SELECT RUBRICA_ID, RUBRICA_NOMBRE, RUBRICA_DESCRIPCION, RUBRICA_NIVELES, RUBRICA_AUTOR FROM RUBRICA WHERE RUBRICA_ID = '" . $this->RUBRICA_ID . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

}

?>
