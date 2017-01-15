<?php
//LIBRERIA DE FUNCIONES


//Funciones para la creación automática de formulario a partir de array

  //Versión que tiene en cuenta el rol
function createForm2($listFields, $fieldsDef, $strings, $values, $required, $noedit, $rol) {
    foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
        for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
            //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
            if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                switch ($fieldsDef[$i]['type']) {
                    case 'text':
                        if (isset($fieldsDef[$i]['texto'])) {
                            $str = "\t" . $strings[$fieldsDef[$i]['texto']];
                        } else {
                            $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        }
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (!isset($required[$field])) {
                                $str .= 'required';
                            } else {
                                $str .= '';
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'date':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'email':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'search':
                        break;
                    case 'url': //las url muestran enlace en otra pestaña
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                        $str .= " <br>\n";
                        echo $str;
                        break;
                    case 'tel':
                        break;
                    case 'password':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'number':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'checkbox':
                        $str = "\t" . $fieldsDef[$i]['value'];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $rolActual = consultarRol($_SESSION['login']);
                        $func = consultarFuncionalidadesRol($rolActual);
                        if ($rol === $rolActual && in_array($field, $func)) { //No se permite quitar funcionalidades a su propio rol
                            $str .= ' checked ';
                            $str .= ' onclick="javascript: return false;" ';
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'radio':
                        break;
                    case 'file':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                        ;
                    case 'select':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']] . ": <select name='" . $fieldsDef[$i]['name'] . "'";
                        if ($noedit || $noedit[$field]) {
                            $str .= ' readonly ';
                        }
                        if ($fieldsDef[$i]['multiple'] == 'true') {
                            $str = $str . " multiple ";
                        }
                        $str = $str . " >";
                        foreach ($fieldsDef[$i]['options'] as $value) {
                            $str1 = "<option value = '" . $value . "'";
                            if (isset($values[$fieldsDef[$i]['name']])) {
                                if ($values[$fieldsDef[$i]['name']] == $value) {
                                    $str1 .= " selected ";
                                }
                            }
                            $str1 .= ">" . $value . "</option>";
                            $str = $str . $str1;
                        }
                        $str = $str . "</select><br>\n";
                        echo $str;
                        break;
                    case 'textarea':
                        break;
                    default:
                } //search, url, tel, email, password, date pickers, number, checkbox, radio y file
            }
        }
    }
}
    //version que tiene en cuenta las paginas
function createForm3($listFields, $fieldsDef, $strings, $values, $required, $noedit, $pags) {
    foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
        for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
            //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
            if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                switch ($fieldsDef[$i]['type']) {
                    case 'text':
                        if (isset($fieldsDef[$i]['texto'])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['texto']] . "</label>";
                        } else {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . ":</label>";
                        }
                        $str .= "  <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " id = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                $str .= 'required';
                            } else {
                                $str .= '';
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'date':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ><br>";
                        echo $str;
                        break;
                    case 'email':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ></li>";
                        echo $str;
                        break;
                    case 'search':
                        break;
                    case 'url':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                        $str .= " </li>";
                        echo $str;
                        break;
                    case 'tel':
                        break;
                    case 'password':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>\n";
                        echo $str;
                        break;
                    case 'number':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>\n";
                        echo $str;
                        break;
                    case 'checkbox':
                        $str = "<li>" . $fieldsDef[$i]['value'];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        if (in_array($field, $pags)) {
                            $str .= ' checked ';
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'radio':
                        break;
                    case 'file':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                        ;
                    case 'select':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']] . ": <select name='" . $fieldsDef[$i]['name'] . "'";
                        if ($noedit || $noedit[$field]) {
                            $str .= ' readonly ';
                        }
                        if ($fieldsDef[$i]['multiple'] == 'true') {
                            $str = $str . " multiple ";
                        }
                        $str = $str . " >";
                        foreach ($fieldsDef[$i]['options'] as $value) {
                            $str1 = "<option value = '" . $value . "'";
                            if (isset($values[$fieldsDef[$i]['name']])) {
                                if ($values[$fieldsDef[$i]['name']] == $value) {
                                    $str1 .= " selected ";
                                }
                            }
                            $str1 .= ">" . $value . "</option>";
                            $str = $str . $str1;
                        }
                        $str = $str . "</select></li>";
                        echo $str;
                        break;
                    case 'textarea':
                        break;
                    default:
                }
            }
        }
    }
}
  //versión genérca
function createForm($listFields, $fieldsDef, $strings, $values, $required, $noedit) {
    foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
        for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
            //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
            if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                switch ($fieldsDef[$i]['type']) {
                    case 'text':
                        if (isset($fieldsDef[$i]['texto'])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['texto']] . "</label>";
                        } else {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        }
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " id = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (!isset($required[$field])) {
                                $str .= 'required';
                            } else {
                                $str .= '';
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'date':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }

                        echo $str;
                        break;
                    case 'email':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= '';
                                } else {
                                    $str -= ' required  ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }


                        echo $str;
                        break;
                    case 'search':
                        break;
                    case 'url':
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                            $str .= "<a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                            $str .= " <br>\n";
                            echo $str;
                        }
                        break;
                    case 'time':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ></li>";
                        echo $str;
                        break;

                    case 'datetime-local':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }

                        $str .= "" . " ></li>";
                        echo $str;
                        break;

                    case 'password':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ></li>";
                        echo $str;
                        break;
                    case 'number':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'checkbox':
                        if (isset($strings[$fieldsDef[$i]['value']])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['value']] . "</label>";
                        } else {
                            $str = "<li><label>" . $fieldsDef[$i]['value'] . "</label>";
                        }
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'radio':
                        break;
                    case 'file':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                        ;
                    case 'select':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>" . "<select name='" . $fieldsDef[$i]['name'] . "'";
                        if ($noedit || $noedit[$field]) {
                            $str .= ' readonly ';
                        }
                        if ($fieldsDef[$i]['multiple'] == 'true') {
                            $str = $str . " multiple ";
                        }
                        $str = $str . " >";
                        foreach ($fieldsDef[$i]['options'] as $value) {
                            $str1 = "<option value = '" . $value . "'";
                            if (isset($values[$fieldsDef[$i]['name']])) {
                                if ($values[$fieldsDef[$i]['name']] == $value) {
                                    $str1 .= " selected ";
                                }
                            }
                            $str1 .= ">" . $value . "</option>";
                            $str = $str . $str1;
                        }
                        $str = $str . "</select></li>";
                        echo $str;
                        break;
                    case 'textarea':
                         if (isset($fieldsDef[$i]['texto'])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        } else {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        }
                        $str .= "<" . $fieldsDef[$i]['type'] . "";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " rows = '" . $fieldsDef[$i]['rows'] . "'";
                        $str .= " cols = '" . $fieldsDef[$i]['cols'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " >" . $values[$fieldsDef[$i]['name']] . "";
                        }else {
                             $str .= " >";
                        }
                        $str .= " </textarea>";
                        echo $str;
                        break;
                    default:
                }
            }
        }
    }
}
 //Evalúa si el usuario se ha autenticado
function IsAuthenticated() {
    session_start();
    if (!isset($_SESSION['login'])) {
        return false;
    } else {
        return true;
    }
}

//Elimina la carpeta que se le pasa como argumento
function eliminarDir($carpeta) {
    foreach (glob($carpeta . "/*") as $archivos_carpeta) {
        if (is_dir($archivos_carpeta)) {
            eliminarDir($archivos_carpeta);
        } else {
            unlink($archivos_carpeta);
        }
    }
    rmdir($carpeta);
}

//Completa la lista de titulos con las funcionalidades disponibles
function AñadirFuncionesTitulos($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT FUNCIONALIDAD_NOM from FUNCIONALIDAD';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        array_push($array, $tipo['FUNCIONALIDAD_NOM']);
    }
    return $array;
}

//Añade al array de definición de formulario las entradas correspondientes a las funcionalidades añadidas
function AñadirFunciones($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT FUNCIONALIDAD_NOM from FUNCIONALIDAD';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        $array[count($array)] = array(
            'type' => 'checkbox',
            'name' => 'rol_funcionalidades[]',
            'value' => $tipo['FUNCIONALIDAD_NOM'],
            'size' => 20,
            'required' => true,
            'pattern' => '',
            'validation' => '',
            'readonly' => false);
    }
    return $array;
}

//Devuelve el ID de rol a partir del nombre
function ConsultarIDRol($ROL_NOM) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT ROL_ID FROM ROL WHERE ROL_NOM='" . $ROL_NOM . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['ROL_ID'];
}

//Devuelve el nombre de rol a partir del id de rol
function ConsultarNOMRol($ROL_ID) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT ROL_NOM FROM ROL WHERE ROL_ID='" . $ROL_ID . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['ROL_NOM'];
}

//Devuelve el id de una funcionalidad a partir del nombre
function ConsultarIDFuncionalidad($FUNCIONALIDAD_NOM) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT FUNCIONALIDAD_ID FROM FUNCIONALIDAD WHERE FUNCIONALIDAD_NOM='" . $FUNCIONALIDAD_NOM . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['FUNCIONALIDAD_ID'];
}

//Devuelve el nombre de una funcionalidad a partir de su id
function ConsultarNOMFuncionalidad($FUNCIONALIDAD_ID) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT FUNCIONALIDAD_NOM FROM FUNCIONALIDAD WHERE FUNCIONALIDAD_ID='" . $FUNCIONALIDAD_ID . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['FUNCIONALIDAD_NOM'];
}

//Devuelve el id de una página a partir de su nombre
function ConsultarIDPagina($PAGINA_NOM) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT PAGINA_ID FROM PAGINA WHERE PAGINA_NOM='" . $PAGINA_NOM . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['PAGINA_ID'];
}

//Devuelve el nombre de una pagina a partir de su id
function ConsultarNOMPagina($PAGINA_ID) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT PAGINA_NOM FROM PAGINA WHERE PAGINA_ID='" . $PAGINA_ID . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['PAGINA_NOM'];
}

//Devuelve el nombre de la rubrica a partir del id de rubrica
function ConsultarNOMRubrica($RUBRICA_ID) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT RUBRICA_NOMBRE FROM RUBRICA WHERE RUBRICA_ID='" . $RUBRICA_ID . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['RUBRICA_NOMBRE'];
}

//Devuelve el nombre de la entrega a partir del id de entrega
function ConsultarNOMEntrega($ENTREGA_ID) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT ENTREGA_NOMBRE FROM ENTREGA WHERE ENTREGA_ID='" . $ENTREGA_ID . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['ENTREGA_NOMBRE'];
}

//Añade al array los nombre de las paginas disponibles
function AñadirPaginasTitulos($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT PAGINA_NOM from PAGINA';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        array_push($array, $tipo['PAGINA_NOM']);
    }
    return $array;
}

//Añade al formulario de definicion las entradas correspondientes a las paginas disponibles
function AñadirPaginas($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT PAGINA_NOM from PAGINA';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        $array[count($array)] = array(
            'type' => 'checkbox',
            'name' => 'funcionalidad_paginas[]',
            'value' => $tipo['PAGINA_NOM'],
            'size' => 20,
            'required' => true,
            'pattern' => '',
            'validation' => '',
            'readonly' => false);
    }
    return $array;
}

//Genera un link para la página a partir de un nombre
function GenerarLinkPagina($PAGINA_NOM) {
    $link = str_replace(" ", "_", $PAGINA_NOM);
    $s = '../Views/';
    $s .= $link;
    $s .= '_Vista.php';
    return $s;
}

//Genera el link de un controlador a partir del nombre de la funcionalidad
function GenerarLinkControlador($CON_NOM) {
    $link = str_replace(" ", "_", $CON_NOM);
    $s = '../Controllers/';
    $s .= $link;
    $s .= '_Controller.php';
    return $s;
}

//Devuelve el ID de una materia a partir de su nombre
function ConsultarIDMateria($MATERIA_NOM) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT MATERIA_ID FROM MATERIA WHERE MATERIA_NOM='" . $MATERIA_NOM . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['MATERIA_ID'];
}

//Devuelve el nombre de una materia a partir de su ID
function ConsultarNomMateria($MATERIA_ID) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT MATERIA_NOM FROM MATERIA WHERE MATERIA_ID='" . $MATERIA_ID . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['MATERIA_NOM'];
}

//Devuelve el dni de un usuario a partir de su user
function ConsultarUserDNI($USUARIO_USER) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT USUARIO_DNI FROM USUARIO WHERE USUARIO_USER='" . $USUARIO_USER . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['USUARIO_DNI'];
}

//Devuelve el nombre y apellidos de un profesor a partir de su DNI
function ConsultarNomProfesor($USUARIO_DNI) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT USUARIO_NOMBRE, USUARIO_APELLIDO FROM USUARIO WHERE USUARIO_DNI='" . $USUARIO_DNI . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['USUARIO_NOMBRE'] . " " . $result['USUARIO_APELLIDO'];
}

//Consulta si un alumno tiene una id de materia que se pasa como parámetro
function ConsultarMateriaAlumno($MATERIA) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT * FROM MATRICULA WHERE MATRICULA_ALUMNO='" . ConsultarUserDNI($_SESSION['login']) . "' AND MATRICULA_MATERIA='" . $MATERIA . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result;
}

function ConsultarMateriaProfesor($MATERIA) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT * FROM IMPARTE_MATERIA WHERE PROFESOR_USER='" . $_SESSION['login'] . "' AND MATERIA_ID='" . $MATERIA . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result;
}

//Añade los roles al desplegable de tipos
function AñadirTipos($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if (consultarRol($_SESSION['login']) == '4') {
        $str = array('PROFESOR', 'PROFESOR RESPONSABLE');
    } else {
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $sql = 'SELECT ROL_NOM from ROL';
        $result = $mysqli->query($sql);
        $str = array();
        while ($tipo = $result->fetch_array()) {
            array_push($str, $tipo['ROL_NOM']);
        }
    }
    $añadido = array(
        'type' => 'select',
        'name' => 'USUARIO_TIPO',
        'multiple' => 'false',
        'value' => '',
        'options' => $str,
        'required' => 'true',
        'readonly' => false
    );
    $array[count($array)] = $añadido;
    return $array;
}

//Añade los profesores al desplegable
function AñadirProfesores($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if (consultarRol($_SESSION['login']) == '4') {
        $str = array('PROFESOR', 'PROFESOR RESPONSABLE');
    } else {
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $sql = 'SELECT DISTINCT DOCUMENTACION_PROFESOR from DOCUMENTACION';
        $result = $mysqli->query($sql);
        $str = array();
        array_push($str, NULL);
        while ($tipo = $result->fetch_array()) {
            array_push($str, ConsultarNomProfesor($tipo['DOCUMENTACION_PROFESOR']));
        }
    }
    $añadido = array(
        'type' => 'select',
        'name' => 'DOCUMENTACION_PROFESOR',
        'multiple' => 'false',
        'value' => '',
        'size' => 50,
        'options' => $str,
        'required' => 'true',
        'readonly' => false,
        'pattern' => '',
        'validation' => ''
    );
    $array[2] = $añadido;
    return $array;
}

//Añade las materias al desplegable
function AñadirMaterias($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if (consultarRol($_SESSION['login']) == '4') {
        $str = array('PROFESOR', 'PROFESOR RESPONSABLE');
    } else {
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $sql = 'SELECT DISTINCT DOCUMENTACION_MATERIA from DOCUMENTACION';
        $result = $mysqli->query($sql);
        $str = array();
        array_push($str, NULL);
        while ($tipo = $result->fetch_array()) {
            array_push($str, ConsultarNomMateria($tipo['DOCUMENTACION_MATERIA']));
        }
    }
    $añadido = array(
        'type' => 'select',
        'name' => 'DOCUMENTACION_MATERIA',
        'multiple' => 'false',
        'value' => '',
        'size' => 50,
        'options' => $str,
        'required' => 'true',
        'readonly' => false,
        'pattern' => '',
        'validation' => ''
    );
    $array[3] = $añadido;
    return $array;
}

//crea un archivo en la direccion especificada
function crearArchivo($direccion) {
    $fp = fopen($direccion, "w+");
    $string = "<h1>En construcción</h1><br><a href='../Views/DEFAULT_Vista.php'>Back</a>";
    fputs($fp, $string);
    fclose($fp);
}

//Modifica el nombre de un archivo
function cambiarNombreArchivo($antiguo, $nuevo) {
    rename($antiguo, $nuevo);
}

//Borra el archivo en la direccion especificada
function borrarArchivo($direccion) {
    unlink($direccion);
}

//añade a la pagina default los enlaces correspondientes a las funcionalidades
function añadirFuncionalidades($NOM) {
    include '../Locates/Strings_' . $NOM['IDIOMA'] . '.php';
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $rol = "SELECT USUARIO_TIPO FROM USUARIO  WHERE USUARIO_USER='" . $NOM['login'] . "'";
    $sql = "SELECT FUNCIONALIDAD_ID, ROL_ID FROM ROL_FUNCIONALIDAD WHERE ROL_ID=(" . $rol . ")";
    if (!($resultado = $mysqli->query($sql))) {
        echo 'Error en la consulta sobre la base de datos';
    } else {
        while ($fila = $resultado->fetch_array()) {
            $funcionalidad = ConsultarNOMFuncionalidad($fila['FUNCIONALIDAD_ID']);
            switch ($funcionalidad) {
                case "GESTION USUARIOS":
                    ?><li><span><a style="font-size:20px;" href='../Controllers/USUARIO_Controller.php'><?php echo $strings['Gestión de usuarios'] ?></a></span></li> <?php
                                break;
                            case "GESTION USUARIOS2":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/USUARIO_Controller.php'><?php echo $strings['Gestión de usuarios'] ?></a></span></li> <?php
                                break;
                            case "GESTION ROLES":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/ROL_Controller.php'><?php echo $strings['Gestión de Roles'] ?></a></span></li> <?php
                                break;
                            case "GESTION FUNCIONALIDADES":
                                ?> <li><span><a  style="font-size:20px;"href='../Controllers/FUNCIONALIDAD_Controller.php'><?php echo $strings['Gestión de Funcionalidades'] ?></a></span></li><?php
                                break;
                            case "GESTION PAGINAS":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/PAGINA_Controller.php'><?php echo $strings['Gestión de Páginas'] ?></a></span></li> <?php
                                break;
                            case "GESTION RUBRICAS":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/RUBRICA_Controller.php'><?php echo $strings['Gestión de Rúbricas'] ?></a></span></li> <?php
                                break;
                            case "GESTION ENTREGAS":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/ENTREGAS_Controller.php'><?php echo $strings['Gestión de Entregas'] ?></a></span></li> <?php
                                break;
                            case "GESTION ENTREGAS2":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/ENTREGAS_Controller.php'><?php echo $strings['Gestión de Entregas'] ?></a></span></li> <?php
                                break;
                            case "GESTION MATERIA":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/MATERIA_Controller.php'><?php echo $strings['Gestión de Materias'] ?></a></span></li> <?php
                                break;
                            case "GESTION TRABAJOS":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/TRABAJO_Controller.php'><?php echo $strings['Gestion de trabajos'] ?></a></span></li> <?php
                                break;
                            case "GESTION CORRECCIONES":
				                    ?><li><span><a style="font-size:20px;" href='../Controllers/CORRECCIONES_Controller.php'><?php echo $strings['Gestión de correcciones'] ?></a></span></li><?php
				                    break;
                case "GESTION MATERIAS":
                    ?><li><span><a style="font-size:20px;" href='../Controllers/MATERIA_Controller.php'><?php echo $strings['Gestión de Materias'] ?></a></span></li> <?php
                    break;

                case "GESTION INSCRIPCIONES":
                    ?><li><span><a style="font-size:20px;" href='../../../bb/et3_iu/Controllers/INSCRIPCION_Controller.php'><?php echo $strings['Gestión de Inscripciones'] ?></a></span></li> <?php
                    break;
                            case "GESTION DOCUMENTACION":
                                break;
                            case "GESTION DE ITEMS DE RUBRICAS":
                                break;
                
                            default:
                                $link = str_replace(" ", "_", ConsultarNOMFuncionalidad($fila['FUNCIONALIDAD_ID'])) . "_Controller.php";
                                echo "<a style='font-size:20px;'href='../Controllers/" . $link . "'>" . ConsultarNOMFuncionalidad($fila['FUNCIONALIDAD_ID']) . " </a><br><br>";
                                break;
                        }
                    }
                }
            }

//Genera los includes correspondientes a las paginas a las que se tiene acceso
            function generarIncludes() {
                $toret = array();
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT DISTINCT PAGINA.PAGINA_LINK FROM USUARIO_PAGINA, PAGINA  WHERE PAGINA.PAGINA_ID=USUARIO_PAGINA.PAGINA_ID AND USUARIO_PAGINA.USUARIO_USER='" . $_SESSION['login'] . "'";
                if (!($resultado = $mysqli->query($sql))) {
                    echo 'Error en la consulta sobre la base de datos';
                } else {
                    while ($tupla = $resultado->fetch_array()) {
                        array_push($toret, $tupla['PAGINA_LINK']);
                    }
                }
                return $toret;
            }

//Revisa si tiene permiso al comprobar si se ha incluido la clase a la que se quiere acceder
            function tienePermisos($string) {
                return class_exists($string);
            }

//Devuelve el rol de un usuario
            function consultarRol($USUARIO_USER) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT USUARIO_TIPO FROM USUARIO  WHERE USUARIO_USER='" . $USUARIO_USER . "'";
                $result = $mysqli->query($sql)->fetch_array();
                return $result['USUARIO_TIPO'];
            }

//Devuelve las funcionalidades asignadas a un rol
            function consultarFuncionalidadesRol($rol) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                $toret = array();
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT FUNCIONALIDAD_NOM FROM FUNCIONALIDAD, ROL_FUNCIONALIDAD WHERE FUNCIONALIDAD.FUNCIONALIDAD_ID=ROL_FUNCIONALIDAD.FUNCIONALIDAD_ID AND ROL_FUNCIONALIDAD.ROL_ID=" . $rol;
                $result = $mysqli->query($sql);
                while ($tupla = $result->fetch_array()) {
                    array_push($toret, $tupla['FUNCIONALIDAD_NOM']);
                }
                return $toret;
            }
//Devuelve las paginas asignadas a una funcionalidad
            function consultarPaginasFuncionalidad($funcionalidad) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                $toret = array();
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT PAGINA_NOM FROM PAGINA, FUNCIONALIDAD_PAGINA WHERE PAGINA.PAGINA_ID=FUNCIONALIDAD_PAGINA.PAGINA_ID AND FUNCIONALIDAD_PAGINA.FUNCIONALIDAD_ID=" . $funcionalidad;
                $result = $mysqli->query($sql);
                while ($tupla = $result->fetch_array()) {
                    array_push($toret, $tupla['PAGINA_NOM']);
                }
                return $toret;
            }

//Consulta las paginas asignadas a un usuario
            function consultarPaginasEmp($user) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                $sql = "select PAGINA_ID from USUARIO_PAGINA WHERE USUARIO_USER='" . $user . "'";
                if (!($resultado = $mysqli->query($sql))) {
                    return 'Error en la consulta sobre la base de datos';
                } else {
                    $toret = array();
                    $i = 0;
                    while ($fila = $resultado->fetch_array()) {
                        $toret[$i] = ConsultarNOMPagina($fila['PAGINA_ID']);
                        $i++;
                    }
                    return $toret;
                }
            }
//Devuelve el nombre de una rubrica a partir de su id
            function ConsultarNombreRubrica($RUBRICA_ID) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT RUBRICA_NOMBRE FROM RUBRICA WHERE RUBRICA_ID='" . $RUBRICA_ID . "'";
                $result = $mysqli->query($sql)->fetch_array();
                return $result['RUBRICA_NOMBRE'];
            }
//Devuelve el nombre de un item de rubrica a partir de su id
            function ConsultarNombreItem($ITEM_ID) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT ITEM_NOMBRE FROM ITEM WHERE ITEM_ID='" . $ITEM_ID . "'";
                $result = $mysqli->query($sql)->fetch_array();
                return $result['ITEM_NOMBRE'];
            }
//Devuelve la rubrica a la que pertenece un item
            function ConsultarIDRubrica($ITEM_ID) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT ITEM_RUBRICA FROM ITEM WHERE ITEM_ID='" . $ITEM_ID . "'";
                $result = $mysqli->query($sql)->fetch_array();
                return $result['ITEM_RUBRICA'];
            }
//Devuelve el numero de niveles de la rubrica
            function ConsultarNivelRubrica($ITEM_RUBRICA) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT RUBRICA_NIVELES FROM RUBRICA WHERE RUBRICA_ID='" . $ITEM_RUBRICA . "'";
                $result = $mysqli->query($sql)->fetch_array();
                return $result['RUBRICA_NIVELES'];
            }
//Devuelve el item id a partir de su nombre, rubrica y porcentaje
            function ConsultarIDItem($ITEM_NOMBRE, $ITEM_RUBRICA, $ITEM_PORCENTAJE) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT ITEM_ID FROM ITEM WHERE ITEM_RUBRICA='" . $ITEM_RUBRICA . "' AND ITEM_NOMBRE= '" . $ITEM_NOMBRE . "' AND ITEM_PORCENTAJE = '" . $ITEM_PORCENTAJE . "' ";
                $result = $mysqli->query($sql)->fetch_array();
                return $result['ITEM_ID'];
            }
//incluye select
            function createForm4($listFields, $fieldsDef, $strings, $values, $required, $noedit) {
                foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
                    for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
                        //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
                        if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                            switch ($fieldsDef[$i]['type']) {
                                case 'text':
                                    if (isset($fieldsDef[$i]['texto'])) {
                                        $str = "<li>" . $strings[$fieldsDef[$i]['texto']];
                                    } else {
                                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                                    }
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " id = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            $str .= 'required';
                                        } else {
                                            $str .= '';
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                case 'date':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                                    $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= "required" . " ></li>";
                                    echo $str;
                                    break;
                                case 'email':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= "required" . " ></li>";
                                    echo $str;
                                    break;
                                case 'search':
                                    break;
                                case 'url':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                                    $str .= " </li>";
                                    echo $str;
                                    break;
                                case 'tel':
                                    break;
                                case 'password':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                case 'number':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                                    $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                case 'checkbox':
                                    $str = "<li>" . $fieldsDef[$i]['value'];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ><br>\n";
                                    echo $str;
                                    break;
                                case 'radio':
                                    break;
                                case 'file':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                    ;
                                case 'select':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']] . ": <select name='" . $fieldsDef[$i]['name'] . "'";
                                    if ($noedit || $noedit[$field]) {
                                        $str .= ' readonly ';
                                    }
                                    if ($fieldsDef[$i]['multiple'] == 'true') {
                                        $str = $str . " multiple ";
                                    }
                                    $str = $str . " >";
                                    foreach ($fieldsDef[$i]['options'] as $value) {
                                        $str1 = "<option value = '" . $value . "'";
                                        if (isset($values[$fieldsDef[$i]['name']])) {
                                            if ($values[$fieldsDef[$i]['name']] == $value) {
                                                $str1 .= " selected ";
                                            }
                                        }
                                        $str1 .= ">" . $value . "</option>";
                                        $str = $str . $str1;
                                    }
                                    $str = $str . "</select></li>";
                                    echo $str;
                                    break;
                                case 'textarea':
                                    break;
                                default:
                            }
                        }
                    }
                }
            }
//Devuelve cierto si el usuario logeado imparte la misma materia que el que se le pasa como argumento
            function mismaMateria($USUARIO_USER) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT * FROM IMPARTE_MATERIA WHERE PROFESOR_USER='" . $USUARIO_USER . "' AND MATERIA_ID IN (SELECT MATERIA_ID FROM IMPARTE_MATERIA WHERE PROFESOR_USER='" . $_SESSION['login'] . "')";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    return true;
                } else {
                    return false;
                }
            }
//Devuelve la suma de porcentajes de un item
            function sumarValorItem($ITEM_RUBRICA) {
                $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT SUM(ITEM_PORCENTAJE) AS value_sum FROM ITEM WHERE ITEM_RUBRICA='" . $ITEM_RUBRICA . "'";
                $result = $mysqli->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['value_sum'];

                return $sum;
            }
function ConsultarIDTrabajo($TRABAJO_NOM) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT TRABAJO_ID FROM TRABAJO WHERE TRABAJO_NOM='" . $TRABAJO_NOM . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['TRABAJO_ID'];
}
function ConsultarLinkEntrega($ENTREGA){
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT ENTREGA_DOCUMENTO FROM ALUMNO_ENTREGA WHERE USUARIO_USER='" . $_SESSION['login'] . "' AND ENTREGA_ID='".$ENTREGA."'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['ENTREGA_DOCUMENTO'];
}
//Añade los trabajos al desplegable
function AñadirTrabajos($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT TRABAJO_NOM from TRABAJO';
    $result = $mysqli->query($sql);
    $str = array();
    while ($trabajo = $result->fetch_array()) {
        array_push($str, $trabajo['TRABAJO_NOM']);
    }

    $añadido = array(
        'type' => 'select',
        'name' => 'ENTREGA_TRABAJO',
        'multiple' => 'false',
        'value' => '',
        'options' => $str,
        'required' => 'true',
        'readonly' => false
    );
    $array[count($array)] = $añadido;
    return $array;
}
function AñadirProfesoresTitulos($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT USUARIO_USER from USUARIO WHERE USUARIO_TIPO='2' ";
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        array_push($array, $tipo['USUARIO_USER']);
    }
    return $array;
}

function AñadirProfes($array) {
    $mysqli = new mysqli("localhost", "iu2016", "iu2016", "IU2016");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT USUARIO_USER from USUARIO WHERE USUARIO_TIPO=2';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        $array[count($array)] = array(
            'type' => 'checkbox',
            'name' => 'materia_profesores[]',
            'value' => $tipo['USUARIO_USER'],
            'size' => 20,
            'required' => true,
            'pattern' => '',
            'validation' => '',
            'readonly' => false);
    }

    return $array;
}


            ?>

