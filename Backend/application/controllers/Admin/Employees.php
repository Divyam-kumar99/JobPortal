<?php 
class Employees extends CI_Controller{
    public function index(){
        //$this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->load->view('Admin/employees/login');
    }
    //login function
    public function authenticate(){
        $this->load->model('Employees_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');
    
        if($this->form_validation->run() == true){
            $name=$this->input->post('email');
            $val=$this->Employees_model->getuser($name);
            if(!empty($val)){
                $pass=$this->input->post('password');
                if($name==$val['email'] and $pass==$val['password']){
                    $valArr['id']=$val['id'];
                    $valArr['name']=$val['name'];
                    $valArr['email']=$val['email'];
                    if($val['role']==0){
                    //print_r($val);
                    //exit();
                    $this->session->set_userdata('admin', $valArr);
                    redirect(base_url().'Admin/Admincontrol/index');
                    }
                    
                    else{
                        $this->session->set_userdata('employees', $valArr);
                        redirect(base_url().'Admin/Employeescontrol/index');
                    }
                }
                else{
                    $this->session->set_flashdata('fail','Username or Password is incorrect');
                    redirect(base_url().'Admin/Employees/index');
                }

            }
            else{
                $this->session->set_flashdata('fail','Username or Password is incorrect');
                redirect(base_url().'Admin/Employees/index');
            }
        }
        else{
            $this->load->view('Admin/employees/login');
        }
    }
    public function logout(){
        $this->session->unset_userdata('employees');
        redirect(base_url().'index.php/Admin/Employees/index');
        }
}

?>