<?php

$arr = array('key1' => 'val1', 'key2' => 'val2', 'key3' => 'val3', 'val5', 'val6');

$arr[] = 'test';

$arr[1] = 'hello';

$arr['a'] = 123;

echo '<pre>';
print_r($arr);

// for($i = 0; $i < sizeof($arr); $i++){
//     echo 'Key = ' . $i;
//     echo ' value = ' . $arr[$i];
//     echo '<br>';
// }

foreach($arr as $k=>$v){
    echo 'Key = ' . $k;
    echo ' val = ' . $v;
    echo '<br>';
}

?>