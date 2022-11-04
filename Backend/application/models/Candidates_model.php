<?php
class Candidates_model extends CI_model{
    function add($formarray){
        $this->db->insert('candidate', $formarray);
    }
    function getcandidate($formarray){
        $this->db->where('email', $formarray['email']);
        $this->db->or_where('phone', $formarray['phone']);
        $result=$this->db->get('candidate')->row_array();
        return $result;
    }
    function get($params=[]){
        $this->db->select('candidate.*,job.title as title');
        //$this->db->from('candidate');
        $this->db->join('job', 'candidate.job_id=job.id', 'LEFT');

        $this->db->select('candidate.*,candidate_status.sts_name as status_name');
        //$this->db->from('candidate');
        $this->db->join('candidate_status', 'candidate.status=candidate_status.sts_value', 'LEFT');

        if(!empty($params['queryString'])){
            $this->db->like('name',$params['queryString']);
        }
        $this->db->order_by('applied_on', 'DESC');
        $result=$this->db->get('candidate')->result_array();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // exit();
        return $result;

    }
    function update($formarray){
        // print_r($formarray);
        // exit();
        $this->db->where('id' , $formarray['id']);
        $this->db->update('candidate', $formarray);
    }

    function interview($i_id,$params=[]){
        $this->db->select('candidate.*,job.title as title');
        //$this->db->from('candidate');
        $this->db->join('job', 'candidate.job_id=job.id', 'LEFT');
        if(!empty($params['queryString'])){
            $this->db->like('name',$params['queryString']);
        }
        $this->db->order_by('applied_on', 'DESC');
        $this->db->where('i_id', $i_id);
        $result=$this->db->get('candidate')->result_array();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // exit();
        return $result;

    }
    function feedback($formarray){
        $this->db->insert('feedback', $formarray);
    }

    

}
?>