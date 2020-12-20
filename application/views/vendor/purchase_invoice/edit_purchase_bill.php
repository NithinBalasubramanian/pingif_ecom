<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Supplier</h1>
  
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Supplier Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">

    <form class="form-horizontal" action="<?php echo base_url();?>Vendor/edit_pur_invoice/<?php echo $edit_id; ?> " method="post" enctype="multipart/form-data" >
        <div class="row col-md-12">
            <div class="col-md-5">
            <label>Invoice No</label>
            <?php $id = $this->session->userdata('id'); 
                    $shop=$this->Admin_model->table_column('shop','id',$id);
                    if(count($shop) > 0)
                    {
                        foreach($shop as $row_shop)
                        {
                            $shop_name = $row_shop['shop_name'];
                        }
                    }
                    $invoice =$shop_name.'-'.date('Y-m-s');
                    ?>
            <div class="row col-md-12">
               
                <div class="col-md-8">
                    <input type="text" class="form-control" name="invoice_no" value="<?php echo strtoupper($invoice); ?>">
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <label>Date</label>
            <?php $date = date('Y-m-d'); ?>
            <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
            </div>
        </div>
        <div class="row col-md-12" style="margin-top:30px;">
        <div class="radio">
            <label style="margin-right: 13px;"><input type="radio" value="old" id="old" name="supplier" style="margin-right:10px;" checked>Existing Supplier</label>
            <label style="margin-right:10px;"><input type="radio" value="new" id="new" name="supplier" style="margin-right:10px;">New Supplier</label>
        </div>
    </div>
    <div class="old">
    <div class="row col-md-12">
    <div class="col-md-5">
    <label>Supplier Number</label>
    <input type="text" name="supplier_no" class="form-control sup_no" placeholder="Supplier Number">
    </div>
    <div class="col-md-5">
    <label>Supplier Name</label>
    <select class="form-control sup_name" name="supplier_id">
        <option>Select Supplier Name</option>
        <?php 
        $cus_id = $this->session->userdata('id');
        $sup=$this->Admin_model->table_column('supplier','customer_id',$cus_id);
        if(count($sup) > 0)
        {
            foreach($sup as $sup_row)
            { ?>
                <option value="<?php $sup_row['id']; ?>"><?php echo $sup_row['name']; ?></option>
     <?php  }
        }
        ?>
    </select>
    </div>
    </div>
    </div>
    <div class="new" style="display:none;">
    <div class="row col-md-12 " >
        <div class="col-md-5">
        <label>Supplier Number</label>
        <input type="text" class="form-control" name="contact" placeholder="Supplier Number">
        </div>
        <div class="col-md-5">
        <label>Supplier Name</label>
        <input type="text" class="form-control" name="name" placeholder="Supplier Name">
        </div>
        <div class="col-md-5">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Supplier Email">
        </div>
        <div class="col-md-5">
        <label>Address</label>
        <textarea class="form-control" name="address" placeholder="Supplier Address"></textarea>
        </div>
    </div>
    </div>
    <input type="hidden" name="count" value="1" class="count">
    <div class="table-responsive" style="margin-top:30px;">
    <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
        <th>S No</th>
        <th>Search</th>
        <th>Product</th>
        <th>Rate</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Add</th>
        </tr>
    </thead>
    <tbody class="append">
        <tr>
        <td style="padding-left:0;padding-right:0;width:6%;"><input type="text" class="form-control" value="1" name="no"></td>
        <td style="padding-left:0;padding-right:0;"><input type="text" class="form-control search search_1"  name="search[]"></td>
        <td style="padding-left:0;padding-right:0;width:18%;">
        <select class="form-control product_1 product" name="product[]">
        <option>Select Product</option>
        <?php 
        $user_id = $this->session->userdata('id');
        $pro=$this->Admin_model->table_column('shop_products','customer_id',$user_id);
        if(count($pro) > 0)
        {
            foreach($pro as $row_pro)
            { ?>
                <option value="<?php $row_pro['id']; ?>"><?php echo $row_pro['product']; ?></option>

      <?php }
        }
        ?>
        </select>
        </td>
        <td style="padding-left:0;padding-right:0;"><input type="text" class="form-control rate rate_1"  name="rate[]"></td>
        <td style="padding-left:0;padding-right:0;"><input type="text" class="form-control qua qua_1"  name="qua[]"></td>
        <td style="padding-left:0;padding-right:0;"><input type="text" class="form-control total_1"  name="total[]"></td>
        <td ><button type="button" class="btn btn-primary btn-flat add"><i class="fa fa-plus-circle " aria-hidden="true"></i></td>
        </tr>
    </tbody>
    <tbody>
    <td colspan="4"></td>
    <td style="text-align:center;">Total</td>
    <td style="padding-left:0;padding-right:0;"><input type="hidden" class="form-control grand_hid" value="0"><input type="text" class="form-control grand_total" name="grand_total"></td>
    </tbody>
    <tbody>
    <td colspan="4"></td>
    <td style="text-align:center;">Paid Amount</td>
    <td style="padding-left:0;padding-right:0;"><input type="text" class="form-control paid" ></td>
    </tbody>
    <tbody>
    <td colspan="4"></td>
    <td style="text-align:center;">Paid to Customer</td>
    <td style="padding-left:0;padding-right:0;"><input type="text" class="form-control customer" ></td>
    </tbody>
    </table>
    <div class="row col-md-12">
    <div class="col-md-5">
        <label>Payment Type</label>
        <select class="form-control" name="payment_type">
            <option value="Cash">Cash</option>
            <option value="Paytm">Paytm</option>
            <option value="Google Pay">Google Pay</option>
        </select>
    </div>
    <div class="col-md-5">
        <label>Delivery Type</label>
        <select class="form-control" name="delivery_type">
            <option value="Take Away">Take Away</option>
            <option value="Delivered">Delivered</option>
        </select>
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
        <!-- /.box-footer -->
    </form>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('vendor/include/footer'); ?>
<script>
$(document).on('click','#new',function(){
    $('.old').css('display','none');
    $('.new').css('display','block');
});
$(document).on('click','#old',function(){
    $('.old').css('display','block');
    $('.new').css('display','none');
});
</script>
<script>
$(document).on('keyup','.sup_no',function(){
    var sup_no = $(this).val();
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/supplier_no",
        type:'POST',
        data:'sup_no='+sup_no,
        success:function(data)
        {
            $('.sup_name').html(data);
        }
    });
});
</script>
<script>
$(document).on('change','.sup_name',function(){
    var sup_name = $(this).val();
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/suplier_name",
        type:'POST',
        dataType:'json',
        data:'sup_name='+sup_name,
        success:function(data)
        {
            $('.sup_no').val(data.contact);
        }
    });
    
});
</script>
<script>
$(document).on('keyup','.search',function(){
    var count = Number($('.count').val());
    var search = $(this).val();
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/pro_search",
        type:'POST',
        data:'search='+search,
        success:function(data)
        {
            $('.product_'+count).html(data);
        }
    });
});
</script>
<script>
$(document).on('change','.product',function(){
    var pro = $(this).val();
    var count = Number($('.count').val());
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/pro_rate",
        type:'POST',
        dataType:'json',
        data:'pro='+pro,
        success:function(data)
        {
            $('.rate_'+count).val(data.rate);
        }
    });
});
</script>
<script>
$(document).on('keyup','.qua',function(){
    var qua = $(this).val();
    var rate = $(this).parent().prev().children().val();
    var total = qua*rate;
    $(this).parent().next().children().val(total);
    var grand_hid = Number($('.grand_hid').val());
    var grand_total = total+grand_hid;
    $('.grand_total').val(grand_total);
});
</script>
<script>
$(document).on('click','.add',function(){
    var grand_total = Number($('.grand_total').val());
    $('.grand_hid').val(grand_total);
    var count = Number($('.count').val());
    var pres_count = count+1;
    $('.append').append('<tr><td style="padding-left:0;padding-right:0;width:6%;"><input type="text" class="form-control" value="'+pres_count+'" name="no"></td><td style="padding-left:0;padding-right:0;"><input type="text" class="form-control search search_'+pres_count+'"  name="search[]"></td><td style="padding-left:0;padding-right:0;width:18%;"><select class="form-control product product_'+pres_count+'" name="product[]"><option>Select Product</option><?php $user_id = $this->session->userdata('id');$pro=$this->Admin_model->table_column('shop_products','customer_id',$user_id);if(count($pro) > 0){foreach($pro as $row_pro) { ?><option value="<?php $row_pro['id']; ?>"><?php echo $row_pro['product']; ?></option><?php } }?></select></td><td style="padding-left:0;padding-right:0;"><input type="text" class="form-control rate rate_'+pres_count+'"  name="rate[]"></td><td style="padding-left:0;padding-right:0;"><input type="text" class="form-control qua qua_'+pres_count+'"  name="qua[]"></td><td style="padding-left:0;padding-right:0;"><input type="text" class="form-control total_'+pres_count+'"  name="total[]"></td><td ><button type="button" class="btn btn-danger btn-flat remove"><i class="fa fa-trash" aria-hidden="true"></i></td></tr>');
    $('.count').val(pres_count);
});
</script>
<script>
$(document).on('click','.remove',function(){
    var count = Number($('.count').val());
    var old_total = $(this).parent().prev().children().val();
    var grand_total = Number($('.grand_total').val());
    var now_grand = grand_total-old_total;
    $('.grand_total').val(now_grand);
    $(this).parent().parent().remove();
    $('.count').val(count-1);
});
</script>
<script>
$(document).on('keyup','.paid',function(){
    var paid = $(this).val();
    var grand_total = $('.grand_total').val();
    var cus = grand_total-paid;
    $('.customer').val(cus);
});
</script>