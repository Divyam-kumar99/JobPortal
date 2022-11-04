<?php
$this->load->view('Admin/header');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employee Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url().'index.php/Admin/Empcrud/index';?>">View Employees</a></li>
              <li class="breadcrumb-item active">Edit Employee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg bg-primary">Edit Employee info
              </div>
            <form action="<?= base_url().'Admin/Empcrud/edit/'.$arr['id'];?>" name="newadmin" id="newadmin" method="post" enctype="multipart/form-data">
              <div class="card-body">

              <div class="form-group">
              <label for="empname">Employee Name<sup style="color:red">*</sup></label>
              <input type="text" name="name" id="empname" placeholder="Enter the employee name" value="<?= set_value('name', $arr['name']);?>" class="form-control <?=(form_error('name')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('name');?>
              </div>

              <div class="form-group">
              <label for="email">Mail Id<sup style="color:red">*</sup></label>
              <input type="email" name="email" id="email" value="<?= set_value('email',$arr['email']);?>" placeholder="Enter the employee mail id" class="form-control <?=(form_error('email')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('email');?>
              </div>

              <div class="form-group">
              <label for="phone_no">Phone<sup style="color:red">*</sup></label>
              <input type="tel" name="phone" id="phone_no" value="<?= set_value('phone', $arr['phone']);?>" placeholder="Enter the employee phone number" class="form-control <?=(form_error('phone')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('phone');?>
              </div>

              <label for="Sts">Status<sup style="color:red">*</sup></label>
              <div class="form-row">
              <div class="form-group mr-3">
                <input type="radio" id="interviewer" name="role" value="1" <?php echo ($arr['role']==1) ?'checked' :'';?>>
                <label for="interviewer">Interviewer</label>
              </div>
              <div class="form-group">
                <input type="radio" id="hr" name="role" value="0" <?php echo ($arr['role']==0) ?'checked' :'';?>>
                <label for="hr">HR</label>
              </div>
              </div>
              <div class="form-row">

              <div class="form-group mr-3">
              <button type="submit" class="btn btn-primary py-1 px-3">Update</a>
              </div>
              <?php echo validation_errors();?>
              <div class="form-group">
              <a href="<?= base_url().'index.php/Admin/Empcrud/index';?>" class="btn btn-secondary py-1 px-3">Back</a>
              </div>
              </div>

              <div>
              <p class="text-danger" style="font-size:14px;">All fields marked with <sup><strong>*</strong></sup> are mandatory</p>
              </div>

              </div>
            </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
<?php
$this->load->view('Admin/footer');
?>