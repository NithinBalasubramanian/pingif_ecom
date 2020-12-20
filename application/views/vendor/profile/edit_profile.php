<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Profile</h1>
  <!-- <a href="<?php echo base_url();?>View_vendor/products/list_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>List Products</a> -->
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
      <h6 class="m-0 font-weight-bold text-primary">Edit Profile Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <section>
    <div class="tabs tabs-style-linebox">
    <form class="form-horizontal" action="<?php echo base_url();?>Update_all_Vendor/shop/profile/<?php echo $edit_id; ?>/view_profile/view_profile" method="post" enctype="multipart/form-data" >
    <?php $profile=$this->Admin_model->table_column('shop','id',$edit_id);
        if(count($profile) > 0)
        {
            foreach($profile as $row)
            { ?>
                <div class="content-wrap">
      <div class="box-body">
        <div class="row">
        
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Shop Name * </label>
            <input type="text" name= "shop_name" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['shop_name']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Owner Name * </label>
            <input type="text" name= "owner_name" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['owner_name']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Contact * </label>
            <input type="text" name= "contact" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['contact']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Secondary Contact (optional) </label>
            <input type="text" name= "sec_contact" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['sec_contact']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Email * </label>
            <input type="text" name= "email" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['email']; ?>">
        </div>
          <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Address * </label>
            <textarea name="address" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['address']; ?>"><?php echo $row['address']; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">User Name * </label>
            <input type="text" name= "user_name" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['user_name']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">GST No * </label>
            <input type="text" name= "gst_no" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['gst_no']; ?>">
        </div>
        </div>
    
        <div class="box-footer">
        <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
        </div>
      <?php }
        }
        
        ?>
   
     <!-- /.box-body -->
        
        <!-- /.box-footer -->
    </form>
   </div>
    </div>
    </div>
  </div>
</div>

<?php $this->load->view('vendor/include/footer'); ?>

<script>
$(document).on('change','.category',function(){
  var cat = $(this).val();
  var base_url="<?php echo base_url(); ?>";
  $.ajax({
    url:base_url+"Vendor/category",
    type:'POST',
    data:'category_id='+cat,
    success:function(data)
    {
      $('.sub_category').html(data);
    }
  });
});
</script>

