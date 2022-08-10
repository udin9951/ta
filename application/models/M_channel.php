<?php

class M_channel extends CI_Model {
	
	public function lists()
	{
		$this->db->select('*');
        $this->db->from('channel');
        $this->db->join('user', 'user.id_user = channel.id_user', 'left');        
		$this->db->order_by('id_channel', 'desc');
		return $this->db->get()->result();
	}

	public function detail($id_channel)
	{
		$this->db->select('*');
		$this->db->from('channel');
		$this->db->where('id_channel', $id_channel);
		return $this->db->get()->row();
    }
    
    public function add($data)
	{
		$this->db->insert('channel', $data);
	}


		public function edit($data)
	{
		$this->db->where('id_channel', $data['id_channel']);
		$this->db->update('channel', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_channel', $data['id_channel']);
		$this->db->delete('channel', $data);
	}
} 