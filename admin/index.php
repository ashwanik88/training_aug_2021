<?php 
require_once('includes/startup.php');
require_once('library/index_lib.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    
<main class="form-signin">
  <form method="POST" action="">
    
    <h1 class="h3 mb-3 fw-normal text-center">WEBSITE_LOGO<br>Please sign in</h1>

<?php displayAlert(); ?>

    <div class="form-floating">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <input type="button" value="show password" id="btnPassword" />
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember_me" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
$('#btnPassword').click(function showPassword(){
  if($('#password').attr('type') == 'password'){
    $('#password').attr('type', 'text');
    $('#btnPassword').val('hide password');
  }else{
    $('#password').attr('type', 'password');
    $('#btnPassword').val('show password');
  }
});
</script>
  </body>
</html>
