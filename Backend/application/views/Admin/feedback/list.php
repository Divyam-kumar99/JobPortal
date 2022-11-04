<?php
$this->load->view('Admin/header');
?>
<!-- Content Wrapper. Contains page content -->
<style>
th,td{
  text-align:center;
}
.btn-navy{
  background-color: navy!important;
  color:white;
}
.btn-navy:hover{
  color:#f9f9f3;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Feedback Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Feedback</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
        
            <div class="card">
              
              <div class="card-body">
              <!--table-->
              <table class="table table-responsive d-table table-bordered" id="myTable">
              
                <thead>
                    <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Candidate Name</th>
                    <th scope="col">Candidate Status</th>
                    <th scope="col">Feedback</th>
                    </tr>
                </thead>

                <tbody>   
                    <?php
                      if(!empty($arr)){
                        $i=1;
                        foreach($arr as $arr){
                    ?>
                        
                    <tr>
                    <td><?= $i;?></td>
                    <td><?= $arr['name'];?></td>
                    <td><?= $arr['c_status'];?></td>
                    <td><?= $arr['c_feedback'];?></td>  
                    </tr>
            
            <?php  $i++;
            }
          }
            else{
            ?>
              <tr>
              <td colspan="8" class="text-center alert alert-danger">Feedbacks not found</td>
              </tr>
            <?php } 

            ?>
              </tbody>
              </table>
              <!---table end-->
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<?php
$this->load->view('Admin/footer');
?>
<script type="text/javascript">
  function deleteemployee(id){
    if(confirm("Are you sure you want to remove this employee")){
      window.location.href='<?php echo base_url("admin/Empcrud/delete/");?>'+id;

    }
  }
  </script>