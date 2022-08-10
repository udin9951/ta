<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kegiatan');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Jadwal Kegiatan', 
                'kegiatan' => $this->M_kegiatan->lists(),
                'isi'  => 'admin/kegiatan/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }


        public function add()          
        {
            $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan ', 'required');   
            $this->form_validation->set_rules('hari_kegiatan', 'Hari Kegiatan', 'required');
            $this->form_validation->set_rules('tgl_kegiatan', 'tgl Kegiatan', 'required');  
            $this->form_validation->set_rules('jam_kegiatan', 'Jam Kegiatan', 'required');      
            $this->form_validation->set_rules('lokasi_kegiatan', 'Lokasi Kegiatan', 'required');        
            $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');    
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Jadwal Kegiatan', 
                    'isi'  => 'admin/kegiatan/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'nama_kegiatan'     => $this->input->post('nama_kegiatan'),
                                'hari_kegiatan'    => $this->input->post('hari_kegiatan'),
                                'tgl_kegiatan'    => $this->input->post('tgl_kegiatan'),
                                'jam_kegiatan'    => $this->input->post('jam_kegiatan'),
                                'lokasi_kegiatan'    => $this->input->post('lokasi_kegiatan'),
                                'deskripsi_kegiatan'    => $this->input->post('deskripsi_kegiatan'),
                                'id_user'          =>  $this->session->userdata('id_user')
                            );
                        $this->M_kegiatan->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('kegiatan');
                    }
                }

        public function edit($id_kegiatan)
        {
            $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan ', 'required');   
            $this->form_validation->set_rules('hari_kegiatan', 'Hari Kegiatan', 'required');
            $this->form_validation->set_rules('tgl_kegiatan', ' tgl_kegiatan', 'required');        
            $this->form_validation->set_rules('jam_kegiatan', 'Jam Kegiatan', 'required');
            $this->form_validation->set_rules('lokasi_kegiatan', 'lokasi_kegiatan', 'required');        
            $this->form_validation->set_rules('deskripsi_kegiatan', 'deskripsi_kegiatan', 'required');    
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data kegiatan', 
                    'kegiatan' => $this->M_kegiatan->detail($id_kegiatan),
                    'isi'  => 'admin/kegiatan/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_kegiatan'   => $id_kegiatan,
                                'nama_kegiatan'  => $this->input->post('nama_kegiatan'),
                                'hari_kegiatan'    => $this->input->post('hari_kegiatan'),
                                'tgl_kegiatan'    => $this->input->post('tgl_kegiatan'),
                                'lokasi_kegiatan'    => $this->input->post('lokasi_kegiatan'),
                                'jam_kegiatan'    => $this->input->post('jam_kegiatan'),
                                'deskripsi_kegiatan'    => $this->input->post('deskripsi_kegiatan'),
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->M_kegiatan->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('kegiatan');
                    }
                }

        public function delete($id_kegiatan)
        {
            $data = array(
                'id_kegiatan' => $id_kegiatan,
            );
            $this->M_kegiatan->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
            redirect('kegiatan');
        }
}

/* End of file Kegiatan.php */