<?php

class MATERIA_EDIT{
	
//VISTA PARA MODIFICAR MATERIAS
	private $valores;
	private $volver;

	function __construct($valores,$volver){
		$this->valores=$valores;
		$this->colver=$volver;
		$this->render();
	}

	function render(){
		
		include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
		include '../Functions/MATERIAShowDefForm.php';

		//Array con los nombres de los campos a modificar
		$lista = array('MATERIA_ID','MATERIA_NOM','MATERIA_CREDITOS','MATERIA_DEPARTAMENTO','MATERIA_TITULACION','MATERIA_RESPONSABLE','MATERIA_DESCRIPCION');
     
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
                            <?php echo $strings['Modificar materia'] ?></span></div>

                    <form id="form" name="form"  action = 'MATERIA_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
                        <ul class="form-style-1">
                            <?php

                            createForm($lista, $DefForm, $strings, $this->valores, array('MATERIA_NOM'=>true, 'MATERIA_CREDITOS'=>true, 'MATERIA_DEPARTAMENTO'=>true, 'MATERIA_TITULACION'=>true, 'MATERIA_RESPONSABLE'=>true,'MATERIA_DESCRIPCION'=>false), array('MATERIA_ID'=>true));
                            ?>

                            <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_MATERIA()" >
                            </form>

							<?php
                            echo '<a class="form-link" href=\'MATERIA_Controller.php\'>' . $strings['Volver'] . " </a>";
							?>
                            </p>
                            </body>
                            </div>

                            </html>
                            <?php
                        }


                    }

                    ?>