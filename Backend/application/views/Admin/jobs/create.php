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
            <h1 class="m-0">Create Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url().'index.php/Admin/Jobs/index';?>">Jobs</a></li>
              <li class="breadcrumb-item active">Create Jobs</li>
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
              <div class="card-header bg bg-primary">Create New Jobs
              </div>
            <form action="<?= base_url().'index.php/Admin/Jobs/create';?>" name="newjob" id="newjob" method="post" enctype="multipart/form-data">
              <div class="card-body">

              <div class="form-group">
              <label for="title">Title<sup style="color:red">*</sup></label>
              <input type="text" name="title" id="title" placeholder="Enter the job title" pattern="[A-Za-z]{1-20}" value="<?= set_value('title');?>" class="form-control <?=(form_error('title')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('title');?>
              </div>
              <!-- <?php //if(!empty($err1)) {//echo $err1;exit();?>
                
                <p class="text-danger">Job Already exists Exists</p>
                <?php
              //}?> -->

              <div class="form-group">
              <label for="description">Description<sup style="color:red">*</sup></label>
              <textarea name="description" id="description" class="textarea <?=(form_error('description')!= "" ) ?'is-invalid' :'';?>"><?= set_value('description');?></textarea>
              <?= form_error('description');?>
              </div>

              <div class="form-group">
              <label for="excerpt">Excerpt<sup style="color:red">*</sup></label>
              <input type="text" name="excerpt" id="title" placeholder="Enter a short job description" value="<?= set_value('excerpt');?>" class="form-control <?=(form_error('excerpt')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('title');?>
              </div>

              <div class="form-group">
              <label for="image">Image<sup style="color:red">*</sup></label>
              <input type="file" name="image" id="image" value="<?= set_value('image');?>" class="form-control <?=(form_error('image')!= "" ) ?'is-invalid' :'';?> py-1">
              <?=(form_error('image'));?>
              <?php echo (!empty($imgerr)) ? $imgerr : '';?>
              </div>

              <div class="form-group">
              <label for="experience">Minimum Experience<sup style="color:red">*</sup></label>
              <input type="number" name="min_exp" min="0" max="20" id="experience" value="<?= set_value('min_exp');?>" placeholder="Enter min experience required" class="form-control <?=(form_error('min_exp')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('min_exp');?>
              </div>

              <div class="form-group">
              <label for="opening">Openings</label>
              <input type="number" name="openings" min="1" id="opening" value="<?= set_value('openings');?>" placeholder="Enter the no. of openings" class="form-control <?=(form_error('openings')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('openings');?>
              </div>

              <div class="form-group">
              <label for="benifit">Benifits</label>
              <input type="text" name="benifits" id="benifit" placeholder="Enter perks and benifits" value="<?= set_value('benifits');?>" class="form-control <?=(form_error('benifits')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('benifits');?>
              </div>

              <label for="Sts">Status<sup style="color:red">*</sup></label>
              <div class="form-row">
              <div class="form-group mr-3">
              <input type="radio" id="active" name="status" value="1" checked="">
              <label for="active">Active</label>
              </div>
              <div class="form-group">
              <input type="radio" id="inactive" name="status" value="0">
              <label for="inactive">Inactive</label>
              </div>
              </div>

              <div class="form-row">
              <div class="form-group mr-3">
              <button type="submit" class="btn btn-primary py-1 px-3">Submit</a>
              </div>
              <div class="form-group">
              <a href="<?= base_url().'index.php/Admin/Jobs/index';?>" class="btn btn-secondary py-1 px-3">Back</a>
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