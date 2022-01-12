<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	$a = '';
	$b = '';
	$c = '';
	if($_POST){
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
		}

		// die; // exit;
	}
	
?>
<!doctype html>
<html>
<head>
	<title>Add Numbers</title>
</head>
<body>
<form action="" method="POST">
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<td>Enter First Number</td>
		<td><input type="text" name="txt1" value="<?php echo $a; ?>" /></td>
	</tr>
	
	<tr>
		<td>Enter Second Number</td>
		<td><input type="text" name="txt2" value="<?php echo $b; ?>" /></td>
	</tr>

	<tr>
		<td>Result</td>
		<td><input type="text" name="txtR" value="<?php echo $c; ?>" /></td>
	</tr>

	<tr>
		<td></td>
		<td><input type="submit" value="+" name="btnSubmit" /> 
		<input type="submit" value="-" name="btnSubmit" /></td>
	</tr>

	
</table>
</form>
</body>
</html>