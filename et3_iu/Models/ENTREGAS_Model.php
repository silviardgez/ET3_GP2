<?php
require_once ('../Functions/LibraryFunctions.php');



//Clase que define las entregas
class ENTREGAS_Model
{
	var $ENTREGA_ID;
	var $ENTREGA_NOM;
	var $ENTREGA_TRABAJO;
	var $mysqli;


//Constructor al que se le pasa el nombre de la entrega y los atributos
function __construct( $ENTREGA_ID,$ENTREGA_NOMBRE,$ENTREGA_TRABAJO)
{

	$this->ENTREGA_ID = $ENTREGA_ID;//id entrega

    $this->ENTREGA_NOM = $ENTREGA_NOMBRE;//nombre entrega

	$this->ENTREGA_TRABAJO=$ENTREGA_TRABAJO;//id trabajo

}

//Método para la conexión a la base de datos
function ConectarBD()
{
    $this->mysqli = new mysqli( "localhost", "iu2016", "iu2016", "IU2016");

	if ($this->mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
	}
}
//Inserción de entregas
function Insertar()
{
    $this->ConectarBD();
    //$time = time();
    //$this->ENTREGA_HORA =  date("H:i:s", $time);
    //$this->ENTREGA_FECHA = date("Y-m-d");
    if ($this->ENTREGA_NOM <> '' ){

        $sql = "select * from ENTREGA where ENTREGA_NOMBRE = '".$this->ENTREGA_NOM."'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos';
        }
        else {
            if ($result->num_rows == 0){
                //Insertamos en la tabla ENTREGA
                $sql = "INSERT INTO ENTREGA (ENTREGA_ID, ENTREGA_NOMBRE, ENTREGA_TRABAJO) VALUES ('";

                $sql = $sql . "$this->ENTREGA_ID', '$this->ENTREGA_NOM', '$this->ENTREGA_TRABAJO')";

                $this->mysqli->query($sql);

                return 'Inserción realizada con éxito';
            }
            else
                return 'La entrega ya existe en la base de datos';
        }
    }
    else{

        return 'Introduzca un valor para nombre entrega de la entrega';
    }
}

//Destruye el objeto
function __destruct()
{

}


//Nos devuelve la información de una entrega
function Consultar($ENTREGA_ID)
{
    $this->ConectarBD();

    if($this->ENTREGA_NOM == '' && $this->ENTREGA_ID == '' && $this->ENTREGA_TRABAJO != ''){
        $sql = "select ENTREGA_ID,ENTREGA_NOMBRE,ENTREGA_TRABAJO from ENTREGA where (ENTREGA_TRABAJO="."'$this->ENTREGA_TRABAJO'"."))";
    }else if($this->ENTREGA_NOM != '' && $this->ENTREGA_ID == '' && $this->ENTREGA_TRABAJO == ''){
        $sql = "select ENTREGA_ID,ENTREGA_NOMBRE,ENTREGA_TRABAJO from ENTREGA where ((ENTREGA_NOMBRE ="."'$this->ENTREGA_NOM'"."))";
    } else{
        $sql = "select ENTREGA_ID,ENTREGA_NOMBRE,ENTREGA_TRABAJO from ENTREGA where ((ENTREGA_ID ="."'$ENTREGA_ID'"."))";
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

//Nos devuelve la información de todas las entregas
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

//Borrado de entregas
function Borrar($ENTREGA_ID)
{

    $this->ConectarBD();
    $sql = "select * from ENTREGA where ENTREGA_ID = '".$ENTREGA_ID."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {

        $sql = "delete from ENTREGA where ENTREGA_NOMBRE = '".$this->ENTREGA_NOM."'";
        $this->mysqli->query($sql);
        return "La entrega se ha borrado correctamente";

    }
    else
        return "La entrega no existe";
}

//Devuelve toda la información para una determinada entrega
function RellenaDatos()
{
    $this->ConectarBD();
    $sql = "select * from ENTREGA where ENTREGA_NOMBRE = '".$this->ENTREGA_NOM."'";
    if (!($resultado = $this->mysqli->query($sql))){
        return 'Error en la consulta sobre la base de datos';
    }
    else{
        $result = $resultado->fetch_array();

        return $result;
    }
}

//Nos permite actualizar la información de una determinada entrega
function Modificar($ENTREGA_ID)
{
    $this->ConectarBD();
    $sql = "select * from ENTREGA where ENTREGA_ID = '".$ENTREGA_ID."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE ENTREGA SET ENTREGA_ID = '".$ENTREGA_ID."',ENTREGA_NOMBRE ='".$this->ENTREGA_NOM."',ENTREGA_TRABAJO = '".$this->ENTREGA_TRABAJO."' WHERE ENTREGA_ID='".$ENTREGA_ID."'";


        if (!($resultado = $this->mysqli->query($sql))){
            return "Se ha producido un error en la modificación de la entrega";
        }
            return "La entrega se ha modificado con éxito";
    }
    else
        return "La entrega no existe";
}

//Recoge todos los ids de trabajos que hay y los inserta en un array
function getIDTrab(){
    $this->ConectarBD();
    $sql = "select TRABAJO_ID from TRABAJO ";
    $result = $this->mysqli->query($sql);

    $toRet = array();
    foreach ($result as $b){
        array_push($toRet,$b['TRABAJO_ID']);
    }

    return $toRet;

}



//Recoge los nombres de los trabajos
    function getNomTrab(){
        $this->ConectarBD();
        $sql = "select TRABAJO_NOM from TRABAJO ";
        $result = $this->mysqli->query($sql);

        $toRet = array();
        foreach ($result as $b){
            array_push($toRet,$b['TRABAJO_NOM']);
        }

        return $toRet;

    }


//Devuelve el nombre del trabajo que se pasa como id
    function nombreTrabajo($id){
        $this->ConectarBD();
        $sql = "select TRABAJO_NOM	from TRABAJO where ((TRABAJO_ID ='$id'))";
        $resultado = $this->mysqli->query($sql);

        $fila = $resultado->fetch_array();


        $toret=$fila['TRABAJO_NOM'];

        return $toret;
    }

//
function getDniAlum(){
    $this->ConectarBD();
    $sql = "select USUARIO_DNI from USUARIO where USUARIO_USER = '".$_SESSION['login']."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
        foreach ($result as $a=>$b){
            $toRet = $b;
        }
    }else $toRet = '';

    return $toRet;
}

function user(){
    $this->ConectarBD();
    $sql = "select USUARIO_TIPO from USUARIO where USUARIO_USER = '".$_SESSION['login']."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
        foreach ($result as $a=>$b){
            $toRet = $b;
        }
    }else $toRet = '';

    return $toRet;
}
}
?>
