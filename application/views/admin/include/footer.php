 <!-- Footer -->
 <footer class="sticky-footer bg-white" style="padding: 17px 0;margin-top: 22px;">
        <div class="container my-auto" style="padding:15px;">
        <div class="row">
        <div class="col-md-6  ">
          <div class="copyright my-auto left_side" style="text-align:center;padding:10px;line-height:18px;">
            <span>Copyright &copy; 
            <script>
	    var d= new Date();
                var year=d.getFullYear();
                if(year != '2020'){
                 document.write('2020 -');
                }
                  document.write(year);
	   </script> - All Right Reserved &nbsp;&nbsp;
	  <span style="font-weight:bold;letter-spacing:1px;color:#5e72e4;">
   
        Pingif_Ecom
    </span>
    </span>
        </div>
        </div>
        <div class="col-md-6">
        <div class="copyright text-center my-auto" style="text-align:center;padding:10px;line-space:17px;">
        <span style="font-weight:bold;letter-spacing:1px;">Developed By : <span style="color:#5e72e4;line-height:20px;">Pingifinit Software Technology || +91 8838825568</span></span>
        </div>
        </div>
        </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <script>
  function disp_profile(){
    document.getElementById('profile').style.display='block';
  }
  function undisp_profile(){
    document.getElementById('profile').style.display='none';
  }
  </script>
  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/admin/js/sb-admin-2.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/typeahead.min.js"></script>
  <!-- table search-->
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>assets/admin/js/demo/datatables-demo.js"></script>


  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/demo/chart-pie-demo.js"></script>
  <script>
	$(document).on('click','.verify',function(){
		var val=$(this).data('val');
        var id=$(this).data('id');
        var tablename='shop';
		var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Admin/verify',
            type: 'POST',
            dataType: "json",
            data: "val=" + val +"&id="+id+"&tablename="+tablename ,
            beforeSend: function(){
                $('.verify_'+id).html('Blocking.....');
            },
            success: function(data) {
                if(data.verify == '1'){
                    $('.verify_'+id).data('val', data.verify);
                    $('.verify_'+id).removeClass('btn-success');
                    $('.verify_'+id).addClass('btn-warning');
                    $('.verify_'+id).html('Block');
                }else{
                    $('.verify_'+id).data('val', data.verify);
                    $('.verify_'+id).removeClass('btn-warning');
                    $('.verify_'+id).addClass('btn-success');
                    $('.verify_'+id).html('Unblock');
                }
            }
        });
	});

</script>
<script>
$(document).on('click','.per_delete',function(){
  var id = $(this).data('id');
  var table = $(this).data('table');
    var base_url="<?php echo base_url(); ?>";
    if(confirm("This may alter sales (or) purchase")){
    $.ajax({
        url:base_url+"Admin/per_del",
        type:'POST',
        dataType:'json',
        data:'id='+id+'&table='+table,
        success:function(data)
        {

        }
    });
    $(this).parent().parent().parent().remove();
    }
});
</script>
</body>

</html>
