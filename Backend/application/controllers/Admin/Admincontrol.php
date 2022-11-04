<?php
class Admincontrol extends CI_controller{
    public function __construct(){
        parent::__construct();
        $x=$this->session->userdata('admin');
        if(empty($x)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'index.php/Admin/Adminlogin/index');
            
        }
    }
    public function index(){
        $x=$this->session->userdata('admin');
        $this->load->model('Jobs_model');
        $job=$this->Jobs_model->get_uiid();
        $data=[];
        $data['arr']=$job;
        $this->load->view('admin/dashboard', $data);
    }
}
?>