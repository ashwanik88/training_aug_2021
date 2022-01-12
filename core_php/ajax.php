<!doctype html>
<html>
<head>
	<title>Add Numbers</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-6 mt-3 m-auto">
		<form action="" method="POST" id="frm">
<table class="table table-bordered">

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
		<td><input type="button" value="+" name="btnSubmit" class="btn btn-primary" /> 
		<input type="button" value="-" name="btnSubmit" class="btn btn-primary" />
		<i class="fas fa-spinner fa-pulse fa-3x fa-fw d-none loading"></i>
	</td>
	</tr>

	
</table>
</form>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
var btnType;
$('input[name="btnSubmit"]').click(function(){
	btnType = $(this).val();
	$.ajax({
		type	: 'POST',	// GET
		url	: 'response.php',
		dataType: 'JSON',	// HTML, XML, TEXT
		data	:	{
			txt1: $('input[name="txt1"]').val(),
			txt2: $('input[name="txt2"]').val(),
			btnSubmit: btnType
		},
		success: function(j){
			if(j.success == true){
				$('input[name="txtR"]').val(j.result);
			}else{
				alert(j.msg);
			}
		},
		complete: function(){
			// alert('complete');
			$('.loading').addClass('d-none');
			$('input[name="btnSubmit"]').attr('disabled', false);
		},
		beforeSend: function(){
			$('.loading').removeClass('d-none');
			$('input[name="btnSubmit"]').attr('disabled', true);
			// alert('before send');
		}


	});

	return false;
});
</script>
</body>
</html>