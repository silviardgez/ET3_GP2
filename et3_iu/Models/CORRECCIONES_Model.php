<?php

include '../Functions/LibraryFunctions.php';

 class CORRECCIONES_Model
 {
 	var $CORRECCION_RUBRICA;
 	var $CORRECCION_NOM;
 	var $CORRECCION_ENTREGA;
 	var $CORRECCION_COMENTARIOS;
 	var $CORRECCION_NOTA;
 	var $CORRECCION_PROFESOR;
 	var $comentario;
 	var $mysqli;

 	function __construct($CORRECCION_NOM,$CORRECCION_RUBRICA,$CORRECCION_ENTREGA,$CORRECCION_COMENTARIOS,$CORRECCION_PROFESOR)
 	{
 		$this->CORRECCION_ENTREGA = $CORRECCION_ENTREGA;
 		$this->CORRECCION_NOM = $CORRECCION_NOM;
 		$this->CORRECCION_RUBRICA = $CORRECCION_RUBRICA;
 		$this->CORRECCION_PROFESOR = $CORRECCION_PROFESOR;
 		$this->CORRECCION_COMENTARIOS = $CORRECCION_COMENTARIOS;
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
	function insertar()
	{
		$this->ConectarBD();
	    $sql = "select * from CORRECCION where CORRECCION_NOM = '".$this->CORRECCION_NOM."'";

		if(!$result = $this->mysqli->query($sql))
		{
			return "No se ha podido conectar con la base de datos.";
		}
		else if($result->num_rows==0)
		{		
				//Inserta la corrección en la tabla CORRECCION.
				$sql = "INSERT INTO CORRECCION(CORRECCION_NOM,CORRECCION_ENTREGA,CORRECCION_RUBRICA,CORRECCION_PROFESOR,CORRECCION_NOTA,CORRECCION_COMENTARIOS) VALUES ('";
				$sql = $sql."$this->CORRECCION_NOM','$this->CORRECCION_ENTREGA','$this->CORRECCION_RUBRICA','$this->CORRECCION_PROFESOR','$this->CORRECCION_NOTA','$this->CORRECCION_COMENTARIOS')";

				$this->mysqli->query($sql);

				return "inserción realizada con éxito";
			
			
		}else if($result->num_rows>0)
			{
				return "La corrección ya existe";
			}
		else
		{
			return "Introduzca un valor para el código de la corrección";
		}
	}

	//Nos permite actualizar la información de una determinada funcionalidad
function modificar()
{
    $this->ConectarBD();
    $sql = "select * from CORRECCION where CORRECCION_NOM = '".$this->CORRECCION_NOM."'";

    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
	$sql = "UPDATE CORRECCION SET CORRECCION_NOTA = '" . $this->CORRECCION_NOTA . "', CORRECCION_COMENTARIOS ='" . $this->CORRECCION_COMENTARIOS ."' WHERE CORRECCION_NOM='".$this->CORRECCION_NOM."'";
	if (!($resultado = $this->mysqli->query($sql))){
		return "Se ha producido un error en la modificación de la correccion"; 
	}    
	else
		return "La correccion se ha modificado con éxito";
}
}


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
   $sql = "select * from CORRECCION where CORRECCION_NOM = '".$this->CORRECCION_NOM."'";
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
    $sql = "select * from CORRECCION where CORRECCION_NOM = '".$this->CORRECCION_NOM."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
			$sql = "delete from CORRECCION where CORRECCION_NOM = '" . $this->CORRECCION_NOM. "'";
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
    $sql =  "select CORRECCION_ID, CORRECCION_NOM, CORRECCION_ENTREGA, CORRECCION_RUBRICA, CORRECCION_NOTA from CORRECCION where  ((CORRECCION_NOM LIKE '".$this->CORRECCION_NOM."') OR (CORRECCION_NOTA like'".$this->CORRECCION_NOTA."'))";

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

	function consultarRubricas()
	{
	$this->ConectarBD();
	$sql = "select * from RUBRICA";
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

function consultarItemsRubrica($valor)
{
	$this->ConectarBD();
	$sql = "select ITEM_NOMBRE from ITEM where ITEM_RUBRICA=".$valor."";
	if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
		}
		else{

			$toret=array();
			$i=0;

			while ($fila= $resultado->fetch_array()['ITEM_NOMBRE']) {
				$toret[$i]=$fila;
				$i++;

			}

			return $toret;
	}
}

function consultarNivelesRubrica($valor)
{
	$this->ConectarBD();
	$sql = "select NIVEL_DESCRIPCION from NIVEL where NIVEL_RUBRICA=".$valor."";
	if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
		}
		else{

			$toret=array();
			$i=0;

			while ($fila= $resultado->fetch_array()['NIVEL_DESCRIPCION']) {
				$toret[$i]=$fila;
				$i++;

			}

			return $toret;
	}
	}



function consultarNumeroNiveles($valor)
{
	$this->ConectarBD();
	$sql = "select RUBRICA_NIVELES from RUBRICA where RUBRICA_ID=".$valor."";
	$resultado = $this->mysqli->query($sql);


			return (integer)$resultado->fetch_array()['RUBRICA_NIVELES'];

}

function juntarArrays($array1,$array2)
{
	$i=0;
	$toret = array();
	for($i=0;$i<count($array1);$i++)
	{
		$aux = $i+1;
		$toret[$i] = $array1[$i]['ITEM_NOMBRE'];
		for($j=0;$j<4;$j++)
		{
			$toret[$j+1] = $array2[$j]['NIVEL_DESCRIPCION'];
		}
	}
	return $toret;


}

function calcularNota($array,$valorMax)
{
	$toret = 0;

	for($i = 0; $i<count($array);$i++)
	{
		$toret += $array[$i];
	}

	$toret = $toret*(10/$valorMax);
	return $toret;
}

function setNota($nota)
{
	$this->CORRECCION_NOTA = $nota;
}
}

?>

 