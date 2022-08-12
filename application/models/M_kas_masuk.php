<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_kas_masuk extends CI_Model {

    public function lists($filter = NULL) 
    {

    $this->db->select('*');
        $this->db->from('kas');    
        $this->db->join('user', 'user.id_user = kas.id_user', 'left');
        if(!empty($filter))
        {
            $this->db->where("DATE_FORMAT(tgl_kas,'%Y-%m')", $filter);
        }
        $this->db->where('jenis_kas', 'Masuk');
        $this->db->order_by('id_kas', 'DESC');
        return $this->db->get()->result();
    }

    public function sumKas($filter = NULL) 
    {
    $this->db->select_sum('kas_masuk');
        $this->db->from('kas');    
        if(!empty($filter))
        {
            $this->db->where("DATE_FORMAT(tgl_kas,'%Y-%m')", $filter);
        }
        $this->db->where('jenis_kas', 'Masuk');
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

    public function show_rekap(){
        $hasil=$this->db->query("SELECT * FROM kas");
        return $hasil;
    }

    public function rekap() {
        $this->db->select('SUM(kas_masuk) as kas');
        $this->db->from('kas');
        return $this->db->get()->row()->kas;
    }
}

/* End of file M_kas.php */