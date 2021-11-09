<?php 

if(isLogin()){
    redirect('dashboard.php');
}


if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='". $username ."' AND password='". md5($password) ."' AND status=1";

    $rs = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
        $_SESSION['admin_user'] = $rec;
        redirect('dashboard.php');
    }else{
        addAlert('danger', 'Incorrect Login Details');
        redirect('index.php');
    }
}