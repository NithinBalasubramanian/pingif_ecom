 style="padding:0px;"<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Sub Category</h1>
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
      <h6 class="m-0 font-weight-bold text-primary">Edit Sub Category Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url();?>Update_all/sub_category/sub_category/<?php echo $edit_id; ?>/list_sub_category/list_sub_category " method="post" enctype="multipart/form-data" >
    <?php $edit=$this->Admin_model->table_column('sub_category','id',$edit_id);
    if(count($edit) > 0)
    {
        foreach($edit as $edit_row)
        { ?>
            <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Category  </label>
            <select name="category_id" class="form-control mobile_full" id="category">
            <?php $profile=$this->Admin_model->table_column('category','id',$edit_row['category_id']);
                foreach($profile as $row)
                { ?>
            <option value="<?php echo $edit_row['category_id']; ?>" style="color:green;"><?php echo $row['category']; ?></option>
                <?php } ?>
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
            <label for="inputEmail3" class="col-sm-6 control-label">Sub Category  </label>
            <div class="col-sm-12">
            <input type="text" name= "sub_category" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $edit_row['sub_category']; ?>">
            <input type="hidden" name="status" value="1">
            </div>
        </div>
        </div>
       
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-gradient-green pull-right">Submit</button>
        </div>
 <?php    }
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
