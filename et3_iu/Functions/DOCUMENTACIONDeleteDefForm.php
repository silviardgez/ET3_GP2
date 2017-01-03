<?php
//Formulario para el borrado de empleados
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
		'size' => 30,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	2 => array(
		'type' => 'text',
		'name' => 'DOCUMENTACION_PROFESOR',
		'value' => '',
		'size' => 30,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	3 => array(
		'type' => 'text',
		'name' => 'DOCUMENTACION_MATERIA',
		'value' => '',
		'size' => 30,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	4 => array(
		'type' => 'date',
		'name' => 'DOCUMENTACION_FECHA',
		'value' => '',
		'min' => '2015/01/01',
		'max' => '2018/01/01',
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	5 => array(
		'type' => 'url',
		'name' => 'DOCUMENTACION_ENLACE',
		'value' => '',
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	6 => array(
		'type' => 'text',
		'name' => 'DOCUMENTACION_CATEGORIA',
		'value' => '',
		'size' => 30,
		'required' => false,
		'pattern' => '',
		'validation' => '',
		'readonly' => false

	)

);


?>
