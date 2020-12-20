<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Quanitity</h1>
  <a href="<?php echo base_url();?>View_admin/products/list_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>List Products</a>
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
      <h6 class="m-0 font-weight-bold text-primary">Add Quantity Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
   
    
    <form class="form-horizontal" action="<?php echo base_url();?>Update_quantity/products/products/<?php echo $edit_id; ?>/list_products/list_products" method="post" enctype="multipart/form-data" >
    <?php $profile=$this->Admin_model->table_column('products','id',$edit_id);
    if(count($profile) > 0)
    {
        foreach($profile as $row)
        { ?>
            <div class="row">
         <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Old Quantity </label>
            <input type="text" name= "old_quantity" id="" class="form-control old_quantity" id="inputEmail3" value="<?php echo $row['quantity']; ?>" >
        </div>
        
         <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">New Quantity</label>
            <input type="text" name= "new_quantity" id="" class="form-control new_quantity" id="inputEmail3" placeholder="New Quantity" required>
        </div>
        </div>
        <div class="row">
         <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label total">Total </label>
            <input type="text" name= "quantity" id="" class="form-control total" id="inputEmail3">
        </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
         </div>
 <?php  }
    }
    ?>
        <!-- /.box-footer -->
    </form>
   </div>
    </div>
    </div>
    </div>
  </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>


<script>
    $(document).on('keyup','.new_quantity',function(){
        var new_quantity=Number($(this).val());
        var old_quantity=Number($('.old_quantity').val());
        var total=old_quantity+new_quantity;
        $('.total').val(total);
    });
   
</script> 
