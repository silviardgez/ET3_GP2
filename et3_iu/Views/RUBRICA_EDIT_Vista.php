<?php

class PAGO_Modificar {

//VISTA PARA MODIFICAR PAGOS

    private $valores;

    function __construct($valores) {
        $this->valores = $valores;
        $this->render();
    }

    function render() {
        ?>
        <head><link rel="stylesheet" href="../Styles/styles.css" type="text/css" media="screen" />
            <script type="text/javascript" src="../js/<?php echo $_SESSION['IDIOMA'] ?>_validate.js"></script></head>
        <div>
            <p>
            <h2>
                <?php
                include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
                include '../Functions/PAGOEditDefForm.php';
                //include '../Functions/LibraryFunctions.php';

                $lista = array('PAGO_ID', 'CLIENTE_DNI', 'PAGO_CONCEPTO', 'PAGO_METODO', 'PAGO_IMPORTE', 'PAGO_ESTADO');
                ?>
            </h2>
        </p>
        <p>
        <h1><span class="form-title">
                <?php echo $strings['Modificar Pago'] ?><br>
                </h1>
                <h3>

                    <form  id="form" name="form" action='PAGO_Controller.php' method='post' >
                        <ul class="form-style-1">
                            <?php
                            //createForm2($lista,$DefForm,$strings,$this->valores,array('ROL_NOM'=>true),array('ROL_ID'=>true),$this->valores['ROL_ID']); //DefForm2
                            createForm($lista, $form, $strings, $this->valores, array('PAGO_CONCEPTO' => false, 'PAGO_IMPORTE' => false, 'CLIENTE_DNI' => false), array('PAGO_ID' => true));
                            ?>






                            <br><b><?php echo$strings['PAGO_METODO'] ?></b>
                            <select name="PAGO_METODO" size="1" >
                                <?php
                                switch ($this->valores['PAGO_METODO']) {
                                    case 'No seleccionado':
                                        ?>
                                        <option value='No seleccionado'  selected='<?php echo $strings['No seleccionado'] ?>'><?php echo $strings['No seleccionado'] ?></option>
                                        <option value='Efectivo'><?php echo $strings['Efectivo'] ?></option>
                                        <option value='Tarjeta Credito/Debito'><?php echo $strings['Tarjeta Credito/Debito'] ?></option>
                                        <option value='Domiciliacion Bancaria'><?php echo $strings['Domiciliacion Bancaria'] ?></option>
                                        <?php
                                        break;
                                    case 'Efectivo':
                                        ?>
                                        <option value='No seleccionado'  ><?php echo $strings['No seleccionado'] ?></option>
                                        <option value='Efectivo' selected='<?php echo $strings['Efectivo'] ?>'><?php echo $strings['Efectivo'] ?></option>
                                        <option value='Tarjeta Credito/Debito'><?php echo $strings['Tarjeta Credito/Debito'] ?></option>
                                        <option value='Domiciliacion Bancaria'><?php echo $strings['Domiciliacion Bancaria'] ?></option>  
                                        <?php
                                        break;
                                    case 'Tarjeta Credito/Debito':
                                        ?>
                                        <option value='No seleccionado'  ><?php echo $strings['No seleccionado'] ?></option>
                                        <option value='Efectivo' ><?php echo $strings['Efectivo'] ?></option>
                                        <option value='Tarjeta Credito/Debito' selected='<?php echo $strings['Tarjeta Credito/Debito'] ?>'><?php echo $strings['Tarjeta Credito/Debito'] ?></option>
                                        <option value='Domiciliacion Bancaria'><?php echo $strings['Domiciliacion Bancaria'] ?></option>  
                <?php
                break;
            case 'Domiciliacion Bancaria':
                ?>
                                        <option value='No seleccionado'  ><?php echo $strings['No seleccionado'] ?></option>
                                        <option value='Efectivo' ><?php echo $strings['Efectivo'] ?></option>
                                        <option value='Tarjeta Credito/Debito' ><?php echo $strings['Tarjeta Credito/Debito'] ?></option>
                                        <option value='Domiciliacion Bancaria' selected='<?php echo $strings['Domiciliacion Bancaria'] ?>'><?php echo $strings['Domiciliacion Bancaria'] ?></option>  
                <?php
                break;
        }
        ?>
                            </select><br>



                            <br><b><?php echo $strings['PAGO_ESTADO'] ?></b>
                            <select name="PAGO_ESTADO" size="1" >
                                <?php
                                switch ($this->valores['PAGO_ESTADO']) {
                                    case 'PAGADO':
                                        ?>
                                        <option value='PAGADO' selected='<?php echo $strings['PAGADO'] ?>'><?php echo $strings['PAGADO'] ?></option>
                                        <option value='PENDIENTE'  ><?php echo $strings['PENDIENTE'] ?></option>
                                        <?php
                                        break;
                                    case 'PENDIENTE':
                                        ?>
                                        <option value='PENDIENTE'  selected='<?php echo $strings['PENDIENTE'] ?>'><?php echo $strings['PENDIENTE'] ?></option>
                                        <option value='PAGADO'><?php echo $strings['PAGADO'] ?></option>
                <?php
                break;
        }
        ?>
                            </select><br>




                            <input type='submit' name='accion' onclick="return valida_envia_PAGO()" value=<?php echo $strings['Modificar'] ?>>
                            </form>
                            <?php
                            echo '<a  class="form-link" href=\'PAGO_Controller.php\'>' . $strings['Volver'] . " </a>";
                            ?>
                            </h3>
                            </p>

                            </div>

        <?php
    }

//fin metodo render
}
?>
