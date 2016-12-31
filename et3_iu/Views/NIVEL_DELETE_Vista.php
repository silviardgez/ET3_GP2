<?php

class NIVEL_DELETE {

    private $valores;
    private $return;

//VISTA PARA EL BORRADO DE UN NIVEL DE UN ITEM DE UNA RUBRICA
    function __construct($valores,$return) {
        $this->valores = $valores;
        $this->return = $return;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        include '../Functions/NIVELShowAllDefForm.php';


//Array con los nombres de los campos
        $lista = array('NIVEL_ID', 'NIVEL_DESCRIPCION', 'NIVEL_ITEM', 'NIVEL_RUBRICA', 'NIVEL_PORCENTAJE');
        ?>
        <html>
            <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <meta charset="UTF-8">
            </head> 

            <div class="wrap">



                <form action = 'NIVEL_Controller.php' method = 'get'><br>
                    <div id="centrado"><span class="form-title">
                            <?php echo $strings['Borrar Nivel'] ?><br></span></div>
                    <ul class="form-style-1">
                        <?php
//Generación automática del array
                        createForm($lista, $DefForm, $strings, $this->valores, true, true);
                        ?>
                        <input type = 'submit' name = 'accion' value =<?php echo $strings['Borrar'] ?> ></form> 
                       <?php
                        echo '<a class="form-link" href=\'NIVEL_Controller.php?ITEM_ID='.$this->return.'\'>' . $strings['Volver'] . " </a>";
                        ?>
                        </p>

                        </div>

                        </html>
        <?php
    }
}


?>
