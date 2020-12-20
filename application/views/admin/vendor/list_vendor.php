<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Vendor</h1>
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Vendor</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Vendor Name</th>
                  <th>email</th>
                  <th>Verify</th>
                  <th>Profile</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $product=$this->Admin_model->table_column($tablename='vendor');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p_row['name']; ?></td>
                  <td><?php echo $p_row['email']; ?></td>
                  <td><label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $p_row['id']; ?>" value="<?php echo $p_row['verify']; ?>" <?php if($p_row['verify'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label></td>
                 <td><a href="<?php echo base_url();?>View_admin/vendor/view_profile/<?php echo $p_row['id'];?>" class="btn btn-sm btn-info">Profile</a></td>
                  <td>
                  <a href="<?php echo base_url();?>Delete////<?php echo $p_row['id'];?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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
    
$('.switchery').on('click', function (event) {
   
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
        url: base_url+"Admin/verify",
        type: 'POST',
        dataType: 'json',
        data : {
            'id' : $(this).attr("data-rowid"),
            'tablename' : 'vendor'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>
<?php $this->load->view('admin/include/footer');?>




