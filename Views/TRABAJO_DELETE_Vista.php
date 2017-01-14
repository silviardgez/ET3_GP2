<?php

class TRABAJO_DELETE {

    private $valores;
    private $volver;

//VISTA PARA EL BORRADO DE TRABAJOS
    function __construct($valores, $volver) {
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render() {

        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        include '../Functions/TRABAJOShowDefForm.php';


//Array con los nombres de los campos
        $lista = array('TRABAJO_ID','TRABAJO_NOM', 'TRABAJO_DESCRIPCION', 'TRABAJO_MATERIA', 'TRABAJO_PROFESOR',
            'TRABAJO_FECHA_INICIO', 'TRABAJO_FECHA_FIN');
        ?>
        <html>
        <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
            <meta charset="UTF-8">
        </head>

        <div class="wrap">



            <form action = 'TRABAJO_Controller.php' method = 'get'><br>
                <div id="centrado"><span class="form-title">
                            <?php echo $strings['BORRAR TRABAJO'] ?><br></span></div>
                <ul class="form-style-1">
                    <?php
                    //Generación automática del array
                    $this->valores["TRABAJO_FECHA_INICIO"]=str_replace(" ","T",$this->valores["TRABAJO_FECHA_INICIO"]);
                    $this->valores["TRABAJO_FECHA_FIN"]=str_replace(" ","T",$this->valores["TRABAJO_FECHA_FIN"]);
                    createForm($lista, $DefForm, $strings, $this->valores, true, true);
                    ?>
                    <input type = 'submit' name = 'accion' value =<?php echo $strings['Borrar'] ?> ></form> <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
            </p>

        </div>

        </html>
        <?php
    }
}


?>
