<?php
$this->load->view('Admin/header1');
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
<?php 
$val= $this->session->userdata('employees');
?>
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
              <li class="breadcrumb-item"><a href="#">Candidates</a></li>
              <li class="breadcrumb-item active">View Candidates</li>
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
              <!-- <div class="card-header">
                <div class="card-title">
                <form name="search" id="search" name="q" method="get" action="" value="<?= $queryString;?>">
                <div class="input-group">
                <input type="text" placeholder="search" class="form-control" name="q">
                <div class="input-group-append">
                <button class="input-group-text" id="searchbtn"><i class="fas fa-search"></i></button>
                </div>
                <a href="<?//= base_url().'index.php/Admin/Candidates/index/'?>" class="btn btn-navy ml-3 px-3"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
                </form>
                </div>
                
              </div> -->
              <div class="card-body">
              <!--table-->
              <table class="table  table-responsive  table-bordered" id="myTable3">
                
                  <thead>
                    <tr>
                    <th scope="col">Sl no.</th>
                    <th scope="col">Candidate Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">PI date</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Applied For</th>
                    <th scope="col">Action</th>

                    </tr>
                  </thead>

                  <tbody>
                    <?php
              if(!empty($arr)){
                $i=1;
                foreach($arr as $arr){
          
                  if($arr['status']!=5 && $arr['status']!=6){
            ?>
                
                    <tr>
                    <td><?= $i;?></td>
                    <td><?= $arr['name'];?></td>
                    <td><?= $arr['email'];?></td>
                    <td><?= $arr['prev_exp'];?></td>
                    <td><?= $arr['phone'];?></td>
                    <td><?= $arr['pi_date'];?></td>

                    <td>
                    <?php
                    $path= './Assets/Uploads/Jobs/'. $arr['resume'];
                    if($arr['resume'] != "" && file_exists($path)){
                    ?>
                    <a href= "<?= base_url('Assets/Uploads/Jobs/'. $arr['resume'])?>" target="blank" class="btn btn-warning btn-sm">View Resume</a>
                    <?php } ?>
                    </td>
                    <td><?=$arr['title']?></td> 

                    <td>
                    
                    <select id="change<?= $arr['id'];?>" onchange=mod(<?= $arr['id'];?>) name="status">
                    
                      <option value="" selected disabled>Choose</option>
                      <?php foreach($sts as $status){ 
                        //$selected= ($sts['status_value'] == $arr['status']) ?true :false;
                      ?>
                      <?php if($status['sts_value']==5 ||$status['sts_value']==6){?>
                      <option value="<?=$status['sts_value']?>"><?=$status['sts_name']?></option><?php } }?>
                      <!-- <option value="2">Rejected</option>
                      <option value="3">On hold</option>
                      <option value="4">Interview Scheduled</option> -->
                    </select>
                    
                    <!--modal-1-->
                    <div class="modal fade" tabindex="-1" id="changestatus<?= $arr['id'];?>" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Feedback</h4>
                          </div>
                          <div class="modal-body">
                          <form action="<?=base_url().'Admin/Interviewee/fb/'.$arr['id'];?>" method="post">
                            <input type="text" name="feedback" placeholder="share your feedback">
                            <input type="number" name="changests" id="changests<?=$arr['id']?>" style="display:none;">
                          
                          </div>
                          <div class="form-row">
                            <div class="form-group col-12 col-sm-4 text-left pl-4">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            </div>
                            <div class="form-group col-12 col-sm-8 text-right pr-4">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                          </div>
                          </form>
              
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog --> 
                    </div><!-- /.modal -->
                    </td>
                    </tr>
               
            <?php $i++;
              }
            }
          }
            else{
            ?>
              <tr>
              <td colspan="8" class="alert alert-danger">No interviews not found</td>
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
  function mod(id){
    console.log("hello id=" + id );
    option=document.getElementById("change"+id).value
    console.log(option); 
      if(option=="5"||option=="6"){ //Compare it and if true
          $('#changests'+id).val(option);
          $('#changestatus'+id).modal("show", option); //Open Modal
      }
  }
  </script>
  <script>
  $(document).ready(function () {
    $('#myTable3').DataTable({
      "order":[[6, "desc"]]
    });
  });
</script>