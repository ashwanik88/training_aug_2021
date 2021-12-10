<?php

checkAdminLogin();

$document_title = 'Add User';
$user_id = 0;
$username = '';
$email = '';
$phone = '';
$fullname = '';
$photo = '';
$status = 0;


if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $document_title = 'Edit User : ' . $user_id;
    $user_data = getUser($user_id);
    if($user_data){
    $username = $user_data['username'];
    $email = $user_data['email'];
    $phone = $user_data['phone'];
    $fullname = $user_data['fullname'];
    $photo = $user_data['photo'];
    $status = $user_data['status'];
    }else{
        addAlert('danger', 'User ID not found!');
        redirect('users.php');
    }
}

if($_POST){
    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['fullname']) && !empty($_POST['fullname'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fullname = $_POST['fullname'];
        $status = (isset($_POST['status']))?1:0;

        // if(!alreadyExist($con, $username)){
        if(!alreadyExist($username, $user_id)){
            if($confirm == $password){
                echo '<pre>';
                print_r($_FILES['additional_photos']);
                $additional_files = array();
                if(isset($_FILES['additional_photos']) && !empty($_FILES['additional_photos'])){
                    if(sizeof($_FILES['additional_photos']['name'])){
                        foreach($_FILES['additional_photos']['name'] as $key=>$val){
                            $afile['name'] = $_FILES['additional_photos']['name'][$key];
                            $afile['type'] = $_FILES['additional_photos']['type'][$key];
                            $afile['tmp_name'] = $_FILES['additional_photos']['tmp_name'][$key];
                            $afile['error'] = $_FILES['additional_photos']['error'][$key];
                            $afile['size'] = $_FILES['additional_photos']['size'][$key];
                            
                            $additional_files[] = uploadFile($afile);
                        }
                    }
                }
                print_r($additional_files);
die;
                $new_photo = uploadFile($_FILES['photo']);
                if($new_photo){

                    if(!empty($photo)){
                        unlink( '../uploads/' . $photo);
                    }

                    $photo = $new_photo;
                }

                if($user_id){
                    $sql = "UPDATE users SET username='". $username ."', email='". $email ."', phone='". $phone ."', fullname='". $fullname ."', photo='". $photo ."', status='". (int)$status ."', date_modified=NOW() WHERE user_id='". $user_id ."'";
                    addAlert('success', 'User added successfully!');

                    if(!empty($password)){
                        $sql_pass = "UPDATE users SET password='". md5($password) ."', date_modified=NOW() WHERE user_id='". $user_id ."'";
                        mysqli_query($con, $sql_pass);
                    }

                }else{
                    $sql = "INSERT users SET username='". $username ."', password='". md5($password) ."', email='". $email ."', phone='". $phone ."', fullname='". $fullname ."', photo='". $photo ."', status='". (int)$status ."', date_added=NOW()";
                    addAlert('success', 'User added successfully!');
                }

                mysqli_query($con, $sql);
                redirect('users.php');

            }else{
                addAlert('danger', 'Confirm password not matched!');
            }
        }else{
            addAlert('danger', 'Username already exists!');
        }   

    }else{
        addAlert('danger', 'Incomplete form data!');
    }
}

// function alreadyExist($con, $username){  // without global 
function alreadyExist($username, $user_id){
    global $con;
    $sql = "SELECT * FROM users WHERE username='". $username ."' AND user_id!='". $user_id ."'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
}

function getUser($user_id){
    global $con;
    $sql = "SELECT * FROM users WHERE user_id='". (int)$user_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }

    return $rec;
}

function uploadFile($file_var){
    if(isset($file_var['name']) && !empty($file_var['name'])){
        $filename = time() . '_'. $file_var['name'];
        $src = $file_var['tmp_name'];
        (copy($src, '../uploads/' . $filename));
        return $filename;
    }else{
        return false;
    }
}

/*
0) password visible option
1) Update query after submit
2) avoid empty password update
3) Username already exists

*/

