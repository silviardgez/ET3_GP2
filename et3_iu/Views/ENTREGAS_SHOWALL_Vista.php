<?php

class ENTREGAS_Show{
//VISTA PARA LISTAR TODOS LAS ENTREGAS
    private $datos;
    private $volver;

    function __construct($array, $volver){
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render(){

        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';



        ?> <head>
            <title>FaitIUc</title>
            <meta charset="utf-8">
            <meta name="description" content="Place your description here">
            <meta name="keywords" content="put, your, keyword, here">
            <meta name="author" content="Templates.com - website templates provider">
            <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
            <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
            <script type="text/javascript" src="../js/jquery-1.4.2.min.js" ></script>
            <script type="text/javascript" src="../js/cufon-yui.js"></script>
            <script type="text/javascript" src="../js/cufon-replace.js"></script>
            <script type="text/javascript" src="../js/Myriad_Pro_300.font.js"></script>
            <script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
            <script type="text/javascript" src="../js/script.js"></script>
            <!--[if lt IE 7]>
            <link rel="stylesheet" href="../css/ie/ie6.css" type="text/css" media="screen">
            <script type="text/javascript" src=../"js/ie_png.js"></script>
            <script type="text/javascript">
                ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
            </script>
            <![endif]-->
            <!--[if lt IE 9]>
            <script type="text/javascript" src="../js/html5.js"></script>
            <![endif]-->
        </head>
        <body id="page2">
        <div class="wrap">
            <header>

                <div class="container">
                    <h1><a href="../Views/DEFAULT_Vista.php"></a></h1>
                    <nav>
                            <ul><li><?php echo '<a href=\'' . $this->volver . "' class='m5'>" . $strings['Volver'] . " </a>"; ?></li>
                                <?php
                                require_once ('../Models/ENTREGAS_Model.php');
                                $m = new ENTREGAS_Model('','','');
                                $n = $m->user();
                                    if($n['USUARIO_TIPO'] == 1 || $n['USUARIO_TIPO'] == 2){
                                       echo " <li><a href='./ENTREGAS_Controller.php?accion=".$strings['Consultar']."'class='m4'>".$strings['Consultar']."</a></li>";
                                       echo " <li><a href='./ENTREGAS_Controller.php?accion=".$strings['Insertar']."' class='m3'>". $strings['Insertar']."</a></li>";
                                    }
                                   ?>

                                <li><a href="../Functions/Desconectar.php" class="m2"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                            </ul>
                    </nav>

                </div>

            </header>
            <div class="container">
                <?php
                //$gen_datos = new gen_form($arrayDefForm);
                $lista = array('ENTREGA_ID', 'ENTREGA_NOMBRE', 'ENTREGA_TRABAJO');


                ?>
                <br><br>
                <div id="centrado"><table class="table" id="btable" border = 1>
                        <tr>
                            <?php

                            foreach($lista as $titulo){

                                    echo "<th>";
                                ?>
                                <?php
                                echo $strings[$titulo];
                                ?>
                                </th>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php


                        for ($j=0;$j<count($this->datos);$j++){

                            echo "<tr>";

                            foreach ($this->datos[$j] as $clave => $valor) {

                                for ($i = 0; $i < count($lista); $i++) {
                                    if ($clave === $lista[$i]) {
                                        if($clave != 'ENTREGA_TRABAJO'){
                                            echo "<td>";

                                            echo $valor;

                                            echo "</td>";
                                        }else{
                                            $w = new ENTREGAS_Model('','','');
                                            echo "<td>";

                                            echo $w->nombreTrabajo($valor);

                                            echo "</td>";
                                        }
                                    }
                                }
                            }
                            ?>
                            <?php
                            $m = new ENTREGAS_Model('','','');
                            $n = $m->user();
                            if($n['USUARIO_TIPO'] == 1 || $n['USUARIO_TIPO'] == 2 || $n['USUARIO_TIPO'] == 4) {
                                echo '<td>';
                                echo "<a href='ENTREGAS_Controller.php?ENTREGA_NOMBRE=" . $this->datos[$j]['ENTREGA_NOMBRE'] . "&accion=" . $strings['Modificar'] . "'>" . $strings['Modificar'] . "</a>";
                                echo '</td>';

                                echo '<td>';
                                echo "<a href='ENTREGAS_Controller.php?ENTREGA_NOMBRE=" . $this->datos[$j]['ENTREGA_NOMBRE'] . "&accion=" . $strings['Borrar'] . "'>" . $strings['Borrar'] . "</a>";
                                echo '</td>';
                                echo '<td>';
                                echo "<a href='../Documents/Entregas'>" . $strings['Descargar'] . "</a>";
                                echo '</td>';
                            }

                            if($n['USUARIO_TIPO'] == 1 || $n['USUARIO_TIPO'] == 3){
                                echo " <td><a href='./ALUMNO_ENTREGA_Controller.php?accion=".$strings['Añadir']."&ENTREGA_ID=".$this->datos[$j]['ENTREGA_ID']."'>". $strings['Añadir']."</a></td>";
                              ?>
                            <td><a   href='<?php echo ConsultarLinkEntrega($this->datos[$j]['ENTREGA_ID']) ?>' target="_blank"><?php echo $strings['Ver'] ?></a></td>

<?php
                            }

                            ?>

                            <?php

                            echo "<tr>";

                        }
                        ?>

                    </table></div>



            </div>
        </div>
        <footer>
            <div class="container">
                <div class="inside">
                    <div class="wrapper">

                        <div class="aligncenter"> Servizo de Teledocencia copyright © 2016 </div>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript"> Cufon.now(); </script>
        </body>
        <?php
    } //fin metodo render

}
