<?php
class Empcrud extends CI_controller{

    public function index(){
        $this->load->model('Empcrud_model');
        $val= $this->Empcrud_model->getadmins();
        $data['arr']=$val;
        
        $data['mainModule']="employees";
        
        $this->load->view('Admin/empcrud/list',$data);
    }

    public function create(){
        $this->load->library('form_validation');
        $this->load->model('Empcrud_model');
        
        $data['mainModule']="employees";
        $this->form_validation->set_rules('name', 'name' ,'required');
        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('phone', 'phone' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');
        $this->form_validation->set_rules('cpassword', 'confirm password' ,'required');
        $this->form_validation->set_rules('role', 'role' ,'required');
        
        
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
       
        if($this->form_validation->run()== true){
            
            $formArray=array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $email=$formArray['email'];
            $formArray['phone']=$this->input->post('phone');
            $phone=$formArray['phone'];
            $formArray['password']=$this->input->post('password');
            $cpassword=$this->input->post('cpassword');
            $formArray['role']=$this->input->post('role');
            $result= $this->Empcrud_model->getemployees($formArray);

            if(empty($result)){
                if($formArray['password']==$cpassword){
                $this->Empcrud_model->add($formArray);
                $this->session->set_flashdata('success', 'Employee added successfully!!!');
                redirect(base_url().'index.php/Admin/Empcrud/index');
                }
                else{
                    $this->session->set_flashdata('fail','passwords do not match');
                    $this->load->view('Admin/Empcrud/create', $data);
                    
                }
            }

            else{
                $this->session->set_flashdata('fail','Employee already exists');
                redirect(base_url().'index.php/Admin/Empcrud/index');
            }
                
        }
        else{
            
        $this->load->view('Admin/Empcrud/create', $data);
        }
    }

    public function edit($id){

        $this->load->model('Empcrud_model');
        $val=$this->Empcrud_model->getadmin($id);
        $data=[];
        $data['arr']=$val;
        $data['mainModule']="employees";
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'name' ,'required');
        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('phone', 'phone' ,'required');
        $this->form_validation->set_rules('role', 'role' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

        $result=$this->Empcrud_model->getadmin($id);

        if(!empty($result)){
        if($this->form_validation->run()==true){
            

            $formArray=array();
           // $formArray=array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['phone']=$this->input->post('phone');
            $formArray['role']=$this->input->post('role');

            $this->Empcrud_model->update($id, $formArray);

            $this->session->set_flashdata('success', 'Employee updated successfully!!!');
                redirect(base_url().'index.php/Admin/Empcrud/index');
                
            
        }
        else{
            //show errors
            $this->load->view('Admin/Empcrud/edit', $data);
        }

    }
    else{
    $this->session->set_flashdata('fail','Employee does not exist anymore!!!');
    redirect(base_url('Admin/Empcrud/index'));
    }

    }

    public function delete($id){
        $this->load->model('Empcrud_model');
        $result=$this->Empcrud_model->getadmin($id);
        if(!$result){
            $this->session->set_flashdata('failure', 'Employee not found');
            redirect(base_url().'index.php/Admin/Empcrud/index');
        }
            $this->Empcrud_model->delete($id);
            $this->session->set_flashdata('success', 'Employee deleted successfully!!');
            redirect(base_url().'index.php/Admin/Empcrud/index');

    }
    // public function login(){
    //     $this->load->model('Masteradmin_model');

    //     $this->load->library('form_validation');

    //     $this->form_validation->set_rules('name', 'name' ,'required');
    //     $this->form_validation->set_rules('password', 'password' ,'required');

    //     $this->load->view('Admin/Masteradmin/masterlogin');
    // }
    // //Master admin auth and login
    // public function authenticate(){
    //     $this->load->model('Masteradmin_model');

    //     $this->load->library('form_validation');

    //     $this->form_validation->set_rules('email', 'email' ,'required');
    //     $this->form_validation->set_rules('password', 'password' ,'required');
    //     if($this->form_validation->run() == true){
    //         $name=$this->input->post('email');
    //         $val=$this->Masteradmin_model->getmaster($name);
    //         if(!empty($val)){
    //             $pass=$this->input->post('password');

    //             if($name==$val['email'] and $pass==$val['password']){
    //                 $valArr['id']=$val['id'];
    //                 $valArr['email']=$val['email'];
    //                 $this->session->set_userdata('master_admin', $valArr);
    //                 redirect(base_url().'Admin/Master_admin/index');
    //             }

    //             //if username and password do not match
    //             else{
    //                 $this->session->set_flashdata('fail','Wrong username or password');
    //                 redirect(base_url().'Admin/Master_admin/login');
    //             }

    //         }

    //         //if other admin try to access
    //         else{
    //             $this->session->set_flashdata('fail','You are not authorized to perform this action action');
    //             redirect(base_url().'Admin/Master_admin/login');
    //         }
    //     }
    //     else{
    //         $this->load->view('Admin/Masteradmin/masterlogin');
    //     }
    // }

    // public function logout(){
    //     $this->session->unset_userdata('master_admin');
    //     redirect(base_url().'index.php/Admin/Admin_dashboard/index');
    // }
}
?>

    