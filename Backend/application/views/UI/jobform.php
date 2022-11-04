<?php
$this->load->view('UI/homeheader');
?>
<head>
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

    <!-- job application form -->

    <div class="container">
    <?php
    $success=$this->session->flashdata('success');
    $fail=$this->session->flashdata('fail');
    if($success!=""){?>
    <div class="alert alert-success text-center mt-5 py-5"><?= $success;?>
    </div>
    <?php }else if($fail !=""){ ?>
    <div class="alert alert-danger text-center mt-5 py-5"><?= $fail;?>
    </div> <?php } else{} ?>
    
    <div class="d-flex row pt-5 my-auto justify-content-center">
    <div class ="col-11 col-md-5 col-lg-4 mb-5">
        <h4 class="text-center"> Welcome, Candidate</h4><hr/>
    <div class="card p-4 ">

    <h5 class=" mb-3 text-center">Register here</h5>
    <img src="<?= base_url().'Assets/UI_assets/images/Ajatus_logo.jpg';?>" class="img-fluid mx-auto mb-4" alt="logo" style="max-width:120px;">
    <form action="<?= base_url().'Jobpage/job_form/'.$id;?>" name="jobform" id="jobform" method="post" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <input type="text" name="name" id="name" placeholder="Enter your name" pattern="[A-Za-z]{1-20}" class="form-control <?=(form_error('name')!= "" ) ?'is-invalid' :'';?>" value="<?=set_value('name')?>">
    </div>
    <?=form_error('name');?>

    <div class="input-group mb-3">
        <input type="email" name="email" id="mail_id" placeholder="Enter your mail id" class="form-control <?=(form_error('email')!= "" ) ?'is-invalid' :'';?>" value="<?=set_value('email')?>">
    </div>
    <?=form_error('email');?>

    <div class="input-group mb-3">
        <input type="tel" name="phone" id="phone_no" placeholder="Enter your contact number" class="form-control <?=(form_error('phone')!= "" ) ?'is-invalid' :'';?>" pattern="[7-9]{1}[0-9]{9}" value="<?=set_value('phone')?>">
    </div>
    <?=form_error('phone');?>

    <div class="input-group mb-3">
        <input type="number" name="prev_exp" id="exp" placeholder="Enter your previous experience in years" class="form-control <?=(form_error('prev_exp')!= "" ) ?'is-invalid' :'';?>" min="0" value="<?=set_value('prev_exp')?>">
    </div>
    <?=form_error('prev_exp');?>

    <div class="input-group mb-3">
        <label for="resume">Upload resume</label><br/>
        <input type="file" name="resume" id="resume">
        <?(form_error('resume')!= "" ) ?'is-invalid' :'';?>
        <?php echo (!empty($err)) ? $err : '';?>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 col-lg-5">
            <button type="submit" class="btn btn-success btn-block btn-sm mb-2">Submit</button>
        </div>
          <!-- /.col -->
          
          <!-- /.col -->
    </div>
    </form>
    </div>
    </div>
    </div>

    <!-- job application form ends -->
</body>  

<?php
$this->load->view('UI/footerui');
?>