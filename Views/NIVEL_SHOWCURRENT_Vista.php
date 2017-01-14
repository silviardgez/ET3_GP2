<?php

class NIVEL_SHOWCURRENT {

    private $return;

//VISTA PARA CONSULTAR NIVELES DE ITEMS DE UNA RUBRICA
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
            $lista = array('NIVEL_ID', 'NIVEL_DESCRIPCION', 'NIVEL_PORCENTAJE');
            ?>

            <form action='NIVEL_Controller.php' method='post'>
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Consultar Nivel'] ?><br></span></div>
                <ul class="form-style-1">

                    <p>
                        <br><b> <?php echo $strings['NIVEL_ITEM'] ?> </b><br>           
                        <input type='text' name='NIVEL_ITEM' value="<?php echo $this->return ?>" readonly>
                    </p>
                    <p>
                        <br><b> <?php echo $strings['NIVEL_RUBRICA'] ?> </b><br>           
                        <input type='text' name='NIVEL_RUBRICA' value="<?php echo ConsultarIDRubrica($this->return) ?>" readonly>
                    </p>
                    <?php
                    include '../Functions/NIVELShowAllDefForm.php';
                    createForm($lista, $form, $strings, $values = '', false, false);
                    ?>


                    <input type='submit' name='accion' value=<?php echo $strings['Consultar'] ?>
                </ul>
            </form>
            <?php
            echo '<a  class="form-link" href=\'NIVEL_Controller.php?ITEM_ID=' . $this->return . '\'>' . $strings['Volver'] . '</a>';
            ?>



        </div>

        <?php
    }

}
?>
