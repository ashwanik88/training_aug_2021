<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	$a = '';
	$b = '';
	$c = '';
	if($_GET){
		$a  = $_GET['txt1'];
		$b  = $_GET['txt2'];
		$c = $a + $b;

		// die; // exit;
	}
	
?>
<!doctype html>
<html>
<head>
	<title>Add Numbers</title>
</head>
<body>
<form action="" method="GET">
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
		<td><input type="submit" value="Add Numbers" /></td>
	</tr>

	
</table>
</form>
</body>
</html>