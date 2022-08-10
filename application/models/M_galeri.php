<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('galeri'); 
        $this->db->join('user', 'user.id_user = galeri.id_user', 'left');   
		$this->db->order_by('id_galeri', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_galeri) 
    {
        $this->db->select('*');
        $this->db->from('galeri');                      
        $this->db->where('id_galeri', $id_galeri);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('galeri', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_galeri', $data['id_galeri']);
        $this->db->update('galeri', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_galeri', $data['id_galeri']);
        $this->db->delete('galeri', $data);
        
    }


}

/* End of file M_galeri.php */
