<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Invoice</h1>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12" style="padding:0px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Invoice Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form method="post" action="<?php echo base_url(); ?>Vendor/invoice_add/invoice/invoice_bill">
    <div class="row col-md-12">
        <div class="col-md-4">
            <label>Invoice No</label>
            <?php $cus_id = $this->session->userdata('id'); 
            $shop=$this->Admin_model->table_column('shop','id',$cus_id);
            if(count($shop) > 0)
            {
                foreach($shop as $row_shop)
                {
                    $shop_name = $row_shop['shop_name'];
                }
            }
            $invoice_no = $shop_name.'-'.date('Y-m-s');
            ?>
            <div class="row col-md-12">
           
            <div class="col-md-12"><input type="text" name="invoice_no" class="form-control" value="<?php echo strtoupper($invoice_no); ?>"></div>
            </div>
        </div>
        <div class="col-md-3">
        <label>Date</label>
        <?php $date = date('Y-m-d'); ?>
            <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
        </div>
        <div class="col-md-4">
        <label>Employee</label>
        <select class="form-control emp" name="emp_id">
        <option>Select Employee</option>
        <?php 
        $user_id = $this->session->userdata('id');
        $pro=$this->Admin_model->table_column('shop_emp','customer_id',$user_id);
        if(count($pro) >0)
        {
            foreach($pro as $row_proo)
            { ?>
                <option value="<?php echo $row_proo['id']; ?>"><?php echo $row_proo['name']; ?></option>
      <?php }
        }
        ?>
        </select>


            <!-- <select class="form-control emp" name="emp_id">
                <option>Select Employee</option>
                <?php 
                $cus_id = $this->session->userdata('id');
                $emp=$this->Admin_model->table_column('shop_emp','customer_id',$cus_id);
                if(count($emp) > 0)
                {
                    foreach($emp as $emp_row)
                    { ?>
                        <option value="<?php $emp_row['id']; ?>"><?php echo $emp_row['name']; ?></option>
              <?php }
                }
                ?>
                
            </select> -->
        </div>
    </div>
    <div class="row col-md-12" style="margin-top:30px;">
    <div class="radio">
        <label style="margin-right: 13px;"><input type="radio" id="old" value="old" name="customer" style="margin-right:10px;" checked>Existing Customer</label>
        <label style="margin-right:10px;"><input type="radio" id="new" value="new" name="customer" style="margin-right:10px;">New Customer</label>
    </div>
    </div>
   
   
<div class="old">
    <div class="row col-md-12" style="margin-top:20px;">
    <div class="col-md-5">
        <label>Customer Number</label>
        <input type="text" class="form-control cus_no" name="contact" placeholder="Customer Number">
    </div>
    <div class="col-md-5">
        <label>Customer Name</label>
        <select class="form-control cus_name" name="cus_id">
        <option>Select Customer Name</option>
        <?php 
        $cus_id = $this->session->userdata('id');
        $cus=$this->Admin_model->table_column('shop_cus','customer_id',$cus_id);
        if(count($cus) >0)
        {
            foreach($cus as $cus_row1)
            { ?>
                <option value="<?php $cus_row1['id']; ?>"><?php echo $cus_row1['name']; ?></option>
      <?php }
        }
        ?>
            
        </select>
    </div>
    </div>
</div>
<div class="new" style="display:none;">
    <div class="row col-md-12" style="margin-top:20px;">
        <div class="col-md-5">
        <label>Customer Name</label>
        <input type="text" name="name" class="form-control" placeholder="Customer Name">
        </div>
        <div class="col-md-5">
        <label>Customer Number</label>
        <input type="text" name="contact" class="form-control" placeholder="Customer Number">
        </div>
        <div class="col-md-5">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Customer Email">
        </div>
        <div class="col-md-5">
        <label>Address</label>
        <textarea name="address" class="form-control" placeholder="Customer Address"></textarea>
        </div>

    </div>
</div>
<input type="hidden" value="1" name="count" class="count">
<div class="table-responsive" style="margin-top:30px;">
<table class="table table-bordered table-striped">
    <thead  class="thead-dark">
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
        <td style="width:6%;padding-left:0px;padding-right:0px;"><input type="text" readonly value="1" name="no" class="form-control" style="text-align:center;"></td>
        <td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control search_1 search" name="search[]"></td>
        <td style="padding-left:0px;padding-right:0px;width:18%;">
        <select class="form-control product_1 product" name="product_id[]">
        <option>Select Product</option>
        <?php 
        $user_id = $this->session->userdata('id');
        $pro=$this->Admin_model->table_column('shop_products','customer_id',$user_id);
        if(count($pro) >0)
        {
            foreach($pro as $row_pro1)
            { ?>
                <option value="<?php $row_pro1['id']; ?>"><?php echo $row_pro1['product']; ?></option>
      <?php }
        }
        ?>
        </select>
        </td>
        <td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control rate_1 rate" name="rate[]"></td>
        <td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control qua_1 qua" name="qua[]"></td>
        <td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control total_1 total" name="total[]"></td>
        <td style="padding-bottom:0;"><button type="button" class="btn btn-primary btn-flat add"><i class="fa fa-plus-circle " aria-hidden="true"></i></td>
    </tr>
    </tbody>
    <tbody>
    <tr>
    <td colspan="4"></td>
    <td style="text-align:center;">Total</td>
    <td style="padding-left:0px;padding-right:0px;">
    <input type="hidden" class="form-control grand_hid" value="0">
    <input type="text" class="form-control grand_total" name="grand_total"></td>
    </tr>
    <tr>
    <td colspan="4"></td>
    <td style="text-align:center;">Paid Amount</td>
    <td style="padding-left:0px;padding-right:0px;">
    <input type="text" class="form-control paid_amount" name="paid_amount"></td>
    </tr>
    <tr>
    <td colspan="4"></td>
    <td style="text-align:center;">Paid to Customer</td>
    <td style="padding-left:0px;padding-right:0px;">
    <input type="text" class="form-control paid_customer" name="paid_customer"></td>
    </tr>
    </tbody>
</table>
</div>
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
    <select class="form-control" name="delivary_type">
        <option value="Take Away">Take Away</option>
        <option value="Delivered">Delivered</option>
    </select>
    </div>
</div>
<button type="submit" class="btn btn-success pull-right btn-sm">Submit</button> 
</form>

    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('vendor/include/footer'); ?>
<script>
$(document).on('keyup','.cus_no',function(){
    var cus_no = $(this).val();
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/cus_invoice",
        type:'POST',
        data:'id='+cus_no,
        success:function(data)
        {
            $('.cus_name').html(data);
        }
    });
});
</script>
<script>
$(document).on('click','#new',function(){
    $('.old').css('display','none');
    $('.new').css('display','block');
});
$(document).on('click','#old',function(){
    $('.new').css('display','none');
    $('.old').css('display','block');
});
</script>
<script>
$(document).on('change','.cus_name',function(){
    var cus_no = $(this).val();
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/customer_no",
        type:'POST',
        dataType:'json',
        data:'id='+cus_no,
        success:function(data)
        {
            $('.cus_no').val(data.contact);
        }
    });
});
</script>
<script>
$(document).on('keyup','.search',function(){
    var search = $(this).val();
    var count = Number($('.count').val());
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Admin/search",
        type:'POST',
        data:'id='+search,
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
        url:base_url+"Vendor/rate",
        type:'POST',
        dataType:'json',
        data:'id='+pro,
        success:function(data)
        {
            $('.rate_'+count).val(data.sell_price);
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
   var now_total = total+grand_hid;
   $('.grand_total').val(now_total);
});
</script>
<script>
$(document).on('click','.add',function(){
    var grand_total = $('.grand_total').val();
    $('.grand_hid').val(grand_total);
    var count = Number($('.count').val());
    var pres_count = count+1;
    $('.append').append('<tr><td style="width:6%;padding-left:0px;padding-right:0px;"><input type="text" value="'+pres_count+'" name="no" class="form-control" readonly style="text-align:center;"></td><td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control search_'+pres_count+' search" name="search[]"></td><td style="padding-left:0px;padding-right:0px;"><select class="form-control product_'+pres_count+' product name="product_id[]"><option>Select Product</option><?php $user_id = $this->session->userdata('id');$pro=$this->Admin_model->table_column('shop_products','customer_id',$user_id);if(count($pro) >0){foreach($pro as $row_pro1){ ?><option value="<?php $row_pro1['id']; ?>"><?php echo $row_pro1['product']; ?></option><?php } } ?></select></td><td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control rate_'+pres_count+' rate" name="rate[]"></td><td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control qua_'+pres_count+' qua[]" name="qua"></td><td style="padding-left:0px;padding-right:0px;"><input type="text" class="form-control total_'+pres_count+' total" name="total[]"></td><td style="padding-bottom:0;"><button type="button" class="btn btn-danger btn-flat remove"><i class="fa fa-trash" aria-hidden="true"></i></td></tr>');
    $('.count').val(pres_count);
});
</script>
<script>
$(document).on('click','.remove',function(){
    var count = Number($('.count').val());
    var total = $(this).parent().prev().children().val();
    var grand_total = $('.grand_total').val();
    var final_total = grand_total-total;
    $('.grand_total').val(final_total);
    $(this).parent().parent().remove();
    $('.count').val(count-1);
});
</script>
<script>
$(document).on('keyup','.paid_amount',function(){
    var paid = $(this).val();
    var customer =$('.grand_total').val();
    var return_amount = customer-paid;
    $('.paid_customer').val(return_amount);
});
</script>
<!-- <script>
$(document).on('change','.cus_name',function(){
    var a = $(this).val();
    alert(a);
});
</script> -->
