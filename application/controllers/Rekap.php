<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rekap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekap');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Rekap Kas Masjid', 
                'rekap' => $this->M_rekap->lists(),
                'isi'  => 'admin/rekap/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }
       
}

/* End of file kas.php */