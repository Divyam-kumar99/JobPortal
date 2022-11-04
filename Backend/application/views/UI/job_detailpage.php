<?php
$this->load->view('UI/headerui');
?>
<style>
    .img-size{
        max-width:100%;
        height:auto;
    }
</style>
<body class="">
<div class="container bg-yellow text-center my-5  py-3">
  <?php
  if(!empty($arr)){
      
  ?>  

<div class="title py-3 bg-navy ">
    <h5><?= $arr['title']?></h5>
</div>

<div class="main-image">
    <img src="<?= base_url().'Assets/Uploads/Jobs/Thumb/'.$arr['image'];?>" class="text-center w-50 h-50 img-responsive py-3" alt="job image">
</div>

<div class="container-fluid">
<div class="text px-3">
<div class="description py-3 text-justify col-12">
    <h5>Job Description</h5>
    <p><?= $arr['description']?></p>
</div>

<div class="description py-3 text-justify col-12">
    <h5>Min experience required</h5>
    <p><?= $arr['min_exp']?></p>
</div>

<div class="description py-3 text-justify col-12">
    <h5>No. of openings</h5>
    <p><?= $arr['openings']?></p>
</div>

<div class="created py-3 text-right col-12">
    <p class="text-muted">Published on <?= date('d-M-Y', strtotime($arr['created']));?></p>
</div>

<div class="apply text-center">
    <a href="<?= base_url().'Jobpage/job_form/'.$arr['id'];?>" class="btn btn-primary btn-sm px-3 py-1">Apply Now</a>
</div>

</div>
</div>

<?php
  }
?>

</div>
</body>

<?php
$this->load->view('UI/footerui');
?>