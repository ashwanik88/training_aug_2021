<?php

function redirect($url){
    header("Location: " . $url);
    die;
}

function checkAdminLogin(){
    if(!isLogin()){
        redirect("index.php");
        die;
    }
}

function isLogin(){
    if(!isset($_SESSION['admin_user']) || empty($_SESSION['admin_user'])){
        return false;
    }
    return true;
}

function addAlert($type, $msg){
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['msg'] = $msg;
}

function displayAlert(){
    if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){ ?>
        <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['alert']['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['alert']); 
    }
}

function changeDate($date){
    return date('d/m/Y h:i:s A', strtotime($date));
}