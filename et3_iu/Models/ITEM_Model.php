<?php

//Clase que maneja la informacion una rubrica 
class ITEM_Model {

    var $ITEM_ID;
    var $ITEM_NOMBRE;
    var $ITEM_RUBRICA;
    var $ITEM_PORCENTAJE;
    var $mysqli;

//Constructor de la clase item
    function __construct($ITEM_ID, $ITEM_NOMBRE, $ITEM_RUBRICA, $ITEM_PORCENTAJE) {
        $this->ITEM_ID = $ITEM_ID;
        $this->ITEM_NOMBRE = $ITEM_NOMBRE;
        $this->ITEM_RUBRICA = $ITEM_RUBRICA;
        $this->ITEM_PORCENTAJE = $ITEM_PORCENTAJE;
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

    function InsertarNivel($ITEM_ID) { //Esta funcion se ocupa de insertar en el registro el EMP_USER(PK de EMPLEADO) y la fecha y hora a la que un empleado consulto las lesiones de algun usuario. (Cumplir la LOPD)
        $this->ConectarBD();
        $sql = "INSERT INTO NIVEL (NIVEL_DESCRIPCION, NIVEL_ITEM, NIVEL_RUBRICA, NIVEL_PORCENTAJE) VALUES ('" .'Vacío'. "' ,'" . $ITEM_ID . "', '" . $this->ITEM_RUBRICA . "', '" .'Vacio'. "')";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'No se ha podido conectar con la base de datos';
        }

        return $resultado;
    }

//Inserción un nuevo item
    function Insertar() {
        $this->ConectarBD();
        $sql = "INSERT INTO ITEM (ITEM_NOMBRE, ITEM_RUBRICA, ITEM_PORCENTAJE) VALUES ('" . $this->ITEM_NOMBRE . "', '" . $this->ITEM_RUBRICA . "', '" . $this->ITEM_PORCENTAJE . "')";
        if (!$result = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos'; //Corregir String
        } else {

            $niveles = ConsultarNivelRubrica($this->ITEM_RUBRICA);  //Obtenemos los niveles que marca la Rubrica
            $itemid = ConsultarIDItem($this->ITEM_NOMBRE, $this->ITEM_RUBRICA, $this->ITEM_PORCENTAJE); //Obtenemos el ID del Item que acabamos de crear para dar de alta los niveles asociados a dicho item
            
            for ($i = 1; $i <= $niveles; $i++) { //Realizamos tantas iteracciones como marque los niveles de la rubrica
                $this->InsertarNivel($itemid);  //Para cada iteracción, insertamos un nuevo Nivel para el item
            }
            return 'Item creada correctamente';
        }
    }

    //Borrado de un item
    function Borrar() {
        $this->ConectarBD();
        $sql = "DELETE FROM ITEM WHERE ITEM_ID='" . $this->ITEM_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {

            return 'Item borrado correctamente';
        }
    }

//Permite la consulta de rubricas por todos sus atributos
    function Consultar() {
        $this->ConectarBD();
        if ($this->ITEM_ID == '' && $this->ITEM_NOMBRE == '' && $this->ITEM_PORCENTAJE == '' && $this->ITEM_RUBRICA != '') { //000
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "'";
        } elseif ($this->ITEM_ID == '' && $this->ITEM_NOMBRE == '' && $this->ITEM_PORCENTAJE != '' && $this->ITEM_RUBRICA != '') { //001
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_PORCENTAJE = '" . $this->ITEM_PORCENTAJE . "'";
        } elseif ($this->ITEM_ID == '' && $this->ITEM_NOMBRE != '' && $this->ITEM_PORCENTAJE == '' && $this->ITEM_RUBRICA != '') { //010
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_NOMBRE LIKE '%" . $this->ITEM_NOMBRE . "%'";
        } elseif ($this->ITEM_ID == '' && $this->ITEM_NOMBRE != '' && $this->ITEM_PORCENTAJE != '' && $this->ITEM_RUBRICA != '') { //011
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_NOMBRE LIKE '%" . $this->ITEM_NOMBRE . "%' AND ITEM_PORCENTAJE  = '" . $this->ITEM_PORCENTAJE . "'";
        } elseif ($this->ITEM_ID != '' && $this->ITEM_NOMBRE == '' && $this->ITEM_PORCENTAJE == '' && $this->ITEM_RUBRICA != '') { //100
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_ID = '" . $this->ITEM_ID . "'";
        } elseif ($this->ITEM_ID != '' && $this->ITEM_NOMBRE == '' && $this->ITEM_PORCENTAJE != '' && $this->ITEM_RUBRICA != '') { //101
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_ID = '" . $this->ITEM_ID . "' AND ITEM_PORCENAJE= '" . $this->ITEM_PORCENTAJE . "'";
        } elseif ($this->ITEM_ID != '' && $this->ITEM_NOMBRE != '' && $this->ITEM_PORCENTAJE == '' && $this->ITEM_RUBRICA != '') { //110
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_ID = '" . $this->ITEM_ID . "' AND ITEM_NOMBRE LIKE '%" . $this->ITEM_NOMBRE . "%'";
        } elseif ($this->ITEM_ID != '' && $this->ITEM_NOMBRE != '' && $this->ITEM_PORCENTAJE != '' && $this->ITEM_RUBRICA != '') { //111
            $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA ='" . $this->ITEM_RUBRICA . "' AND ITEM_ID = '" . $this->ITEM_ID . "' AND ITEM_NOMBRE LIKE '%" . $this->ITEM_NOMBRE . "%' AND ITEM_PORCENTAJE = '" . $this->ITEM_PORCENTAJE . "'";
        }
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
        $sql = "SELECT * FROM ITEM WHERE ITEM_RUBRICA = '" . $this->ITEM_RUBRICA . "'";
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
        $sql = "SELECT * FROM ITEM WHERE ITEM_ID='" . $this->ITEM_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $sql = "UPDATE ITEM SET ITEM_NOMBRE = '" . $this->ITEM_NOMBRE . "', ITEM_PORCENTAJE ='" . $this->ITEM_PORCENTAJE . "' WHERE ITEM_ID='" . $this->ITEM_ID . "'";
            if (!$resultado = $this->mysqli->query($sql)) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                return 'Item modificado correctamente';
            }
        }
    }

    function RellenaDatos() { //Completa el formulario visible con los datos de una rubrica
        $this->ConectarBD();
        $sql = "SELECT * FROM ITEM WHERE ITEM_ID = '" . $this->ITEM_ID . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

}

?>
