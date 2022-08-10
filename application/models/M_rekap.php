<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_Model {

    public function lists($filter, $type) 
    {

    $this->db->select('*');
        $this->db->from('kas');
        if(!empty($filter))
        {
            $this->db->where("DATE_FORMAT(tgl_kas,'%Y-%m')", $filter);
        }
        if(!empty($type))
        {
            $this->db->where('jenis_kas', $type);
        }
        $this->db->order_by('id_kas', 'DESC');
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