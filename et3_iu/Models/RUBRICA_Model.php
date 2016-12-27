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
    function Insertar() { // ----- WORKING!! -----
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

    //Borrado de un pago
    function Borrar() {
        $this->ConectarBD();
//        $sql = "SELECT * FROM PAGO WHERE PAGO_ID = '" . $this->PAGO_ID . "'";
//        $result = $this->mysqli->query($sql);
//        if ($result->num_rows == 1) {
        $sql = "DELETE FROM PAGO WHERE PAGO_ID='" . $this->PAGO_ID . "'";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'Error en la consulta sobre la base de datos';
        } else {

            if (file_exists('../Recibos/Recibo_' . $this->PAGO_ID . '.txt')) {
                $this->borrarRecibo();
            }
            return 'El pago ha sido borrado correctamente';
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
        $sql = "SELECT RUBRICA_ID, RUBRICA_NOMBRE, RUBRICA_DESCRIPCION, RUBRICA_NIVELES FROM RUBRICA WHERE RUBRICA_ID = '" . $this->RUBRICA_ID . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    function generarRecibo() { //Genera el recibo en formato .txt correspondiente a un pago.
        $this->ConectarBD();
        $sql = "SELECT * FROM PAGO WHERE PAGO_ID = '" . $this->PAGO_ID . "'";
        $request = $this->mysqli->query($sql);
        $datosPAGO = $request->fetch_array();
        $sql = "SELECT * FROM EMPLEADOS WHERE EMP_USER = '" . $_SESSION['login'] . "'";
        $request = $this->mysqli->query($sql);
        $datosEMPLEADO = $request->fetch_array();
        $empleado = $datosEMPLEADO['EMP_NOMBRE'] . " " . $datosEMPLEADO['EMP_APELLIDO'];
        generarRecibo($datosPAGO['PAGO_ID'], $datosPAGO['PAGO_FECHA'], $empleado, $datosPAGO['CLIENTE_ID'], $datosPAGO['PAGO_CONCEPTO'], $datosPAGO['PAGO_IMPORTE']);

        //  generarRecibo($this->PAGO_ID, $this->PAGO_FECHA, $empleado, $this->CLIENTE_ID, $this->PAGO_CONCEPTO, $this->PAGO_IMPORTE); No se puede generar el recibo directamente, porque el nombre del recibo contiene el id del pago y este es generado por la bd una vez introducido un pago.
        return 'Se ha generado el recibo de pago';
    }

    function borrarRecibo() {
        borrarRecibo($this->PAGO_ID);
    }

    function consultarPagosAtrasados() {
        $this->ConectarBD();
        $sql = "SELECT * FROM PAGO WHERE PAGO_ESTADO = 'PENDIENTE' ORDER BY PAGO_FECHA DESC";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {

            $fechaActual = new DateTime(Date("Y-m-d H:i:s"));
            $toret = array();
            $i = 0;
            while ($fila = $resultado->fetch_array()) {
                $toret[$i] = $fila;
                if (CalcularDescuentoCliente($toret[$i]['CLIENTE_ID'])) {
                    $toret[$i]['PAGO_DESCUENTO'] = 100 * (1 - CalcularDescuentoCliente($toret[$i]['CLIENTE_ID']));
                    $toret[$i]['PAGO_IMPORTE_FINAL'] = round($toret[$i]['PAGO_IMPORTE'] * CalcularDescuentoCliente($toret[$i]['CLIENTE_ID']), 2);
                } else {
                    $toret[$i]['PAGO_DESCUENTO'] = '0';
                    $toret[$i]['PAGO_IMPORTE_FINAL'] = $toret[$i]['PAGO_IMPORTE'];
                }
                $i++;
            }
            return $toret;
        }
    }

}

?>
