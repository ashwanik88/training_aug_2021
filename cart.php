<?php require_once('includes/startup.php'); ?>
<?php require_once('library/index_lib.php'); ?>
<?php require_once('common/html_start.php'); ?>
<?php require_once('common/css.php'); ?>
<?php require_once('common/body_start.php'); ?>
<?php require_once('common/header.php'); ?>

<?php echo '<pre>'; print_r($_SESSION['cart']); if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ 
    foreach($_SESSION['cart'] as $product_id){
        $product_data = getProduct($product_id);
        
    }

 }else{

    echo 'No item added to cart!';

 }?>

<?php require_once('common/footer.php');?>
<?php require_once('common/script.php');?>
<script type="text/javascript">

    </script>
<?php require_once('common/html_end.php');?>