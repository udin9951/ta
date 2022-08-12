<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kas_masuk');
        $this->load->model('M_kas_keluar');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = array(
            'total_kas_masuk' => $this->M_kas_masuk->sumKas(),
            'total_kas_keluar' => $this->M_kas_keluar->sumKas(),
            'title' => 'Selamat Datang Admin', 
            'isi'  => 'admin/v_home'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}

/* End of file admin.php */
