<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class imam extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_imam');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Imam', 
                'imam' => $this->M_imam->lists(),
                'isi'  => 'admin/imam/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }


        public function add()          
        {
            $this->form_validation->set_rules('nama_imam', 'Nama Imam ', 'required');   
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Imam', 
                    'isi'  => 'admin/imam/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_imam'     => $this->input->post('id_imam'),
                                'nama_imam'     => $this->input->post('nama_imam')
                            );
                        $this->M_imam->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('imam');
                    }
                }

        public function edit($id_imam)
        {
            $this->form_validation->set_rules('nama_imam', 'Nama Imam ', 'required');   
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Imam', 
                    'imam' => $this->M_imam->detail($id_imam),
                    'isi'  => 'admin/imam/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_imam' 	=> $id_imam,
                                'nama_imam'  => $this->input->post('nama_imam'),
                                );
                        $this->M_imam->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('imam');
                    }
                }

        public function delete($id_imam)
        {
            $data = array(
                'id_imam' => $id_imam,
            );
            $this->M_imam->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
            redirect('imam');
        }
}

/* End of file imam.php */