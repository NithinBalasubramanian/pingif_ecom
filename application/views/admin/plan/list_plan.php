<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Plan</h1>
  <!-- <a href="<?php echo base_url();?>View_admin/category/add_category" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Customer</a> -->
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Plan</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Plan Name</th>
                  <th>Validation</th>
                  <th>Free Plan</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Selling Price</th>
                    <th>Features Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->Admin_model->table_column($tablename='plan');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p_row['plan']; ?></td>
                  <td><?php echo $p_row['validation']; ?></td>
                  <td><?php echo $p_row['free_plan']; ?></td>
                  <td><?php echo $p_row['price']; ?></td>
                  <td><?php echo $p_row['discount']; ?></td>
                  <td><?php echo $p_row['seling']; ?></td>
                  <td>
                 <?php $plan_type=$this->Admin_model->table_column('plan_data','plan_id',$p_row['id']);
                 if(count($plan_type) > 0)
                 {
                     foreach($plan_type as $row)
                     { ?>
                        <ul><li><?php echo $row['type']; ?></li></ul>
                     <?php }
                 }
                 ?>
                 </td>
                  <td><label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $p_row['id']; ?>" value="<?php echo $p_row['status']; ?>" <?php if($p_row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label></td>
                  <td><a href="<?php echo base_url();?>View_admin/plan/edit_plan/<?php echo $p_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a>
                  <a href="javascript:void(0)"><i class="fa fa-trash-o per_delete"  aria-hidden="true" data-id="<?php echo $p_row['id']; ?>" data-table="shop" style="font-size:20px;"></i></a> 
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
            'tablename' : 'plan'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>

<?php $this->load->view('admin/include/footer');?>




