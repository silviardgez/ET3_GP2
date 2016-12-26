<?php

//Formulario para listar las rubricas

$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'RUBRICA_NOMBRE',
        'value' => '',
        'size' => 25, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'text',
        'name' => 'RUBRICA_DESCRIPCION',
        'value' => '',
        'size' => 50, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'number',
        'name' => 'RUBRICA_NIVELES',
        'value' => '',
        'min' => '1',
        'max' => '',
        'step' => '1',
        'selected' => '1',
        'size' => 10, //Comprobar
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
);
$DefForm = AñadirTipos($form); //Comprobar
?>
