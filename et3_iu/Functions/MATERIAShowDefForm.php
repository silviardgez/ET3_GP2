<?php
//Formulario para la gestión de materias
$DefForm = array(
    0 => array(
        'type' => 'number',
        'name' => 'MATERIA_ID',
        'value' => '',
        'size' => 50,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => true,
		'hidden'=>true
    ),
    1 => array(
        'type' => 'text',
        'name' => 'MATERIA_NOM',
        'value' => '',
        'size' => 25,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'text',
        'name' => 'MATERIA_TITULACION',
        'value' => '',
        'size' => 50,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	3 => array(
        'type' => 'text',
        'name' => 'MATERIA_DEPARTAMENTO',
        'value' => '',
        'size' => 100,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    4 => array(
        'type' => 'text',
        'name' => 'MATERIA_CREDITOS',
        'value' => '',
        'size' => 2,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	
	5 => array(
        'type' => 'text',
        'name' => 'MATERIA_DESCRIPCION',
        'value' => '',
        'size' => 300,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);