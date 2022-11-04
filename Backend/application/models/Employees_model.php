<?php
class Employees_model extends CI_model{
    public function getuser($name){
        $this->db->where('email',$name);
        $result= $this->db->get('employees')->row_array();
        return $result;
    }
    public function getemp(){
        //$this->db->where('email',$name);
        $result= $this->db->get('employees')->row_array();
        return $result;
    }
    public function getbyrole(){
         $this->db->where('role', 0);
         $result= $this->db->get('employees')->row_array();
         return $result;
    }

    public function get(){
        $this->db->where('role', 1);
        $result= $this->db->get('employees')->result_array();
        return $result;
   }

}
?>