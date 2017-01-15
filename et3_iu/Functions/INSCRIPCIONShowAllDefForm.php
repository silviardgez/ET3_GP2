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
        'readonly' => false
    ),
    1 => array(
        'type' => 'select',
        'name' => 'INSCRIPCION_MATERIA',
        'value' => '',
        'options' => $p->getIDMateria(),
        'multiple' => $p->getIDMateria(),
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);


