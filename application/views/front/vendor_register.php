<?php $this->load->view('front/header.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tab/tabs.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tab/tabstyles.css" />
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head> -->
<style>

</style>
<body>
<div class="a">
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wiz-container">
                <div class="wizard-header text-center">
                    <h2 class="pax">PAXXEI</h2>
                    <h3 class="cre">Create a Store</h3>
                    <p class="para">This information will let us know more about you.</p>
                </div>
            </div>
		</div>
</div>
    <div class="container">
			<section>
                <form action="<?php echo base_url(); ?>vendor/vendor_register" method="post" enctype="multipart/form-data" >
				<div class="tabs tabs-style-fillup">
					<nav>
						<ul>
							<li ><a href="#section-fillup-1" class="icon icon-home f"><span class="h">Login Details</span></a></li>
							<li><a href="#section-fillup-2" class="icon icon-gift f"><span class="h">Shop Details</span></a></li>
							<li><a href="#section-fillup-3" class="icon icon-upload f"><span class="h">Document</span></a></li>
							<li><a href="#section-fillup-4" class="icon icon-coffee f"><span class="h">Banking</span></a></li>
							<li><a href="#section-fillup-5" class="icon icon-config f"><span class="h">VAT</span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-fillup-1">
						<h2 class="mb-5">Login Details</h2>
                       <div class="row justify-content-md-center mt-5 mb-5">
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">First Name * </label>
                                <input type="text" name="fname" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Last Name </label>
                                <input type="text" name="lname" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Last Name " >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Contact *</label>
                                <input type="text" name="contact" max-length="" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Contact " >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Sec contact </label>
                                <input type="text" name="sec_contact" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Sec contact  " >
                            </div>
                           <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Email * </label>
                                <input type="email" name="email" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Password * </label>
                                <input type="password" name="password" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Password" required>
                            </div>
                        </div>
						</section>
						<section id="section-fillup-2">
                        <h2 class="mb-5">Shop Details</h2>
                       <div class="row justify-content-md-center mt-5 mb-5">
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Company Legal Name * </label>
                                <input type="text" name="com_name" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Company Legal Name " required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Official Contact * </label>
                                <input type="text" name="off_contact" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Official Contact" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail3" class="col-sm-6 control-label">Description</label>
                                <textarea type="text" name="description" max-length="" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Description " ></textarea>
                            </div>

                        </div>
                        </section>
						<section id="section-fillup-3">
                        <h2 class="mb-5">Documents</h2>
                       <div class="row justify-content-md-center mt-5 mb-5">
                        <div class="form-group col-md-6">
                            <label for="inputEmail3" class="col-sm-6 control-label">Upload Trade Licences *</label>
                                <div class="col-sm-12">
                                <input type="file" name="trade" class="custom-file-input form-control  mobile_full" id="exampleInputFile" >
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail3" class="col-sm-6 control-label">Upload National ID * </label>
                                <div class="col-sm-12">
                                <input type="file" name="id" class="custom-file-input form-control mobile_full" id="exampleInputFile" >
                                
                                </div>
                            </div>
                            </div>
                        </section>
						<section id="section-fillup-4">
                        <h2 class="mb-5">Banking Details</h2>
                       <div class="row justify-content-md-center mt-5 mb-5">
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Beneficiary Name</label>
                                <input type="text" name= "" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Company Legal Name " >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Bank Name</label>
                                <input type="text" name= "" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Official Contact" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Branch Name</label>
                                <input type="text" name= "" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Official Contact" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Account Number</label>
                                <input type="text" name= "" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Official Contact" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">IFSC Code</label>
                                <input type="text" name= "" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Official Contact" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-6 control-label">Swift Code</label>
                                <input type="text" name= "" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Official Contact" >
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">Upload Stamped Bank Document</label>
                                <div class="col-sm-12">
                                <input type="file" name="" class="custom-file-input form-control mobile_full" id="exampleInputFile" >
                                
                                </div>
                        </div>
                        </section>
						<section id="section-fillup-5">
                        <h2 class="mb-5">Shop Details</h2>
                       <div class="row justify-content-md-center mt-5 mb-5">
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-12 control-label">Tax Registration Number *</label>
                                <input type="text" name="registration_num" id="" class="form-control mobile_full" id="inputEmail3" placeholder="Enter Tax Registration Number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail3" class="col-sm-12 control-label">Upload Tax Registration Certificate *</label>
                                <input type="file" name="tax" class="custom-file-input form-control mobile_full" id="exampleInputFile" >
                            </div>
                            <br>
                            <i style="padding:20px;" class="col-md-12">I acknowledge and agree that paxxie will be raising and facilitating VAT invoices and credit notes on behalf of my company in relation to consumer transactions on the paxxie site.</i>
                            <div class="form-group col-md-6 mt-5">
                                <input type="checkbox" name="agree" id="" class="mobile_full" id="inputEmail3" placeholder="Enter Official Contact" required value="1"> I Agree *
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-success" >SUBMIT</button>
                        </div>
                        </section>
					</div><!-- /content -->
                </div><!-- /tabs -->
               
            </section>
            <form>
		</div><!-- /container -->
    </div>

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
</body>
</html>