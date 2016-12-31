<?php

class ITEM_EDIT {

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
        //include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '_Rubrica.php';
        include '../Functions/ITEMShowAllDefForm.php';

        //Array con los nombres de los campos a modificar
        $lista = array('ITEM_ID', 'ITEM_NOMBRE', 'ITEM_RUBRICA', 'ITEM_PORCENTAJE');
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
                            <?php echo $strings['Modificar Item'] ?></span></div>

                    <form id="form" name="form"  action = 'ITEM_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
                        <ul class="form-style-1">
                            <?php
                            createForm($lista, $DefForm, $strings, $this->valores, '', array('ITEM_ID' => true, 'ITEM_RUBRICA' => true));
                            ?>

                            <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_RUBRICA()" >
                            </form>
                            <?php
                             echo '<a class="form-link" href=\'ITEM_Controller.php?RUBRICA_ID=' . $this->volver . '\'>' . $strings['Volver'] . " </a>";
                             ?>
                            </p>
                            </body>
                            </div>

                            </html>
        <?php
    }

}
?>
