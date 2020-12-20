<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); 
  ?>

<div class="app-main__outer">
<div class="app-main__inner" style="width:100%;">
            <div class="row">
             
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div id="page_pdf" style="width:100%;height:auto;">
                        <div class="bill" style="width:100%;height:100%;border:2px solid black;">
                        <div class="bill_head" style="width:100%;height:auto;">
                        <div class="img row" style="width:100%;height:auto;margin-left:0px;">
                       
                                <div class="gas_img col-md-5 text-center" style="margin: auto 0px;">
                                <?php $id = $this->session->userdata('id'); 
                               
                                $shop=$this->Admin_model->table_column('shop','id',$id);
                                if(count($shop) > 0)
                                {
                                    foreach($shop as $row_shop)
                                    {
                                        $shop_name = $row_shop['shop_name'];
                                        $address = $row_shop['address'];
                                        $contact = $row_shop['contact'];
                                    }
                                }
                                ?>
                                <h4><b><?php echo strtoupper($shop_name); ?></b></h4>
                                    <p style="font-weight:400;font-size:15px;"><?php echo strtoupper($address); ?><br>Contact: <?php echo $contact; ?></p>
                                </div>
                                <div class="col-md-3"> </div> 
                                <div class="col-md-3 text-center text-right">
                               <img src="<?php echo base_url(); ?>" height="100%" width="100%">
                                </div>
                                <div class="col-md-12 text-center"></div>
                        </div>
                        <div class="cus_detail" style="width:100%;height:auto;border-top:2px solid black;">
                        <div class="container" style="padding-top:10px;padding-bottom:10px;">
                        <?php $sales_bill =$this->Admin_model->table_column($tablename='shop_invoice',$column='invoice_no',$val=$invoice);
                        if(count($sales_bill)>0){
                            foreach($sales_bill as $sales_bill_row){
                                $date=$sales_bill_row['date'];
                                $grand_total=$sales_bill_row['grand_total'];
                                $payment = $sales_bill_row['payment_type'];
                                $delivary = $sales_bill_row['delivary_type'];
                                 $sup_id = $sales_bill_row['cus_id'];
                                 $invoice_no = $sales_bill_row['invoice_no'];
                                  $shop_id = $sales_bill_row['shop_id'];
                                  $date = $sales_bill_row['date'];
                        }
                    } ?>
                    </div>
                    </div>
                    <div class="row" style="padding:10px;">
            <div class="col-md-6">Invoice No : <?php echo $sales_bill_row['invoice_no']; ?></div>
            <?php 
            $cus=$this->Admin_model->table_column('shop_cus','id',$sup_id);
            foreach($cus as $cus_row){ 
                $cus_name=$cus_row['name'];
               
                $cus_phone=$cus_row['contact']; ?>
           
            <div class="col-md-6">Customer Name : <?php echo strtoupper($cus_name); ?></div>
        </div>
        <div class="row" style="padding:10px;">
        <div class="col-md-6">Date :<?php echo $date; ?></div>
            <div class="col-md-6">Customer Number : <?php echo $cus_phone; ?></div>
        </div>
      <?php   } ?>
        <div class="bill_cont" style="width:100%;height:auto;margin-bottom:20px;padding-bottom:20px;">
   <div class="container" style="padding-top:20px;">
   <div class="bill_table table-responsive">
    <table class="table table-bordered" >
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Product</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        $i=1;
        $saled_list=$this->Admin_model->table_column('shop_invoice_data','invoice_no',$invoice);
        if(count($saled_list)>0){
        foreach($saled_list as $saled_list_row){
            ?>
            <td><?php echo $i; ?></td>
            <?php $product_name=$this->Admin_model->table_column('shop_products',$column='id',$val=$saled_list_row['product_id']);
       
        if(count($product_name)>0){
        foreach($product_name as $product_name_row){ ?>
           <td><?php echo $product_name_row['product']; ?></td>
        <?php } } ?>
           <td><?php echo $saled_list_row['rate']; ?></td>
           <td><?php echo $saled_list_row['qua']; ?></td>
           <td><?php echo $saled_list_row['total']; ?></td>
        </tr>
<?php $i++;  } } ?>
        <tr>
            <td colspan="3" rowspan="3">Amount in words :
            <?php
                                $number =  $grand_total; 
                                $no = round($number);
                                $point = round($number - $no, 2) * 100;
                                $hundred = null;
                                $digits_1 = strlen($no);
                                $i = 0;
                                $str = array();
                                $words = array('0' => '', '1' => 'One', '2' => 'Two',
                                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                '13' => 'Thirteen', '14' => 'Fourteen',
                                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
                                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                '60' => 'Sixty', '70' => 'Seventy',
                                '80' => 'Eighty', '90' => 'Ninety');
                                $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                                while ($i < $digits_1) {
                                    $divider = ($i == 2) ? 10 : 100;
                                    $number = floor($no % $divider);
                                    $no = floor($no / $divider);
                                    $i += ($divider == 10) ? 1 : 2;
                                    if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str [] = ($number < 21) ? $words[$number] .
                                        " " . $digits[$counter] . $plural . " " . $hundred
                                        :
                                        $words[floor($number / 10) * 10]
                                        . " " . $words[$number % 10] . " "
                                        . $digits[$counter] . $plural . " " . $hundred;
                                    } else $str[] = null;
                                }
                                $str = array_reverse($str);
                                $result = implode('', $str);
                                echo $number_val =  $result . "Rupees Only";

                            ?>

                                                </td>
            <td colspan="">Grand Total </td>
            <td><?php echo $grand_total; ?>.00</td>
        </tr>
        <tr>
            
        </tr>
        <tr>
            
        </tr>
        <tr>
            <td colspan="2"><div style="height:60px;width:100%;">Consumer Signature</div></td>
            <td colspan="4"><div style="height:60px;width:100%;">For Village Meat</div></td>
        </tr>
         <tr>
            <td colspan="5"><div style="height:20px;width:100%;">Payment Type : <?php echo $payment; ?></div></td>
        </tr>
        <tr>
            <td colspan="5"><div style="height:20px;width:100%;">Delevary Type : <?php echo $delivary; ?></div></td>
        </tr>
    </tbody>
    </table>
   </div>
   </div>
   </div>




                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <button type="button" class="btn btn-sm btn-success" onclick="print_page('page_pdf');">Print</button>
                </div>
              </div>
            </div>
            <?php $this->load->view('vendor/include/footer'); ?>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script>
      function print_page(div)
      {
         var printContents = document.getElementById(div).innerHTML;
         var originalContents = document.body.innerHTML;
    
         document.body.innerHTML = printContents;
    
         window.print();
    
         document.body.innerHTML = originalContents;
         location.reload();
    }
  </script>