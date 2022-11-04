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
            <h1 class="m-0">Jobs Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Jobs</a></li>
              <li class="breadcrumb-item active">View Jobs</li>
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

          <?php
          $success=$this->session->flashdata('success');
          $fail=$this->session->flashdata('failure');
          if($success!=""){?>
            <div class="alert alert-success alert-dismissible fade show text-center"><?= $success;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <?php }else if($fail !=""){ ?>
            <div class="alert alert-danger alert-dismissible fade show text-center"><?= $fail;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> <?php } else{} ?>
          
            <div class="card">
              <div class="card-header">
              <div class="card-tools">
                <a href="<?= base_url().'index.php/Admin/Jobs/create';?>" class="btn btn-primary px-3"><i class="fas fa-plus">Create New Job</i></a>
                </div>
              </div>
              <div class="card-body">
              <!--table-->
              <table class="table table-responsive table-bordered" id="myTable1">

                  <thead>  
                    <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col" width="120">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Min. Exp.</th>
                    <th scope="col">Openings</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
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
                    <td>
                    <?php
                    $path= './Assets/Uploads/Jobs/Thumb/'. $arr['image'];
                    if($arr['image'] != "" && file_exists($path)){
                    ?>
                    <img class="w-100" src= "<?= base_url('Assets/Uploads/Jobs/Thumb/'. $arr['image'])?>">
                    <?php } ?>
                    </td>
                    <td><?= $arr['title'];?></td>
                    <td><?= $arr['min_exp'];?></td>
                    <td><?= $arr['openings'];?></td>
                    <td><?= date('d-M-Y', strtotime($arr['created']));?></td>
                    <td>
                    <?php
                    if($arr['status']== 1){
                    ?>
                    <span class="badge badge-success px-2 py-1">Active</span>
                    <?php
                    }
                    else{
                    ?>
                    <span class="badge badge-dark px-2 py-1 ">Inactive</span>
                    <?php }
                    ?>
                    </td>
                    <td>
                    <a href="<?= base_url().'index.php/Admin/Jobs/edit/'.$arr['id'];?>" class="btn btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="javascript::void(0); " onclick="deletejob(<?= $arr['id'];?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Delete</a>
                    </td>
                    </tr>
                
            <?php $i++;
            }
          }
            else{
            ?>
              <tr>
              <td colspan="8" class="alert alert-danger">Jobs not found</td>
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
  function deletejob(id){
    //console.log(title);
    if(confirm("Are you sure you want to remove this job")){
      window.location.href='<?php echo base_url("admin/Jobs/delete/");?>'+id;

    }
  }
  </script>
  <script>
  $(document).ready(function () {
    $('#myTable1').DataTable({
      "order":[[6, "desc"]]
    });
  });
</script>