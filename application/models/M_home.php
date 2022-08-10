<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function galeri()
    {
        $this->db->select('*');
        $this->db->from('galeri');            
        $this->db->order_by('id_galeri', 'desc');
        return $this->db->get()->result();
    }

    public function channel()
    {
        $this->db->select('*');
        $this->db->from('channel');            
        $this->db->order_by('id_channel', 'desc');
        return $this->db->get()->result();
    }

    public function pengurus()
    {
        $this->db->select('*');
        $this->db->from('pengurus');            
        $this->db->order_by('id_pengurus', 'desc');
        return $this->db->get()->result();
    }

    public function sapras()
    {
        $this->db->select('*');
        $this->db->from('sapras');            
        $this->db->order_by('id_sapras', 'desc');
        return $this->db->get()->result();
    }

    public function kegiatan()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');            
        $this->db->order_by('id_kegiatan', 'desc');
        return $this->db->get()->result();
    }
    

    public function pengajian()
    {
        $this->db->select('*');
        $this->db->from('pengajian');
         $this->db->join('penceramah', 'penceramah.id_penceramah = pengajian.id_penceramah','left');                  
        $this->db->order_by('id_pengajian', 'desc');
        return $this->db->get()->result();
    }

    public function soljum()
    {
        $this->db->select('*');
        $this->db->from('soljum');   
         $this->db->join('imam', 'imam.id_imam = soljum.id_imam','left');               
        $this->db->order_by('id_soljum', 'desc');
        return $this->db->get()->result();
    }

    public function salat()
    {
        $this->db->select('*');
        $this->db->from('salat');            
        $this->db->order_by('id_salat', 'desc');
        return $this->db->get()->result();
    }

    public function kas_masuk()
    {
        $this->db->select('*');
        $this->db->from('kas');            
        $this->db->order_by('id_kas', 'desc');
        return $this->db->get()->result();
    }

    public function kas_keluar()
    {
        $this->db->select('*');
        $this->db->from('salat');            
        $this->db->order_by('id_salat', 'desc');
        return $this->db->get()->result();
    }        

    public function rekap_kas()
    {
        $this->db->select('*');
        $this->db->from('salat');            
        $this->db->order_by('id_salat', 'desc');
        return $this->db->get()->result();
    }  
    
    //memunculkan berita deg pging
    public function berita($limit,$start)
    {
        $this->db->select('*');
        $this->db->from('berita');  
        $this->db->join('user', 'user.id_user = berita.id_user', 'left');       
        $this->db->order_by('id_berita', 'desc');
        $this->db->limit($limit,$start);
        return $this->db->get()->result();
    }

    public function total_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');  
        $this->db->join('user', 'user.id_user = berita.id_user', 'left');       
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get()->result();
    }

    public function detail_berita($slug_berita)
    {
        $this->db->select('*');
        $this->db->from('berita');  
        $this->db->join('user', 'user.id_user = berita.id_user', 'left');
        $this->db->where('slug_berita', $slug_berita);
        return $this->db->get()->row();
    }

    public function latest_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');  
        $this->db->join('user', 'user.id_user = berita.id_user', 'left');       
        $this->db->order_by('id_berita', 'desc');
        $this->db->limit(3);
        return $this->db->get()->result();
    }
    public function slider_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');  
        $this->db->join('user', 'user.id_user = berita.id_user', 'left');       
        $this->db->order_by('id_berita', 'desc');
        $this->db->limit(2);
        return $this->db->get()->result();
    }
        
}

/* End of file M_Home.php */
