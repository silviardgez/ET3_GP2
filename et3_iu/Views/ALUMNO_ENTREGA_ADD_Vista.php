<?php

class ALUMNO_ENTREGA_Añadir{
var $ENTREGA_ID;

    function __construct($ID){
        $this->ENTREGA_ID=$ID;
        $this->render();
    }

    function render(){

        ?><div class="wrap">

        <head>
            <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>

        <?php //VISTA PARA LA INSERCIÓN DE ENTREGAS
        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
        include '../Functions/ALUMNOENTREGAShowAllDefForm.php';
        //Array con los nombres de los campos a insertar
        $lista = array('ENTREGA_ID','DOCUMENTO','HORAS_DEDIC');

        ?>


        <form id="form" name="form" action='ALUMNO_ENTREGA_Controller.php' method='post' enctype="multipart/form-data">
            <div id="centrado"><span class="form-title">
			<?php echo $strings['Insertar entrega']?><br></span></div>

            <ul class="form-style-1">
                <?php
                //Generación automática del formulario
                createForm($lista,$DefForm,$strings,array('ENTREGA_ID'=>$this->ENTREGA_ID),false,array('ENTREGA_ID'=>true));

                ?>
                <input type='submit' name='accion' value=<?php echo $strings['Añadir'] ?>>
        </form>
        <?php
        echo '<a class="form-link" href=\'ENTREGAS_Controller.php\'>' . $strings['Volver'] . " </a>";
        ?>


        </div>

        <?php
    } //fin metodo render

}

