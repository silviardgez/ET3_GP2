<?php
//Formulario para la insercción y modificación de documentación
$form = array(
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
	
	4 => array(
		'type' => 'date',
		'name' => 'DOCUMENTACION_FECHA',
		'value' => '',
		'min' => null,
		'max' => '2019/01/01',
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
$DefForm1=AñadirProfesores($form);
$DefForm=AñadirMaterias($DefForm1);

?>