<?php

class ITEM_DELETE {

    private $valores;
    //private $volver;
    private $return;

//VISTA PARA EL BORRADO DE RUBRICAS
    function __construct($valores,$return) {
        $this->valores = $valores;
        //$this->volver = $volver;
        $this->return = $return;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
       //include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '_Rubrica.php';
        include '../Functions/ITEMShowAllDefForm.php';


//Array con los nombres de los campos
        $lista = array('ITEM_ID', 'ITEM_NOMBRE', 'ITEM_RUBRICA', 'ITEM_PORCENTAJE');
        ?>
        <html>
            <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <meta charset="UTF-8">
            </head> 

            <div class="wrap">



                <form action = 'ITEM_Controller.php' method = 'get'><br>
                    <div id="centrado"><span class="form-title">
                            <?php echo $strings['Borrar Item'] ?><br></span></div>
                    <ul class="form-style-1">
                        <?php
//Generación automática del array
                        createForm($lista, $DefForm, $strings, $this->valores, true, true);
                        ?>
                        <input type = 'submit' name = 'accion' value =<?php echo $strings['Borrar'] ?> ></form> 
                       <?php
                        echo '<a class="form-link" href=\'ITEM_Controller.php?RUBRICA_ID='.$this->return.'\'>' . $strings['Volver'] . " </a>";
                        ?>
                        </p>

                        </div>

                        </html>
        <?php
    }
}


?>
