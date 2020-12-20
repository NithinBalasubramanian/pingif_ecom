<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / SMS Setting</h1>
  <!-- <a href="<?php echo base_url();?>View_admin/shop/list_shop" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Shop</a> -->
  <!-- <button type="button" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm " style="float:right" data-toggle="modal" data-target="#add_area">
  Add Area
</button>
  <a href="<?php echo base_url();?>index.php/View/customer/list_customer" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Customers</a> -->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">SMS Setting Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <?php 
    $shop_id = $this->session->userdata('id');
    $email_condition=$this->Admin_model->table_column('email_setting','id',$shop_id);
    if(count($email_condition) > 0)
    { ?>
        <form class="form-horizontal" action="<?php echo base_url();?>Edit_setting_vendor/email_setting/shop_management/email_setting" method="post" enctype="multipart/form-data" >
        <?php
        $shop_id = $this->session->userdata('id');
        $sms=$this->Admin_model->table_column('email_setting','shop_id',$shop_id);
        if(count($sms) > 0)
        {
            foreach($sms as $row)
            { ?>
                <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
            <label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $row['id']; ?>" value="<?php echo $row['status']; ?>" <?php if($row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label>
            </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">SMTP Port</label>
            <div class="col-sm-12">
            <input type="text" name= "port" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['port']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">SMTP Host</label>
            <div class="col-sm-12">
            <input type="text" name= "host" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['host']; ?>">
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Username</label>
            <div class="col-sm-12">
            <input type="text" name= "username" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['username']; ?>" >
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Password</label>
            <div class="col-sm-12">
            <input type="text" name= "password" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['password']; ?>">
            </div>
        </div>

        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="padding:10px;">
        <button type="submit" class="btn btn-success btn-sm pull-right" >Edit</button>
        </div>
      <?php }
        }
        
        ?>
        
        <!-- /.box-footer -->
    </form>
<?php  } else {
    ?>
    <form class="form-horizontal" action="<?php echo base_url();?>Insert_Vendor/email_setting/shop_management/email_setting" method="post" enctype="multipart/form-data" >
        
                <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
            <label class="switch">
                        <input type="checkbox" class="switchery" data-rowid="<?php echo $row['id']; ?>" value="<?php echo $row['status']; ?>" <?php if($row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label>
            </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">SMTP Port</label>
            <div class="col-sm-12">
            <input type="text" name= "port" id="" class="form-control mobile_full" id="inputEmail3" placeholder="SMTP Port">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">SMTP Host</label>
            <div class="col-sm-12">
            <input type="text" name= "host" id="" class="form-control mobile_full" id="inputEmail3" placeholder="SMTP Host">
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Username</label>
            <div class="col-sm-12">
            <input type="text" name= "username" id="" class="form-control mobile_full" id="inputEmail3"  placeholder="Username">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Password</label>
            <div class="col-sm-12">
            <input type="text" name= "password" id="" class="form-control mobile_full" id="inputEmail3"  placeholder="Password">
            </div>
        </div>

        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="padding:10px;">
        <button type="submit" class="btn btn-success btn-sm pull-right" >Submit</button>
        </div>
    </form>
    <?php } ?>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('vendor/include/footer'); ?>
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
            'tablename' : 'email_setting'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>