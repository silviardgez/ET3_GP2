<?php

include '../Functions/LibraryFunctions.php';

//Clase que define las inscripciones
class INSCRIPCION_Model
{
	var $INSCRIPCION_ID;
    var $INSCRIPCION_ALUMNO;
    var $INSCRIPCION_MATERIA;
	var $mysqli;	

	//Constructor al que se le pasa el alumno de la inscripción y la materia
    function __construct($INSCRIPCION_ID, $INSCRIPCION_ALUMNO, $INSCRIPCION_MATERIA){

		$this->INSCRIPCION_ID = $INSCRIPCION_ID;//id de la inscripción
		$this->INSCRIPCION_ALUMNO = $INSCRIPCION_ALUMNO;//alumno de la inscripción
        $this->INSCRIPCION_MATERIA = $INSCRIPCION_MATERIA;//materia de la inscripción

    }

    //Conectarse a la BD
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    //Añadir una inscripción
	function Insertar() { 
        $this->ConectarBD();
			$r = $this->getDniAlum();
			$this->INSCRIPCION_ALUMNO = $r['USUARIO_DNI'];
			$sql = "select * from INSCRIPCION where INSCRIPCION_ALUMNO = '".$this->INSCRIPCION_ALUMNO ."' AND INSCRIPCION_MATERIA = '".$this->INSCRIPCION_MATERIA ."'";
			if (!$result = $this->mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos';
			}
			else {
				if ($result->num_rows == 0){
					$sql = "INSERT INTO INSCRIPCION (INSCRIPCION_ALUMNO, INSCRIPCION_MATERIA) VALUES ('" . $this->INSCRIPCION_ALUMNO . "', '" . $this->INSCRIPCION_MATERIA . "')";
					if (!$result = $this->mysqli->query($sql)) {
						return 'No se ha podido conectar con la base de datos';
					} else {
						return 'Inscripción añadida con exito';
					}
				}
			}
        
    }




    //Funcion de destruccion del objeto: se ejecuta automaticamente
    function __destruct()
    {

    }

    //Consultar una inscripción
    function Consultar()
    {
        $this->ConectarBD();
        $sql = "SELECT * FROM INSCRIPCION WHERE INSCRIPCION_ID='" . $this->INSCRIPCION_ID . "' OR INSCRIPCION_ALUMNO ='" . $this->INSCRIPCION_ALUMNO . "' OR INSCRIPCION_MATERIA LIKE'" . $this->INSCRIPCION_MATERIA . "'";
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
		}else{
			$toret=array();
			$i=0;
			while ($fila= $resultado->fetch_array()) {
				$toret[$i]=$fila;
				$i++;
			}
			return $toret;
		}
    }


    //Borrado de una inscripción
    function Borrar() {
        $this->ConectarBD();
		if ($this->INSCRIPCION_ID <> '' ){
			$r = $this->getDniAlum();
			if($this->INSCRIPCION_ALUMNO == $r['USUARIO_DNI']){
				$sql = "DELETE FROM INSCRIPCION WHERE INSCRIPCION_ID='" . $this->INSCRIPCION_ID . "'";
				if (!$resultado = $this->mysqli->query($sql)) {
					return 'Error en la consulta sobre la base de datos';
				} else {
					return 'La inscripción ha sido borrada correctamente';
				}	
			}else{
				return 'No puedes borrar una inscripción ajena';
			}
		}
    }
	
	
	//Aceptar una inscripción
	function Aceptar() { 
        $this->ConectarBD();
        if ($this->INSCRIPCION_ID === FALSE) {
            return 'No existe ninguna inscripcion con los parámetros introducidos';
        } else {
            $sql = "INSERT INTO MATRICULA (MATRICULA_ALUMNO, MATRICULA_MATERIA) VALUES ('" . $this->INSCRIPCION_ALUMNO . "', '" . $this->INSCRIPCION_MATERIA . "')";
            if (!$result = $this->mysqli->query($sql)) {
                return 'No se ha podido conectar con la base de datos';
            } else {
				$sql = "DELETE FROM INSCRIPCION WHERE INSCRIPCION_ID='" . $this->INSCRIPCION_ID . "'";
				if (!$resultado = $this->mysqli->query($sql)) {
					return 'Error en la consulta sobre la base de datos';
				} else {
					return 'La inscripción ha sido aceptada correctamente';
				}
            }
        }
    }

	
    //Devuelve la información correspondiente a una página
    function RellenaDatos() { //Completa el formulario visible con los datos de una inscripción
        $this->ConectarBD();
        $sql = "SELECT INSCRIPCION_ID, INSCRIPCION_ALUMNO, INSCRIPCION_MATERIA FROM INSCRIPCION WHERE INSCRIPCION_ID='" . $this->INSCRIPCION_ID . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }


    //Modificar una inscripción
	function Modificar() {
        $this->ConectarBD();
		$r = $this->getDniAlum();
		if($this->INSCRIPCION_ALUMNO == $r['USUARIO_DNI']){
			$sql = "SELECT * FROM INSCRIPCION WHERE INSCRIPCION_ID='" . $this->INSCRIPCION_ID . "'";
			if (!$resultado = $this->mysqli->query($sql)) {
				return 'Los parámetros introducidos no pertenecen a ninguna inscripción';
			} else {
				$sql = "UPDATE INSCRIPCION SET INSCRIPCION_ALUMNO ='" . $this->INSCRIPCION_ALUMNO . "', INSCRIPCION_MATERIA ='" . $this->INSCRIPCION_MATERIA . "' WHERE INSCRIPCION_ID='" . $this->INSCRIPCION_ID . "'";
				if (!$resultado = $this->mysqli->query($sql)) {
					return 'Error en la consulta sobre la base de datos';
				} else {
					return 'Inscripción modificada correctamente';
				}
			}
		}else{
			return 'No puedes modificar una inscripción ajena';
		}
    }

    //Listar todas las inscripciones
    function ConsultarTodo(){
        $this->ConectarBD();
        $sql = "SELECT * FROM INSCRIPCION";
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
	
	//Recoge todos los ids de trabajos que hay y los inserta en un array
	function getIDMateria(){
		$this->ConectarBD();
		$sql = "select MATERIA_ID from MATERIA ";
		$result = $this->mysqli->query($sql);

		$toRet = array();
		foreach ($result as $b){
			array_push($toRet,$b['MATERIA_ID']);
		}

		return $toRet;
	}

	
	//Obtiene el DNI del alumno conectado
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
    function Matricularse()
    {
        $this->ConectarBD();

        $sql = "select MATRICULA_ID from MATRICULA WHERE MATRICULA_ALUMNO='".$this->INSCRIPCION_ALUMNO."' AND MATRICULA_MATERIA='".$this->INSCRIPCION_MATERIA."'";
        $resultado = $this->mysqli->query($sql);
        if ($resultado->num_rows==0){


            $sql = "INSERT INTO  MATRICULA (MATRICULA_ALUMNO,MATRICULA_MATERIA) VALUES ('".$this->INSCRIPCION_ALUMNO."','".$this->INSCRIPCION_MATERIA."')";
            $this->mysqli->query($sql);

            return 'matriculado con exito';
        }
        else {
            return 'ya matriculado';
        }
    }
    function Desmatricularse()
    {
        $this->ConectarBD();

        $sql = "select MATRICULA_ID from MATRICULA WHERE MATRICULA_ALUMNO='".$this->INSCRIPCION_ALUMNO."' AND MATRICULA_MATERIA='".$this->INSCRIPCION_MATERIA."'";
        $resultado = $this->mysqli->query($sql);
        if ($resultado->num_rows!=0){


            $sql = "DELETE FROM MATRICULA WHERE MATRICULA_ALUMNO='".$this->INSCRIPCION_ALUMNO."' AND MATRICULA_MATERIA='".$this->INSCRIPCION_MATERIA."'";
            $this->mysqli->query($sql);

            return 'desmatriculado con exito';
        }
        else {
            return 'no matriculado';
        }
    }
}