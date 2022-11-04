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
              <!-- <div class="card-header"> -->
                <div class="card-title">
                <!-- <form name="search" id="search" name="q" method="get" action="" value="<?= $queryString;?>">
                <div class="input-group">
                <input type="text" placeholder="search" class="form-control" name="q">
                <div class="input-group-append">
                <button class="input-group-text" id="searchbtn"><i class="fas fa-search"></i></button>
                </div>
                <a href="<?//= base_url().'index.php/Admin/Candidates/index/'?>" class="btn btn-navy ml-3 px-3"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
                </form> -->
                <!-- </div> -->
                
              </div>
              <div class="card-body">
              <!--table-->
              
              <table class="table table-responsive table-bordered" id="myTable2">

                    <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Candidate Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Applied For</th>
                    <th scope="col">Applied on</th>
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
                    <td><?= $arr['name'];?></td>
                    <td><?= $arr['email'];?></td>
                    <td><?= $arr['prev_exp'];?></td>
                    <td><?= $arr['phone'];?></td>
                    <td>
                    <?php
                    $path= './Assets/Uploads/Jobs/'. $arr['resume'];
                    if($arr['resume'] != "" && file_exists($path)){
                    ?>
                    <a href= "<?= base_url('Assets/Uploads/Jobs/'. $arr['resume'])?>" target="blank" class="btn btn-warning btn-sm">View Resume</a>
                    <?php } ?>
                    </td>
                    <td><?=$arr['title']?></td>
                    </td>    
                    <td><?= date('d-M-Y', strtotime($arr['applied_on']));?></td>
                    <td><span class="badge badge-success"><?=$arr['status_name']?></span></td>
                    <td>
                    
                    <select id="change<?= $arr['id'];?>" onchange=mod(<?= $arr['id'];?>) name="status">
                    
                      <!-- <option value="" selected disabled>Choose</option> -->
                      <?php foreach($sts as $status){ 
                        $selected= ($status['sts_value'] == $arr['status']) ?true :false;
                      ?>
                      <option <?= set_select('status', $status['id'], $selected);?> <?=($selected) ?'disabled' :'';?> value="<?=$status['sts_value']?>"><?=$status['sts_name']?></option><?php } ?>
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
                          <form action="<?=base_url().'Admin/Candidates/fb/'.$arr['id'];?>" method="post">
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

                    <!--modal-2-->
                    <div class="modal fade" tabindex="-1" id="interview<?= $arr['id'];?>" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title text-center">Schedule an interview</h5>
                          </div>
                          <div class="modal-body">
                          
                            <form action="<?=base_url().'Admin/Candidates/update/'.$arr['id']?>" method="post">
                            <select name="interviewer" class="form-control mb-2" required>
                            <?php foreach($emp as $employee){?>
                              <option value="<?= $employee['id']?>"><?= $employee['name']?></option><?php } ?>
                              <!-- <option value="1">DEF</option>
                              <option value="2">GHI</option>
                              <option value="3">JKL</option>
                              <option value="4">MNO</option> -->
                            </select>
                            <input type="date" name="PI_date" class="form-control" required>
                            

                          </div>
                          <!-- <div class="modal-footer"> -->
                          <div class="form-row">
                          <div class="form-group col-12 col-sm-4 text-left pl-4">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                          </div>
                          <div class="form-group col-12 col-sm-8 text-right pr-4">
                            <button type="submit" class="btn btn-primary btn-sm">Schedule</button>
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
            else{
            ?>
              <tr>
              <td colspan="8" class="alert alert-danger">Candidates not found</td>
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
<script>
  $(document).ready(function () {
    $('#myTable2').DataTable({
      "order":[[7, "desc"]]
    });
  });
</script>
