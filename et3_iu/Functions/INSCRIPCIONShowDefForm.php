<?php
$p = new INSCRIPCION_Model('','','');
//Formulario para la gestión de inscripciones
$DefForm = array(

	0 => array(
        'type' => 'number',
        'name' => 'INSCRIPCION_ID',
        'value' => '',
        'size' => 10,
        'min' => 0,
        'max' => 4294967295,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => true,
		'hidden'=>true
    ),
	1 => array(
        'type' => 'text',
        'name' => 'INSCRIPCION_ALUMNO',
        'value' => '',
        'size' => 10,
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => true
    ),
    2 => array(
        'type' => 'select',
        'name' => 'INSCRIPCION_MATERIA',
        'value' => '',
        'options' => $p->getIDMateria(),
        'multiple' => $p->getIDMateria(),
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);


