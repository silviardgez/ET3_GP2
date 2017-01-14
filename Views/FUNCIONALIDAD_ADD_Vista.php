<?php

class FUNCIONALIDAD_Insertar{
//VISTA PARA INSERTAR FUNCIONALIDADES

    function __construct(){
        $this->render();
    }

    function render(){
        ?>
        <div class="wrap">
        <head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>
        <div>

                <?php
                include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
                include '../Functions/FUNCIONAddDefForm.php';
                //include '../Functions/LibraryFunctions.php';

                $list = array('FUNCIONALIDAD_NOM');
                $lista=AñadirPaginasTitulos($list);



                ?>




                <form  id="form" name="form" action='FUNCIONALIDAD_Controller.php' method='get' >
                    <div id="centrado"><span class="form-title">
			<?php echo $strings['Insertar Funcionalidad']?><br></span></div>
                    <ul class="form-style-1">
                    <?php


                    createForm($lista,$DefForm,$strings,'',true,false);

                    ?>
                    <input type='submit' name='accion' onclick="return valida_envia_FUNCIONALIDAD()" value=<?php echo $strings['Insertar'] ?>>
                </form>
                <?php
                echo '<a class="form-link" href=\'FUNCIONALIDAD_Controller.php\'>' . $strings['Volver'] . " </a>";
                ?>


        </div>

        <?php
    } //fin metodo render

}