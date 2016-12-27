<?php

//Formulario para listar las rubricas

$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'RUBRICA_ID',
        'value' => '',
        'size' => 25, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'text',
        'name' => 'RUBRICA_NOMBRE',
        'value' => '',
        'size' => 25, //Comprobar
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'text',
        'name' => 'RUBRICA_DESCRIPCION',
        'value' => '',
        'size' => 50, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    3 => array(
        'type' => 'number',
        'name' => 'RUBRICA_NIVELES',
        'value' => '1',
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
    4 => array(
        'type' => 'text',
        'name' => 'RUBRICA_AUTOR',
        'value' => '',
        'size' => 25, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);
$DefForm = AñadirTipos($form); //Comprobar
