<?php

//VISTA PARA INSERTAR RUBRICAS
class NIVEL_ADD {

    private $ITEM_ID;
    
    function __construct($ITEM_ID) {
        $this->ITEM_ID = $ITEM_ID;
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
            include '../Functions/NIVELShowAllDefForm.php';
            
            //Array con los nombres de los campos a insertar
            $lista = array('NIVEL_DESCRIPCION', 'NIVEL_POSICION');
            ?>


            <form  id="form" name="form" action='NIVEL_Controller.php' method='post'   enctype="multipart/form-data">
                <div id="centrado"><span class="form-title">
                        <?php echo $strings['Insertar Nivel'] ?><br></span></div>

                <ul class="form-style-1">
                    
                    <input type='hidden' name='NIVEL_ITEM' value="<?php echo $this->ITEM_ID ?>" readonly>
                    <?php
                    createForm($lista, $DefForm, $strings, '', false, false);
                    ?>
                    <input type='submit' onclick="return valida_envia_RUBRICA()" name='accion'  value=<?php echo $strings['Insertar'] ?>
                           <ul>
                        </form>
                        <?php
                        echo '<a class="form-link" href=\'NIVEL_Controller.php?ITEM_ID='.$this->ITEM_ID.'\'>' . $strings['Volver'] . " </a>";
                        ?>


                        </div>

                        <?php
                    }

                }
                