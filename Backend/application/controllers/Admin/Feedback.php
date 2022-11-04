<?php 
class Feedback extends CI_controller{
    public function __construct(){
        parent::__construct();
        $x=$this->session->userdata('admin');
        if(empty($x)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'index.php/Admin/Adminlogin/index');
            
        }
    }

    public function index(){
        $this->load->model('Feedback_model');
        $val=$this->Feedback_model->getfb(); 

        $data['mainModule']='candidatesfb';
        $data['arr']=$val;
        $this->load->view('Admin/feedback/list',$data);
    }
}
?>