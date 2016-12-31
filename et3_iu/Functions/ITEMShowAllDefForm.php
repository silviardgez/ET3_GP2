<?php

//Formulario para listar las rubricas

$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'ITEM_ID',
        'value' => '',
        'size' => 10, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    1 => array(
        'type' => 'text',
        'name' => 'ITEM_NOMBRE',
        'value' => '',
        'size' => 35, //Comprobar
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'text',
        'name' => 'ITEM_RUBRICA',
        'value' => '',
        'size' => 10, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
   3 => array(
        'type' => 'text',
        'name' => 'ITEM_PORCENTAJE',
        'value' => '',
        'size' => 10, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )
);
$DefForm = AñadirTipos($form); //Comprobar
