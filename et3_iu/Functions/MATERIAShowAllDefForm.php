<?php
$p = new MATERIA_Model('','','','','','','');
//Formulario para la gestión de materias

$DefForm = array(

    0 => array(
        'type' => 'text',
        'name' => 'MATERIA_NOM',
        'value' => '',
        'size' => 25,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),

    1=>array(
        'type' => 'text',
        'name' => 'MATERIA_TITULACION',
        'value' => '',
        'size' => 50,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	
	2 => array(
        'type' => 'text',
        'name' => 'MATERIA_DEPARTAMENTO',
        'value' => '',
        'size' => 50,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
	
    3 => array(
        'type' => 'text',
        'name' => 'MATERIA_CREDITOS',
        'value' => '',
        'size' => 3,
        'required' => false,
        'pattern' => '[0-9]',
        'validation' => '',
        'readonly' => false
    ),
	
	4 => array(
        'type' => 'select',
        'name' => 'MATERIA_RESPONSABLE',
        'value' => '',
        'options' => $p->getIDResp(),
        'multiple' => $p->getIDResp(),
        'required' => 'true',
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


