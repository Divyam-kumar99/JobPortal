<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url().'Assets/Admin/plugins/jquery/jquery.min.js';?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url().'Assets/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'Assets/Admin/dist/js/adminlte.min.js';?>"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url().'Assets/Admin/plugins/summernote/summernote-bs4.js';?>"></script>

<script>
  $(function(){
    $('.textarea').summernote({
      height:'400px'
    })
  })
</script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable();

  });
</script>

<script type="text/javascript">
function deletejob(id){
  //console.log(title);
  if(confirm("Are you sure you want to remove this job")){
    window.location.href='<?php echo base_url("admin/Jobs/delete/");?>'+id;

  }
}
</script>

  <script>
  function mod(id){
    console.log("hello id=" + id );
    option=document.getElementById("change"+id).value
    console.log(option); 
      if(option=="0"||option=="1"||option=="2"||option=="3"||option=="5"||option=="6"){ //Compare it and if true
          $('#changests'+id).val(option);
          $('#changestatus'+id).modal("show", option); //Open Modal
      }
      else{
        $('#interview'+id).modal("show",option);
      }
 
  }
  </script>
</body>
</html>
