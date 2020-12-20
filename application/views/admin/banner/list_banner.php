<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Banner</h1>
  <a href="<?php echo base_url();?>View_admin/banner/add_banner" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Banner</a>
 
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Banner</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Location</th>
                  <th> Image</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->Admin_model->table_column($tablename='banner');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                    <td><?php echo $p_row['location']; ?></td>
                    <td><img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $p_row['img']; ?>" width="220px" height="100px"></td>
                 
                  <td><label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $p_row['id']; ?>" value="<?php echo $p_row['status']; ?>" <?php if($p_row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label></td>
                  <td>
                  <a href="<?php echo base_url();?>Delete/banner/banner/list_banner/<?php echo $p_row['id'];?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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
<script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
$(document).ready(function(){
    
$('.switchery').on('click', function () {
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
        url: base_url+"Admin/status",
        type: 'POST',
        dataType: 'json',
        data : {
            'id' : $(this).attr("data-rowid"),
            'tablename' : 'banner'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>
<?php $this->load->view('admin/include/footer');?>





