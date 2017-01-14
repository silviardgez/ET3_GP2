

<?php

class TRABAJO_SHOWCURRENT{

//VISTA PARA CONSULTAR TRABAJOS
    function __construct(){
        $this->render();
    }

    function render(){
        ?>

        <div class="wrap">
            <head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
            <div></div>
            <?php

            include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
            $lista = array('TRABAJO_ID','TRABAJO_NOM', 'TRABAJO_DESCRIPCION', 'TRABAJO_MATERIA', 'TRABAJO_PROFESOR',
                'TRABAJO_FECHA_INICIO', 'TRABAJO_FECHA_FIN');

            ?>



            <form action='TRABAJO_Controller.php' method='post'>
                <div id="centrado"><span class="form-title">
			<?php echo $strings['CONSULTAR TRABAJO']?><br></span></div>
                <ul class="form-style-1">
                    <?php

                    include '../Functions/TRABAJOShowDefForm.php';


                    createForm($lista,$form,$strings,$values='',false,false);
                    ?>
                    <input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
                    </ul>
            </form>
            <?php
            echo '<a  class="form-link" href=\'TRABAJO_Controller.php\'>' . $strings['Volver'] . '</a>';
            ?>



        </div>

        <?php
    }

}
?>
