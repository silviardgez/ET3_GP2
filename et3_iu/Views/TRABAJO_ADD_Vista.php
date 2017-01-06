<?php

class TRABAJO_ADD{

    function __construct(){
        $this->render();
    }

    function render(){

        ?><div class="wrap">

        <head>
            <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script></head>

        <?php //VISTA PARA LA INSERCIÓN DE TRABAJO
        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
        include '../Functions/TRABAJOShowAllDefForm.php';
        //Array con los nombres de los campos a insertar
        $lista = array('TRABAJO_NOM', 'TRABAJO_DESCRIPCION', 'TRABAJO_MATERIA', 'TRABAJO_PROFESOR',
        'TRABAJO_FECHA_INICIO', 'TRABAJO_FECHA_FIN');

        ?>


        <form  id="form" name="form" action='TRABAJO_Controller.php' method='post'   enctype="multipart/form-data">
            <div id="centrado"><span class="form-title">
			<?php echo $strings['INSERTAR TRABAJO']?><br></span></div>

            <ul class="form-style-1">
                <?php
                //Generación automática del formulario
                createForm($lista, $DefForm, $strings, '', array('TRABAJO_DESCRIPCION' => false), false);
                ?>
                <input type='submit' name='accion' value=<?php echo $strings['Insertar'] ?>
                <ul>
        </form>
        <?php
        echo '<a class="form-link" href="TRABAJO_Controller.php">' . $strings['Volver'] . " </a>";
        ?>

        </div>

        <?php
    } //fin metodo render

}

