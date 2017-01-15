<?php
require_once ('../Functions/LibraryFunctions.php');



//Clase que define las entregas
class ALUMNO_ENTREGA_Model
{
    var $ENTREGA_ID;
    var $USUARIO_USER;
    var $HORAS_DEDIC;
    var $FECHA;
    var $HORA;
    var $DOCUMENTO;
    var $mysqli;


//Constructor al que se le pasa el nombre de la entrega y los atributos
    function __construct( $ENTREGA_ID, $USUARIO_USER, $HORAS_DEDIC,$FECHA,$HORA,$DOCUMENTO)
    {

        $this->ENTREGA_ID = $ENTREGA_ID;//id entrega

        $this->USUARIO_USER = $USUARIO_USER;

        $this->HORAS_DEDIC = $HORAS_DEDIC;

        $this->FECHA = $FECHA;

        $this->HORA = $HORA;

        $this->DOCUMENTO = $DOCUMENTO;

    }

//Método para la conexión a la base de datos
    function ConectarBD()
    {
        $this->mysqli = new mysqli( "localhost", "iu2016", "iu2016", "IU2016");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    function Insertar()
    {
        $this->ConectarBD();
        $time = time();
        $this->HORA =  date("H:i:s", $time);
        $this->FECHA = date("Y-m-d");

        if ($this->ENTREGA_ID <> '' ){

            $sql = "delete from ALUMNO_ENTREGA where ENTREGA_ID = '".$this->ENTREGA_ID."' and USUARIO_USER = '".$this->USUARIO_USER."'";

            if (!$result = $this->mysqli->query($sql)){
                return 'No se ha podido conectar con la base de datos';
            }

                    //Insertamos en la tabla ENTREGA
                    $sql = "INSERT INTO ALUMNO_ENTREGA (ENTREGA_ID, USUARIO_USER, ENTREGA_HORAS_DEDIC, ENTREGA_FECHA, ENTREGA_HORA, ENTREGA_DOCUMENTO) VALUES ('";

                    $sql = $sql . "$this->ENTREGA_ID', '$this->USUARIO_USER', '$this->HORAS_DEDIC' , '$this->FECHA', '$this->HORA', '$this->DOCUMENTO')";
                   
                    $this->mysqli->query($sql);

                    return 'Inserción realizada con éxito';


        }
        else{

            return 'Introduzca un valor para nombre entrega de la entrega';
        }
    }

    function ConsultarTodo()
    {
        $this->ConectarBD();
        $sql = "select * from ENTREGA";
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
?>
