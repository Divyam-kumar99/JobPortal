<?php
class Jobpage extends CI_controller{
    public function index(){
        $this->load->model('Jobs_model');
        $val=$this->Jobs_model->getjobs();
        $data=[];
        $data['arr']=$val;
        $this->load->view('UI/jobpage', $data);
    }

    public function job_detail($id){
        $this->load->model('Jobs_model');
        $val=$this->Jobs_model->getjob($id);
        $data=[];
        $data['arr']=$val;       

        $this->load->view('UI/job_detailpage', $data);

    }
    
    public function job_form($id){
        $config['upload_path'] = './Assets/Uploads/Jobs/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = true;
        
        $this->load->library('upload', $config);
        
        $this->load->model('Jobs_model');
        // $val=$this->Jobs_model->getjob($id);
        $data=[];
        $data['id']=$id;
        // $data['row']=$val;

        $this->load->model('Candidates_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('prev_exp','Prev_exp','required');
        //$this->form_validation->set_rules('status','Status','required');

        if (empty($_FILES['resume']['name'])){
            $this->form_validation->set_rules('resume', 'Document', 'required');
        }
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        
        //print_r($data['arr']);
        //exit();
        $data['mainModule']='candidates';
         //$data['subModule']='addjobs';
        
      
        if($this->form_validation->run()==True){
            // save data to database    
                if($this->upload->do_upload('resume')){
                    // file uploaded successfully
                     
                    $data=$this->upload->data();
  
                    $formarray=array();
                    $formarray['job_id']=$id;
                    $formarray['name']=$this->input->post('name');
                    //$name=$formarray['name'];
                    $formarray['email']=$this->input->post('email');
                    $email=$formarray['email'];
                    $formarray['phone']=$this->input->post('phone');
                    $phone=$formarray['phone'];
                    $formarray['prev_exp']=$this->input->post('prev_exp');
                    $formarray['resume']=$data['file_name'];
                    $formarray['applied_on']=date('Y-m-d H:i:s');  
                    $result=$this->Candidates_model->getcandidate($formarray);
                    
                    if(empty($result)){
                        $this->Candidates_model->add($formarray);
                        $this->session->set_flashdata('success','Your form has been submitted successfully');
                        redirect(base_url('Jobpage/job_form/').$id);
                    }
                    else{
                        $this->session->set_flashdata('fail','Candidate already exists');
                        redirect(base_url('Jobpage/job_form/').$id); 
                    }
                    
                }
                else{
                    $error= $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['err']=$error;
                    $this->load->view('UI/jobform',$data);
                }
         }
         else{
            // showerror in form 
            $this->load->view('UI/jobform', $data);
        }
    }
}
?>