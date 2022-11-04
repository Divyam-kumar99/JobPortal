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
            <h1 class="m-0">Employees Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Employees</li>
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
          $fail=$this->session->flashdata('fail');

          if($success!=""){?>
          <div class="alert alert-success alert-dismissible fade show text-center"><?= $success;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <?php } else if ($fail!=""){ ?>
            <div class="alert alert-danger alert-dismissible fade show text-center"><?= $fail;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div> <?php } else{} ?>


            <div class="card">
              <div class="card-header">
                <!-- <div class="card-title">
                <form name="search" id="search" method="get" action="">
                <div class="input-group">
                <input type="text" name="srch" placeholder="search" class="form-control">
                <div class="input-group-append">
                <button class="input-group-text" id="serachbtn"><i class="fas fa-search"></i></button>
                </div>
                <a href="<?//= base_url().'index.php/Admin/Empcrud/index';?>" class="btn btn-navy ml-3 px-3"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
                </form>
                </div> -->
                <div class="card-tools">
                <a href="<?= base_url().'index.php/Admin/Empcrud/create';?>" class="btn btn-primary px-3"><i class="fas fa-plus">Create New Employee</i></a>
                </div>
              </div>
              <div class="card-body">
              <!--table-->
              <table class="table table-responsive d-table table-bordered" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Mail Id</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Role</th>
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
                    <td><?= $arr['name'];?></td>
                    <td><?= $arr['email'];?></td>
                    <td><?= $arr['phone'];?></td>
                    <td>
                    <?php if($arr['role']==1){?>
                    <span>Interviewer</span>
                    <?php }else {?>
                    <span>HR</span>
                    <?php }?></td>
                    
                    <td>
                    <a href="<?= base_url().'index.php/Admin/Empcrud/edit/'.$arr['id'];?>" class="btn btn-primary btn-sm"><i class="far fa-edit"></i>Edit</a>
                    <a href="javascript::void(0); " onclick="deleteemployee(<?= $arr['id']?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Delete</a>
                    </td>
                    </tr>
            
            <?php  $i++;
            }
          }
            else{
            ?>
              <tr>
              <td colspan="8" class="text-center alert alert-danger">Employees not found</td>
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