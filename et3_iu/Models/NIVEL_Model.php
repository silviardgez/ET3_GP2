<?php


//Clase que maneja la informacion una rubrica 
class NIVEL_Model {

    var $NIVEL_ID; 
    var $NIVEL_DESCRIPCION;
    var $NIVEL_ITEM;
    var $NIVEL_RUBRICA;
    var $NIVEL_POSICION;
    var $mysqli;

//Constructor de la clase nivel de item
    function __construct($NIVEL_ID, $NIVEL_DESCRIPCION, $NIVEL_ITEM, $NIVEL_RUBRICA, $NIVEL_POSICION) {
        $this->NIVEL_ID = $NIVEL_ID;
        $this->NIVEL_DESCRIPCION = $NIVEL_DESCRIPCION;
        $this->NIVEL_ITEM = $NIVEL_ITEM;
        $this->NIVEL_RUBRICA = $NIVEL_RUBRICA;
        $this->NIVEL_POSICION = $NIVEL_POSICION;
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

//Inserción de nuevas Items
    function Insertar() { 
        $this->ConectarBD();        
        $sql = "INSERT INTO NIVEL (NIVEL_DESCRIPCION, NIVEL_ITEM, NIVEL_RUBRICA, NIVEL_POSICION) VALUES ('" . $this->NIVEL_DESCRIPCION . "', '" . $this->NIVEL_ITEM . "', '" . $this->NIVEL_RUBRICA . "', '" . $this->NIVEL_POSICION. "')";
            if (!$result = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos'; //Corregir String
            } else {
                return 'Nivel creado correctamente';
            }
        }
    

    //Borrado de una rubrica
    function Borrar() {
        $this->ConectarBD();
        $sql = "DELETE FROM NIVEL WHERE NIVEL_ID='" . $this->NIVEL_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            return 'Nivel borrado correctamente';
        }
    }

//Permite la consulta de rubricas por todos sus atributos
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

//Devuelve la lista de todas las rubricas
    function ConsultarTodo() {
        $this->ConectarBD();
        $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM = '" . $this->NIVEL_ITEM . "' ORDER BY NIVEL_POSICION";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
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

//Modifica los datos de una rubrica
    function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM NIVEL WHERE NIVEL_ID='" . $this->NIVEL_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
          return 'Error en la consulta sobre la base de datos';
        } else {
            $sql = "UPDATE NIVEL SET NIVEL_DESCRIPCION = '" . $this->NIVEL_DESCRIPCION . "', NIVEL_POSICION ='" . $this->NIVEL_POSICION . "' WHERE NIVEL_ID='".$this->NIVEL_ID."'";
            if (!$resultado = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                return 'Nivel modificado correctamente';
            }
        }
    }

    function RellenaDatos() { //Completa el formulario visible con los datos de una rubrica
        $this->ConectarBD();
        $sql = "SELECT * FROM NIVEL WHERE NIVEL_ID = '" . $this->NIVEL_ID . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

}

?>
