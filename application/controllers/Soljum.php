<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Soljum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_soljum');
        $this->load->model('M_imam');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Jadwal Khotib Salat Jumat',
            'soljum' => $this->M_soljum->lists(),
            'isi'  => 'admin/soljum/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('tgl_soljum', 'Tanggal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal Khotib Salat Jumat',
                'imam' => $this->M_imam->lists(),
                'isi'  => 'admin/soljum/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'tgl_soljum'    => $this->input->post('tgl_soljum'),
                'id_imam'    => $this->input->post('id_imam')
            );
            $this->M_soljum->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
            redirect('soljum');
        }
    }

    public function edit($id_soljum)
    {
        $this->form_validation->set_rules('tgl_soljum', 'Tanggal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal soljum',
                'soljum' => $this->M_soljum->detail($id_soljum),
                'imam' => $this->M_imam->lists(),
                'isi'  => 'admin/soljum/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_soljum'     => $id_soljum,
                'tgl_soljum'    => $this->input->post('tgl_soljum'),
                'id_imam'    => $this->input->post('id_imam')
            );
            $this->M_soljum->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            redirect('soljum');
        }
    }

    public function delete($id_soljum)
    {
        $data = array(
            'id_soljum' => $id_soljum,
        );
        $this->M_soljum->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('soljum');
    }
}

/* End of file soljum.php */ 