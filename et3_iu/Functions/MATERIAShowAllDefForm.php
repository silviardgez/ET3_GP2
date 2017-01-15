<?php
//Formulario para la gestión de materias
$DefForm = array(
    0 => array(
        'type' => 'text',
        'name' => 'MATERIA_NOM',
        'value' => '',
        'size' => 35,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1=>array(
        'type' => 'text',
        'name' => 'MATERIA_TITULACION',
        'value' => '',
        'size' => 100,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	
	2 => array(
        'type' => 'text',
        'name' => 'MATERIA_DEPARTAMENTO',
        'value' => '',
        'size' => 100,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	
    3 => array(
        'type' => 'number',
        'name' => 'MATERIA_CREDITOS',
        'value' => '',
        'size' => 2,
	    'min' => 0,
        'max' => 4294967295,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	
	4 => array(
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
