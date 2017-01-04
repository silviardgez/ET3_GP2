<?php

include '../Functions/LibraryFunctions.php';

 class CORRECCIONES_Model
 {
 	var $CORRECCION_ID;
 	var $CORRECCION_RUBRICA;
 	var $CORRECCION_NOM;
 	var $CORRECCION_ENTREGA;
 	var $CORRECCION_COMENTARIOS;
 	var $CORRECCION_NOTA;
 	var $comentario;
 	var $mysqli;

 	function __construct($CORRECCION_NOM,$CORRECCION_RUBRICA,$CORRECCION_ID,$CORRECCION_ENTREGA,$CORRECCION_NOTA)
 	{
 		$this->CORRECCION_ENTREGA = $CORRECCION_ENTREGA;
 		$this->CORRECCION_NOM = $CORRECCION_NOM;
 		$this->CORRECCION_RUBRICA = $CORRECCION_RUBRICA;
 		$this->CORRECCION_ID = $CORRECCION_ID;
 		$this->CORRECCION_NOTA = $CORRECCION_NOTA;
 	}

 	//Método para la conexión a la base de datos
    function ConectarBD()
    {
    $this->mysqli = new mysqli( "localhost", "iu2016", "iu2016", "IU2016");
	
	if ($this->mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
	}
}

    //Método para crear una corrección nueva.
	/*function insertar()
	{
		$this->ConectarBD();
		if($this->CORRECCION_ID>=0)
		{
			$sql = "select * from CORRECCION where CORRECCION_ID = '".$this->CORRECCION_ID."'";
		}

		if(!$result = $this->mysqli->query($sql))
		{
			return "No se ha podido conectar con la base de datos.";
		}
		else
		{
			if($result->num_rows==0)
			{
				//Inserta la corrección en la tabla CORRECCION.
				$sql = "INSERT INTO CORRECCION(CORRECCION_ID,CORRECCION_NOM,CORRECCION_RUBRICA,CORRECCION_ENTREGA,CORRECCION_PROFESOR) VALUES ('";
				$sql = $sql."$this->CORRECCION_ID,$this->nom,$this->rubrica_id,$this->ENTREGA_ID,$this->PROFESOR_ID')";

				$this->mysqli->query($sql);

				return "inserción realizada con éxito";
			}
			else
			{
				return "La corrección ya existe";
			}
		}
		else
		{
			return "Introduzca un valor para el código de la corrección";
		}
	}
}*/
function ConsultarTodo()
{
	$this->ConectarBD();
	$sql = "select * from CORRECCION";
	if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
		}
		else{

			$toret=array();
			$i=0;

			while ($fila= $resultado->fetch_array()) {
				$fila['CORRECCION_RUBRICA'] = consultarNOMRubrica($fila['CORRECCION_RUBRICA']);
				$fila['CORRECCION_ENTREGA'] = consultarNOMEntrega($fila['CORRECCION_ENTREGA']);
				$toret[$i]=$fila;
				$i++;

			}

			return $toret;
}


 }

 function consultarEntregas()
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

 function RellenaDatos()
 {
   $this->ConectarBD();
   $sql = "select * from CORRECCION where CORRECCION_ID = '".$this->CORRECCION_ID."'";
   if(!($resultado = $this->mysqli->query($sql)))
   {
   	return 'Error en la consulta sobre la base de datos';
   }
   else
   {
   	$result = $resultado->fetch_array();
   	$result['CORRECCION_ENTREGA'] = consultarNOMEntrega($result['CORRECCION_ENTREGA']);
   	$result['CORRECCION_RUBRICA'] = consultarNOMRubrica($result['CORRECCION_RUBRICA']);
   	return $result;
   }
 }

 function Borrar()
 {
 	$this->ConectarBD();
    $sql = "select * from CORRECCION where CORRECCION_ID = '".$this->CORRECCION_ID."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
			$sql = "delete from CORRECCION where CORRECCION_ID = '" . $this->CORRECCION_ID. "'";
			$this->mysqli->query($sql);
			return "La correccion ha sido borrada correctamente";	
    }
    else
        return "La correccion no existe";
 }

 //Consulta por nombre y apellido, o por dni o por nombre de usuario devolviendo todos los usuarios que cumplan la condición
function Consultar()
{
    $this->ConectarBD();
    $sql =  "select CORRECCION_ID, CORRECCION_NOM, CORRECCION_ENTREGA, CORRECCION_RUBRICA, CORRECCION_NOTA from CORRECCION where  ((CORRECCION_ID LIKE "."'$this->CORRECCION_ID'".") OR (CORRECCION_NOM LIKE "."'$this->CORRECCION_NOM'".")) OR (CORRECCION_ENTREGA LIKE"."'$this->CORRECCION_ENTREGA'".") OR (CORRECCION_NOTA LIKE "."'$this->CORRECCION_NOTA'".")";

	if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la consulta sobre la base de datos';
	}
    else{
		$toret=array();
			$i=0;

			while ($fila= $resultado->fetch_array()) {
				$fila['CORRECCION_RUBRICA'] = consultarNOMRubrica($fila['CORRECCION_RUBRICA']);
				$fila['CORRECCION_ENTREGA'] = consultarNOMEntrega($fila['CORRECCION_ENTREGA']);
				$toret[$i]=$fila;
				$i++;

			}

			}

		

		return $toret;
	}

}
?>

 