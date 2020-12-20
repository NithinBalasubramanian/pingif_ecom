<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Customer Invoice</h1>
  <a href="<?php echo base_url();?>View_vendor/invoice/add_invoice" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>Add Customer Invoice</a>
  <!--<a href="<?php echo base_url();?>View/damage/add_damage" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Damage</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Customer Invoice</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped" >
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Grand Total</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $cus_id=$this->session->userdata('id');
             $product=$this->Admin_model->table_column($tablename='shop_invoice','shop_id',$cus_id);
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                    <td><?php echo $p_row['invoice_no']; ?></td>
                    <td><?php echo $p_row['date']; ?></td>
                    <td><?php echo $p_row['grand_total']; ?></td>
                    <td>
                    <a href="<?php echo base_url();?>Vendor/bill/invoice/invoice_bill/<?php echo $p_row['invoice_no'];?>" class="btn btn-sm btn-success">View Bill</a>
                    <a href="<?php echo base_url();?>Vendor/bill/invoice/pos_invoice/<?php echo $p_row['invoice_no'];?>" class="btn btn-sm btn-primary">POS Bill</a>
                  <a href="<?php echo base_url();?>View_vendor/invoice/edit_invoice/<?php echo $p_row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-danger per_delete" data-id="<?php echo $p_row['id']; ?>" data-table="shop_invoice">Delete</a></td>
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




