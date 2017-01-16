<?php

include '../Functions/LibraryFunctions.php';

class DOCUMENTACION_Model
{

	//Parámetros de la clase documentacion
	var $DOCUMENTACION_ID;
	var $DOCUMENTACION_NOM;
	var $DOCUMENTACION_PROFESOR;
	var $DOCUMENTACION_MATERIA;
	var $DOCUMENTACION_FECHA;
	var $DOCUMENTACION_ENLACE;
	var $DOCUMENTACION_CATEGORIA;
	var $mysqli;

	
	//Constructor
	function __construct($DOCUMENTACION_NOM, $DOCUMENTACION_PROFESOR, $DOCUMENTACION_MATERIA, $DOCUMENTACION_FECHA, $DOCUMENTACION_ENLACE, $DOCUMENTACION_CATEGORIA)
	{
		$this->DOCUMENTACION_NOM = $DOCUMENTACION_NOM;
		$this->DOCUMENTACION_PROFESOR = $DOCUMENTACION_PROFESOR;
		$this->DOCUMENTACION_MATERIA = $DOCUMENTACION_MATERIA;
		$this->DOCUMENTACION_FECHA =  $DOCUMENTACION_FECHA;
		$this->DOCUMENTACION_ENLACE =  $DOCUMENTACION_ENLACE;
		$this->DOCUMENTACION_CATEGORIA = $DOCUMENTACION_CATEGORIA;
	}

	//Función para conectarnos a la Base de Datos
	function ConectarBD()
	{
		$this->mysqli = new mysqli("localhost", "ET3Grupo2", "ET3Grupo2", "ET3Grupo2");

		if ($this->mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		}
	}
	
	
	//Destrucción del objeto
	function __destruct(){}

	//Get del atributo materia
	function getMateria(){
		return $this->DOCUMENTACION_MATERIA;
	}

	//Devuelve el enlace dado un nombre
	function getEnlace(){
		$this->ConectarBD();
		$sql = "SELECT DOCUMENTACION_ENLACE FROM DOCUMENTACION WHERE DOCUMENTACION_NOM = '" . $this->DOCUMENTACION_NOM . "'";
		$result = $this->mysqli->query($sql)->fetch_array();

		return $result['DOCUMENTACION_ENLACE'];
	}
	
	
	
	//Devuelve la información de todos los documentos de una materia
	function ConsultarTodo()
	{
		$this->ConectarBD();
		$sql = "SELECT * FROM DOCUMENTACION WHERE DOCUMENTACION_MATERIA = '" . $this->DOCUMENTACION_MATERIA . "' AND DOCUMENTACION_CATEGORIA='" . $this->DOCUMENTACION_CATEGORIA . "'";
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

	//Devuelve todas los documentos de una materia que no tienen categoría
	function MateriaSinCategoria()
	{
		$this->ConectarBD();
		$sql = "SELECT * FROM DOCUMENTACION WHERE DOCUMENTACION_MATERIA = '" . $this->DOCUMENTACION_MATERIA . "' AND (DOCUMENTACION_CATEGORIA IS NULL OR DOCUMENTACION_CATEGORIA = '')";
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
	
	
	//Insertar documentación
	function Insertar()
	{
		$this->ConectarBD();

		if ($this->DOCUMENTACION_NOM <> '') {

			$sql = "select * from DOCUMENTACION where DOCUMENTACION_NOM = '".$this->DOCUMENTACION_NOM."'";

			if (!$result = $this->mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos';


			} else {
				if ($result->num_rows == 0){
					$sql = "INSERT INTO DOCUMENTACION (DOCUMENTACION_NOM, DOCUMENTACION_PROFESOR, DOCUMENTACION_MATERIA, DOCUMENTACION_FECHA, DOCUMENTACION_ENLACE, DOCUMENTACION_CATEGORIA) VALUES ('" . $this->DOCUMENTACION_NOM . "', '" . $this->DOCUMENTACION_PROFESOR . "', " . $this->DOCUMENTACION_MATERIA . ",  NOW()  , '" . $this->DOCUMENTACION_ENLACE . "', '" . $this->DOCUMENTACION_CATEGORIA . "')";
					$this->mysqli->query($sql);
                return 'Inserción realizada con éxito'; //Corregir String
            } else {
            	return 'El documento ya existe en la base de datos';
            }
        }
    }
    else{

    	return 'Introduzca un valor para el nombre';
    }


}



	//Consulta por nombre y apellido, o por dni o por nombre de usuario devolviendo todos los usuarios que cumplan la condiciÃ³n
function Consultar($var)
{
	$this->ConectarBD();
	$sql = "SELECT * FROM DOCUMENTACION WHERE (DOCUMENTACION_NOM ='".$this->DOCUMENTACION_NOM."' OR DOCUMENTACION_PROFESOR = '". $this->DOCUMENTACION_PROFESOR . "' OR DOCUMENTACION_FECHA = '". $this->DOCUMENTACION_FECHA ."' OR DOCUMENTACION_CATEGORIA = '". $this->DOCUMENTACION_CATEGORIA ."') AND DOCUMENTACION_MATERIA = '". $var ."'";

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

    //Borrado de un documento
function Borrar() {
	$this->ConectarBD();
	$enlace = $this->getEnlace();
	$sql = "DELETE FROM DOCUMENTACION WHERE DOCUMENTACION_NOM='" . $this->DOCUMENTACION_NOM . "'";
	if (!$resultado = $this->mysqli->query($sql)) {
		return 'Error en la consulta sobre la base de datos';
	} else {
		unlink($enlace);
		return 'El documento ha sido borrado correctamente';
	}
}

	//Devuelve los valores almacenados para un determinado usuario para posteriormente rellenar un formulario
function RellenaDatos()
{
	$this->ConectarBD();
	$sql = "select * from DOCUMENTACION where DOCUMENTACION_NOM = '".$this->DOCUMENTACION_NOM."'";

	if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
	else{
		$result = $resultado->fetch_array();
		return $result;
	}
}

	//Actualiza en la base de datos la información de un determinado documento
function Modificar($datos)
{
	$this->ConectarBD();
	$sql = "select * from DOCUMENTACION where DOCUMENTACION_ID = '".$datos."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 1)
	{
		$sql = "UPDATE DOCUMENTACION SET DOCUMENTACION_NOM = '".$this->DOCUMENTACION_NOM."', DOCUMENTACION_FECHA = NOW(), DOCUMENTACION_PROFESOR = '".$this->DOCUMENTACION_PROFESOR."', DOCUMENTACION_CATEGORIA= '".$this->DOCUMENTACION_CATEGORIA."'" ;

		// Para documento
		if($this->DOCUMENTACION_ENLACE!=''){
			$sql.=", DOCUMENTACION_ENLACE='".$this->DOCUMENTACION_ENLACE."'";
		}

		$sql.=" WHERE DOCUMENTACION_ID='".$datos."'";


		if (!($resultado = $this->mysqli->query($sql))){
			return "Se ha producido un error en la modificación del documento"; 
		}
		else{
			return "El documento se ha modificado con éxito";
		}
	} else {
		return "El documento no existe";
	}
}

function ConsultarCategorias(){
	$this->ConectarBD();
	$sql = "SELECT DISTINCT DOCUMENTACION_CATEGORIA FROM DOCUMENTACION WHERE DOCUMENTACION_MATERIA= '" . $this->DOCUMENTACION_MATERIA . "'";


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
