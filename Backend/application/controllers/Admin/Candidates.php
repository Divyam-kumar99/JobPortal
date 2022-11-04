<?php
class Candidates extends CI_controller{
    // for session check constructor is used 
    public function __construct(){
        parent::__construct();
        $result=$this->session->userdata('admin');
        
        if(empty($result)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'index.php/Admin/Adminlogin/index');
        }
    }

//it will show category list page  index() 
    function  index (){
        $this->load->model('Candidates_model');
        $this->load->model('Jobs_model');
        $this->load->model('Status_model');
        $this->load->model('Employees_model');
        
        $this->load->library('form_validation');
        // for search 
        $params['queryString']=$this->input->get('q');
        $arr= $this->Candidates_model->get($params);
        $job= $this->Jobs_model->job();
        $emp= $this->Employees_model->get();
        // print_r($emp);
        // exit();
        $sts= $this->Status_model->c_status();
        
        $data['sts']=$sts;
        $data['emp']= $emp;
        $data['row']=$job;
        $data['arr']=$arr;
        $data['queryString']=$params['queryString']; //show search string in search bar
        $data['mainModule']='candidates';
        //$data['subModule']='viewjobs';
        $this->load->view('Admin/candidates/list',$data);
    }

    function update($id){
        $this->load->model('Candidates_model');
        $this->load->library('form_validation');
        $formarray=array();
        $formarray['id']=$id;
        $formarray['i_id']=$this->input->post('interviewer');
        $formarray['pi_date']=$this->input->post('PI_date');
        $formarray['status']=4;

        // print_r($formarray);
        // exit();
        $this->Candidates_model->update($formarray);
        redirect(base_url().'Admin/Candidates/index');
    }

    function fb($id){
        $this->load->model('Candidates_model');
        $formarray['feedback']=$this->input->post('feedback');
        $formarray['c_id']=$id;
        $this->Candidates_model->feedback($formarray);
        $change=array();
        $change['status']=$this->input->post('changests');
        $change['id']=$id;
        $this->Candidates_model->update($change);
        redirect(base_url().'Admin/Candidates/index');

    }
}
?>