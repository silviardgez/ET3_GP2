<?php
//Formulario para la insercción y modificación de documentación
$DefForm = array(
	0 => array(
	'type' => 'text',
	'name' => 'DOCUMENTACION_ID',
	'value' => '',
	'size' => 5,
	'required' => true,
	'pattern' => '',
	'validation' => '',
	'readonly' => false
	),
	1 => array(
		'type' => 'text',
		'name' => 'DOCUMENTACION_NOM',
		'value' => '',
		'size' => 50,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	
	2 => array(
		'type' => 'text',
		'name' => 'DOCUMENTACION_CATEGORIA',
		'value' => '',
		'size' => 30,
		'required' => false,
		'pattern' => '',
		'validation' => '',
		'readonly' => false

	),

	3 => array(
		'type' => 'file',
		'name' => 'DOCUMENTACION_ENLACE',

		'value' => '',
		'required' => false,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	)

);

?>