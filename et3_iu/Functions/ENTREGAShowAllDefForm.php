<?php
$p = new ENTREGAS_Model('','','','','','','','','');
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
        'type' => 'select',
        'name' => 'ENTREGA_TRABAJO',
        'value' => '',
        'options' => $p->getIDTrab(),
        'multiple' => $p->getIDTrab(),
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    2 => array(
        'type' => 'time',
        'name' => 'ENTREGA_HORA',
        'value' => '',
        'required' => 'true',
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
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    4 => array(
        'type' => 'text',
        'name' => 'ENTREGA_ALUMNO',
        'value' => '',
        'size' => '',
        'required' => 'true',
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
        'required' => 'true',
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
        'required' => 'true',
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    ),
    7 => array(
        'type' => 'file',
        'name' => 'ENTREGA_FOTO',
        'value' => '',
        'required' => true,
        'pattern' => '',
        'validation' => '',
        'readonly' => false
    )

);
$DefForm=AñadirTipos($form);


?>
