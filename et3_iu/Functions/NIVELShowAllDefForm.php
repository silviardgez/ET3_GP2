<?php

//Formulario para listar las rubricas

$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'NIVEL_ID',
        'value' => '',
        'size' => 10, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'text',
        'name' => 'NIVEL_DESCRIPCION',
        'value' => '',
        'size' => 35, //Comprobar
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'text',
        'name' => 'NIVEL_ITEM',
        'value' => '',
        'size' => 10, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
   3 => array(
        'type' => 'text',
        'name' => 'NIVEL_RUBRICA',
        'value' => '',
        'size' => 10, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    4 => array(
        'type' => 'text',
        'name' => 'NIVEL_PORCENTAJE',
        'value' => '',
        'size' => 2, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);
$DefForm = AñadirTipos($form); //Comprobar
