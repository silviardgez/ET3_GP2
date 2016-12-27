<?php

//VISTA PARA INSERTAR PAGOS
class RUBRICA_ADD {

    function __construct() {
        $this->render();
    }

    function render() {
        ?>

        <div class="wrap">

            <head>
                <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script></head>

            <?php
            include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
            include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '_Rubrica.php';
            include '../Functions/RUBRICAShowAllDefForm.php';
            
            //Array con los nombres de los campos a insertar
            $lista = array('RUBRICA_NOMBRE', 'RUBRICA_DESCRIPCION', 'RUBRICA_NIVELES');
            ?>


            <form  id="form" name="form" action='RUBRICA_Controller.php' method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                        <?php echo $stringsRubrica['Insertar Rubrica'] ?><br></span></div>

                <ul class="form-style-1">
                    <?php
                    //Generación automática del formulario
                    createForm($lista, $DefForm, $stringsRubrica, '', array('RUBRICA_DESCRIPCION' => false), false);
                    ?>
                    <input type='submit' onclick="return valida_envia_USUARIO()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'RUBRICA_Controller.php\'>' . $strings['Volver'] . " </a>";
                        ?>


                        </div>

                        <?php
                    }

                }
                