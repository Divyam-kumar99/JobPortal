<?php
$this->load->view('UI/headerui');
?>
<style>
  .br-20{
    border-radius: 20px;
  }
  .bg-navy{
    background-color: #00255f;
    color:white;
  }
</style>
<body class="">
<div class="container">
    <div id="slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('Assets/UI_assets/images/cover1.jpg');?>" class="d-block w-100 h-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('Assets/UI_assets/images/cover2.jpg');?>" class="d-block w-100 h-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('Assets/UI_assets/images/cover3.jpg');?>" class="d-block w-100 h-100 img-fluid" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
    </div>
  </div>
</div>
    <section id="about" class="">
    <div class="container">
    <div class="row justify-content-around">
    <div class="col-12 col-sm-5">
    <img src="<?= base_url().'Assets/UI_assets/images/about.jpg';?>?v=2" class="img-fluid py-5 mb-5 aboutus" alt="about us">
    </div>
    <div class="col-12 col-sm-7">
    <div class="text py-5">
      <h3 class="text-center text-sm-left pb-2 pt-0 pt-sm-4">Welcome to Ajatus software<hr/></h3>
      <p>Ajatus Software is a technical partner with a business vision. We transform your ideas into successful digital products, building it from scratch and supporting as long as you need.
        We’ve seen our clients growing from small startups to scalable enterprise companies. We were there when they merged with industry leaders and acquired smaller companies. We celebrated every fundraising, every launch and success.
        And we’re eager to continue doing the same with you.
      </p>
      
    </div>
    </div>
    </div>
    </div>
    </section>

    <section id="blogs" class="pb-5">
    <div class="container">
    <div class="heading">
    <h3 class="text-center"> Our Recent Openings<hr/></h3>
    </div>

    
    
    <div class="row mt-5">

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
    
    <p class="card-text pl-2 pb-2 text-center mt-3"><a href="<?= base_url().'Jobpage/job_detail/'.$arr['id'];?>"><?= $arr['title'];?></a>
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
    </section>

    <?php
    $this->load->view('UI/footerui');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url().'Assets/UI_assets/js/jquery-3.3.1.slim.min.js';?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    
    <script src="<?= base_url().'Assets/UI_assets/js/bootstrap.min.js';?>" ></script>

    <script language="JavaScript" type="text/javascript">
      $(document).ready(function(){
        $('.carousel').carousel({
          interval: 2000
        })
      });    
    </script> 
  </body>
</html>