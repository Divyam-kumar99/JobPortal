<?php
class Empcrud_model extends CI_model{
    public function add($formArray){
        $this->db->insert('employees', $formArray);
    }

    public function getadmins(){
        $result=$this->db->get('employees')->result_array();
        return $result;
    }

    public function getadmin($id){
        $this->db->where('id', $id);
        $nana=$this->db->get('employees')->row_array();
        return $nana;
    }
    public function update($id, $formArray){
        $this->db->where('id',$id);
        $this->db->update('employees', $formArray);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('employees');
    }
    public function getmaster($name){
        $this->db->where('email',$name);
        $result= $this->db->get('admin')->row_array();
        return $result;
    }

    function getemployees($formArray){
        $this->db->where('email', $formArray['email']);
        $this->db->or_where('phone', $formArray['phone']);
        $result=$this->db->get('employees')->row_array();
        return $result;
    }
}

?>