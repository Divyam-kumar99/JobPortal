<?php 
class Status_model extends CI_model{
    function c_status(){
        $result=$this->db->get('candidate_status')->result_array();
        return $result;
    }
}
?>