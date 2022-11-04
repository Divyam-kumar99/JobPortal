<?php 
class Adminlogin extends CI_Controller{
    public function index(){
        //$this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->load->view('Admin/adminlogin');
    }

    //login function
    public function authenticate(){
        $this->load->model('Admin_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');

        if($this->form_validation->run() == true){

            $name=$this->input->post('email');
            $val=$this->Admin_model->getuser($name);
            if(!empty($val)){
                $pass=$this->input->post('password');
                if($name==$val['email'] and $pass==$val['password']){
                    $valArr['id']=$val['id'];
                    $valArr['name']=$val['name'];
                    $valArr['email']=$val['email'];
                    //print_r($valArr);
                    //exit();
                    $this->session->set_userdata('admin', $valArr);
                    redirect(base_url().'Admin/Admincontrol/index');
                }
                else{
                    $this->session->set_flashdata('fail','Username or Password is incorrect');
                    redirect(base_url().'Admin/Adminlogin/index');
                }

            }
            else{
                $this->session->set_flashdata('fail','Username or Password is incorrect');
                redirect(base_url().'Admin/Adminlogin/index');
            }
        }
        else{
            $this->load->view('Admin/Adminlogin');
        }
    }
    public function logout(){
        $this->load->model('Admin_model');
        $result=$this->Admin_model->getadmin();
        // print_r($result['name']);
        // exit();
        $val=$this->session->userdata('admin');
        if($val['name']== $result['name']){
        $this->session->unset_userdata('admin');
        redirect(base_url().'index.php/Admin/Adminlogin/index');
        }
        else{
            $this->session->unset_userdata('admin');
            redirect(base_url().'index.php/Admin/Employees/index');
        }
    }
}

?>