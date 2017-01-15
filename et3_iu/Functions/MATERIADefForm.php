<?php
//Formulario para la gestión de materias
$form = array(
	0 => array(
	'type' => 'text',
	'name' => 'MATERIA_NOM',
	'value' => '',
	'size' => 50,
	'required' => true,
	'pattern' => '',
	'validation' => '',
	'readonly' => false
	),
	1 => array(
		'type' => 'text',
		'name' => 'MATERIA_ID',
		'value' => '',
		'size' => 50,
		'required' => true,
		'pattern' => '',
		'validation' => '',
		'readonly' => false
	)
);
$DefForm=AñadirProfes($form);



?>
