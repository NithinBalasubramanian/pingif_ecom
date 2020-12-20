<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Plan</h1>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Plan Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Admin/Edit_plan/<?php echo $edit_id; ?> " method="post" enctype="multipart/form-data" >
       <?php $plan=$this->Admin_model->table_column('plan','id',$edit_id);
       if(count($plan) > 0)
       {
           foreach($plan as $row)
           { ?>
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Plan Name  </label>
            <div class="col-sm-12">
            <input type="text" name= "plan" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['plan']; ?>">
            
            </div>
        </div>
        
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Validation</label>
            <div class="col-sm-12">
            <input type="text" name= "validation" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['validation']; ?>">
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Free Plan</label>
            <div class="col-sm-12">
            <input type="text" name= "free_plan" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['free_plan']; ?>">
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Price</label>
            <div class="col-sm-12">
            <input type="text" name= "price" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['price']; ?>" >
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Discount</label>
            <div class="col-sm-12">
            <input type="text" name= "discount" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['discount']; ?>" >
            </div>
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Selling Price</label>
            <div class="col-sm-12">
            <input type="text" name= "seling" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['seling']; ?>" >
            </div>
        </div>
        </div>

        <input type="hidden" name="count" value="1" class="count">
        <div class="append">
        <div class="row" style="margin-top:15px;">
        <div class="form-group  col-md-3">
        <label for="inputEmail3" class="col-sm-6 control-label">Select Choice</label>
        <select class="form-control select_1" name="f_choice[]">
        <?php $type=$this->Admin_model->table_column('plan_data','plan_id',$edit_id);
        if(count($type) > 0)
        {
            foreach($type as $t_row)
            { ?>
                <option><?php echo $t_row['f_choice']; ?></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
   
            
        </select>
        </div>
        <div class="col-md-4">
        <label for="inputEmail3" class="col-sm-6 control-label">Features Type</label>
            <div class="col-sm-12">
                <input type="text" name="type[]" id="" class="form-control mobile_full type_1" id="inputEmail3" placeholder="Features Type" value="<?php echo $t_row['type']; ?>">
            </div>
        </div>
        <div class="col-md-2" style="margin-top: 30px;">
            <button type="button" class="btn btn-primary btn-flat add"><i class="fa fa-plus-circle " aria-hidden="true"></i>
        </div>
        </div>
        </div>
        <?php }
        }
        
        ?>

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
$(document).on('click','.add',function(){
   $count = Number($('.count').val());
   $pres_count = $count+1;
   $('.append').append('<div><div class="row" style="margin-top:15px;"><div class="form-group  col-md-3"><label for="inputEmail3" class="col-sm-6 control-label">Select Choice</label><select class="form-control select_'+$pres_count+'" name="f_choice[]"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="col-md-4"><label for="inputEmail3" class="col-sm-6 control-label">Features Type</label><div class="col-sm-12"><input type="text" name="type[]" id="" class="form-control mobile_full type_'+$pres_count+'" id="inputEmail3" placeholder="Features Type" ></div></div><div class="col-md-2" style="margin-top:auto;"><button type="button" class="btn btn-danger btn-flat remove"><i class="fa fa-trash" aria-hidden="true"></i></div></div></div>');
$('.count').val($pres_count);
});
</script>
<script>
$(document).on('click','.remove',function(){
    $count = Number($('.count').val());
    $(this).parent().parent().parent().remove();
    $('.count').val($count-1);
});
</script>
