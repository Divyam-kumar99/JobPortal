<?php
class Jobs extends CI_controller{
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
        $this->load->model('Jobs_model');
        
        // for search 
        $params['queryString']=$this->input->get('q');

        $arr= $this->Jobs_model->getjobs($params);
        
        $data['arr']=$arr;
        $data['queryString']=$params['queryString']; //shw search string in search bar
        $data['mainModule']='jobs';
        //$data['subModule']='viewjobs';
        $this->load->view('Admin/jobs/list',$data);

    }   
    function create(){
        $this->load->helper('common_helper');
        $config['upload_path'] = './Assets/Uploads/Jobs/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;
        
        $this->load->library('upload', $config);
        
        $this->load->model('Jobs_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('excerpt','Excerpt','required');
        $this->form_validation->set_rules('min_exp','Min_exp','required');
        $this->form_validation->set_rules('status','Status','required');
        

        if (empty($_FILES['image']['name'])){
            $this->form_validation->set_rules('image', 'Image', 'required');
        }
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
         $data=[];
        
         $data['mainModule']='jobs';
         //$data['subModule']='addjobs';
        
      
        if($this->form_validation->run()==True){
            // save data to database
            // if(!empty($_FILES['image']['name'])){
                // upload the image here 
                
                if($this->upload->do_upload('image')){
                    // file uploaded successfully
                     
                    $data=$this->upload->data();

                    
                    $formarray=array();
                    $formarray['title']=$this->input->post('title');
                    $title=$formarray['title'];
                    $formarray['description']=$this->input->post('description');
                    $formarray['excerpt']=$this->input->post('excerpt');
                    $formarray['min_exp']=$this->input->post('min_exp');
                    $formarray['openings']=$this->input->post('openings');
                    $formarray['image']=$data['file_name'];
                    $formarray['benifits']=$this->input->post('benifits');
                    $formarray['status']=$this->input->post('status');
                    $formarray['created']=date('Y-m-d H:i:s');

                    // $result=$this->Jobs_model->get($title);  
                    // if(empty($result)){
                    $this->Jobs_model->create($formarray);
                    // resizing image using common_helper
                    resizeimg($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,300);//directory path only 
                    
                    $this->session->set_flashdata('success','New Job added Successfully');
                    redirect(base_url('Admin/Jobs/index'));
                    
                    //}
                    // else{
                    //     $data['err1']=1;
                    //     $this->load->view('Admin/jobs/create', $data);
                    // }


                }
                else{
                    // encountered some errors that is wrong file type
                    $error= $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['imgerr']=$error;
                    $this->load->view('Admin/Jobs/create',$data);

                }
            // }
        
        }else{
            // showerror in form 
          
            $this->load->view('Admin/Jobs/create', $data);
        }
        
    }

    function edit($id){
        $this->load->helper('common_helper');
        
        $config['upload_path'] = './Assets/Uploads/Jobs/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;
        
        $this->load->library('upload', $config);
        
        $this->load->model('Jobs_model');
        $val=$this->Jobs_model->getjob($id);
        $data=[];
        $data['arr']=$val;
        $data['mainModule']='jobs';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('excerpt','Excerpt','required');
        $this->form_validation->set_rules('min_exp','Min_exp','required');
        //$this->form_validation->set_rules('status','Status','required');

        // if (empty($_FILES['image']['name'])){
        //     $this->form_validation->set_rules('image', 'Document', 'required');
        // }
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        // $data=[];
        
        // $data['mainModule']='packages';
        // $data['subModule']='addpackages';
        $result=$this->Jobs_model->getjob($id);

        if(!empty($result)){
      
        if($this->form_validation->run()==True){
            // save data to database
             if(!empty($_FILES['image']['name'])){
                // upload the image here 
                if($this->upload->do_upload('image')){
                    // file uploaded successfully
                     
                    $data=$this->upload->data();

                    //$result=$this->Jobs_model->getjob($id);
                    //if(!empty($result)){
                    
                    $formarray=array();
                    $formarray['title']=$this->input->post('title');
                    $formarray['description']=$this->input->post('description');
                    $formarray['excerpt']=$this->input->post('excerpt');
                    $formarray['min_exp']=$this->input->post('min_exp');
                    $formarray['openings']=$this->input->post('openings');
                    $formarray['image']=$data['file_name'];
                    $formarray['benifits']=$this->input->post('benifits');
                    $formarray['status']=$this->input->post('status');
                    $formarray['created']=date('Y-m-d H:i:s');
                    $this->Jobs_model->update( $id, $formarray);


                    // resizing image using common_helper
                    resizeimg($config['upload_path'].$data['file_name'],$config['upload_path'].'Thumb/'.$data['file_name'],300,300);//directory path only 
                    
                    $this->session->set_flashdata('success','Job updated successfully');
                    redirect(base_url('Admin/Jobs/index'));
    
                }
                else{
                    // encountered some errors that is wrong file type
                    $error= $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['imgerr']=$error;
                    $this->load->view('Admin/Jobs/edit',$data);

                }
             }
             else{
                $formarray=array();
                $formarray['title']=$this->input->post('title');
                $formarray['description']=$this->input->post('description');
                $formarray['excerpt']=$this->input->post('excerpt');
                $formarray['min_exp']=$this->input->post('min_exp');
                $formarray['openings']=$this->input->post('openings');
                //$formarray['image']=$data['file_name'];
                $formarray['benifits']=$this->input->post('benifits');
                $formarray['status']=$this->input->post('status');
                $formarray['created']=date('Y-m-d H:i:s');
                $this->Jobs_model->update( $id, $formarray);


                // resizing image using common_helper
                //resizeimg($config['upload_path'].$data['file_name'],$config['upload_path'].'Thumb/'.$data['file_name'],300,300);//directory path only 
                
                $this->session->set_flashdata('success','Job updated successfully');
                redirect(base_url('Admin/Jobs/index'));
             }
        
        }else{
            // showerror in form 
            $this->load->view('Admin/Jobs/edit', $data);
        }
    }
    else{
        $this->session->set_flashdata('failure','Job does not exist anymore!!!');
    redirect(base_url('Admin/Jobs/index'));
    }
}


    public function delete($id){
        $this->load->model('Jobs_model');
        $result=$this->Jobs_model->getjob($id);
        if(empty($result)){
            $this->session->set_flashdata('failure', 'Job not found');
            redirect(base_url().'index.php/Admin/jobs/index');
        }
            $this->Jobs_model->delete($id);
            $this->session->set_flashdata('success','Job deleted successfully');
            redirect(base_url('Admin/Jobs/index'));

    }
}
?>