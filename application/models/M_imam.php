<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_imam extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('imam');  
		$this->db->order_by('id_imam', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_imam) 
    {
        $this->db->select('*');
        $this->db->from('imam');                      
        $this->db->where('id_imam', $id_imam);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('imam', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_imam', $data['id_imam']);
        $this->db->update('imam', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_imam', $data['id_imam']);
        $this->db->delete('imam', $data);
        
    }


}

/* End of file M_imam.php */
