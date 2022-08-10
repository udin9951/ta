<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sapras extends CI_Model {
	
    
    public function lists()
	{
		$this->db->select('*');
        $this->db->from('sapras'); 
        $this->db->join('user', 'user.id_user = sapras.id_user', 'left');   
		$this->db->order_by('id_sapras', 'DESC');
        return $this->db->get()->result();
    }  
    
    public function detail($id_sapras)
	{
		$this->db->select('*');
		$this->db->from('sapras');
		$this->db->where('id_sapras',$id_sapras);
		return $this->db->get()->row();
    }
    
    public function add($data)
	{
		$this->db->insert('sapras', $data);
	}

		public function edit($data)
	{
		$this->db->where('id_sapras', $data['id_sapras']);
		$this->db->update('sapras', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_sapras', $data['id_sapras']);
		$this->db->delete('sapras', $data);
	}

}