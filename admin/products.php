<?php 
require_once('includes/startup.php');
require_once('library/products_lib.php');
?>
<?php require_once('common/html_start.php'); ?>
<link href="css/dashboard.css" rel="stylesheet">
<?php require_once('common/body_start.php'); ?> 
<?php require_once('common/header.php'); ?> 
<?php require_once('common/sidebar.php'); ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <form action="" method="POST">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $document_title; ?></h1>
    <div class=" mb-2 mb-md-0">
      <input type="submit" value="Delete" class="btn btn-danger" name="btnDelete" onclick="return confirm('Are you sure want to delete this?');" /> 
      <a href="product-form.php" class="btn btn-primary">Add Product</a>
    </div>
  </div>
<?php displayAlert();?>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" onclick="$('.chk').prop('checked', $(this).is(':checked'));" /></th>
          <th scope="col"><a href="products.php?sort=product_id&order=<?php echo $order; ?><?php echo $page_url; ?>">ID 
          <?php if($sort == 'product_id'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?>
          </a></th>
          <th scope="col"><a href="products.php?sort=productname&order=<?php echo $order; ?><?php echo $page_url; ?>">Product Name <?php if($sort == 'productname'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          
          <th scope="col"><a href="products.php?sort=description&order=<?php echo $order; ?><?php echo $page_url; ?>">Phone <?php if($sort == 'description'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col"><a href="products.php?sort=price&order=<?php echo $order; ?><?php echo $page_url; ?>">Price <?php if($sort == 'price'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col"><a href="products.php?sort=status&order=<?php echo $order; ?><?php echo $page_url; ?>">Status <?php if($sort == 'status'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col"><a href="products.php?sort=date_added&order=<?php echo $order; ?><?php echo $page_url; ?>">Date Added <?php if($sort == 'date_added'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col">Action</th>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" size="1" name="filter_product_id" id="filter_product_id" value="<?php echo $filter_product_id; ?>" /></td>
            <td><input type="text" size="5" name="filter_productname" id="filter_productname" value="<?php echo $filter_productname; ?>" /></td>
            <td><input type="text" size="5" name="filter_description" id="filter_description" value="<?php echo $filter_description; ?>" /></td>
            <td><input type="text" size="5" name="filter_price" id="filter_price" value="<?php echo $filter_price; ?>" /></td>
            <td><select name="filter_status" id="filter_status">
              <option value="" >All</option>
              <option value="0" <?php echo ($filter_status === 0)?'selected':''; ?>>Inactive</option>
              <option value="1" <?php echo ($filter_status === 1)?'selected':''; ?>>Active</option>
            </select></td>
            <td><input type="date" size="5" name="filter_date_added" id="filter_date_added" value="<?php echo $filter_date_added; ?>" /></td>
            <td>
            <button type="button" class="btn btn-info btn-sm btnFilter">Filter</button>
            </td>

        </tr>
      </thead>
      <tbody>

      <?php if(sizeof($data_products)){ ?>
        <?php foreach($data_products as $data_product){ ?>
        <tr>
          <td><input type="checkbox" name="product_ids[]" value="<?php echo $data_product['product_id']; ?>" class="chk" /></td>
          <td><?php echo $data_product['product_id']; ?></td>
          <td><?php echo $data_product['productname']; ?></td>
          <td><?php echo $data_product['description']; ?></td>
          <td><?php echo $data_product['price']; ?></td>
          <td><?php echo ($data_product['status'] == 1)?'Active':'Inactive'; ?></td>
          <td><?php echo changeDate($data_product['date_added']); ?></td>
          <td>
            <a href="product-form.php?product_id=<?php echo $data_product['product_id']; ?>">Edit</a>
             | 
            <a href="products.php?action=delete&product_id=<?php echo $data_product['product_id']; ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
          </td>
          
        </tr>
        <?php } ?>
      <?php }else{ ?>
      <tr><td colspan="8" class="text-center text-danger"> No record found! </td></tr>  
      <?php } ?>

      </tbody>
    </table>

  <?php if($total_products > $page_limit){ ?>
  <nav aria-label="...">
    <ul class="pagination">
    <?php if($page > 1){ ?>
      <li class="page-item"><a class="page-link" href="products.php?page=<?php echo $page-1; ?><?php echo $sort_url; ?>">Prev</a></li>
      <?php }else{ ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Prev</a></li>
      <?php } ?>
      <?php for($n = 1; $n <= ceil($total_products / $page_limit); $n++){ ?>
      <li class="page-item <?php echo ($page == $n)?'active':'';?>"><a class="page-link" href="products.php?page=<?php echo $n; ?><?php echo $sort_url; ?>"><?php echo $n; ?></a></li>
      <?php } ?>
      <?php if($page < $n - 1){ ?>
      <li class="page-item"><a class="page-link" href="products.php?page=<?php echo $page+1; ?><?php echo $sort_url; ?>">Next</a></li>
      <?php }else{ ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Next</a></li>
      <?php } ?>
    </ul>
  </nav>
  <?php } ?>
  </div>
      </form>
</main>
<?php require_once('common/scripts.php'); ?>

<script src="js/common.js"></script>

<script type="text/javascript">
  var filter_url = 'products.php?';
  $('.btnFilter').click(function(){

    var filter_product_id = $('#filter_product_id').val();
    if(filter_product_id != ''){
      filter_url += '&filter_product_id=' + filter_product_id;
    }

    var filter_productname = $('#filter_productname').val();
    if(filter_productname != ''){
      filter_url += '&filter_productname=' + filter_productname;
    }

    window.location.href = filter_url;
  });
</script>
<?php require_once('common/html_end.php'); ?>