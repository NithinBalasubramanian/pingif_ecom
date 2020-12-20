<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/header_menu'); 
  ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / View Admin Profile</h1>
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
      <h6 class="m-0 font-weight-bold text-primary"> View Admin Profile</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <?php $pro_data=$this->Admin_model->table_column('admin','id',$this->session->userdata('user_id'));
        foreach($pro_data as $p_row){ ?>
        <div class="row">
            <div class="col-md-10"><h2><b> Name : <?php echo $p_row['name']; ?></b></h2></div>
            <div class="col-md-2"> <a href="<?php echo base_url();?>View_admin/" class=" d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-add"></i> Edit Profile</a></div>
        <div class="col-md-4"><img <?php if($p_row['img'] != ''){ ?> src="<?php echo base_url(); ?>assets/admin/img/" <?php }else{ ?> src="<?php echo base_url(); ?>assets/admin/img/default/img.png"<?php } ?> width="80%" height="300px"></div>
            <div class="col-md-8">
                <table class="table">
                    <tr style="color:black;">
                        <th>Title</th>
                        <th>Detail</th>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo $p_row['contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Secondary Contact</td>
                        <td><?php echo $p_row['sec_contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $p_row['email']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('admin/include/footer'); ?>
