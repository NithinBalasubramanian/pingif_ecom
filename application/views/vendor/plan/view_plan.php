<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu');?>

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
    <div class="row">
    <?php $plan=$this->Admin_model->table_column('plan');
    if(count($plan) > 0)
    {
        foreach($plan as $row)
        { ?>
            <div class="col-md-3 plan">
            <h2 style="color: mediumvioletred;font-weight:bold;"><?php echo $row['plan']; ?></h2>
            <p>Price : <?php echo $row['price']; ?></p><p>Discount : <?php echo $row['discount']; ?></p>
            <h4 style="color: green;font-weight:bold;">Rs: <?php echo $row['seling']; ?></h4>
            <p>Per User / Month</p>
            <button type="button" class="btn btn-sm btn-primary col-md-12">Select this Plan</button>
            <hr>
            <p>Validation : <?php echo $row['validation']; ?></p>
            <p>Free Plan : <?php echo $row['free_plan']; ?></p>
            <p>Features Type : 
            <?php $feat=$this->Admin_model->table_column('plan_data','plan_id',$row['id']);
            if(count($feat) > 0)
            {
                foreach($feat as $f_row)
                { ?>
                     <ul class="ul" style="margin-left: -55px;"><li><?php echo $f_row['type']; ?></li></ul>
          <?php }
            }
            ?>
            </p>
            </div>
  <?php }
    }
    
    ?>
        
    </div>
    </div>
  </div>
</div>
</div>

</div>



<?php $this->load->view('vendor/include/footer');?>

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


