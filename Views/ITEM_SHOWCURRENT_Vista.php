<?php

class ITEM_SHOWCURRENT {

    private $return;
//VISTA PARA CONSULTAR ITEMS DE RUBRICA

    function __construct($return) {
        $this->return = $return;
        $this->render();
    }

    function render() {
        ?>

        <div class="wrap">
            <head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
            <div></div>
            <?php
            include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
            $lista = array('ITEM_ID', 'ITEM_NOMBRE', 'ITEM_PORCENTAJE');
            ?>



            <form action='ITEM_Controller.php' method='post'>
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Consultar Item'] ?><br></span></div>
                <ul class="form-style-1">
                    <?php
                    include '../Functions/ITEMShowAllDefForm.php';
                    createForm($lista, $form, $strings, $values = '', false, false);
                    ?>
                    <p>
                        <br><b> <?php echo $strings['ITEM_RUBRICA'] ?> </b><br>           
                        <input type='text' name='ITEM_RUBRICA' value="<?php echo $this->return ?>" readonly>
                    </p>
                    
                        <input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
                </ul>
            </form>
            <?php
            echo '<a  class="form-link" href=\'ITEM_Controller.php?RUBRICA_ID=' . $this->return . '\'>' . $strings['Volver'] . '</a>';

            ?>



        </div>

        <?php
    }

}
?>
