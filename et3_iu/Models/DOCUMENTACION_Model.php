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
		$this->mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

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
	
	
	/*//Devuelve la información de todos los documentos de unha materia
	function ConsultarTodo()
	{
		$this->ConectarBD();
		$sql = "select * from DOCUMENTACION WHERE DOCUMENTACION_MATERIA='" . $this->DOCUMENTACION_MATERIA . "'";
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
	}*/
	
	
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
	
	
	//Insertar documentación
	function Insertar()
	{
		
	}


	//Consulta por nombre y apellido, o por dni o por nombre de usuario devolviendo todos los usuarios que cumplan la condiciÃ³n
	function Consultar()
	{
		$this->ConectarBD();
		$sql = "SELECT * FROM DOCUMENTACION WHERE DOCUMENTACION_ID ='" . $this->DOCUMENTACION_ID . "' OR DOCUMENTACION_NOM LIKE '%" . $this->DOCUMENTACION_NOM . "' OR DOCUMENTACION_PROFESOR = '". $this->DOCUMENTACION_PROFESOR . "' OR DOCUMENTACION_MATERIA = '". $this->DOCUMENTACION_MATERIA ."' OR DOCUMENTACION_FECHA = '". $this->DOCUMENTACION_FECHA ."' OR DOCUMENTACION_ENLACE = '". $this->DOCUMENTACION_ENLACE ."' OR DOCUMENTACION_CATEGORIA = '". $this->DOCUMENTACION_CATEGORIA ."'";
		

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
		$sql = "DELETE FROM DOCUMENTACION WHERE DOCUMENTACION_NOM='" . $this->DOCUMENTACION_NOM . "'";
		if (!$resultado = $this->mysqli->query($sql)) {
			return 'Error en la consulta sobre la base de datos';
		} else {
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
		printf($datos);
		$this->ConectarBD();
		$sql = "select * from DOCUMENTACION where DOCUMENTACION_ID = '".$datos."'";
		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1)
		{
			$sql = "UPDATE DOCUMENTACION SET DOCUMENTACION_NOM = '".$this->DOCUMENTACION_NOM."', DOCUMENTACION_ENLACE = '".$this->DOCUMENTACION_ENLACE."',DOCUMENTACION_CATEGORIA= '".$this->DOCUMENTACION_CATEGORIA."'  WHERE DOCUMENTACION_ID='".$datos."'";;

	/* Para documento
	 if($this->USUARIO_FOTO!=''){
	 	$sql.=", USUARIO_FOTO='".$this->USUARIO_FOTO."'";
	 }

		$sql.=" WHERE USUARIO_USER='".$this->USUARIO_USER."'";

	*/

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
