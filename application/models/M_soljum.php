<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_soljum extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('soljum');    
        $this->db->join('imam', 'imam.id_imam = soljum.id_imam', 'left');    
        $this->db->order_by('id_soljum', 'DESC');
        return $this->db->get()->result();
    }


    public function detail($id_soljum) 
    {
        $this->db->select('*');
        $this->db->from('soljum');                      
        $this->db->where('id_soljum', $id_soljum);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('soljum', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_soljum', $data['id_soljum']);
        $this->db->update('soljum', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_soljum', $data['id_soljum']);
        $this->db->delete('soljum', $data);
        
    }


}

/* End of file M_soljum.php */
