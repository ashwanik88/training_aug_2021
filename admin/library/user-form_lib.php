<?php

checkAdminLogin();
$document_title = 'Add User';

if($_POST){
    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['fullname']) && !empty($_POST['fullname'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fullname = $_POST['fullname'];
        $status = (isset($_POST['status']))?1:0;
        $sql = "INSERT users SET username='". $username ."', password='". $password ."', email='". $email ."', phone='". $phone ."', fullname='". $fullname ."', status='". (int)$status ."', date_added=NOW()";
        mysqli_query($con, $sql);
        addAlert('success', 'User added successfully!');
        redirect('users.php');
    }else{
        addAlert('danger', 'Incomplete form data!');
    }
}