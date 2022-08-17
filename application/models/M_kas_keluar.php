<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_kas_keluar extends CI_Model {

    public function lists($filter = NULL, $end = NULL) 
    {

    $this->db->select('*');
        $this->db->from('kas');    
        $this->db->join('user', 'user.id_user = kas.id_user', 'left');
        if(!empty($filter))
        {
            $this->db->where("tgl_kas >=", $filter);
        }
        if(!empty($end))
        {
            $this->db->where("tgl_kas <=", $end);
        }
        $this->db->where('jenis_kas', 'Keluar');
		$this->db->order_by('tgl_kas', 'asc');
        return $this->db->get()->result();
    }

    public function sumKas($filter = NULL, $end = NULL) 
    {

    $this->db->select_sum('kas_keluar');
        $this->db->from('kas');    
        if(!empty($filter))
        {
            $this->db->where("tgl_kas >=", $filter);
        }
        if(!empty($end))
        {
            $this->db->where("tgl_kas <=", $end);
        }
        $this->db->where('jenis_kas', 'Keluar');
        return $this->db->get()->row();
    }

    public function detail($id_kas) 
    {
        $this->db->select('*');
        $this->db->from('kas');                      
        $this->db->where('id_kas', $id_kas);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('kas', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_kas', $data['id_kas']);
        $this->db->update('kas', $data);
        
    }

    public function delete($data) 
    {
        $this->db->where('id_kas', $data['id_kas']);
        $this->db->delete('kas', $data);
        
    }


}

/* End of file M_kas.php */