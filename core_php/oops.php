<?php // OOPs Object Oriendted Programming System
ini_set('display_errors', true);
error_reporting(E_ALL);

class myClass{
	function abc(){
		echo 'abc is running!' . '<br>';	
	}

	function xyz(){
		echo 'xyz is running!' . '<br>';
	}
}

class myClass2{
	function abc(){
		echo 'abc is running!' . '<br>';	
	}

	function xyz(){
		echo 'xyz is running!' . '<br>';
	}
}

$obj = new myClass;
$obj2 = new myClass2;
$obj->abc();
$obj2->abc();
$obj->xyz();
	