<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	$a = '';
	$b = '';
	$c = '';
	if($_POST){
		
		sleep(1);	// 1 second

		$resp = array('success' => false, 'msg' => 'Something went wrong 123');

		if(isset($_POST['txt1']) && !empty($_POST['txt1'])){
			$a  = $_POST['txt1'];
		}
		if(isset($_POST['txt2']) && !empty($_POST['txt2'])){
			$b  = $_POST['txt2'];
		}

		if(is_numeric($a) && is_numeric($b)){
			$o = $_POST['btnSubmit'];
			switch($o){
				case '+':
					$c = $a + $b;
				break;
				case '-':
					$c = $a - $b;
				break;
			}
			$resp['result'] = $c;
			$resp['success'] = true;
		}

		echo json_encode($resp);
		die;
		// die; // exit;
	}
	