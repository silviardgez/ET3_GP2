<?php

//Formulario para listar los trabajos

$form = array(
    0 => array(
        'type' => 'text',
        'name' => 'TRABAJO_ID',
        'value' => '',
        'size' => 5, //Comprobar
        'required' => false,
        'pattern' => '',
        'validation' => '',
        'readonly' => true,
        'hidden'=>true
    ),
    1 => array(
        'type' => 'text',
        'name' => 'TRABAJO_NOM',
        'value' => '',
        'size' => 35, //Comprobar
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'text',
        'name' => 'TRABAJO_DESCRIPCION',
        'value' => '',
        'size' => 50, //Comprobar
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    3 => array(
        'type' => 'number',
        'name' => 'TRABAJO_MATERIA',
        'value' => '',
        'size' => 25,
        'min' => 0,
        'max' => 4294967295,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    4 => array(
        'type' => 'number',
        'name' => 'TRABAJO_PROFESOR',
        'value' => '',
        'size' => 25,
        'min' => 0,
        'max' => 4294967295,
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    5 => array(
        'type' => 'datetime-local',
        'name' => 'TRABAJO_FECHA_INICIO',
        'value' => '',

    ),
    6 => array(
        'type' => 'datetime-local',
        'name' => 'TRABAJO_FECHA_FIN',
        'value' => '',

    )
);
$DefForm = AñadirTipos($form); //Comprobar