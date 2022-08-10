<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_salat extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('salat');  
        $this->db->join('user', 'user.id_user = salat.id_user', 'left');    
		$this->db->order_by('id_salat', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_salat) 
    {
        $this->db->select('*');
        $this->db->from('salat');                      
        $this->db->where('id_salat', $id_salat);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('salat', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_salat', $data['id_salat']);
        $this->db->update('salat', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_salat', $data['id_salat']);
        $this->db->delete('salat', $data);
        
    }


}

/* End of file M_salat.php */
