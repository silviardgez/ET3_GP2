<?php

class Entrega_show{
    //VISTA QUE MUESTRA LAS ENTREGAS CONSULTADAS


    function __construct(){
        $this->render();
    }

    function render(){
        ?>
        <head><link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
        <div class="wrap">
            <?php


            $lista = array('ENTREGA_ID', 'ENTREGA_NOMBRE', 'ENTREGA_TRABAJO', 'ENTREGA_ALUMNO');

            ?>


            <form  id="form" name="form" action='ENTREGAS_Controller.php' method='post'>
                <?php
                include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
                include '../Functions/ENTREGAShowAllDefForm.php';
                include '../Functions/ENTREGAShowDefForm.php';?>
                <div id="centrado"><span class="form-title">
			<?php echo $strings['Consultar entrega']?><br></span></div>
                <ul class="form-style-1"><?php



                    createForm($lista,$DefForm2,$strings,$values='',false,false);
                    ?>
                    <input type='submit' name='accion' value='<?php echo $strings['Consultar'] ?>'
                    <ul>
            </form>
            <?php
            echo '<a class="form-link" href=\'ENTREGAS_Controller.php\'>' . $strings['Volver'] . '</a>';
            ?>


        </div>
        <?php
    } //fin metodo render

}//fin de la clase
?>
