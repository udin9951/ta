<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/codeigniter-guzzle/vendor/autoload.php';
// use GuzzleHttp\Client;

class Home extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');

		$this->load->model('m_home');
		$this->load->model('m_galeri');

	}
   
    public function index()
    {
		$client = new GuzzleHttp\Client();

		$url="https://api.myquran.com/v1/sholat";


		$res_kota = $client->request('GET', $url.'/kota/semua');
		$res_jadwal = $client->request('GET',$url.'/jadwal/2113/'.date('Y').'/'.date('m').'/'.date('d') );
		$list_kota = json_decode($res_kota->getBody());
		$jadwal_shalat = json_decode($res_jadwal->getBody());

        $data = array(
			'wilayah'	=> '2113',
            'title' => 'Web Informasi Masjid',
			'list_kota' => $list_kota,         
			'jadwal_shalat' => $jadwal_shalat->data->jadwal,         
            'galeri' => $this->m_galeri->lists(),          
            'berita' => $this->m_home->slider_berita(),   
            'isi'  => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

	public function get_kota()
	{
		$client = new GuzzleHttp\Client();
		$url="https://api.myquran.com/v1/sholat";
		$type = $this->input->post('type');
		$tanggal = $this->input->post('date');

		if(!empty($type) && $type == "Besok")
		{
			$hari = date('d', strtotime('+1 day', strtotime($tanggal)));
		}
		else if(!empty($type) && $type == "Kemarin")
		{
			$hari = date('d', strtotime('-1 day', strtotime($tanggal)));
		}
		else
		{
			$hari = date('d');
		}

		$kota = $this->input->post('kota');

		$res_jadwal = $client->request('GET',$url.'/jadwal/'.$kota.'/'.date('Y').'/'.date('m').'/'.$hari );
		$res_jadwal = json_decode($res_jadwal->getBody());
		$res_jadwal = $res_jadwal->data->jadwal;
		echo json_encode($res_jadwal);
	}

	public function get_per_month()
	{
		
		$client = new GuzzleHttp\Client();
		$url="https://api.myquran.com/v1/sholat";
		$kota = $this->input->post('kota');
		$date =  $this->input->post('date-now');


		$month = date('m', strtotime('+0 day', strtotime($date)));
		$years = date('Y', strtotime('+0 day', strtotime($date)));

		$res_jadwal = $client->request('GET',$url.'/jadwal/'.$kota.'/'.$years.'/'.$month );
		$res_jadwal = json_decode($res_jadwal->getBody());
		$res_jadwal = $res_jadwal->data->jadwal;
		$bulan = DateTime::createFromFormat('Y-m-d', $date)->format('F');
		$data = array(
			'title' => 'Data Jadwal Shalat',
			'shalat' => $res_jadwal,
			'isi'=> 'v_shalat',
			'tanggal' => $bulan, 
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
		$bidang = $this->m_home->pengurus('Bidang Bidang');
		$anggota_bidang = [];

		foreach ($bidang as $key => $value) {
			$data = $this->m_home->anggota_pengurus('Bidang Bidang', $value->jabatan_pengurus);

			foreach ($data as $key => $a) {
				$anggotaItem['jabatan'] = $a->jabatan_pengurus;
				$anggotaItem['nama'] = $a->nama_pengurus;
				$anggotaItem['title'] = $a->title;
				$anggotaItem['no_urut'] = $a->no_urut;

				array_push($anggota_bidang, $anggotaItem);
			}
		}

		$data = array(
			'title' => 'Pengurus',
			'penasihat' => $this->m_home->pengurus('Penasihat'),
			'pengurus' => $this->m_home->pengurus('Pengurus Harian'),
			'bidang' => $this->m_home->pengurus('Bidang Bidang'),
			'anggota' => $anggota_bidang,
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
		$hari = $this->input->post('hari');
		
		$hari = !empty($hari) ? $hari : "";

		$data = array(
			'title' => 'Jadwal Pengajian',
			'hari' => $hari,
			'pengajian' => $this->m_home->pengajian($hari),
			'isi'=> 'v_pengajian' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function soljum()
	{
		$filter_start = $this->input->post('filter-start');
		$filter_end = $this->input->post('filter-end');

		$filter_start = !empty($filter_start) ? $filter_start : "";
		$filter_end = !empty($filter_end) ? $filter_end : "";

		if(!empty($filter_start) && !empty($filter_end))
		{
			if($filter_start > $filter_end )
			{
				$this->session->set_flashdata('error', 'Start Date Tidak Boleh Lebih dari End Date');
				redirect('home/soljum');
			}
		}

		$data = array(
			'title' => 'Jadwal Khotib Salat Jumat',
			'start' => $filter_start,
			'end'	=> $filter_end,
			'soljum' => $this->m_home->soljum($filter_start,$filter_end),
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

	public function laporan()
	{
		$data = array(
			'title' => 'Laporan',
			'laporan' => $this->m_home->laporan(),
			'isi'=> 'v_laporan' 
			);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	//berita
	public function berita()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/berita');
		$config['total_rows'] = count($this->m_home->total_berita());
		$config['per_page'] = 6;
		$config['url_segmen'] = 3;	
		
		/////
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//////
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagination__number blog__pagination border border-dark"><ul class="pagination">';
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
