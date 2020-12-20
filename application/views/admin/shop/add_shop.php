<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Shop</h1>
  <a href="<?php echo base_url();?>View_admin/shop/list_shop" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Shop</a>
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
      <h6 class="m-0 font-weight-bold text-primary">Add Shop Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Insert/shop/shop/add_shop/list_shop " method="post" enctype="multipart/form-data" >
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Shop Name  </label>
            <div class="col-sm-12">
            <input type="text" name= "shop_name" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Shop Name" required>
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="type" value="shop">
            </div>
        </div>
        
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Owner Name </label>
            <div class="col-sm-12">
            <input type="text" name= "owner_name" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Owner Name" required>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Contact</label>
            <div class="col-sm-12">
            <input type="text" name= "contact" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Contact" required>
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Secondary Contact(Optional)</label>
            <div class="col-sm-12">
            <input type="text" name= "sec_contact" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Secondary Contact" >
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Email</label>
            <div class="col-sm-12">
            <input type="text" name= "email" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Address</label>
            <div class="col-sm-12">
            <textarea name= "address" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Address" required></textarea>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Username</label>
            <div class="col-sm-12">
            <input type="text" name= "user_name" id="" class="form-control mobile_full" id="inputEmail3" placeholder="User Name" required>
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Password</label>
            <div class="col-sm-12">
            <input type="text" name= "password" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Password" required>
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
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('admin/include/footer'); ?>
