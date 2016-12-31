<?php
//Formulario para el borrado de entregas
$DefForm3 = array(
    0 => array(
        'type' => 'text',
        'name' => 'ENTREGA_NOMBRE',
        'value' => '',
        'size' => 25,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'number',
        'name' => 'ENTREGA_TRABAJO',
        'value' => '',
        'size' => 50,
        'min' => 0,
        'max' => 4294967295,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'time',
        'name' => 'ENTREGA_HORA',
        'value' => '',
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    3 => array(
        'type' => 'date',
        'name' => 'ENTREGA_FECHA',
        'value' => '2000-01-01',
        'min' => '1900-01-01',
        'max' => '2200-01-01',
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    4 => array(
        'type' => 'number',
        'name' => 'ENTREGA_ALUMNO',
        'value' => '',
        'size' => 80,
        'min' => 0,
        'max' => 4294967295,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    5 => array(
        'type' => 'number',
        'name' => 'ENTREGA_HORAS_DEDIC',
        'value' => '',
        'size' => 50,
        'min' => 0.00,
        'max' => 4294967295.00,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    6 => array(
        'type' => 'number',
        'name' => 'ENTREGA_ID',
        'value' => '',
        'size' => 25,
        'min' => 0,
        'max' => 4294967295,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )

);


?>
