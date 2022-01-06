<?php

checkAdminLogin();

$document_title = 'Add Product';
$product_id = 0;
$productname = '';
$description = '';
$price = '';
$photo = '';
$status = 0;
$product_uploads = array();

if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $document_title = 'Edit Product : ' . $product_id;
    $product_data = getProduct($product_id);
    $product_uploads = getProductUploads($product_id);
    if($product_data){
    $productname = $product_data['productname'];
    $description = $product_data['description'];
    $price = $product_data['price'];
    $photo = $product_data['photo'];
    $status = $product_data['status'];
    }else{
        addAlert('danger', 'Product ID not found!');
        redirect('products.php');
    }
}

if($_POST){
    if(isset($_POST['productname']) && !empty($_POST['productname']) && isset($_POST['price']) && !empty($_POST['price'])){
        $productname = $_POST['productname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $status = (isset($_POST['status']))?1:0;

        // if(!alreadyExist($con, $productname)){
        if(!alreadyExist($productname, $product_id)){
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

                $new_photo = uploadFile($_FILES['photo']);
                if($new_photo){
                    if(!empty($photo)){
                        unlink( '../uploads/' . $photo);
                    }
                    $photo = $new_photo;
                }

                if($product_id){
                    $sql = "UPDATE products SET productname='". $productname ."', email='". $email ."', description='". $description ."', price='". $price ."', photo='". $photo ."', status='". (int)$status ."', date_modified=NOW() WHERE product_id='". $product_id ."'";
                    addAlert('success', 'Product added successfully!');
                    mysqli_query($con, $sql);
                    if(!empty($password)){
                        $sql_pass = "UPDATE products SET password='". md5($password) ."', date_modified=NOW() WHERE product_id='". $product_id ."'";
                        mysqli_query($con, $sql_pass);
                    }

                }else{
                    $sql = "INSERT products SET productname='". $productname ."', password='". md5($password) ."', email='". $email ."', description='". $description ."', price='". $price ."', photo='". $photo ."', status='". (int)$status ."', date_added=NOW()";
                    addAlert('success', 'Product added successfully!');
                    $rs = mysqli_query($con, $sql);
                    $product_id = mysqli_insert_id($con);
                }

                if(sizeof($additional_files)){
                    foreach($additional_files as $additional_file){
                        $sql_photos = "INSERT INTO products_photos SET product_id='". $product_id ."', filename='". $additional_file ."', date_added=NOW()";
                        mysqli_query($con, $sql_photos);
                    }
                }
                

                
                redirect('products.php');

            
        }else{
            addAlert('danger', 'Product Name already exists!');
        }   

    }else{
        addAlert('danger', 'Incomplete form data!');
    }
}

// function alreadyExist($con, $productname){  // without global 
function alreadyExist($productname, $product_id){
    global $con;
    $sql = "SELECT * FROM products WHERE productname='". $productname ."' AND product_id!='". $product_id ."'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
}

function getProduct($product_id){
    global $con;
    $sql = "SELECT * FROM products WHERE product_id='". (int)$product_id ."'";
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


function getProductUploads($product_id){
    global $con;
    $sql = "SELECT * FROM products_photos WHERE product_id='". (int)$product_id ."'";
    $rs = mysqli_query($con, $sql);
    $data = array();
    if(mysqli_num_rows($rs)){
        while($rec = mysqli_fetch_assoc($rs)){
            $data[] = $rec;
        }
    }
    return $data;
}

/*
0) password visible option
1) Update query after submit
2) avoid empty password update
3) Product Name already exists

*/

