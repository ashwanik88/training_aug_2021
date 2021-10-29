<?php 
require_once('includes/startup.php');
unset($_SESSION['admin_user']);
redirect('index.php');
