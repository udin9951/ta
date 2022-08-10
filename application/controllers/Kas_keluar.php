<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_keluar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kas_keluar');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Kas Keluar', 
                'kas_keluar' => $this->M_kas_keluar->lists(),
                'isi'  => 'admin/kas_keluar/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }


        public function add()          
        {
            $this->form_validation->set_rules('tgl_kas', 'Tanggal Kas', 'required');        
            $this->form_validation->set_rules('uraian_kas', 'Uraian Kas', 'required');        
            $this->form_validation->set_rules('kas_keluar', 'Saldo Kas Keluar', 'required');    
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Kas Keluar', 
                    'isi'  => 'admin/kas_keluar/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'tgl_kas'    => $this->input->post('tgl_kas'),
                                'uraian_kas'    => $this->input->post('uraian_kas'),
                                'kas_keluar'    => $this->input->post('kas_keluar'),
                                'id_user'          =>  $this->session->userdata('id_user')
                            );
                        $this->M_kas_keluar->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('kas_keluar');
                    }
                }

        public function edit($id_kas)
        {
            $this->form_validation->set_rules('tgl_kas', 'Tanggal Kas', 'required');        
            $this->form_validation->set_rules('uraian_kas', 'Uraian Kas', 'required');        
            $this->form_validation->set_rules('kas_keluar', 'Saldo Kas Keluar', 'required');    
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Kas Keluar', 
                    'kas' => $this->M_kas_keluar->detail($id_kas),
                    'isi'  => 'admin/kas_keluar/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_kas'   => $id_kas,
                                'tgl_kas'    => $this->input->post('tgl_kas'),
                                'uraian_kas'    => $this->input->post('uraian_kas'),
                                'kas_keluar'    => $this->input->post('kas_keluar'),
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->M_kas_keluar->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('kas_keluar');
                    }
        }

        public function delete($id_kas)
        {
            $data = array(
                'id_kas' => $id_kas,
            );
            $this->M_kas_keluar->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
            redirect('kas_keluar');
        }
}

/* End of file kas.php */