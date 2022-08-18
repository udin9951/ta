<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_Model {

    public function lists($filter = NULL, $end = NULL, $type = NULL) 
    {

    $this->db->select('*');
        $this->db->from('kas');
        if(!empty($filter))
        {
            $this->db->where("tgl_kas >=", $filter);
        }
        if(!empty($end))
        {
            $this->db->where("tgl_kas <=", $end);
        }
        if(!empty($type))
        {
            $this->db->where('jenis_kas', $type);
        }
        $this->db->order_by('tgl_kas', 'asc');
        return $this->db->get()->result();
    }

    public function detail($id_kas) 
    {
        $this->db->select('*');
        $this->db->from('kas');                      
        $this->db->where('id_kas', $id_kas);
        return $this->db->get()->row();
    }

}

/* End of file M_kas.php */