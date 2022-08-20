<?php

class M_laporan extends CI_Model {
	
	public function lists()
	{
		$this->db->select('*');
        $this->db->from('laporan');
		$this->db->join('user', 'user.id_user = laporan.user', 'left');
		$this->db->order_by('laporan.id', 'desc');
		return $this->db->get();
	}

	public function detail($id_laporan)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		$this->db->where('id', $id_laporan);
		return $this->db->get()->row();
    }
    
    public function add($data)
	{
		$this->db->insert('laporan', $data);
	}


	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('laporan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('laporan', $data);
	}
} 