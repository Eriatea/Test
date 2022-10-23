<?php

$json = file_get_contents('php://input');

$data = (array) json_decode($json);

$str = $data['manufacturer'] . ' :: ' . $data['name'] . ' :: ' . $data['price'] . ' :: ' . $data['quantity']; 

$file = file('form.txt');

foreach ($file as $key => $string){
   if($string == $str){
       unset($file[$key]);
       echo ' Строка удалена'."\r\n";
    } 
    else {
       echo 'Запись не найдена';
    }
}
// и далее
file_put_contents ('form.txt', implode($file));

