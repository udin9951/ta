<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rekap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekap');
        $this->load->model('M_kas_masuk');
        $this->load->model('M_kas_keluar');
    }

    public function index()
        {
            $filter = $this->input->post('filter');
            $type = $this->input->post('type');

            $filter = !empty($filter) ? $filter : "";
            $type = !empty($type) ? $type : "";

            $data = array(
                'title' => 'Data Rekap Kas Masjid', 
                'filter' => $filter,
                'type'  => $type,
                'rekap' => $this->M_rekap->lists($filter, $type),
                'total_kas_masuk' => $this->M_kas_masuk->sumKas(),
                'total_kas_keluar' => $this->M_kas_keluar->sumKas(),
                'postback' => base_url('rekap/index'),
                'isi'  => 'admin/rekap/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }
       
}

/* End of file kas.php */