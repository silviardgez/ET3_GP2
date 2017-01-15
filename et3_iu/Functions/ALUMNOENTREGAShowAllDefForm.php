<?php
//Formulario para listar los roles
$DefForm = array(
    0 => array(
        'type' => 'file',
        'name' => 'DOCUMENTO',
        'value' => '',
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'number',
        'name' => 'HORAS_DEDIC',
        'value' => '',
        'size' => '',
        'min' => 0,
        'max' => 1000,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2=>array(
        'type' => 'text',
        'name' => 'ENTREGA_ID',
        'value' => '',
        'size' => 50,
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => true
    )


);


?>
