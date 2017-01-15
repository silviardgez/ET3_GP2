<?php
//Formulario para mostrar la consulta de correcciones
$DefForm2 = array(
	0 => array(
		'type' => 'text',
		'name' => 'CORRECCION_NOM',
		'value' => '',
		'texto'=>'CORRECCION_NOM',
		'size' => 100,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	1 => array(
		'type' => 'text',
		'name' => 'CORRECCION_ID',
		'texto'=>'CORRECCION_ID',

		'value' => '',
		'size' => 10,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	2 => array(
		'type' => 'text',
		'name' => 'CORRECCION_ENTREGA',
		'texto'=>'CORRECCION_ENTREGA',
		'value' => '',
		'size' => 10,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	3=> array(
		'type' => 'text',
		'name' => 'CORRECCION_NOTA',
		'texto'=>'CORRECCION_NOTA',
		'value' => '',
		'size' => 2,
		'required' => 'true',
		'pattern' => '{0-9}',
		'validation' => '',
		'readonly' => false
	)
)


?>
