<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_galeri');

	}
   
    public function index()
    {
        $data = array(
            'title' => 'Web Informasi Masjid',         
             'galeri' => $this->m_galeri->lists(),          
             'berita' => $this->m_home->slider_berita(),   
            'isi'  => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    
	public function galeri()
	{
		$data = array(
			'title' => 'Galeri',
			'galeri' => $this->m_home->galeri(),
			'isi'=> 'v_galeri' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	

	public function channel()
	{
		$data = array(
			'title' => 'Channel',
			'channel' => $this->m_home->channel(),
			'isi'=> 'v_channel' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function pengurus()
	{
		$data = array(
			'title' => 'Pengurus',
			'pengurus' => $this->m_home->pengurus(),
			'isi'=> 'v_pengurus' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
	
	public function sapras()
	{
		$data = array(
			'title' => 'Sarana & Prasarana',
			'sapras' => $this->m_home->sapras(),
			'isi'=> 'v_sapras' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function profil()
	{
		$data = array(
			'title' => 'Visi Misi',
			'isi'=> 'v_profil' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	
	public function kegiatan()
	{
		$data = array(
			'title' => 'Jadwal Kegiatan',
			'kegiatan' => $this->m_home->kegiatan(),
			'isi'=> 'v_kegiatan' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function pengajian()
	{
		$data = array(
			'title' => 'Jadwal Pengajian',
			'pengajian' => $this->m_home->pengajian(),
			'isi'=> 'v_pengajian' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function soljum()
	{
		$data = array(
			'title' => 'Jadwal Khotib Salat Jumat',
			'soljum' => $this->m_home->soljum(),
			'isi'=> 'v_soljum' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function salat()
	{
		$data = array(
			'title' => 'Jadwal Salat Kota Banjarmasin',
			'salat' => $this->m_home->salat(),
			'isi'=> 'v_salat' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
	
	 public function contact()
	{
		$data = array(
			'title' => 'Contact',
			'isi'=> 'v_contact' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function kas_masuk()
	{
		$data = array(
			'title' => 'Kas Masuk',
			'kas_masuk' => $this->m_home->kas_masuk(),
			'isi'=> 'v_kas_masuk' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function kas_keluar()
	{
		$data = array(
			'title' => 'Kas Keluar',
			'kas_keluar' => $this->m_home->kas_keluar(),
			'isi'=> 'v_kas_keluar' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function rekap()
	{
		$filter_start = $this->input->post('filter-start');
		$filter_end = $this->input->post('filter-end');
		$type = $this->input->post('type');

		$filter_start = !empty($filter_start) ? $filter_start : "";
		$filter_end = !empty($filter_end) ? $filter_end : "";
		$type = !empty($type) ? $type : "";

		if(!empty($filter_start) && !empty($filter_end))
		{
			if($filter_start > $filter_end )
			{
				$this->session->set_flashdata('error', 'Start Date Tidak Boleh Lebih dari End Date');
				redirect('home/rekap');
			}
		}

		$total_kas = 0;
		if(empty($type))
		{
			$kas_masuk =  $this->m_home->sumKasMasuk($filter_start, $filter_end ,'Masuk');
			$kas_keluar = $this->m_home->sumKasKeluar($filter_start, $filter_end ,'Keluar');

			$total_kas = $kas_masuk->kas_masuk - $kas_keluar->kas_keluar;
		}
		$data = array(
			'title' => 'Rekap Kas Masjid',
			'start' => $filter_start,
			'end' => $filter_end,
			'type' => $type,
			'kas_masuk' => $this->m_home->sumKasMasuk($filter_start, $filter_end ,$type),
			'kas_keluar' => $this->m_home->sumKasKeluar($filter_start, $filter_end ,$type),
			'total_kas' => $total_kas,
			'rekap' => $this->m_home->rekap_kas($filter_start, $filter_end ,$type),
			'isi'=> 'v_rekap' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	//berita
	public function berita()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/berita');
		$config['total_rows'] = count($this->m_home->total_berita());
		$config['per_page'] = 4;
		$config['url_segmen'] = 3;	
		
		/////
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//////
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagination__number blog__pagination"><ul class="pagination">"';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';			
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['full_tag_close'] = '</ul></div>';		
		/////............

		$this->pagination->initialize($config);

		$data = array(
			'paginasi' =>$this->pagination->create_links(),
			'latest_berita'=>$this->m_home->latest_berita(),
			'berita' =>$this->m_home->berita($limit,$start),
			'title' => 'Berita',
			'isi'=> 'v_berita' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


	 public function detail_berita($slug_berita)
	{
		$data = array(
			'title' => 'Detail Berita',
			'latest_berita'=>$this->m_home->latest_berita(),
			'berita' => $this->m_home->detail_berita($slug_berita),
			'isi'=> 'v_berita_detail' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
	//end berita
}

/* End of file Home.php */
