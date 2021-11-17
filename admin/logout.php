<?php 
require_once('includes/startup.php');
unset($_SESSION['admin_user']);
setcookie('username',$username, time() - 60 * 60 * 24 * 10);
setcookie('password',md5($password), time() - 60 * 60 * 24 * 10);
redirect('index.php');
