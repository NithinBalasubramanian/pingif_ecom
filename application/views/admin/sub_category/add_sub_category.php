<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Sub Category</h1>
  <a href="<?php echo base_url();?>View_admin/sub_category/list_sub_category" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Sub Category</a>
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
    <form class="form-horizontal" action="<?php echo base_url();?>Insert/sub_category/sub_category/add_sub_category/list_sub_category " method="post" enctype="multipart/form-data" >
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6 col-sm-12" >
            <label for="inputEmail3" class="col-md-6 col-sm-12 control-label">Category  </label>
            <select name="category_id" class="form-control mobile_full" >
            <option value="">Selct Category</option>
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
        <div class="form-group col-md-6 col-sm-12">
            <label for="inputEmail3" class="col-md-6 col-sm-12 control-label">Sub Category  </label>
            <input type="text" name= "sub_category" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Sub Category" required>
            <input type="hidden" name="status" value="1">
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
