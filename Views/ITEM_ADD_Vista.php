<?php

//VISTA PARA INSERTAR RUBRICAS
class ITEM_ADD {

    private $RUBRICA_ID;
    
    function __construct($RUBRICA_ID) {
        $this->RUBRICA_ID = $RUBRICA_ID;
        $this->render();
    }

    function render() {
        ?>

        <div class="wrap">

            <head>
                <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
                <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
                <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script></head>

            <?php
            include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
            include '../Functions/ITEMShowAllDefForm.php';
            
            //Array con los nombres de los campos a insertar
            $lista = array('ITEM_NOMBRE', 'ITEM_PORCENTAJE');
            ?>

            <form  id="form" name="form" action='ITEM_Controller.php' method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Insertar Item'] ?><br></span></div>

                <ul class="form-style-1">
                    
                    <input type='hidden' name='ITEM_RUBRICA' value="<?php echo $this->RUBRICA_ID ?>" readonly>
                    <input type='hidden' name='ITEM_SUM' value="<?php echo sumarValorItem($this->RUBRICA_ID) ?>" readonly>
                    <?php
                    createForm($lista, $DefForm, $strings, '', false, false);
                    ?>
                    <input type='submit' onclick="return valida_envia_ITEM()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'ITEM_Controller.php?RUBRICA_ID='.$this->RUBRICA_ID.'\'>' . $strings['Volver'] . " </a>";
                        ?>


                        </div>

                        <?php
                    }

                }
                