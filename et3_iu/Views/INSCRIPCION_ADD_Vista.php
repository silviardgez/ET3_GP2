<?php

class INSCRIPCION_ADD
{
	//VISTA PARA INSERTAR INSCRIPCIONES
	function __construct(){	
		$this->render();
	}

	function render(){
	?>

        <div class="wrap">

            <head>
                <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script></head>

            <?php
            include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
            include '../Functions/INSCRIPCIONShowAllDefForm.php';
            
            //Array con los nombres de los campos a insertar
			$lista = array('INSCRIPCION_ALUMNO', 'INSCRIPCION_MATERIA');
			?>


            <form  id="form" name="form" action='INSCRIPCION_Controller.php' method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Insertar inscripción'] ?><br></span></div>

                <ul class="form-style-1">
                    <?php
                    
                    //Generación automática del formulario
                    createForm($lista, $DefForm, $strings, '', false, false);
                    ?>
                    <input type='submit' onclick="return valida_envia_INSCRIPCION()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'INSCRIPCION_Controller.php\'>' . $strings['Volver'] . " </a>";
                        ?>


                        </div>

                        <?php
                    }

                }