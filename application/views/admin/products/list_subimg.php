<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Subimage</h1>
  <a href="<?php echo base_url();?>View_admin/products/list_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>List Products</a>
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7"  style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Subimages</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Primary Color</th>
                  <th>Sub Images</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->Admin_model->table_column($tablename='products','id',$edit_id);
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                    <td><?php echo $p_row['primary_color']; ?></td>
                    <td>
                        <?php $sub=explode(',',$p_row['sub_images']);
                        foreach($sub as $row){ ?>
                    <img src="<?php echo base_url(); ?>assets/<?php echo $p_row['product_by']; ?>/img/sub_products/<?php echo $row; ?>" width="100px" height="100px" style="margin:15px;">
                    <?php } ?>
                </td>
                <td></td>
                </tr>
              <?php $product_by=$p_row['product_by']; $i++; } ?>
            <?php } ?>
            <?php $product_sub=$this->Admin_model->table_column($tablename='product_sub','product_id',$edit_id);
            if(count($product_sub)>0){
              foreach($product_sub as $s_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                    <td><?php echo $s_row['color']; ?></td>
                    <td>
                    <?php  $sub=explode(',',$s_row['sub_img']);
                foreach($sub as $row){ ?>
                    <img src="<?php echo base_url(); ?>assets/<?php echo $product_by; ?>/img/sub_products/<?php echo $row; ?>" width="100px" height="100px" style="margin:15px;">
                    <?php } ?>
                    </td>
                <td></td>
                </tr>
              <?php $i++;  } ?>
            <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    
$('.switchery').on('click', function (event) {
   
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
        url: base_url+"Admin/status",
        type: 'POST',
        dataType: 'json',
        data : {
            'id' : $(this).attr("data-rowid"),
            'tablename' : 'products'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
$('.switchery_deal').on('click', function (event) {
   
   var base_url = "<?php echo base_url(); ?>";
   $.ajax({
       url: base_url+"Admin/today",
       type: 'POST',
       dataType: 'json',
       data : {
           'id' : $(this).attr("data-rowid"),
           'tablename' : 'products'
       },
       success: function(data) {
           //console.log(data);
       }
   }); 
});
$('.switchery_express').on('click', function (event) {
   
   var base_url = "<?php echo base_url(); ?>";
   $.ajax({
       url: base_url+"Admin/express",
       type: 'POST',
       dataType: 'json',
       data : {
           'id' : $(this).attr("data-rowid"),
           'tablename' : 'products'
       },
       success: function(data) {
           //console.log(data);
       }
   }); 
});
});
</script>

<?php $this->load->view('admin/include/footer');?>





