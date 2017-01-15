<?php

class MATERIA_ADD_Profesor
{
    var $valores;
	//VISTA PARA AÑADIR PROFESORES A MATERIAS
	function __construct($valores){
	    $this->valores=$valores;
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
            include '../Functions/MATERIADefForm.php';
            
            //Array con los nombres de los campos a insertar
			$list = array('MATERIA_NOM','MATERIA_ID');
            $lista=AñadirProfesoresTitulos($list);

			?>


            <form  id="form" name="form" action='MATERIA_Controller.php' method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Profesores'] ?><br></span></div>

                <ul class="form-style-1">
                    <?php
                    
                    //Generación automática del formulario
                    createForm($lista, $DefForm, $strings, $this->valores, false, array('MATERIA_NOM'=>true, 'MATERIA_ID'=>true));
                    ?>
                    <input type='submit' onclick="return valida_envia_MATERIA()" name='accion'  value='<?php echo $strings['Profesores'] ?>'
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'MATERIA_Controller.php\'>' . $strings['Volver'] . " </a>";
                        ?>


                        </div>

                        <?php
                    }

                }