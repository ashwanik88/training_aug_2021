<?php
$n = 123;
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

