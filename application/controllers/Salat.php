<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class salat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_salat');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Jadwal salat', 
                'salat' => $this->M_salat->lists(),
                'isi'  => 'admin/salat/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }


        public function add()          
        {
            $this->form_validation->set_rules('tgl_salat', 'Tanggal Salat', 'required');        
            $this->form_validation->set_rules('imsak', 'Imsak', 'required');        
            $this->form_validation->set_rules('subuh', 'Subuh', 'required');
            $this->form_validation->set_rules('duha', 'Duha', 'required');
            $this->form_validation->set_rules('zuhur', 'Zuhur', 'required');    
            $this->form_validation->set_rules('asar', 'Asar', 'required');
            $this->form_validation->set_rules('magrib', 'Magrib', 'required');
            $this->form_validation->set_rules('isya', 'Isya', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Jadwal salat', 
                    'isi'  => 'admin/salat/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'tgl_salat'    => $this->input->post('tgl_salat'),
                                'imsak'    => $this->input->post('imsak'),
                                'subuh'    => $this->input->post('subuh'),
                                'duha'    => $this->input->post('duha'),
                                'zuhur'    => $this->input->post('zuhur'),
                                'asar'    => $this->input->post('asar'),
                                'magrib'    => $this->input->post('magrib'),
                                'isya'    => $this->input->post('isya'),
                                'id_user'          =>  $this->session->userdata('id_user')
                            );
                        $this->M_salat->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('salat');
                    }
                }

        public function edit($id_salat)
        {
            $this->form_validation->set_rules('tgl_salat', 'Tanggal Salat', 'required');        
            $this->form_validation->set_rules('imsak', 'Imsak', 'required');        
            $this->form_validation->set_rules('subuh', 'Subuh', 'required');
            $this->form_validation->set_rules('duha', 'Duha', 'required');
            $this->form_validation->set_rules('zuhur', 'Zuhur', 'required');    
            $this->form_validation->set_rules('asar', 'Asar', 'required');
            $this->form_validation->set_rules('magrib', 'Magrib', 'required');
            $this->form_validation->set_rules('isya', 'Isya', 'required');    

            if ($this->form_validation->run() == FALSE) {

                $data = array(
                    'title' => 'Edit Data Salat', 
                    'salat' => $this->M_salat->detail($id_salat),
                    'isi'  => 'admin/salat/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                }
                else
                {
                        $data = array(
                            'id_salat'    => $id_salat,
                            'tgl_salat'    => $this->input->post('tgl_salat'),
                            'imsak'    => $this->input->post('imsak'),
                            'subuh'    => $this->input->post('subuh'),
                            'duha'    => $this->input->post('duha'),
                            'zuhur'    => $this->input->post('zuhur'),
                            'asar'    => $this->input->post('asar'),
                            'magrib'    => $this->input->post('magrib'),
                            'isya'    => $this->input->post('isya'),
                            'id_user'          =>  $this->session->userdata('id_user')
                            );
                    $this->M_salat->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                    redirect('salat');
                }
            }

        public function delete($id_salat)
        {
            $data = array(
                'id_salat' => $id_salat,
            );
            $this->M_salat->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
            redirect('salat');
        }
}

/* End of file salat.php */