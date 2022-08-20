<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengurus extends CI_Model {

    public function lists() 
    {

    $this->db->select('*');
        $this->db->from('pengurus');    
        $this->db->join('user', 'user.id_user = pengurus.id_user', 'left');
		$this->db->order_by('id_pengurus', 'DESC');
        return $this->db->get()->result();
    }

    public function last($no_urut = NULL, $type =NULL, $jabatan = NULL) 
    {

    $this->db->select('*');
        $this->db->from('pengurus');    
        if(!empty($no_urut))
        {
            $this->db->where('no_urut', $no_urut);
        }
        $this->db->where('type', $type);
        if($type == "Bidang Bidang")
        {
            $this->db->where('jabatan_pengurus', $jabatan);
        }
		$this->db->order_by('no_urut', 'DESC');
        return $this->db->get()->row();
    }

    public function detail($id_pengurus) 
    {
        $this->db->select('*');
        $this->db->from('pengurus');                      
        $this->db->where('id_pengurus', $id_pengurus);
        return $this->db->get()->row();
    }

    public function add($data) 
    {
        $this->db->insert('pengurus', $data);
    }

    public function edit($data) 
    {
        $this->db->where('id_pengurus', $data['id_pengurus']);
        $this->db->update('pengurus', $data);        
    }

    public function delete($data) 
    {
        $this->db->where('id_pengurus', $data['id_pengurus']);
        $this->db->delete('pengurus', $data);

    }

}
/* End of file M_pengurus.php */