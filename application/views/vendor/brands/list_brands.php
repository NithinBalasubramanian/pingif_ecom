<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Brands</h1>
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Brands</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Category</th>
                  <th>Brand Name</th>
                  <th>Brand Image</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->Admin_model->table_column($tablename='brands');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  
                  <?php $profile=$this->Admin_model->table_column('category','id',$p_row['category_id']);
                  if(count($profile) > 0)
                  {
                      foreach($profile as $row)
                      { ?>
                            <td><?php echo $row['category']; ?></td>
                <?php  }
                  } ?>
                    <td><?php echo $p_row['brands']; ?></td>
                    <td><img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $p_row['img']; ?>" width="100px" height="100px"></td>
                 </tr>
              <?php $i++; } ?>
            <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>
</div>

</div>

<?php $this->load->view('vendor/include/footer');?>
