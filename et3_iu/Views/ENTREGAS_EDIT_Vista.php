<?php

class Entrega_Edit{

    private $valores;
    private $volver;
//VISTA PARA LA MODIFICACIÓN DE ENTREGAS
    function __construct($valores,$volver){
        $this->valores = $valores;
        $this->volver = $volver;
        $this->render();
    }

    function render(){

        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
        include '../Functions/ENTREGAEditDefForm.php';
        //include '../Functions/LibraryFunctions.php';
        //Array con los nombres de los campos a modificar
        $lista = array('ENTREGA_ID', 'ENTREGA_NOMBRE', 'ENTREGA_TRABAJO', 'ENTREGA_HORAS_DEDIC', 'ENTREGA_FOTO');

        ?>
        <html>
        <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script>
            <meta charset="UTF-8">
        </head>
        <div class="wrap">
            <body>
            <div id="centrado"><span class="form-title">
	<?php echo $strings['Modificar entrega']?></span></div>

            <form id="form" name="form"  action = 'ENTREGAS_Controller.php'  method = 'post' enctype="multipart/form-data"><br>
                <ul class="form-style-1">
                    <?php
                    //Generación automática del formulario
                    createForm($lista,$DefForm,$strings,$this->valores,false,array('ENTREGA_ID'=>true,'ENTREGA_ALUMNO'=>true,'ENTREGA_TRABAJO'=>true));
                    ?>

                    <input type = 'submit' name = 'accion' value = '<?php echo $strings['Modificar'] ?>'  onclick="return valida_envia_ENTREGA()" >
            </form>


            <a class="form-link" href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a>
            </p>
            </body>
        </div>

        </html>
        <?php
    } // fin del metodo render
} // fin de la clase
?>
