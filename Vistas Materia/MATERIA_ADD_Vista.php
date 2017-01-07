<?php

class MATERIA_ADD
{
	//VISTA PARA INSERTAR MATERIAS
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
            include '../Functions/MATERIAShowAllDefForm.php';
            
            //Array con los nombres de los campos a insertar
			$lista = array('MATERIA_NOM', 'MATERIA_CREDITOS', 'MATERIA_DEPARTAMENTO', 'MATERIA_TITULACION', 'MATERIA_DESCRIPCION');
			?>


            <form  id="form" name="form" action='MATERIA_Controller.php' method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Insertar materia'] ?><br></span></div>

                <ul class="form-style-1">
                    <?php
                    
                    //Generación automática del formulario
                    createForm($lista, $DefForm, $strings, '', array('MATERIA_DESCRIPCION' => false), false);
                    ?>
                    <input type='submit' onclick="return valida_envia_MATERIA()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'MATERIA_Controller.php\'>' . $strings['Volver'] . " </a>";
                        ?>


                        </div>

                        <?php
                    }

                }