<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / View Product</h1>
  <a href="<?php echo base_url();?>View_vendor/products/list_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Products</a>
  <!-- <button type="button" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm " style="float:right" data-toggle="modal" data-target="#add_area">
  Add Area
</button>
   -->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"> View Product</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <?php $pro_data=$this->Admin_model->table_column('products','id',$edit_id);
        foreach($pro_data as $p_row){ ?>
        <div class="row">
            <div class="col-md-10"><h2><b>Product Name : <?php echo $p_row['product']; ?></b></h2></div>
            <div class="col-md-2"> <a href="<?php echo base_url();?>View_vendor/products/edit_products" class=" d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-add"></i> Edit Product</a></div><br>
            <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/<?php echo $p_row['product_by']; ?>/img/products/<?php echo $p_row['img']; ?>" width="100%" height="400px"></div>
            <div class="col-md-8">
                <table class="table">
                    <tr style="color:black;">
                        <th>Title</th>
                        <th>Detail</th>
                    </tr>
                    <tr>
                        <td>Product by</td>
                        <td><?php echo $p_row['product_by']; ?></td>
                    </tr>
                    <tr>
                        <td>Added By</td>
                        <?php $profile_sub=$this->Admin_model->table_column($tablename="vendor",$column='id',$val=$p_row['added_by']);
                        if(count($profile_sub) > 0)
                        {
                            foreach($profile_sub as $row_sub)
                            { ?>
                                <td><?php echo $row_sub['name']; ?></td>    
                    <?php    }  } ?>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <?php $profile=$this->Admin_model->table_column('category','id',$p_row['category_id']);
                  if(count($profile) > 0)
                  {
                      foreach($profile as $row)
                      { ?>
                            <td><?php echo $row['category']; ?></td>
                <?php  }
                  } ?>
                    </tr>
                    <tr>
                        <td>Sub Category</td>
                        <?php $profile_sub=$this->Admin_model->table_column($tablename="sub_category",$column='id',$val=$p_row['sub_category_id']);
                        if(count($profile_sub) > 0)
                        {
                            foreach($profile_sub as $row_sub)
                            { ?>
                                <td><?php echo $row_sub['sub_category']; ?></td>    
                    <?php    }
                        }
                        
                        ?>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><?php echo $p_row['price']; ?> Rs</td>
                    </tr>
                    <tr>
                        <td>Discount Percentage</td>
                        <td><?php echo $p_row['discount']; ?>%</td>
                    </tr>
                    <tr>
                        <td>Final Price</td>
                        <td><?php echo $p_row['final_price']; ?> Rs</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><?php echo $p_row['description']; ?></td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td><?php echo $p_row['tags']; ?></td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td><?php echo $p_row['model']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('vendor/include/footer'); ?>
