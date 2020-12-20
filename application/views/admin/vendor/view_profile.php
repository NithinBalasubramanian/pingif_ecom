<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / View Vendor Profile</h1>
  <a href="<?php echo base_url();?>View_admin/vendor/list_vendor" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Vendor</a>
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
      <h6 class="m-0 font-weight-bold text-primary"> View Vendor Profile</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <?php $pro_data=$this->Admin_model->table_column('vendor','id',$edit_id);
        foreach($pro_data as $p_row){
            $ven_details=$this->Admin_model->table_column('vendor_details','vendor_id',$p_row['vendor_id']);
            foreach($ven_details as $row){  ?>
        <div class="row">
        <div class="col-md-10"><h2><b> Name : <?php echo $row['f_name']; ?> <?php echo $row['l_name']; ?></b></h2></div>
            <div class="col-md-2"> <a href="<?php echo base_url();?>View_vendor/" class=" d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-add"></i> Edit Profile</a></div><br>
            <div class="col-md-4"><img <?php if($p_row['img'] != ''){ ?> src="<?php echo base_url(); ?>assets/admin/img/" <?php }else{ ?> src="<?php echo base_url(); ?>assets/admin/img/default/img.png"<?php } ?> width="80%" height="300px"></div>
            <div class="col-md-8">
                <table class="table">
                    <tr style="color:black;">
                        <th>Title</th>
                        <th>Detail</th>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><?php echo $row['f_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><?php echo $row['l_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Secondary Contact</td>
                        <td><?php echo $row['sec_contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $p_row['email']; ?></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Company Legal Name</td>
                        <td><?php echo $row['com_name']; ?></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Company Office Number</td>
                        <td><?php echo $row['off_contact']; ?></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><?php echo $row['description']; ?></td>
                    </tr>
                    <tr>
                        <td>Trade Licences </td>
                        <td><a href="<?php echo base_url(); ?>assets/vendor/uploads/<?php echo $row['trade']; ?>" download class="btn btn-sm btn-primary">Download Trade Licence</a></td>
                    </tr>
                    <tr>
                        <td>National Id</td>
                        <td><a href="<?php echo base_url(); ?>assets/vendor/uploads/<?php echo $row['national_id']; ?>" download class="btn btn-sm btn-primary">Download National ID</a></td>
                    </tr>
                    <tr>
                        <td>Tax Register umber</td>
                        <td><?php echo $row['registration_num']; ?></td>
                    </tr>
                    <tr>
                        <td>Tax Certificate</td>
                        <td><a href="<?php echo base_url(); ?>assets/vendor/uploads/<?php echo $row['tax_certificate']; ?>" download class="btn btn-sm btn-primary">Download Tax Certificate</a></td>
                    </tr>
                    <tr>
                        <td>Verify</td>
        <td><?php if($p_row['verify']=='1'){ ?><p class="btn btn-sm btn-success">Veified</p><?php }else{ ?><p class="btn btn-sm btn-danger">Un Veified</p><?php } ?> </td>
                    </tr>
                    <tr>
                        <td>Status</td>
        <td><?php if($p_row['status']=='1'){ ?><p class="btn btn-sm btn-success">Online</p><?php }else{ ?><p class="btn btn-sm btn-danger">Offline</p><?php } ?> </td>
                    </tr>
                    <tr>
                        <td>Product uploaded</td>
                        <td><?php echo $p_row['upload_count']; ?></td>
                    </tr>
                    <tr>
                        <td>Visited count</td>
                        <td><?php echo $p_row['visit_count']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php  } } ?>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('admin/include/footer'); ?>
