<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Deleted Supplier</h1>
  <a href="<?php echo base_url();?>View_vendor/supplier/add_supplier" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Supplier</a>
  <a href="<?php echo base_url();?>View_vendor/supplier/list_supplier" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Supplier</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Deleted Supplier</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Supplier Name</th>
                  <th>Contact</th>
                  <th>Secondary Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php 
            $customer_id = $this->session->userdata('id');
            $product=$this->Admin_model->table_column($tablename='supplier','status','0','customer_id',$customer_id);
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p_row['name']; ?></td>
                  <td><?php echo $p_row['contact']; ?></td>
                  <td><?php echo $p_row['sec_contact']; ?></td>
                  <td><?php echo $p_row['email']; ?></td>
                  <td><?php echo $p_row['address']; ?></td>
                  <td>
                  <a href="javascript:void(0)" class="delete btn btn-sm btn-success" data-id="<?php echo $p_row['id']; ?>" data-table="supplier">Return</a>
                   <a href="javascript:void(0)" class="per_delete btn btn-sm btn-danger" data-id="<?php echo $p_row['id']; ?>" data-table="supplier">Delete</a>
                  </td>
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
