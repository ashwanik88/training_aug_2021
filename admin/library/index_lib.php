<?php 

if(isLogin()){
    redirect('dashboard.php');
}

if(isset($_COOKIE['username']) && !empty($_COOKIE['username']) && isset($_COOKIE['password']) && !empty($_COOKIE['password'])){
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    $sql = "SELECT * FROM users WHERE username='". $username ."' AND password='". $password ."' AND status=1";

    $rs = mysqli_query($con, $sql);
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
        $_SESSION['admin_user'] = $rec;
        if(isset($_POST['remember_me']) && !empty($_POST['remember_me'])){
            // save cookies
            setcookie('username',$username, time() + 60 * 60 * 24 * 10);
            setcookie('password',md5($password), time() + 60 * 60 * 24 * 10);
        }
        redirect('dashboard.php');
    }else{
        addAlert('danger', 'Incorrect Login Details');
        redirect('index.php');
    }

}


if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='". $username ."' AND password='". md5($password) ."' AND status=1";

    $rs = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
        $_SESSION['admin_user'] = $rec;
        if(isset($_POST['remember_me']) && !empty($_POST['remember_me'])){
            // save cookies
            setcookie('username',$username, time() + 60 * 60 * 24 * 10);
            setcookie('password',md5($password), time() + 60 * 60 * 24 * 10);
        }
        redirect('dashboard.php');
    }else{
        addAlert('danger', 'Incorrect Login Details');
        redirect('index.php');
    }
}

/*
1) Make common function on login
2) Exclude admin user from delete
*/