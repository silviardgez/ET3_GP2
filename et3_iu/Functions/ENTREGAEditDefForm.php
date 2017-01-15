<?php
//Formulario para listar los roles
$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'ENTREGA_NOMBRE',
        'value' => '',
        'size' => 25,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'number',
        'name' => 'ENTREGA_TRABAJO',
        'value' => '',
        'min' => 0,
        'max' => 4294967295,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'number',
        'name' => 'ENTREGA_ID',
        'value' => '',
        'size' => 25,
        'min' => 0,
        'max' => 4294967295,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )

);
$DefForm=AñadirTipos($form);


?>
