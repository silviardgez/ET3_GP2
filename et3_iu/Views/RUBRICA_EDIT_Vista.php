<?php

class RUBRICA_EDIT {

    private $valores;
    private $volver;

//VISTA PARA LA MODIFICACIÓN DE UNA RUBRICA
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
                include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '_Rubrica.php';
        include '../Functions/RUBRICAShowDefForm.php';

        //Array con los nombres de los campos a modificar
            $lista = array('RUBRICA_ID', 'RUBRICA_NOMBRE', 'RUBRICA_DESCRIPCION', 'RUBRICA_NIVELES');
      
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
                            <?php echo $stringsRubrica['Modificar Rubrica'] ?></span></div>

                    <form id="form" name="form"  action = 'RUBRICA_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
                        <ul class="form-style-1">
                            <?php

                            createForm($lista, $DefForm, $stringsRubrica, $this->valores, '', array('RUBRICA_ID'=>true));
                            ?>

                            <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_USUARIO()" >
                            </form>


                            <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
                            </p>
                            </body>
                            </div>

                            </html>
                            <?php
                        }

// fin del metodo render
                    }

                    // fin de la clase
                    ?>
