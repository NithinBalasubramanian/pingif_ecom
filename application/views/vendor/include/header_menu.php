
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <div class="sidebar_scroll">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion disp " id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <!-- PINGIF_ECOM -->
          <?php if($this->session->userdata('type')=='shop'){ 
          $id = $this->session->userdata('id');
          $shop=$this->Admin_model->table_column('shop','id',$id);
          if(count($shop) > 0)
          {
            foreach($shop as $row_shop)
            {
              echo $row_shop['shop_name'];
            }
          }
           } ?>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Invoice & Purchase
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone439" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Invoice</span>
        </a>
        <div id="collapseone439" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Invoice Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/invoice/add_invoice">Add Invoice</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/invoice/list_invoice">List Invoice</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone437" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Purchase</span>
        </a>
        <div id="collapseone437" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Purchase Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/purchase_invoice/add_pur_invoice">Add Purchase</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/purchase_invoice/list_pur_invoice">List Purchase</a>
          </div>
        </div>
      </li>
      <!-- Heading -->
      <div class="sidebar-heading">
        Product Management
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone1" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-plus"></i>
          <span>Product</span>
        </a>
        <div id="collapseone1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/category/list_category"> Category</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/sub_category/list_sub_category"> Sub Category</a>
            <a class="collapse-item" href="<?php echo base_url();?>">Brands</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/products/list_products">All Products</a>
          </div>
        </div>
      </li>
    
      <!-- Nav Item - Pages Collapse Menu -->
      <div class="sidebar-heading">
        Order Management
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone42" aria-expanded="true" aria-controls="collapseone42">
          <i class="fa fa-usd"></i>
          <span>Orders</span>
        </a>
        <div id="collapseone42" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders Management:</h6>
            <!-- <a class="collapse-item" href="<?php echo base_url();?>View_admin/vendor/add_vendor">Add Vendor</a> -->
            <a class="collapse-item" href="<?php echo base_url();?>">List Orders</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Master 
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone43" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Customers</span>
        </a>
        <div id="collapseone43" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <h6 class="collapse-header">Customers Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/shop_customer/add_customer">Add Customer</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/shop_customer/list_customer">List Customers</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/shop_customer/delete_customer">Deleted Customers</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone438" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Supplier</span>
        </a>
        <div id="collapseone438" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Supplier Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/supplier/add_supplier">Add Supplier</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/supplier/list_supplier">List Supplier</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/supplier/delete_supplier">Deleted Supplier</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone4389" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Employee</span>
        </a>
        <div id="collapseone4389" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/employee/add_employee">Add Employee</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/employee/list_employee">List Employee</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/employee/delete_employee">Deleted Employee</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Reports
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>View_vendor/report/invoice_report">
          <i class="fas fa-address-book"></i>
          <span>Invoice Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>View_vendor/report/purchase_report">
          <i class="fas fa-address-book"></i>
          <span>Product Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-address-book"></i>
          <span>Order & Sales Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-address-book"></i>
          <span>Overall  Report</span>
        </a>
      </li>
            <!-- Divider -->
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Shop Setting
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone424" aria-expanded="true" aria-controls="collapseone42">
          <i class="fas fa-user"></i>
          <span>Shop Management</span>
        </a>
        <div id="collapseone424" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Shop Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/shop_management/invoice_type">Invoice Type</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/shop_management/sms_setting">SMS Setting</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/shop_management/email_setting">Email Setting</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Plan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone423" aria-expanded="true" aria-controls="collapseone42">
          <i class="fas fa-user"></i>
          <span>Plan Management</span>
        </a>
        <div id="collapseone423" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Plan Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/plan/update_plan">Update Plan</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/plan/view_plan">View Plans</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Profile
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone421" aria-expanded="true" aria-controls="collapseone42">
          <i class="fas fa-user"></i>
          <span>Profile</span>
        </a>
        <div id="collapseone421" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_vendor/profile/view_profile">View Profile</a>
          </div>
        </div>
      </li>
      <!-- Heading -->
     

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->
    </ul>
          </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
           
            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">
      <!-- <?php $data=$this->session->userdata('user_vendor_id'); echo $data['user_name']; ?> -->
      <?php if($this->session->userdata('type')=='shop'){ 
          $id = $this->session->userdata('id');
          $owner=$this->Admin_model->table_column('shop','id',$id);
          if(count($owner) > 0)
          {
            foreach($owner as $row_owner)
            {
              echo $row_owner['owner_name'];
            }
          }
           } ?>
    
    </span>
      
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/admin/img/default/img.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <div class="dropdown-item" onclick="disp_profile()">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
</div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>Vendor/logout" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>