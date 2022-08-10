<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengajian');
        $this->load->model('M_penceramah');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Jadwal Pengajian',
            'pengajian' => $this->M_pengajian->lists(),
            'isi'  => 'admin/pengajian/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('hari_pengajian', 'Hari', 'required');
        $this->form_validation->set_rules('tgl_pengajian', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_pengajian', 'Jam', 'required');
        $this->form_validation->set_rules('tema_pengajian', 'Tema Pengajian', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal Pengajian',
                'penceramah' => $this->M_penceramah->lists(),
                'isi'  => 'admin/pengajian/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'hari_pengajian'    => $this->input->post('hari_pengajian'),
                'tgl_pengajian'    => $this->input->post('tgl_pengajian'),
                'jam_pengajian'    => $this->input->post('jam_pengajian'),
                'id_penceramah'    => $this->input->post('id_penceramah'),
                'tema_pengajian'    => $this->input->post('tema_pengajian')
            );
            $this->M_pengajian->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
            redirect('pengajian');
        }
    }

    public function edit($id_pengajian)
    {
        $this->form_validation->set_rules('hari_pengajian', 'Hari', 'required');
        $this->form_validation->set_rules('tgl_pengajian', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_pengajian', 'Jam', 'required');
        $this->form_validation->set_rules('tema_pengajian', 'Tema Pengajian', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal Pengajian',
                'pengajian' => $this->M_pengajian->detail($id_pengajian),
                'penceramah' => $this->M_penceramah->lists(),
                'isi'  => 'admin/pengajian/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_pengajian'     => $id_pengajian,
                'hari_pengajian'    => $this->input->post('hari_pengajian'),
                'tgl_pengajian'    => $this->input->post('tgl_pengajian'),
                'jam_pengajian'    => $this->input->post('jam_pengajian'),
                'id_penceramah'    => $this->input->post('id_penceramah'),
                'tema_pengajian'    => $this->input->post('tema_pengajian')
            );
            $this->M_pengajian->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            redirect('pengajian');
        }
    }

    public function delete($id_pengajian)
    {
        $data = array(
            'id_pengajian' => $id_pengajian,
        );
        $this->M_pengajian->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('pengajian');
    }
}

/* End of file Pengajian.php */