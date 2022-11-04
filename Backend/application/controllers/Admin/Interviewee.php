<?php 
class Interviewee extends CI_controller{
    public function __construct(){
        parent::__construct();
        $x=$this->session->userdata('employees');
        if(empty($x)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'index.php/Admin/Employees/index');
        }
    }
    public function index(){
        $val= $this->session->userdata('employees');
        $i_id= $val['id'];
        $this->load->model('Candidates_model');
        $this->load->model('Status_model');
        $params['queryString']=$this->input->get('q');
        $arr= $this->Candidates_model->interview($i_id,$params);
        $sts= $this->Status_model->c_status();  
        $data['sts']=$sts;
        $data['arr']= $arr;
        $data['queryString']=$params['queryString']; //show search string in search bar
        $data['mainModule']='candidates';
        $this->load->view('Admin/interviewee/list', $data);
    }

    function fb($id){
        $this->load->model('Candidates_model');
        $formarray['feedback']=$this->input->post('feedback');
        $formarray['c_id']=$id;
        $this->Candidates_model->feedback($formarray);
        $change=array();
        $change['status']=$this->input->post('changests');
        $change['id']=$id;
        // print_r($change);
        // exit();
        $this->Candidates_model->update($change);
        redirect(base_url().'Admin/Interviewee/index');

    }
}
?>