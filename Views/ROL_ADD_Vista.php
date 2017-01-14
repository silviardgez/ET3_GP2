<?php

class ROL_Insertar{
//VISTA PARA INSERTAR ROLES

    function __construct(){
        $this->render();
    }

    function render(){

        ?><div class="wrap">
<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA']?>_validate.js"></script>
    <link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" /></head>
        <div>

                <?php
                include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';;
                include '../Functions/ROLDefForm.php';


                $list = array('ROL_NOM');
                $lista=AñadirFuncionesTitulos($list);




                ?>




                <form id="form" name="form"  action='ROL_Controller.php' method='post' >
                    <div id="centrado"><span class="form-title">
			<?php echo $strings['Insertar Rol']?><br></span></div>

                    <ul class="form-style-1">

                    <?php

                    createForm($lista,$DefForm,$strings,'',true,false);

                    ?>
                    <input type='submit' name='accion' onclick="return valida_envia_ROL()" value=<?php echo $strings['Insertar'] ?>>
                </form>
                <?php
                echo '<a  class="form-link" href=\'ROL_Controller.php\'>' . $strings['Volver'] . " </a>";
                ?>



        </div>

        <?php
    } //fin metodo render

}