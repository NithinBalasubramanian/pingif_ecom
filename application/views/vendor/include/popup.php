<div class="modal fade" id="profile_img" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Upload Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php  $user_id = $this->session->userdata('id'); ?>
        <form method="post" action="<?php echo base_url(); ?>Update_Image/shop/profile/<?php echo $user_id; ?>/view_profile/view_profile" enctype="multipart/form-data">
        
        <?php 
       
        $pro_img=$this->Admin_model->table_column('shop','id',$user_id);
        if(count($pro_img) > 0)
        {?>
                <div class="modal-body">
                 <div class="form-group col-md-12">
                <label for="inputEmail3" class="col-sm-6 control-label">Logo Image * </label>
                    <div class="col-sm-12">
                    <input type="file" name="img" class="custom-file-input mobile_full" id="exampleInputFile" >
                        <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
                    </div>
                </div>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm" >Submit</button>
        </div>
        <?php 
        } 
        ?>
        </form>
      </div>
      
    </div>
  </div>
  