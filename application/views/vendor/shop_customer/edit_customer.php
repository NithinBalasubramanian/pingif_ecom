<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Customer</h1>
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
      <h6 class="m-0 font-weight-bold text-primary">Edit Customer Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Update_all/shop_cus/shop_customer/<?php echo $edit_id; ?>/edit_customer/list_customer " method="post" enctype="multipart/form-data" >
    <?php $cus=$this->Admin_model->table_column('shop_cus','id',$edit_id);
    if(count($cus) > 0)
    {
        foreach($cus as $row)
        { ?>
            <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Customer Name  </label>
            <div class="col-sm-12">
            <input type="text" name= "name" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['name']; ?>">
            
            </div>
        </div>
        
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Contact</label>
            <div class="col-sm-12">
            <input type="text" name= "contact" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['contact']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Secondary Contact</label>
            <div class="col-sm-12">
            <input type="text" name= "sec_contact" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['sec_contact']; ?>">
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Email</label>
            <div class="col-sm-12">
            <input type="text" name= "email" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['email']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">address</label>
            <div class="col-sm-12">
            <textarea name= "address" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['address']; ?>"><?php echo $row['address']; ?></textarea>
            </div>
        </div>
        
        </div>

       
       

        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="padding:10px;">
        <button type="submit" class="btn btn-success btn-sm pull-right" >Submit</button>
        </div>
  <?php }
    }
    
    ?>
        
        <!-- /.box-footer -->
    </form>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('vendor/include/footer'); ?>
