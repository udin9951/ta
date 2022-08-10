<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('kegiatan');  
        $this->db->join('user', 'user.id_user = kegiatan.id_user', 'left');    
        $this->db->order_by('id_kegiatan', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_kegiatan) 
    {
        $this->db->select('*');
        $this->db->from('kegiatan');                      
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('kegiatan', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_kegiatan', $data['id_kegiatan']);
        $this->db->update('kegiatan', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_kegiatan', $data['id_kegiatan']);
        $this->db->delete('kegiatan', $data);
        
    }


}

/* End of file M_kegiatan.php */
