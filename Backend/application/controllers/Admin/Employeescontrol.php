<?php
class Employeescontrol extends CI_controller{
    public function __construct(){
        parent::__construct();
        $x=$this->session->userdata('employees');
        if(empty($x)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'index.php/Admin/Employees/index');
        }
    }

    public function index(){
        $x=$this->session->userdata('employees');
        $this->load->view('Admin/dashboard1');
    }
}
?>