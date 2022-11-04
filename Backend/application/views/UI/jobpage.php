<?php
$this->load->view('UI/headerui');
?>
<div class="container">
<div class="mt-5">
<h3 class="py-3 pl-2 pl-sm-5">Job openings</h3><hr/>
<div>
<?php
if(!empty($arr)){
    foreach($arr as $arr){
?>
<div class="row pt-3">

<div class= "col-12 col-sm-4 pl-2 pl-sm-3">
<div class="card p-5 bg-pink">

<?php
if(!empty($arr['image'])){
?>
<img src="<?= base_url().'Assets/Uploads/Jobs/Thumb/'.$arr['image'];?>" class="card-img-top" alt="job openings">
<?php }
?>

</div>
</div>

<div class="col-12 col-sm-8">
<h5><a href="<?= base_url().'index.php/Jobpage/job_detail/'.$arr['id']?>"><?= $arr['title']?></a></h5>
<p><?= ($arr['excerpt'])?></p>



<h6 class="text-muted">Posted on- <strong><?= date('d-M-Y', strtotime($arr['created']));?></strong></h6>
</div>

</div><hr/>
<?php
    }
}
?>
</div>
<?php
$this->load->view('UI/footerui');
?>