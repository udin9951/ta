<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pengajian extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('pengajian');
        $this->db->join('penceramah', 'penceramah.id_penceramah = pengajian.id_penceramah', 'left');
        $this->db->order_by('id_pengajian', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_pengajian)
    {
        $this->db->select('*');
        $this->db->from('pengajian');
        $this->db->where('id_pengajian', $id_pengajian);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('pengajian', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_pengajian', $data['id_pengajian']);
        $this->db->update('pengajian', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_pengajian', $data['id_pengajian']);
        $this->db->delete('pengajian', $data);
    }
}

/* End of file M_pengajian.php */
