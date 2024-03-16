<?php
//task 1 - regular
$str = 'ahb acb aeb aeeb adcb axeb';
// Используем preg_match_all для поиска всех вхождений по заданному шаблону
preg_match_all('/a[a-z][a-z]b/ui', $str, $matches);
foreach($matches[0] as $match){
    echo $match, "\n";
}
echo "\n";


function cube($matches) {
    return pow($matches[0], 3);
}

$str = 'a1b2c3';
$result = preg_replace_callback('/[0-9]/u', 'cube', $str);
// пока гадал как сделать через просто preg_replace, в предложении вылезла preg_replace callback, которая позволила добавить функцию)
echo $result;
