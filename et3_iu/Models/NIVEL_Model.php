<?php


//Clase que maneja la informacion una rubrica 
class NIVEL_Model {

    var $NIVEL_ID; 
    var $NIVEL_DESCRIPCION;
    var $NIVEL_ITEM;
    var $NIVEL_RUBRICA;
    var $NIVEL_PORCENTAJE;
    var $mysqli;

//Constructor de la clase nivel de item
    function __construct($NIVEL_ID, $NIVEL_DESCRIPCION, $NIVEL_ITEM, $NIVEL_RUBRICA, $NIVEL_PORCENTAJE) {
        $this->NIVEL_ID = $NIVEL_ID;
        $this->NIVEL_DESCRIPCION = $NIVEL_DESCRIPCION;
        $this->NIVEL_ITEM = $NIVEL_ITEM;
        $this->NIVEL_RUBRICA = $NIVEL_RUBRICA;
        $this->NIVEL_PORCENTAJE = $NIVEL_PORCENTAJE;
    }

//Destructor del objeto
    function __destruct() {
        
    }

//Función para la conexión a la base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "ET3Grupo2", "ET3Grupo2", "ET3Grupo2");
        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
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
        if($this->NIVEL_ID == '' && $this->NIVEL_DESCRIPCION == '' && $this->NIVEL_PORCENTAJE == '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //000
            echo $this->NIVEL_ITEM;
            echo $this->NIVEL_RUBRICA;
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "'";
        }
        elseif($this->NIVEL_ID == '' && $this->NIVEL_DESCRIPCION == '' && $this->NIVEL_PORCENTAJE != '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //001
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_PORCENTAJE= '".$this->NIVEL_PORCENTAJE. "'";
        }
        elseif($this->NIVEL_ID == '' && $this->NIVEL_DESCRIPCION != '' && $this->NIVEL_PORCENTAJE == '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //010
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_DESCRIPCION LIKE '%".$this->NIVEL_DESCRIPCION."%'";
        }
        elseif($this->NIVEL_ID == '' && $this->NIVEL_DESCRIPCION != '' && $this->NIVEL_PORCENTAJE != '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //011
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_DESCRIPCION LIKE '%".$this->NIVEL_DESCRIPCION."%' AND NIVEL_PORCENTAJE= '".$this->NIVEL_PORCENTAJE. "'";
        }
        elseif($this->NIVEL_ID != '' && $this->NIVEL_DESCRIPCION == '' && $this->NIVEL_PORCENTAJE == '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //100
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_ID= '" .$this->NIVEL_ID. "'";
        }
        elseif($this->NIVEL_ID != '' && $this->NIVEL_DESCRIPCION == '' && $this->NIVEL_PORCENTAJE != '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //101
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_ID= '" .$this->NIVEL_ID. "' AND NIVEL_PORCENTAJE= '" .$this->NIVEL_PORCENTAJE. "'";
        }
        elseif($this->NIVEL_ID != '' && $this->NIVEL_DESCRIPCION != '' && $this->NIVEL_PORCENTAJE == '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //110
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_ID= '" .$this->NIVEL_ID. "' AND NIVEL_DESCRIPCION LIKE '%" .$this->NIVEL_DESCRIPCION. "%'";
        }
        elseif($this->NIVEL_ID != '' && $this->NIVEL_DESCRIPCION != '' && $this->NIVEL_PORCENTAJE != '' && $this->NIVEL_ITEM != '' && $this->NIVEL_RUBRICA != ''){  //111
           $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM= '" .$this->NIVEL_ITEM. "'AND NIVEL_RUBRICA= '". $this->NIVEL_RUBRICA. "' AND NIVEL_ID= '" .$this->NIVEL_ID. "' AND NIVEL_DESCRIPCION LIKE '%" .$this->NIVEL_DESCRIPCION. "%' AND NIVEL_PORCENTAJE= '" .$this->NIVEL_PORCENTAJE. "'";
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
        $sql = "SELECT * FROM NIVEL WHERE NIVEL_ITEM = '" . $this->NIVEL_ITEM . "'";
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
            $sql = "UPDATE NIVEL SET NIVEL_DESCRIPCION = '" . $this->NIVEL_DESCRIPCION . "', NIVEL_PORCENTAJE ='" . $this->NIVEL_PORCENTAJE . "' WHERE NIVEL_ID='".$this->NIVEL_ID."'";
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
