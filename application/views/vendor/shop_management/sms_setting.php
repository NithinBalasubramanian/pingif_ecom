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
    $sms_condition=$this->Admin_model->table_column('sms_setting','id',$shop_id);
    if(count($sms_condition) > 0)
    { ?>
          <form class="form-horizontal" action="<?php echo base_url();?>Edit_setting_vendor/sms_setting/shop_management/sms_setting" method="post" enctype="multipart/form-data" >
        <?php
        $shop_id = $this->session->userdata('id');
        $sms=$this->Admin_model->table_column('sms_setting','shop_id',$shop_id);
        if(count($sms) > 0)
        {
            foreach($sms as $row)
            { ?>
                <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">SMS Name  </label>
            <div class="col-sm-12">
            <input type="text" name= "sms_name" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['sms_name']; ?>">
           
            </div>
        </div>
        
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">API</label>
            <div class="col-sm-12">
            <input type="text" name= "api" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['api']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">API Key</label>
            <div class="col-sm-12">
            <input type="text" name= "api_key" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['api_key']; ?>">
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Type</label>
            <div class="col-sm-12">
            <input type="text" name= "type" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['type']; ?>" >
            </div>
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
<?php  }else { ?>
    <form class="form-horizontal" action="<?php echo base_url();?>Insert_Vendor/sms_setting/shop_management/sms_setting" method="post" enctype="multipart/form-data" >
       
       <div class="box-body">
<div class="row">
<div class="form-group col-md-6">
   <label for="inputEmail3" class="col-sm-6 control-label">SMS Name  </label>
   <div class="col-sm-12">
   <input type="text" name= "sms_name" id="" class="form-control mobile_full" id="inputEmail3" placeholder="SMS Name">
  
   </div>
</div>

<div class="form-group col-md-6">
<label for="inputEmail3" class="col-sm-6 control-label">API</label>
   <div class="col-sm-12">
   <input type="text" name= "api" id="" class="form-control mobile_full" id="inputEmail3" placeholder="API">
   </div>
</div>
</div>

<div class="row">
<div class="form-group col-md-6">
<label for="inputEmail3" class="col-sm-6 control-label">API Key</label>
   <div class="col-sm-12">
   <input type="text" name= "api_key" id="" class="form-control mobile_full" id="inputEmail3" placeholder="API Key">
   </div>
</div>
<div class="form-group col-md-6">
<label for="inputEmail3" class="col-sm-6 control-label">Type</label>
   <div class="col-sm-12">
   <input type="text" name= "type" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Type" >
   </div>
</div>
</div>
</div>
</div>
<!-- /.box-body -->
<div class="box-footer" style="padding:10px;">
<button type="submit" class="btn btn-success btn-sm pull-right" >Submit</button>
</div>
<!-- /.box-footer -->
</form>
    <?php } ?>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('vendor/include/footer'); ?>
