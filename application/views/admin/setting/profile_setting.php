<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Profile Setting</h1>
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
      <h6 class="m-0 font-weight-bold text-primary">Profile Setting Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Edit_Setting/profile_setting/setting/profile_setting " method="post" enctype="multipart/form-data" >
        <?php $profile = $this->Admin_model->table_column('profile_setting');
        if(count($profile) > 0)
        {
            foreach($profile as $row)
            { ?>
                <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Company Name  </label>
            <div class="col-sm-12">
            <input type="text" name= "company_name" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['company_name']; ?>">
            
            </div>
        </div>
        
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Company Phone Number </label>
            <div class="col-sm-12">
            <input type="text" name= "contact" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['contact']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Address</label>
            <div class="col-sm-12">
            <textarea name= "address" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['address']; ?>"><?php echo $row['address']; ?></textarea>
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">GSTIN(Optional)</label>
            <div class="col-sm-12">
            <input type="text" name= "gstin" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['gstin']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Logo (Optional)</label>
        <div class="col-sm-12">
                  <input type="file" name="img" class="custom-file-input form-control mobile_full" id="exampleInputFile" >
                  <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
                </div>
            </div>
        <div class="form-group col-md-6">
        <!-- <label for="inputEmail3" class="col-sm-6 control-label">Address</label> -->
        <?php if($row['img'] != ''){?>
            <div class="col-sm-6">
            <div class="img" style="border:2px solid black;    height: 155px;" >
                <div style="float:right;" data-rowid="<?php echo $row['id']; ?>" class="delete">
                  <i class="fa fa-times " aria-hidden="true" ></i>
                </div>
                <div style="height:100px;">
                  <img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $row['img']; ?>" width="100%" height="100%">
                </div>
                </div>
            </div>
        <?php } ?>
        </div> 
        <!-- </div>

        

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


<?php $this->load->view('admin/include/footer'); ?>
<script>
$(document).on('click','.delete',function(){
   var base_url="<?php echo base_url(); ?>";
   $.ajax({
       url:base_url+"Admin/cross",
       type:'POST',
       data:
       {
        'id':$(this).attr("data-rowid"),
        'tablename':'profile_setting'
       },
       success:function(data)
       {

       }
   });
   $(this).parent().parent().parent().remove();
});
</script>