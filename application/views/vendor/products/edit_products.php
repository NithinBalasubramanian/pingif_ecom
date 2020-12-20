<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Products</h1>
  <a href="<?php echo base_url();?>View_vendor/products/list_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>List Products</a>
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
      <h6 class="m-0 font-weight-bold text-primary">Add Products Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <section>
    <div class="tabs tabs-style-linebox">
    <form class="form-horizontal" action="<?php echo base_url();?>Update_all/shop_products/products/<?php echo $edit_id; ?>/add_products/list_products" method="post" enctype="multipart/form-data" >
   <?php $pro=$this->Admin_model->table_column('shop_products','id',$edit_id);
   if(count($pro) > 0)
   {
       foreach($pro as $row)
       { ?>
             <div class="content-wrap">
      <div class="box-body">
        <div class="row">
     
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Sub Category * </label>
            <select name="sub_category_id" class="form-control mobile_full sub_category" >
           
            <?php 
            $id = $this->session->userdata('id');
            $profile=$this->Admin_model->table_column('shop_sub_category','customer_id',$id,'id',$row['sub_category_id']);
            if(count($profile) > 0)
            {
                foreach($profile as $p_row)
                { ?>
                    <option value="<?php echo $p_row['id']; ?>"><?php echo $p_row['sub_category']; ?></option>
        <?php    }
            }
            ?>
            <?php 
            $id = $this->session->userdata('id');
            $profile=$this->Admin_model->table_column('shop_sub_category','customer_id',$id);
            if(count($profile) > 0)
            {
                foreach($profile as $s_row)
                { ?>
                    <option value="<?php echo $s_row['id']; ?>"><?php echo $s_row['sub_category']; ?></option>
        <?php    }
            }
            ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Product Name * </label>
            <input type="text" name= "product" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['product']; ?>">
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Product Image * </label>
            <div class="col-sm-12">
            <input type="file" name="img" class="custom-file-input mobile_full" id="exampleInputFile" >
                <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
            </div>
        </div>
        <input type="hidden" value="1" name="status">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Price</label>
            <input type="text" name="price" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['price']; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Selling Price</label>
            <input type="text" name="sell_price" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['sell_price']; ?>" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Description (Optional)</label>
            <textarea name="description" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></textarea>
          </div>
        </div>
   
    
        <div class="box-footer">
        <button type="submit" class="btn btn-success btn-sm pull-right">Edit</button>
        </div>
<?php   }
   }
   
   ?>
   
  
     <!-- /.box-body -->
        
        <!-- /.box-footer -->
    </form>
   </div>
    </div>
    </div>
  </div>
</div>

<?php $this->load->view('vendor/include/footer'); ?>
