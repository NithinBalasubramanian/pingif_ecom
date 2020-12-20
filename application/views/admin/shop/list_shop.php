<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Shop</h1>
  <a href="<?php echo base_url();?>View_admin/shop/add_shop" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Shop</a>
  <!-- <a href="<?php echo base_url();?>View_admin/shop/delete_shop" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Deleted Shop</a> -->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Shop</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S No</th>
                  <th>Shop Name</th>
                  <th>Owner Name</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            <?php $product=$this->Admin_model->table_column($tablename='shop');
            if(count($product)>0){
              $i=1;
              foreach($product as $p_row){
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p_row['shop_name']; ?></td>
                  <td><?php echo $p_row['owner_name']; ?></td>
                  <td><?php echo $p_row['contact']; ?></td>
                  <td><?php echo $p_row['email']; ?></td>
                  <td><?php echo $p_row['address']; ?></td>
                  <td><?php echo $p_row['user_name']; ?></td>
                  <td><?php if($p_row['verify'] == '1'){ ?><button class="btn btn-sm btn-warning verify verify_<?php echo $p_row['id']; ?>" data-val="1" data-id="<?php echo $p_row['id']; ?>">Block</button><?php }else{ ?><button class="btn btn-sm btn-success verify verify_<?php echo $p_row['id']; ?>" data-val="0" data-id="<?php echo $p_row['id']; ?>">Unblock</button><?php } ?></td>
                 
                  <td><a href="<?php echo base_url();?>View_admin/shop/edit_shop/<?php echo $p_row['id'];?>" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a>
                  <a href="javascript:void(0)"><i class="fa fa-trash-o per_delete"  aria-hidden="true" data-id="<?php echo $p_row['id']; ?>" data-table="shop" style="font-size:20px;"></i></a> 
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
<?php $this->load->view('admin/include/footer');?>





