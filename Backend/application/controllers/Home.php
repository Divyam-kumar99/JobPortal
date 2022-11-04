<?php
class Home extends CI_controller{
    public function index(){

        $this->load->model('Jobs_model');
        $job=$this->Jobs_model->get_uiid();
        $data=[];
        $data['arr']=$job;

        $this->load->view('UI/homepage', $data);
    }
}
?>