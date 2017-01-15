<?php

class INSCRIPCION_ACCEPT{
	//VISTA PARA ACEPTAR INSCRIPCIONES

	private $valores;
	private $volver;

	function __construct($valores, $volver){
		$this->valores=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){

		include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
		include '../Functions/INSCRIPCIONShowDefForm.php';

		//Array con los nombres de los campos a aceptar
		$lista = array('INSCRIPCION_ID','INSCRIPCION_ALUMNO','INSCRIPCION_MATERIA');
	?>
        <html>
            <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <meta charset="UTF-8">
            </head> 

            <div class="wrap">



                <form action = 'INSCRIPCION_Controller.php' method = 'get'><br>
                    <div id="centrado"><span class="form-title">
                            <?php echo $strings['Aceptar inscripción'] ?><br></span></div>
                    <ul class="form-style-1">
                        <?php
//Generación automática del array
                        createForm($lista, $DefForm, $strings, $this->valores, true, true);
                        ?>
                        <input type = 'submit' name = 'accion' value =<?php echo $strings['Aceptar'] ?> ></form> <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
                        </p>

                        </div>

                        </html>
        <?php
    }
}


?>