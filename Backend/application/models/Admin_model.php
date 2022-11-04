<?php
class Admin_model extends CI_model{
    public function getuser($name){
        $this->db->where('email',$name);
        $result= $this->db->get('admin')->row_array();
        return $result;
    }
    
    public function getadmin(){
       $result= $this->db->get('admin')->row_array();
       return $result;
    }
}

?>