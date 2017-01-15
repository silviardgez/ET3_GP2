<?php

class Correccion_Insertar
{
	private $ENTREGA_ID;
	private $RUBRICA_ID;
	private $numNiveles;
	private $items;
	private $niveles;
	private $string;
	private $numFilas;

	function __construct($ENTREGA_ID,$RUBRICA_ID,$items,$niveles,$numNiveles,$string)
	{

		$this->ENTREGA_ID=$ENTREGA_ID;
		$this->RUBRICA_ID=$RUBRICA_ID;
		$this->items = $items;
		$this->niveles = $niveles;
		$this->numNiveles = $numNiveles;
		$this->string = $string;
		$this->numFilas=count($this->items);
		$this->render();
		

	}
	function render()
	{
		?>
		<div class="wrap">
		<head>	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all"><link rel="stylesheet" href="../css/Styles/styles.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../js/<?php  echo $_SESSION['IDIOMA']?>_validate.js"></script></head>

		<?php
		include '../Locates/Strings_'.$_SESSION['IDIOMA'].'.php';
		include '../Functions/CORRECCION_DefForm.php';


		$lista = array('CORRECCION_NOM','CORRECCION_COMENTARIOS');
		?>

		<form  id="form" name="form" action='CORRECCIONES_Controller.php?accion=<?php echo $strings['Insertar'].'&NUMNIV='.$this->numNiveles.'&NUMFILAS='.$this->numFilas.'&ENTREGA_ID='.$this->ENTREGA_ID.'&RUBRICA_ID='.$this->RUBRICA_ID ?>'  method='post'>
					<div id="centrado"><span class="form-title">
		<?php echo $strings['Insertar'];?></span></div>
		<ul class="form-style-1">
		<?php
					createForm($lista,$defForm,$strings,'',true,false);
					echo '<br>';
					?>

					
					<style>
					table,th,td
					{
						border: 2px solid black;
						border-collapse: separate;
                        border-spacing: 5px 5px;
					}
					th,td
					{
						paddin:5px;
						text-align:center;
                        width: 200px;
					}
					</style>


            <br><table style="width:100%">
					<tr>
					<th colspan="1"> ITEMS</th>
					<th colspan=<?php echo $this->numNiveles;?>> NIVELES</th>
					</tr>
					

					<?php
					$desc_count=0;
					for($i=0;$i<count($this->items);$i++)
					{
						echo '<tr>';
						echo '<td>';
						echo $this->items[$i];
						echo '</td>';
						$f=$i;
						for($j=0;$j<$this->numNiveles;$j++) {
							echo '<td>';
							echo $this->niveles[$desc_count];
							echo '<br><input type= "radio" name ="Button'.$i.'" value="'.$j.'" required>'.$j;
							echo '</td>';
							$desc_count++;

						}
						$i=$f;

						echo '</tr>';

					}

					?>
                    </table></form>
		<input type='submit' name='accion' onclick="return valida_envia_PAGINA()" value=<?php echo $strings['Insertar'] ?>>
				<?php
				echo '<a class="form-link" href=\'CORRECCIONES_Controller.php\'>' . $strings['Volver'] . " </a>";
?>
			</h3>
		</p>

	</div>

<?php
	}
}