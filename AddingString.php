<?php

$file = "form.txt";

if(!isset($_POST["manufacturer"])){
    $manufacturer = '';
}
if(isset($_POST["manufacturer"])){
    $manufacturer = $_POST["manufacturer"];
}

if(!isset($_POST["name"])){
    $name = '';
}
if(isset($_POST["name"])){
    $name = $_POST["name"];
}

if(!isset($_POST["price"])){
    $price = '';
}
if(isset($_POST["price"])){
    $price = $_POST["price"];
}

if(!isset($_POST["quantity"])){
    $quantity = '';
}
if(isset($_POST["quantity"])){
    $quantity = $_POST["quantity"];
}

if ($manufacturer !== "" && $name !== "" && $price !== "" && $quantity !== ""&& $price >= 10999 && $quantity >= 1)
{
    
   $output = $manufacturer . " :: " . $name . " :: " . $price . " :: " . $quantity . "\n";
   file_put_contents($file, $output, FILE_APPEND | LOCK_EX);
}

