<?php 
class Jobs_model extends CI_model{
    function create ($formarray){
        $this->db->insert('job',$formarray);

    }
    function getjobs($params=[]){
        // for particular search package 
        $this->db->order_by('id', 'DESC');
        $result= $this->db->get('job')->result_array();
        // $query=$this->db->last_query();
        // print_r($query);
        // exit();
        return $result;

    }
    function getjob($id){
        $this->db->where('id', $id);
        $result=$this->db->get('job')->row_array();
        return $result;
    }

    function job(){
        //$this->db->order_by('id', 'DESC');
        $result=$this->db->get('job')->result_array();
        return $result;
    }

    function update($id, $formarray){
        $this->db->where('id', $id);
        $this->db->update('job', $formarray);
    }
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('job');
    }
    function get($title){
        $this->db->where('title', $title);
        $result=$this->db->get('job')->row_array();
        return $result;
    }
    public function get_uiid(){
        $this->db->order_by('id', 'DESC');
        $this->db->limit(4);
        $result=$this->db->get('job')->result_array();
        return $result;
    }
}
?>