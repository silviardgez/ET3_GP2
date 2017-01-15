<?php

class INSCRIPCION_EDIT{
	
//VISTA PARA MODIFICAR INSCRIPCIONES
	private $valores;
	private $volver;

	function __construct($valores,$volver){
		$this->valores=$valores;
		$this->colver=$volver;
		$this->render();
	}

	function render(){
		
		include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
		include '../Functions/INSCRIPCIONShowDefForm.php';

		//Array con los nombres de los campos a modificar
		$lista = array('INSCRIPCION_ID','INSCRIPCION_ALUMNO','INSCRIPCION_MATERIA');
     
        ?>
        <html>
            <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script>
                <meta charset="UTF-8">
            </head>
            <div class="wrap">
                <body>
                    <div id="centrado"><span class="form-title">
                            <?php echo $strings['Modificar inscripción'] ?></span></div>

                    <form id="form" name="form"  action = 'INSCRIPCION_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
                        <ul class="form-style-1">
                            <?php

                            createForm($lista, $DefForm, $strings, $this->valores, array('INSCRIPCION_MATERIA'=>true), array('INSCRIPCION_ID'=>true, 'INSCRIPCION_ALUMNO'=>true));
                            ?>

                            <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_INSCRIPCION()" >
                            </form>

							<?php
                            echo '<a class="form-link" href=\'INSCRIPCION_Controller.php\'>' . $strings['Volver'] . " </a>";
							?>
                            </p>
                            </body>
                            </div>

                            </html>
                            <?php
                        }


                    }

                    ?>