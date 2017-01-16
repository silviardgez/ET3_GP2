<?php
class MATERIA_SHOWALL{
    //VISTA PARA LISTAR MATERIAS
    private $datos;
    private $volver;
    function __construct($array, $volver){
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }
    function render(){
        
        include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
        
        ?><head>
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
                            <li><a href='./MATERIA_Controller.php?accion=<?php echo $strings['Consultar']?>'class="m4"><?php echo $strings['Consultar']?></a></li>
                            <li><a href='./MATERIA_Controller.php?accion=<?php echo $strings['Insertar'] ?>' class="m3"><?php echo $strings['Insertar']?></a></li>
                            <li><a href="../Functions/Desconectar.php" class="m2"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
                        </ul>
                    </nav>

                </div>

            </header>
            <div class="container">
                <?php       
                $lista = array('MATERIA_ID','MATERIA_NOM', 'MATERIA_CREDITOS', 'MATERIA_DEPARTAMENTO', 'MATERIA_TITULACION', 'MATERIA_RESPONSABLE', 'MATERIA_DESCRIPCION');
                ?>
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
                            if ($clave === $lista[$i]) {
                                echo "<td>";
                                echo $valor;
                            }
                            echo "</td>";
                        }
                    }
                    if(consultarRol($_SESSION['login'])==4 ||consultarRol($_SESSION['login'])==1){?>

                    <td>
                        <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
                    </td>
                    <td>
                        <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
                    </td>
                    <td>
                        <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Profesores']; ?>'><?php echo $strings['Profesores'] ?></a>
                    </td>
                    <td>
                        <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Profes']; ?>'><?php echo $strings['Profes'] ?></a>
                    </td>
                    <td>
                        <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Matriculados']; ?>'><?php echo $strings['Matriculados'] ?></a>
                    </td>
                </td>
                <?php if(ConsultarMateriaAlumno($this->datos[$j]['MATERIA_ID']) || ConsultarMateriaProfesor($this->datos[$j]['MATERIA_ID']) || consultarRol($_SESSION['login']) == '1'){ ?>
                <td>
                    <a href='DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=<?php echo $this->datos[$j]['MATERIA_ID']; ?>'><?php echo $strings['Ver Documentación'] ?></a>
                </td>
            </tr>
            <?php } 
            

            ?>
        </tr>
        <?php }
        if(consultarRol($_SESSION['login'])==3){?>


        <td>
            <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Inscribirse']; ?>'><?php echo $strings['Inscribirse'] ?></a>
        </td>
        <td>
            <a href='MATERIA_Controller.php?MATERIA_ID=<?php echo $this->datos[$j]['MATERIA_ID'] . '&accion=' . $strings['Desinscribirse']; ?>'><?php echo $strings['Desinscribirse'] ?></a>
        </td>
    </td>
    <?php if(ConsultarMateriaAlumno($this->datos[$j]['MATERIA_ID']) || ConsultarMateriaProfesor($this->datos[$j]['MATERIA_ID']) || consultarRol($_SESSION['login']) == '1'){ ?>
    <td>
        <a href='DOCUMENTACION_Controller.php?DOCUMENTACION_MATERIA=<?php echo $this->datos[$j]['MATERIA_ID']; ?>'><?php echo $strings['Ver Documentación'] ?></a>
    </td>
</tr>
<?php }
}
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
<script type="text/javascript"> Cufon.now();</script>
</body>
<?php
}
}