<?php
$this->load->view('Admin/header');
?>
<style>
body{
    overflow-y: hidden;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card pb-5">
            <div class="alert alert-success text-center">Recently Added Jobs</div>
              
    <div class="row mx-5">

<?php
$i='';
if(!empty($arr)){
  foreach($arr as $arr){
?>

<div class="col-12 col-sm-3 mb-3 mb-sm-0 ">
<div class="card h-100 p-3">
<?php
if(!empty($arr['image'])){
?>
<img src="<?= base_url().'Assets/Uploads/Jobs/Thumb/'.$arr['image'];?>" class="img-fluid h-100 size" alt="service-1">

  <?php }
  ?>

<div class="card-body p-0">

<p class="card-text pl-2 pb-2 text-center mt-3"><?= $arr['title'];?>
</p>
</div>
</div>
</div>

<?php 
    
  }
}
?>

</div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--<div class="content-wrapper">
    Content Header (Page header) -->
    <!--<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category Table</h1>-->
            <!--</div>--><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>-->
          <!--</div>--><!-- /.col -->
        <!--</div>--><!-- /.row -->
      <!--</div>--><!-- /.container-fluid -->
    <!--</div>
    </div>-->

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