<?php

class INSCRIPCION_SHOWALL{
	//VISTA PARA LISTAR INSCRIPCIONES
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
								<li><a href='./INSCRIPCION_Controller.php?accion=<?php echo $strings['Consultar']?>'class="m4"><?php echo $strings['Consultar']?></a></li>
											<li><a href="../Functions/Desconectar.php" class="m2"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
							</ul>
						</nav>

                </div>

            </header>
            <div class="container">
                <?php       
                $lista = array('INSCRIPCION_ID','INSCRIPCION_ALUMNO','INSCRIPCION_MATERIA');

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
                                }?>
							<td>
                                <a href='INSCRIPCION_Controller.php?INSCRIPCION_MATERIA=<?php echo $this->datos[$j]['INSCRIPCION_MATERIA'] .'&INSCRIPCION_ALUMNO='. $this->datos[$j]['INSCRIPCION_ALUMNO']. '&accion=' . $strings['Matricularse']; ?>'><?php echo $strings['Matricularse'] ?></a>
                            </td>

                            <td>
                                <a href='INSCRIPCION_Controller.php?INSCRIPCION_MATERIA=<?php echo $this->datos[$j]['INSCRIPCION_MATERIA'] .'&INSCRIPCION_ALUMNO='. $this->datos[$j]['INSCRIPCION_ALUMNO']. '&accion=' . $strings['Desmatricularse']; ?>'><?php echo $strings['Desmatricularse'] ?></a>
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
