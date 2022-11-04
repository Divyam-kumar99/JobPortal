<?php 
class Feedback_model extends CI_model{
    function getfb(){
        $this->db->select('candidate.*,feedback.feedback as c_feedback');
        $this->db->join('feedback', 'candidate.id=feedback.c_id', 'LEFT');
        $this->db->select('candidate.*,candidate_status.sts_name as c_status');
        $this->db->join('candidate_status', 'candidate.status=candidate_status.sts_value', 'LEFT');

        $result=$this->db->get('candidate')->result_array();
        return $result;
    }

}
?>