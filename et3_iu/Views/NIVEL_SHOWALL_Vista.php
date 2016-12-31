<?php

class NIVEL_SHOWALL {

//VISTA PARA LISTAR LOS ITEMS DE UNA RUBRICA
    private $datos;
    //private $datos2;
    private $return;
    private $volver;

    function __construct($array, $volver, $return) {
        $this->datos = $array;
        //$this->datos2 = $array2;
        $this->volver = $volver;
        $this->return = $return;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        
        ?> <head>
            <title>FaitIUc</title>
             <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                            <ul><li><?php echo '<a href=\'' . $this->volver . $this->return ."' class='m5'>" . $strings['Volver'] . " </a>"; ?></li>
                                <li><a href='./NIVEL_Controller.php?ITEM_ID=<?php echo $this->return ?>&accion=<?php echo $strings['Consultar']?>'class="m4"><?php echo $strings['Consultar'] ?></a></li>
                                <li><a href='./NIVEL_Controller.php?ITEM_ID=<?php echo $this->return ?>&accion=<?php echo $strings['Insertar']?>'class="m4"><?php echo $strings['Insertar'] ?></a></li>
                                <li><a href="../Functions/Desconectar.php" class="m2"><?php echo $strings['Cerrar Sesión']; ?></a></li>
                            </ul>
                        </nav>

                    </div>

                </header>
                <div class="container">
                    <?php
                    $lista = array('NIVEL_ID', 'NIVEL_DESCRIPCION', 'NIVEL_PORCENTAJE');
                    ?>
                 <div id="centrado"><span class="form-title">
                        <?php echo $strings['NIVELES DEL ITEM'] .ConsultarNombreItem($this->return).$strings['DE LA RUBRICA'] . ConsultarNombreRubrica($this->return) ?><br></span></div>
                    
                    
                    <br><br>
                    <div id="centrado"><table class="table" id="btable" border = 1>
                            <tr>
                                <?php
                                foreach ($lista as $titulo) {
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
                                            for ($i = 0; $i < count($lista); $i++) {
                                                 if($clave === $lista[$i]) {
                                                    echo "<td>";
                                                    echo $valor;
                                              
                                                }
                                              
                                                echo "</td>";
                                            }
                                        }
                                    ?>
                                    <td>
                                        <a href='NIVEL_Controller.php?NIVEL_ID=<?php echo $this->datos[$j]['NIVEL_ID'] .'&NIVEL_ITEM=' . $this->return. '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
                                    </td>
                                    <td>
                                        <a href='NIVEL_Controller.php?NIVEL_ID=<?php echo $this->datos[$j]['NIVEL_ID'] .'&NIVEL_ITEM=' . $this->return.'&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
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
    