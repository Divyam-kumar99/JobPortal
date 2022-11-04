<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url().'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback';?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url().'Assets/Admin/plugins/fontawesome-free/css/all.min.css';?>">
  <!-- Theme style adminLTE -->
  <link rel="stylesheet" href="<?= base_url().'Assets/Admin/dist/css/adminlte.min.css';?>">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url().'Assets/UI_assets/css/bootstrap.min.css';?>">
  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="../Assets/css/color14.css" media="screen" id="color">

<style>
.text-white{
  color:white;
}
.b-none{
  border-style: none;
  border-radius:5px;
}
body{
  overflow-x: hidden;
}

</style>
</head>
<body>
    <div class="container">
    <?php
        $fail=$this->session->flashdata('fail');
        if($fail!="")
        {
    ?>
    <div class="alert alert-danger text-center"><?php echo $fail;}?></div>
    
    <div class="d-flex row pt-5 my-auto justify-content-center">
    <div class ="col-11 col-md-5 col-lg-4">
        <h4 class="text-center"> Welcome, Employee</h4><hr/>
    <div class="card p-4 ">

    <h5 class=" mb-3 text-center">Login to your account</h5>
    <img src="<?= base_url().'Assets/UI_assets/images/Ajatus_logo.jpg';?>" class="img-fluid mx-auto mb-4" alt="logo" style="max-width:120px;">
    <form action="<?= base_url().'Admin/Employees/authenticate'?>" name="loginform" id="loginform" method="post">
    <div class="input-group mb-3">
        <input type="email" name="email" placeholder="Enter your email id" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-envelope"></i>
            </div>
        </div>
    </div>
    <?=form_error('email');?>
    <div class="input-group mb-5">

        <input type="password" name="password" placeholder="Enter your password" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-lock"></i>
            </div>
        </div>
    </div>
    <?=form_error('password');?>
    <div class="row">

        <div class="col-12 col-md-4 col-lg-5">
            <button type="submit" class="btn btn-success btn-block btn-sm mb-2">Login</button>
        </div>

        <!--<div class="col-12 col-md-8 col-lg-7">
          <a href="" class="btn btn-primary btn-block btn-sm">Change password</a>
        </div>-->
          <!-- /.col -->
          
          <!-- /.col -->
    </div>
    </form>
    </div>
    </div>
    
    </div>
</body>  
</html>
