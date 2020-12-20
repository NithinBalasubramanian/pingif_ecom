<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Brand</h1>
  <a href="<?php echo base_url();?>View_admin/brands/list_brands" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Brands</a>
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
      <h6 class="m-0 font-weight-bold text-primary">Add Brand Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Insert/brands/brands/add_brands/list_brands " method="post" enctype="multipart/form-data" >
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label"> Category  </label>
            
            <select name="category_id" class="form-control mobile_full" id="category">
            <option>Select category</option>
            <?php $profile=$this->Admin_model->table_column('category');
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
        <?php    }
            }
            ?>
            </select>
            </div>
        
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Brand </label>
            <div class="col-sm-12">
            <input type="text" name= "brands" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Brand" required>
            <input type="hidden" name="status" value="1">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Brand Image  </label>
            <div class="col-sm-12">
              <input type="file" name="img" class="custom-file-input form-control mobile_full" id="exampleInputFile" >
              <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
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
<!-- <script>
    $(document).on('change','#sub_category',function(){
    var sub_category=$(this).val();
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
            url: base_url+'Admin/product_category',
            type: 'POST',
            dataType: "json",
            data: "sub_category=" + sub_category ,
            success: function(data) {
                $('#product_category_id').val(data.category);
            }
        });
 });
    </script> -->
