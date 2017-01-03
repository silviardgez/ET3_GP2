<?php

class TRABAJO_SHOWALL {

//VISTA PARA LISTAR TODAS LAS TRABAJOS
    private $datos;
    private $volver;

    function __construct($array, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
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

        </head>
        <body id="page2">
        <div class="wrap">
            <header>

                <div class="container">
                    <h1><a href="../Views/DEFAULT_Vista.php"></a></h1>
                    <nav>
                        <ul><li><?php echo '<a href=\'' . $this->volver . "' class='m5'>" . $strings['Volver'] . " </a>"; ?></li>
                            <li><a href='./TRABAJO_Controller.php?accion=<?php echo $strings['Consultar'] ?>'class="m4"><?php echo $strings['Consultar'] ?></a></li>
                            <li><a href='./TRABAJO_Controller.php?accion=<?php echo $strings['Insertar'] ?>' class="m3"><?php echo $strings['Insertar'] ?></a></li>
                            <li><a href="../Functions/Desconectar.php" class="m2"><?php echo $strings['Cerrar Sesión']; ?></a></li>
                        </ul>
                    </nav>

                </div>

            </header>
            <div class="container">
                <?php

                $titulos = array('TRABAJO_ID', 'TRABAJO_NOM', 'TRABAJO_DESCRIPCION', 'TRABAJO_MATERIA', 'TRABAJO_PROFESOR',
                    'TRABAJO_FECHA_INICIO','TRABAJO_FECHA_FIN','TRABAJO_FECHA_CREACION','Modificar','Borrar');
                ?>


                <br><br>
                <div id="centrado"><table class="table" id="btable" border = 1>
                        <tr>
                            <?php
                            foreach ($titulos as $titulo) {
                                echo "<th>";
                                echo $strings[$titulo];
                                ?>
                                </th>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                        for ($j = 0; $j < count($this->datos); $j++) {
                            echo "<tr>";
                            foreach ($this->datos [$j] as $clave => $valor) {
                                for ($i = 0; $i < count($titulos); $i++) {
                                    if ($clave === $titulos[$i]) {
                                        echo "<td>";
                                        echo $valor;
                                    }
                                    echo "</td>";
                                }
                            }?>
                            <td>
                                <a href='TRABAJO_Controller.php?TRABAJO_ID=<?php echo $this->datos[$j]['TRABAJO_ID'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
                            </td>
                            <td>
                                <a href='TRABAJO_Controller.php?TRABAJO_ID=<?php echo $this->datos[$j]['TRABAJO_ID'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                            </td>
                            </tr>
                        <?php }
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
        <script type="text/javascript"> Cufon.now();</script>
        </body>
        <?php
    }
}

