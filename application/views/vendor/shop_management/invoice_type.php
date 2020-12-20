<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Invoice Print</h1>
 
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Invoice Print Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <?php 
    $shop_id = $this->session->userdata('id');
    $print = $this->Admin_model->table_column('invoice_type','shop_id',$shop_id);
    if(count($print) > 0)
    {?>
            <form class="form-horizontal" action="<?php echo base_url();?>Edit_setting_vendor/invoice_type/shop_management/invoice_type" method="post" enctype="multipart/form-data" >
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Invoice Print : </label>
            <div class="col-sm-12">
            <select class="form-control" name="invoice_type">
            <?php
            $shop_id = $this->session->userdata('id');
            $print=$this->Admin_model->table_column('invoice_type','shop_id',$shop_id);
            if(count($print) > 0)
            {
                foreach($print as $row_print)
                { $print = $row_print['invoice_type'];?>
                    <option value="<?php echo $row_print['invoice_type']; ?>"><?php if($print == "1"){?>A4 Print <?php } else {?>POS Print <?php } ?></option>
                   
                <option value="1">A4 Print</option>
                <option value="2">POS Print</option>
        <?php   } 
            }
            ?>
            </select>
            </div>
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
    </form>
  <?php 
    } else {
    ?>
    <form class="form-horizontal" action="<?php echo base_url();?>Insert_Vendor/invoice_type/shop_management/invoice_type/invoice_type" method="post" enctype="multipart/form-data" >
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Invoice Print : </label>
            <div class="col-sm-12">
            <select class="form-control" name="invoice_type">
                    <option>Select Print Type</option>
                <option value="1">A4 Print</option>
                <option value="2">POS Print</option>
            </select>
            </div>
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-sm btn-success pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
    </form>
        <?php } ?>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('vendor/include/footer'); ?>
