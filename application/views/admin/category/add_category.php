<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Category</h1>
  <a href="<?php echo base_url();?>View_admin/category/list_category" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Category</a>
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
      <h6 class="m-0 font-weight-bold text-primary">Add Category Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Insert/category/category/add_category/list_category " method="post" enctype="multipart/form-data" >
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Category  </label>
            <div class="col-sm-12">
            <input type="text" name= "category" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Category" required>
            <input type="hidden" name="status" value="1">
            </div>
        </div>
        
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Banner 1 Image </label>
            <div class="col-sm-12">
                <input type="file" name="banner1" class="custom-file-input" id="exampleInputFile" >
                <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Banner 2 Image </label>
            <div class="col-sm-12">
                <input type="file" name="banner2" class="custom-file-input" id="exampleInputFile" >
                <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
            </div>
        </div>
        </div>
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-gradient-green pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
    </form>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('admin/include/footer'); ?>
