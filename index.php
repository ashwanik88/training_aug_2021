<?php require_once('includes/startup.php'); ?>
<?php require_once('library/index_lib.php'); ?>
<?php require_once('common/html_start.php'); ?>
<?php require_once('common/css.php'); ?>
<?php require_once('common/body_start.php'); ?>
<?php require_once('common/header.php'); ?>





<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Our Projects</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    <li class="mx-2" data-filter=".first">General Carpentry</li>
                    <li class="mx-2" data-filter=".second">Custom Carpentry</li>
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">

            <?php if(sizeof($data_products)){ foreach($data_products as $data_product){ ?>
            
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/portfolio-1.jpg" alt="">
                        <div class="portfolio-overlay">
                            <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="border border-5 border-light border-top-0 p-4">
                        <p class="text-primary fw-medium mb-2"><?php echo $data_product['productname']; ?></p>
                        <h5 class="lh-base mb-0"><?php echo priceFormat($data_product['price']); ?>
                        <a href="javascript:void(0);" class="btn btn-warning">Add to cart</a>
                    </div>
                </div>
            </div>

            <?php } }?>


        </div>
    </div>
</div>
<!-- Projects End -->







<?php require_once('common/footer.php');?>
<?php require_once('common/script.php');?>
<?php require_once('common/html_end.php');?>