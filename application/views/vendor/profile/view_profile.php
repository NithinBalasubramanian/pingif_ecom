<?php $this->load->view('vendor/include/header'); ?>
<?php $this->load->view('vendor/include/header_menu'); ?>
<?php $this->load->view('vendor/include/popup.php'); ?>  
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / View Shop Profile</h1>
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
      <h6 class="m-0 font-weight-bold text-primary"> View Shop Profile</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <?php 
        $user_id = $this->session->userdata('id');
         $profile=$this->Admin_model->table_column('shop','id',$user_id);
        foreach($profile as $row){ 
          ?>
        <div class="row">
            <div class="col-md-10"><h2><b> Shop Name : <?php echo $row['shop_name']; ?></b></h2></div>
            <div class="col-md-2"> <a href="<?php echo base_url();?>View_vendor/profile/edit_profile/<?php echo $row['id']; ?>" class=" d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-add"></i> Edit Profile</a></div><br>
            <div class="col-md-4">
            <div class="cross" style="height:50px;width:80%;" data-id="<?php echo $row['id']; ?>" data-table="shop">
            <i class="fa fa-times" aria-hidden="true" style="font-size:25px;float:right;color:red;"></i>
            </div> 
            <img <?php if($row['img'] != ''){ ?>  src="<?php echo base_url(); ?>assets/admin/img/<?php echo $row['img']; ?>" <?php }else{ ?> src="<?php echo base_url(); ?>assets/admin/img/default/img.png"<?php } ?> width="80%" height="300px"><br>
             <button type="submit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#profile_img" style="margin-top:25px;margin-left:80px;">Upload Image</button>
             </div> 
            
            <div class="col-md-8">
                <table class="table">
                    <tr style="color:black;">
                        <th>Title</th>
                        <th>Detail</th>
                    </tr>
                    <tr>
                        <td>Owner Name</td>
                        <td><?php echo $row['owner_name']; ?></td>
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
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><?php echo $row['user_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
        <td><?php if($row['verify']=='1'){ ?><p class="btn btn-sm btn-success">Online</p><?php }else{ ?><p class="btn btn-sm btn-danger">Offline</p><?php } ?> </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php  } ?>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('vendor/include/footer'); ?>
<script>
$(document).on('click','.cross',function(){
    var id = $(this).data('id');
    var table = $(this).data('table');
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Vendor/img_cross",
        type:'POST',
        data:'id='+id+'&table='+table,
        success:function(data)
        {}
    });
});
</script>