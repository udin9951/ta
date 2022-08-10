<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_penceramah extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('penceramah');  
		$this->db->order_by('id_penceramah', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_penceramah) 
    {
        $this->db->select('*');
        $this->db->from('penceramah');                      
        $this->db->where('id_penceramah', $id_penceramah);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('penceramah', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_penceramah', $data['id_penceramah']);
        $this->db->update('penceramah', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_penceramah', $data['id_penceramah']);
        $this->db->delete('penceramah', $data);
        
    }


}


/* End of file M_penceramah.php */
