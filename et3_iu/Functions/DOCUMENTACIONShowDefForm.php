<?php
//Formulario para el borrado de empleados
$form = array(
	
	0 => array(
		'type' => 'text',
		'name' => 'DOCUMENTACION_NOM',
		'value' => '',
		'size' => 30,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),

	1 => array(
		'type' => 'datetime-local',
		'name' => 'DOCUMENTACION_FECHA',
		'value' => '',
		'min' => '',
		'max' => '',
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	3 => array(
		'type' => 'url',
		'name' => 'DOCUMENTACION_ENLACE',
		'value' => '',
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	),
	4 => array(
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

$DefForm = AñadirProfesores($form);

?>