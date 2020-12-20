<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Customers</h1>
  <!-- <a href="<?php echo base_url();?>View_admin/category/add_category" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Customer</a> -->
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Customers</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>contact</th>
                  <th>Blocked</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->Admin_model->table_column($tablename='customer');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p_row['name']; ?></td>
                  <td><?php echo $p_row['email']; ?></td>
                  <td><?php echo $p_row['contact']; ?></td>
                  <td><label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $p_row['id']; ?>" value="<?php echo $p_row['status']; ?>" <?php if($p_row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label></td>
                  <td><a href="<?php echo base_url();?>View_admin/category/edit_category/<?php echo $p_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a>
                  <!-- <a href="<?php echo base_url();?>Delete/category/category/list_category/<?php echo $p_row['id'];?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a> -->
                  </td>
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
        url: base_url+"Admin/status",
        type: 'POST',
        dataType: 'json',
        data : {
            'id' : $(this).attr("data-rowid"),
            'tablename' : 'customer'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>

<?php $this->load->view('admin/include/footer');?>




