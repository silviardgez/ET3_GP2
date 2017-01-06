<?php

class TRABAJO_EDIT {

    private $valores;
    private $volver;

//VISTA PARA LA MODIFICACIÓN DE UNA TRABAJO
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        include '../Functions/TRABAJOShowDefForm.php';

        //Array con los nombres de los campos a modificar
        $lista = array('TRABAJO_ID','TRABAJO_NOM', 'TRABAJO_DESCRIPCION', 'TRABAJO_MATERIA', 'TRABAJO_PROFESOR',
            'TRABAJO_FECHA_INICIO', 'TRABAJO_FECHA_FIN');

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
                            <?php echo $strings['MODIFICAR TRABAJO'] ?></span></div>

            <form id="form" name="form"  action = 'TRABAJO_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
                <ul class="form-style-1">
                    <?php

                    $this->valores["TRABAJO_FECHA_INICIO"]=str_replace(" ","T",$this->valores["TRABAJO_FECHA_INICIO"]);
                    $this->valores["TRABAJO_FECHA_FIN"]=str_replace(" ","T",$this->valores["TRABAJO_FECHA_FIN"]);

                    createForm($lista, $DefForm, $strings, $this->valores, false, array('TRABAJO_ID'=>true));
                    ?>

                    <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>' " >
            </form>


            <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
            </p>
            </body>
        </div>

        </html>
        <?php
    }


}

?>
