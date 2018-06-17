<?php

function input($label, $type, $name, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<div class='form-group'>";
        $html .= "<label for='$name'>$label</label>";
        $html .= "<input type='$type' class='form-control' id='$name' name='$name' $constructor>";
    $html .= "</div>";
    
    return $html;
}

function submit($name, $value, $class = "btn-default"){
    $html = " <button type='submit' name='$name' id='$name' class='btn $class'>$value</button>";

    return $html;
}

function textarea($name, $row = 3, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<textarea class='form-control' name='$name' id='$name' rows='$row' $constructor></textarea>";

    return $html;
}

function select($name, $values, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<select class='form-control' $constructor name='$name' id='$name'>";
    foreach ($values as $value) {
        $html .= "<option value='$value'>$value</option>";
    }
    $html .= "</select>";

    return $html;
}

function checkbox($label, $name, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<div class='checkbox'>";
        $html .= "<label>";
            $html .= "<input name='$name' id='$name' $constructor type='checkbox'> $label";
        $html .= "</label>";
    $html .= "</div>";

    return $html;
}

function radio($label, $name, $values, $options = []){

    $constructor = '';
    foreach ($options as $k => $v) {
        $constructor .= " $k = '$v' ";
    }

    $html = "<div class='radio'> $label";
    foreach ($values as $value) {
        $html .= "<label>";
        $html .= "<input type='radio' $constructor name='$name' id='$name' value='$value' checked>";
        $html .= $value;
        $html .= "</label>";
    }
    $html .= "</div>";

    return $html;
}


function dbConnect(){
    try{
        return new PDO('mysql:host=localhost;dbname=hyperplanning;charset=utf8', 'root', 'root');
    }catch(Exception $e){
        die("Erreur de connexion à la BDD : $e->getMessage()");
    }
}