<?php
echo '<pre>';
echo $n = 123;   // integer or numbers
var_dump($n);   // know the data type
echo $m = 'abc123'; // 
var_dump($m);

echo $n . $m;   // concatination 

$str = 'Hello ';
$str .= 'World';

// $str = $str . 'World';

// echo $str;

$arr = array(1,'abc', false);

print_r($arr);

var_dump($arr);


// if($n){

//     echo $n;
// }

// false = 0 = '' = null
// true = 1 = 'sdfsdf' 

die;
// $str = "Hello World $n";
// $str = 'Hello World $n';
$str = 'Hello World ' . $n;

echo $str;

// ternary operator
// if($n == 123){
//     echo 'True';
// }else{
//     echo 'False';
// }
echo ($n == 124)?'True':'False';


$s = 'ADMIna adwe#$ @ 234[]';
echo $result = preg_replace("/[^a-zA-Z0-9]+/", "", $s);

