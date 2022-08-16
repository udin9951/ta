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
        $this->db->order_by('no_urut', 'asc');
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
    

    public function pengajian($hari)
    {
        $this->db->select('*');
        $this->db->from('pengajian a');
         $this->db->join('penceramah b', 'b.id_penceramah = a.id_penceramah','left');     
         if(!empty($hari))
         {
             $this->db->where("a.hari_pengajian", $hari);
         }             
        $this->db->order_by('a.tgl_pengajian', 'desc');
        return $this->db->get()->result();
    }

    public function soljum($filter_start,$filter_end)
    {
        $this->db->select('*');
        $this->db->from('soljum');   
        $this->db->join('imam', 'imam.id_imam = soljum.id_imam','left'); 
        if(!empty($filter_start))
        {
            if(!empty($filter_end))
            {
                $this->db->where("DATE_FORMAT(soljum.tgl_soljum,'%Y-%m') >= ", $filter_start);
            }
            else
            {
                $this->db->where("DATE_FORMAT(soljum.tgl_soljum,'%Y-%m') ", $filter_start);
            }
        }

        if(!empty($filter_end))
        {
            $this->db->where("DATE_FORMAT(soljum.tgl_soljum,'%Y-%m') <= ", $filter_end);
        }              
        $this->db->order_by('soljum.tgl_soljum', 'asc');
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
        $this->db->from('kas');            
        $this->db->order_by('id_kas', 'desc');
        return $this->db->get()->result();
    }        

    public function rekap_kas($filter_start, $filter_end ,$type)
    {
        $this->db->select('*');
        $this->db->from('kas');
        if(!empty($filter_start))
        {
            $this->db->where("tgl_kas >= ", $filter_start);
        }

        if(!empty($filter_end))
        {
            $this->db->where("tgl_kas <= ", $filter_end);
        }
        if(!empty($type))
        {
            $this->db->where('jenis_kas', $type);
        }
        $this->db->order_by('tgl_kas', 'DESC');
        return $this->db->get()->result();
    }
    
    public function sumKasMasuk($filter_start, $filter_end ,$type) 
    {

    $this->db->select_sum('kas_masuk');
        $this->db->from('kas');   
        if(!empty($filter_start))
        {
            $this->db->where("tgl_kas >= ", $filter_start);
        }

        if(!empty($filter_end))
        {
            $this->db->where("tgl_kas <= ", $filter_end);
        }
        if(!empty($type))
        {
            $this->db->where('jenis_kas', $type);
        } 
        return $this->db->get()->row();
    }

    public function sumKasKeluar($filter_start, $filter_end ,$type) 
    {

    $this->db->select_sum('kas_keluar');
        $this->db->from('kas');   
        if(!empty($filter_start))
        {
            $this->db->where("tgl_kas >= ", $filter_start);
        }

        if(!empty($filter_end))
        {
            $this->db->where("tgl_kas <= ", $filter_end);
        }
        if(!empty($type))
        {
            $this->db->where('jenis_kas', $type);
        } 
        return $this->db->get()->row();
    }

    public function sumKas($filter_start, $filter_end ,$type) 
    {

    $this->db->select_sum('kas_keluar');
        $this->db->from('kas');   
        if(!empty($filter_start))
        {
            $this->db->where("tgl_kas >= ", $filter_start);
        }

        if(!empty($filter_end))
        {
            $this->db->where("tgl_kas <= ", $filter_end);
        }
        if(!empty($type))
        {
            $this->db->where('jenis_kas', $type);
        } 
        return $this->db->get()->row();
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
