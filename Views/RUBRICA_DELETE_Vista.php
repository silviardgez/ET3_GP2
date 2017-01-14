<?php

class RUBRICA_DELETE {

    private $valores;
    private $volver;

//VISTA PARA EL BORRADO DE RUBRICAS
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '_Rubrica.php';
        include '../Functions/RUBRICAShowDefForm.php';


//Array con los nombres de los campos
        $lista = array('RUBRICA_ID', 'RUBRICA_NOMBRE', 'RUBRICA_DESCRIPCION', 'RUBRICA_NIVELES', 'RUBRICA_AUTOR');
        ?>
        <html>
            <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <meta charset="UTF-8">
            </head> 

            <div class="wrap">



                <form action = 'RUBRICA_Controller.php' method = 'get'><br>
                    <div id="centrado"><span class="form-title">
                            <?php echo $stringsRubrica['Borrar Rubrica'] ?><br></span></div>
                    <ul class="form-style-1">
                        <?php
//Generación automática del array
                        createForm($lista, $DefForm, $stringsRubrica, $this->valores, true, true);
                        ?>
                        <input type = 'submit' name = 'accion' value =<?php echo $strings['Borrar'] ?> ></form> <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
                        </p>

                        </div>

                        </html>
        <?php
    }
}


?>
