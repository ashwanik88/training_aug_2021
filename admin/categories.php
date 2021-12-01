<?php 
require_once('includes/startup.php');
require_once('library/categories_lib.php');
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
      <a href="category-form.php" class="btn btn-primary">Add Category</a>
    </div>
  </div>
<?php displayAlert();?>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" onclick="$('.chk').prop('checked', $(this).is(':checked'));" /></th>
          <th scope="col"><a href="categories.php?sort=category_id&order=<?php echo $order; ?><?php echo $page_url; ?>">ID 
          <?php if($sort == 'category_id'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?>
          </a></th>
          <th scope="col"><a href="categories.php?sort=category_name&order=<?php echo $order; ?><?php echo $page_url; ?>">Category Name <?php if($sort == 'category_name'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col"><a href="categories.php?sort=parent_id&order=<?php echo $order; ?><?php echo $page_url; ?>">Parent ID <?php if($sort == 'parent_id'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col"><a href="categories.php?sort=sort_order&order=<?php echo $order; ?><?php echo $page_url; ?>">Sort Order <?php if($sort == 'sort_order'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col"><a href="categories.php?sort=status&order=<?php echo $order; ?><?php echo $page_url; ?>">Status <?php if($sort == 'status'){ ?>
          <i class="fas fa-sort-<?php echo ($order == 'ASC')?'down':'up';?>"></i>
          <?php } ?></a></th>
          <th scope="col">Action</th>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" size="1" name="filter_category_id" id="filter_category_id" value="<?php echo $filter_category_id; ?>" /></td>
            <td><input type="text" size="5" name="filter_category_name" id="filter_category_name" value="<?php echo $filter_category_name; ?>" /></td>
            <td><input type="text" size="5" name="filter_parent_id" id="filter_parent_id" value="<?php echo $filter_parent_id; ?>" /></td>
            <td><input type="text" size="5" name="filter_sort_order" id="filter_sort_order" value="<?php echo $filter_sort_order; ?>" /></td>
            <td><select name="filter_status" id="filter_status">
              <option value="" >All</option>
              <option value="0" <?php echo ($filter_status === 0)?'selected':''; ?>>Inactive</option>
              <option value="1" <?php echo ($filter_status === 1)?'selected':''; ?>>Active</option>
            </select></td>
            <td>
            <button type="button" class="btn btn-info btn-sm btnFilter">Filter</button>
            </td>

        </tr>
      </thead>
      <tbody>

      <?php if(sizeof($data_categories)){ ?>
        <?php foreach($data_categories as $data_category){ ?>
        <tr>
          <td><input type="checkbox" name="category_ids[]" value="<?php echo $data_category['category_id']; ?>" class="chk" /></td>
          <td><?php echo $data_category['category_id']; ?></td>
          <td><?php echo $data_category['category_name']; ?></td>
          <td><?php echo $data_category['parent_id']; ?></td>
          <td><?php echo $data_category['sort_order']; ?></td>
          <td><?php echo ($data_category['status'] == 1)?'Active':'Inactive'; ?></td>
          <td>
            <a href="category-form.php?category_id=<?php echo $data_category['category_id']; ?>">Edit</a>
             | 
            <a href="categories.php?action=delete&category_id=<?php echo $data_category['category_id']; ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
          </td>
          
        </tr>
        <?php } ?>
      <?php }else{ ?>
      <tr><td colspan="8" class="text-center text-danger"> No record found! </td></tr>  
      <?php } ?>

      </tbody>
    </table>

  <?php if($total_categories > $page_limit){ ?>
  <nav aria-label="...">
    <ul class="pagination">
    <?php if($page > 1){ ?>
      <li class="page-item"><a class="page-link" href="categories.php?page=<?php echo $page-1; ?><?php echo $sort_url; ?>">Prev</a></li>
      <?php }else{ ?>
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Prev</a></li>
      <?php } ?>
      <?php for($n = 1; $n <= ceil($total_categories / $page_limit); $n++){ ?>
      <li class="page-item <?php echo ($page == $n)?'active':'';?>"><a class="page-link" href="categories.php?page=<?php echo $n; ?><?php echo $sort_url; ?>"><?php echo $n; ?></a></li>
      <?php } ?>
      <?php if($page < $n - 1){ ?>
      <li class="page-item"><a class="page-link" href="categories.php?page=<?php echo $page+1; ?><?php echo $sort_url; ?>">Next</a></li>
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
  var filter_url = 'categories.php?';
  $('.btnFilter').click(function(){

    var filter_category_id = $('#filter_category_id').val();
    if(filter_category_id != ''){
      filter_url += '&filter_category_id=' + filter_category_id;
    }

    var filter_category_name = $('#filter_category_name').val();
    if(filter_category_name != ''){
      filter_url += '&filter_category_name=' + filter_category_name;
    }

    window.location.href = filter_url;
  });
</script>
<?php require_once('common/html_end.php'); ?>