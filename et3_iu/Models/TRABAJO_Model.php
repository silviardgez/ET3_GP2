<?php

include '../Functions/LibraryFunctions.php';

//Clase que maneja la informacion una rubrica 
class TRABAJO_Model
{

    var $TRABAJO_ID;
    var $TRABAJO_NOMBRE;
    var $TRABAJO_DESCRIPCION;
    var $TRABAJO_MATERIA;
    var $TRABAJO_PROFESOR;
    var $TRABAJO_FECHA_INICIO;
    var $TRABAJO_FECHA_FIN;
    var $TRABAJO_FECHA_CREACION;
    var $mysqli;

//Constructor de la clase rubrica
    function __construct($TRABAJO_ID, $TRABAJO_NOMBRE, $TRABAJO_DESCRIPCION, $TRABAJO_MATERIA, $TRABAJO_PROFESOR,
                         $TRABAJO_FECHA_INICIO, $TRABAJO_FECHA_FIN, $TRABAJO_FECHA_CREACION)
    {
        $this->TRABAJO_ID = $TRABAJO_ID;
        $this->TRABAJO_NOMBRE = $TRABAJO_NOMBRE;
        $this->TRABAJO_DESCRIPCION = $TRABAJO_DESCRIPCION;
        $this->TRABAJO_MATERIA = $TRABAJO_MATERIA;
        $this->TRABAJO_PROFESOR = $TRABAJO_PROFESOR;
        $this->TRABAJO_FECHA_INICIO = $TRABAJO_FECHA_INICIO;
        $this->TRABAJO_FECHA_FIN = $TRABAJO_FECHA_FIN;
        $this->TRABAJO_FECHA_CREACION = $TRABAJO_FECHA_CREACION;

    }

//Destructor del objeto
    function __destruct()
    {

    }

//Función para la conexión a la base de datos
    function ConectarBD()
    {
        $this->mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Inserción de nuevas Rúbricas
    function Insertar()
    {
        $this->ConectarBD();
        if ($this->TRABAJO_ID === FALSE) {
            return 'No existe ningún cliente con el DNI introducido'; //Corregir String
        } else {
            $sql = "INSERT INTO TRABAJO (TRABAJO_NOMBRE, TRABAJO_DESCRIPCION, TRABAJO_MATERIA, TRABAJO_PROFESOR,
                    TRABAJO_FECHA_INICIO,TRABAJO_FECHA_FIN,TRABAJO_FECHA_CREACION) VALUES ('" . $this->TRABAJO_NOMBRE .
                "', '" . $this->TRABAJO_DESCRIPCION . "', '" . $this->TRABAJO_MATERIA . "', '" . $this->TRABAJO_FECHA_INICIO .
                "', '" . $this->TRABAJO_FECHA_FIN . "', '" . $this->TRABAJO_FECHA_CREACION . "', '" . $_SESSION['login'] . "')";

            if (!$result = $this->mysqli->query($sql)) {
                return 'No existe ningún cliente con el DNI introducido'; //Corregir String
            } else {
                return 'Trabajo creado correctamente';
            }
        }
    }

    //Borrado de una rubrica
    function Borrar()
    {
        $this->ConectarBD();
        $sql = "DELETE FROM TRABAJO WHERE TRABAJO_ID='" . $this->TRABAJO_ID . "'";

        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            return 'El trabajo ha sido borrado correctamente';
        }
    }

//Permite la consulta de rubricas por todos sus atributos
    function Consultar()
    {
        $this->ConectarBD();
        $sql = "SELECT * FROM TRABAJO WHERE TRABAJO_ID ='" . $this->TRABAJO_ID . "' OR TRABAJO_NOMBRE LIKE'" .
            $this->TRABAJO_NOMBRE . "' OR TRABAJO_DESCRIPCION = '" . $this->TRABAJO_DESCRIPCION .
            "' OR TRABAJO_MATERIA = '" . $this->TRABAJO_MATERIA . "' OR TRABAJO_PROFESOR = '" .
            $this->TRABAJO_PROFESOR . "'";

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
    function ConsultarTodo()
    {
        $this->ConectarBD();
        $sql = "SELECT * FROM TRABAJO";
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
    function Modificar()
    {
        $this->ConectarBD();
        $sql = "SELECT * FROM TRABAJO WHERE TRABAJO_ID='" . $this->TRABAJO_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'El DNI introducido no pertenece a ningun cliente'; //CorregirStrings
        } else {
            $sql = "UPDATE TRABAJO SET TRABAJO_NOMBRE = '" . $this->TRABAJO_NOMBRE . "', TRABAJO_DESCRIPCION ='" .
                $this->TRABAJO_DESCRIPCION . "', TRABAJO_MATERIA ='" . $this->TRABAJO_MATERIA . "', TRABAJO_FECHA_INICIO ='" .
                $this->TRABAJO_FECHA_INICIO . "', TRABAJO_FECHA_FIN ='" . $this->TRABAJO_FECHA_FIN . "', TRABAJO_FECHA_CREACION ='" .
                $this->TRABAJO_FECHA_CREACION . "' WHERE TRABAJO_ID='" . $this->TRABAJO_ID . "'";

            if (!$resultado = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                return 'Trabajo modificado correctamente';
            }
        }
    }

    function RellenaDatos()
    { //Completa el formulario visible con los datos de una rubrica
        $this->ConectarBD();
        $sql = "SELECT TRABAJO_ID, TRABAJO_NOMBRE, TRABAJO_DESCRIPCION, TRABAJO_MATERIA, TRABAJO_PROFESOR,
            TRABAJO_FECHA_INICIO,TRABAJO_FECHA_FIN,TRABAJO_FECHA_CREACION FROM TRABAJO WHERE TRABAJO_ID = '" .
            $this->TRABAJO_ID . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }
}
?>