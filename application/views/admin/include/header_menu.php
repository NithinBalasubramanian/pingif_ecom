
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <div class="sidebar_scroll">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion disp " id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          PINGIF_ECOM
          
        </div>
        <div class="sidebar-brand-text mx-3">  </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        New Invoice
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone489" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Invoice *</span>
        </a>
        <div id="collapseone489" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Invoice Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/vendor/add_vendor">Add Invoice</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/customer/list_customer">List Invoice</a>
          </div>
        </div>
      </li>
      <!-- Heading -->
      <div class="sidebar-heading">
        Product Management
      </div>
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone1" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-list"></i>
          <span>Product</span>
        </a>
        <div id="collapseone1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/category/list_category">Category *</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/sub_category/list_sub_category">Sub Category *</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/brands/list_brands"> Brands *</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/products/list_products">All Products</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
      Shop Management
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone41" aria-expanded="true" aria-controls="collapseone41">
          <i class="fa fa-user-plus"></i>
          <span>Shop</span>
        </a>
        <div id="collapseone41" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Shop Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/shop/add_shop">Add Shop</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/shop/list_shop">List Shop</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone42" aria-expanded="true" aria-controls="collapseone42">
          <i class="fa fa-usd"></i>
          <span>Orders *</span>
        </a>
        <div id="collapseone42" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders Management:</h6>
            <!-- <a class="collapse-item" href="<?php echo base_url();?>View_admin/vendor/add_vendor">Add Vendor</a> -->
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/orders/list_orders">List Orders</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Customers Management 
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone43" aria-expanded="true" aria-controls="collapseone43">
          <i class="fa fa-users"></i>
          <span>Customers *</span>
        </a>
        <div id="collapseone43" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customers Management:</h6>
            <!-- <a class="collapse-item" href="<?php echo base_url();?>View_admin/vendor/add_vendor">Add Vendor</a> -->
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/customer/list_customer">List Customers</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Reports 
      </div>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-address-book"></i>
          <span>Vendor Report *</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-address-book"></i>
          <span>Order Report *</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-address-book"></i>
          <span>Product Report *</span>
        </a>
      </li>
      <div class="sidebar-heading">
        General Setting
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone44" aria-expanded="true" aria-controls="collapseone44">
          <i class="fa fa-cog"></i>
          <span>Settings</span>
        </a>
        <div id="collapseone44" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Settings Management:</h6>
            <!-- <a class="collapse-item" href="<?php echo base_url();?>View_admin/vendor/add_vendor">Add Vendor</a> -->
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/setting/profile_setting">Profile Settings</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/setting/api_setting">Ad API Setting</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/setting/smpt_setting">SMPT Setting</a>
          </div> 
        </div>
      </li>
            <!-- Divider -->
          <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Plan Management
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone439" aria-expanded="true" aria-controls="collapseone431">
          <i class="fa fa-plus"></i>
          <span>Plan Management</span>
        </a>
        <div id="collapseone439" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Plan Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/plan/add_plan">Add Plan</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/plan/list_plan">List Plan</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Front UI 
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone431" aria-expanded="true" aria-controls="collapseone431">
          <i class="fa fa-plus"></i>
          <span>Banner *</span>
        </a>
        <div id="collapseone431" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Banner Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/banner/add_banner">Add Banner</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/banner/list_banner">List Banner</a>
          </div>
        </div>
      </li>
      <div class="sidebar-heading">
        Administration
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone45" aria-expanded="true" aria-controls="collapseone45">
          <i class="fa fa-lock"></i>
          <span>Profile</span>
        </a>
        <div id="collapseone45" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin Management:</h6>
            <!-- <a class="collapse-item" href="<?php echo base_url();?>View_admin/vendor/add_vendor">Add Vendor</a> -->
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/admin_profile/view_profile">View Profile</a>
          </div>
        </div>
      </li>
      <!-- Heading -->
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
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">admin</span>
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/admin/img/default/img.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <div class="dropdown-item" onclick="disp_profile()">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/logout" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>