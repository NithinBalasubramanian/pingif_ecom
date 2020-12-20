<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Products</h1>
  <a href="<?php echo base_url();?>View_vendor/products/add_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>Add Products</a>
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Products</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Shop Id</th>
                  <th>Sub Category</th>
                  <th>Product Name</th>
                  <th>Product Image</th>
                  <th>Price</th>
                  <th>Selling Price</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
             $product=$this->Admin_model->table_column($tablename='shop_products');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p_row['customer_id']; ?></td>
                  <?php $profile=$this->Admin_model->table_column('shop_sub_category','id',$p_row['sub_category_id']);
                  if(count($profile) > 0)
                  {
                      foreach($profile as $row)
                      { ?>
                            <td><?php echo $row['sub_category']; ?></td>
                <?php  }
                  } ?>
                 
                    <td><?php echo $p_row['product']; ?></td>
                    <td><img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $p_row['img']; ?>" width="60px" height="60px"></td>
                    <td><?php echo $p_row['price']; ?></td>
                    <td><?php echo $p_row['sell_price']; ?></td>
                    <td><?php echo $p_row['description']; ?></td>
                    <td><label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $p_row['id']; ?>" value="<?php echo $p_row['status']; ?>" <?php if($p_row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label></td>
                 <td><a href="javascript:void(0)" class="btn btn-sm btn-danger per_delete" data-id="<?php echo $p_row['id']; ?>" data-table="shop_products">Delete</a></td>
                </tr>
              <?php $i++; } ?>
            <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>
</div>

</div>

<?php $this->load->view('admin/include/footer');?>
<script>
$(document).ready(function(){
$('.switchery').on('click', function (event) {
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
        url: base_url+"admin/status",
        type: 'POST',
        dataType: 'json',
        data : {
            'id' : $(this).attr("data-rowid"),
            'tablename' : 'shop_products'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>