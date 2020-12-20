<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Products</h1>
  <a href="<?php echo base_url();?>View_admin/products/list_products" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i>List Products</a>
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
      <h6 class="m-0 font-weight-bold text-primary">Edit Products Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <section>
    <div class="tabs tabs-style-linebox">
    <nav>
      <ul>
        <li><a href="#section-linebox-1"><span>Product Name</span></a></li>
        <li><a href="#section-linebox-2"><span>Pricings</span></a></li>
        <li><a href="#section-linebox-4"><span>Description</span></a></li>
        <li><a href="#section-linebox-3"><span>Sub images</span></a></li>
      </ul>
    </nav>
    <form class="form-horizontal" action="<?php echo base_url();?>Edit_product_admin/products/products/<?php echo $edit_id; ?>/list_products/list_products" method="post" enctype="multipart/form-data" >
    <?php $profile_edit=$this->Admin_model->table_column('products','id',$edit_id);
    if(count($profile_edit) > 0)
    {
        foreach($profile_edit as $row_edit)
        { ?>
            <div class="content-wrap">
        <section id="section-linebox-1">   
        <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Category * </label>
            <select name="category_id" class="form-control cat mobile_full" id="category">
            <?php $profile=$this->Admin_model->table_column('category','id',$val=$row_edit['category_id']);
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { $category_id=$row['id']; ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
        <?php    }
            }
            ?>
            <?php $profile=$this->Admin_model->table_column('category');
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { if($row['id'] != $category_id){?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
        <?php    } }
            }
            ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Sub Category * </label>
            <select name="sub_category_id" class="form-control mobile_full" id="sub_category">
            <?php $profile=$this->Admin_model->table_column('sub_category','id',$val=$row_edit['sub_category_id']);
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { $sub_category_id=$row['id']; ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['sub_category']; ?></option>
        <?php    }
            }
            ?>
             <?php $profile=$this->Admin_model->table_column('sub_category');
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { if($row['id'] != $sub_category_id){?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['sub_category']; ?></option>
        <?php    } }
            }
            ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Brand * </label>
            <select name="brand_id" class="form-control mobile_full" id="brand">
            <?php $profile=$this->Admin_model->table_column('brands','id',$val=$row_edit['brand_id']);
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { 
                    $brand_id=$row['id'];?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['brands']; ?></option>
        <?php    }
            }
            ?>
             <?php $profile=$this->Admin_model->table_column('brands');
            if(count($profile) > 0)
            {
                foreach($profile as $row)
                { 
                    if($row['id'] != $brand_id){?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['brands']; ?></option>
        <?php    } }
            }
            ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Product Name * </label>
            <input type="text" name= "product" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row_edit['product']; ?>" >
           
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Product Image * </label>
            <div class="col-sm-12">
            <input type="file" name="img" class="custom-file-input mobile_full" id="exampleInputFile" >
                <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label">Primary Color * </label>
            <input type="text" name= "primary_color" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row_edit['primary_color']; ?>">
        </div>
        <div class="form-group col-md-6">
        <label for="inputEmail3" class="col-sm-6 control-label">Sub Images * </label>
            <div class="col-sm-12">
            <input type="file" name="sub_images[]" class="custom-file-input mobile_full" id="exampleInputFile" multiple>
                <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Tags</label>
            <input type="text" name="tags" id="" class="form-control mobile_full " id="inputEmail3" value="<?php echo $row_edit['tags']; ?>" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Model</label>
            <input type="text" name="model" id="" class="form-control mobile_full" id="inputEmail3" value="<?php echo $row_edit['model']; ?>" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Quantity</label>
            <input type="text" name="quantity" id="" class="form-control mobile_full " id="inputEmail3" value="<?php echo $row_edit['quantity']; ?>" >
          </div>
        </div>
    </section>
    <section id="section-linebox-2">
    <div class="row">
    <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label "> Price * </label>
            <input type="text" name= "price" id="price" class="form-control overall mobile_full" value="<?php echo $row_edit['price']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail3" class="col-sm-6 control-label ">Discount Percent * </label>
            <input type="text" name= "discount" id="discount" class="form-control discount mobile_full" id="inputEmail3" value="<?php echo $row_edit['discount']; ?>">
          </div>
        <div class="form-group col-md-6">
           <label for="inputEmail3" class="col-sm-6 control-label ">Final Price * </label>
            <input type="text" name= "final_price" id="final" class="form-control final mobile_full" id="inputEmail3" value="<?php echo $row_edit['final_price']; ?>">
        </div>
          </div>
      </section> 
      <section id="section-linebox-4">
          <div class="row">
        <div class="form-group col-md-6">
           <label for="inputEmail3" class="col-sm-6 control-label ">Product Description</label>
            <textarea name="description" id="" cols="20" rows="10" class="form-control mobile_full" value="<?php echo $row_edit['description']; ?>"></textarea>
        </div>
        </div>
      </section>
      <section id="section-linebox-">
          <div class="row table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Color</th>
                  <th>Sub images</th>
                  <th>Add</th>
                </tr>
              </thead>
              <tbody id="tb_next">
                <tr>
                  <td><input type="text" name="color[]" id="" class="form-control " id="inputEmail3" placeholder="Color" ></td>
                  <td class="row"><div class="col-md-10"><input type="file" name="sub_img[]" class="custom-file-input mobile_full" id="exampleInputFile" ><label class="custom-file-label" for="exampleInputFile">Choose Sub Images</label></div></td>
                  <td><a href="javascript:void(0);" class="addCF col-sm-1">
							 <button type="button" style="" id="btn1" class="btn btn-info btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
							 </button> 
						</a></td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="box-footer">
        <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
        </div>
      </section> <!-- /.box-body -->
<?php   }
    } ?>
  
        
        <!-- /.box-footer -->
    </form>
   </div>
    </div>
    </div>
  </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>
<script>
  $(document).ready(function(){
			$(".addCF").click(function(){
				$("#tb_next").append('<tr><td><input type="text" name="color[]" id="" class="form-control" id="" placeholder="Color" required></td><td class="row"><div class="col-md-10"><input type="file" name="sub_img[]" class="custom-file-input" id="exampleInputFile" ><label class="custom-file-label" for="exampleInputFile">Choose Sub Images</label></div></td><td><a href="javascript:void(0);" class="Remove col-sm-1"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></td></tr>');
        });
      });	
    $(document).on('click', "a.Remove", function() { 
			      $(this).parent().parent().remove();
		});
</script>

<script>
    /**
 * cbpFWTabs.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * https://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;
(function(window) {

  'use strict';

  function extend(a, b) {
    for (var key in b) {
      if (b.hasOwnProperty(key)) {
        a[key] = b[key];
      }
    }
    return a;
  }

  function CBPFWTabs(el, options) {
    this.el = el;
    this.options = extend({}, this.options);
    extend(this.options, options);
    this._init();
  }

  CBPFWTabs.prototype.options = {
    start: 0
  };

  CBPFWTabs.prototype._init = function() {
    // tabs elems
    this.tabs = [].slice.call(this.el.querySelectorAll('nav > ul > li'));
    // content items
    this.items = [].slice.call(this.el.querySelectorAll('.content-wrap > section'));
    // current index
    this.current = -1;
    // show current content item
    this._show();
    // init events
    this._initEvents();
  };

  CBPFWTabs.prototype._initEvents = function() {
    var self = this;
    this.tabs.forEach(function(tab, idx) {
      tab.addEventListener('click', function(ev) {
        ev.preventDefault();
        self._show(idx);
      });
    });
  };

  CBPFWTabs.prototype._show = function(idx) {
    if (this.current >= 0) {
      this.tabs[this.current].className = this.items[this.current].className = '';
    }
    // change current
    this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
    this.tabs[this.current].className = 'tab-current';
    this.items[this.current].className = 'content-current';
  };

  // add to global namespace
  window.CBPFWTabs = CBPFWTabs;

})(window);

(function() {

  [].slice.call(document.querySelectorAll('.tabs')).forEach(function(el) {
    new CBPFWTabs(el);
  });

})();
</script>

<script>
    $(document).on('keyup','.discount',function(){
        var discount=Number($(this).val());
        var overall=Number($('.overall').val());
        var dis_amount=(overall*discount)/100;
        var final=overall-dis_amount;
        $('.final').val(final);
    });
    $(document).on('change','#category',function(){
      var category=$(this).val();
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
            url: base_url+'Admin/sub_cat',
            type: 'POST',
            data: "category=" + category ,
            success: function(data) {
                $('#sub_category').html(data);
            }
        });
    });
    </script> 
