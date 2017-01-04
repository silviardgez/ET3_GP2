<?php

class CORRECCION_Show{
//VISTA PARA LISTAR TODAS LAS CORRECCIONES.
private $datos;
private $volver;

function __construct($array, $volver){
	$this->datos = $array;
	$this->volver = $volver;
	$this->render();
}

function render(){

?>



<?php


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
						<li><a href='./CORRECCIONES_Controller.php?accion=<?php echo $strings['Consultar']?>'class="m4"><?php echo $strings['Consultar']?></a></li>
						<li><a href='./CORRECCIONES_Controller.php?accion=<?php echo $strings['Insertar'] ?>' class="m3"><?php echo $strings['Insertar']?></a></li>
						<li><a href="../Functions/Desconectar.php" class="m2"><?php echo  $strings['Cerrar Sesión']; ?></a></li>
					</ul>
				</nav>

			</div>

		</header>
		<div class="container">
<?php
	//$gen_datos = new gen_form($arrayDefForm);
	$lista = array('CORRECCION_ID','CORRECCION_NOM','CORRECCION_ENTREGA','CORRECCION_RUBRICA','CORRECCION_NOTA');

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

?>
<?php
for ($j=0;$j<count($this->datos);$j++){
	echo "<tr>";
foreach ($this->datos [$j] as $clave => $valor) {
	for ($i = 0; $i < count($lista); $i++) {
		if($clave === $lista[$i])
		{
		echo "<td>";
		echo $valor;
	    }
        echo "</td>";
		}
	}
		?>
		</th>

		<td>
			<a href='CORRECCIONES_Controller.php?CORRECCION_ID=<?php echo $this->datos[$j]['CORRECCION_ID'] . '&accion='.$strings['Modificar']; ?>'><?php echo $strings['Modificar'] ?></a>
		</td>
		<td>
			 <a href='CORRECCIONES_Controller.php?CORRECCION_ID=<?php echo $this->datos[$j]['CORRECCION_ID'] . '&accion='.$strings['Borrar']; ?>'><?php echo $strings['Borrar'] ?></a>
		</td>
		</tr>

		<?php
	    

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
