<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class penceramah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penceramah');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Penceramah', 
                'penceramah' => $this->M_penceramah->lists(),
                'isi'  => 'admin/penceramah/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }


        public function add()          
        {
            $this->form_validation->set_rules('nama_penceramah', 'Nama Penceramah ', 'required');   
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Penceramah', 
                    'isi'  => 'admin/penceramah/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_penceramah'     => $this->input->post('id_penceramah'),
                                'nama_penceramah'     => $this->input->post('nama_penceramah')
                            );
                        $this->M_penceramah->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('penceramah');
                    }
                }

        public function edit($id_penceramah)
        {
            $this->form_validation->set_rules('nama_penceramah', 'Nama penceramah ', 'required'); 
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Penceramah', 
                    'penceramah' => $this->M_penceramah->detail($id_penceramah),
                    'isi'  => 'admin/penceramah/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_penceramah' 	=> $id_penceramah,
                                'nama_penceramah'  => $this->input->post('nama_penceramah'),
                                );
                        $this->M_penceramah->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('penceramah');
                    }
                }

        public function delete($id_penceramah)
        {
            $data = array(
                'id_penceramah' => $id_penceramah,
            );
            $this->M_penceramah->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
            redirect('penceramah');
        }
}
 
/* End of file penceramah.php */