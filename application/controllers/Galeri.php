<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_galeri');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Galeri', 
                'galeri' => $this->m_galeri->lists(),
                'isi'  => 'admin/galeri/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }


        public function add()
        {         
            
        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required');
        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required');
        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required');
        $this->form_validation->set_rules('deskripsi_galeri', 'Deskripsi Galeri', 'required');
       
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_galeri'))
                    {
                           
                            $data = array(                
                                'title' => 'Input Data Galeri',
                                'error_upload' => $this->upload->display_errors(),
                                'isi'=> 'admin/galeri/v_add'  
                            );
                            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    }
                    else
                    {
                            $upload_data = array('uploads' => $this->upload->data());
                            $config = array('uploads' => $this->upload->data());
                            $config ['image_library'] = 'gd2';
                            $config ['source_image'] = './foto_galeri/'.$upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);

                            $data = array( 
                                'judul_galeri'  => $this->input->post('judul_galeri'),
                                'deskripsi_galeri'  => $this->input->post('deskripsi_galeri'),
                                'tgl_galeri'    => date('Y,m.d'),
                                'foto_galeri'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->m_galeri->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('galeri');
                    }
            } 
            
            $data = array(
                'title' => 'Tambah Data Galeri', 
                'galeri' => $this->m_galeri->lists(),
                'isi'  => 'admin/galeri/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }

        public function edit($id_galeri)
        {
            $this->form_validation->set_rules('judul_galeri','Judul Galeri', 'required');

            
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_galeri'))
                    {
                           
                            $data = array(                
                                'title' => ' Edit Data Sarana & Prasarana', 
                                'galeri' => $this->m_galeri->detail($id_galeri),
                                'isi'  => 'admin/galeri/v_edit'
                            );
                            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    }
                    else
                    {
                            $upload_data = array('uploads' => $this->upload->data());
                            $config = array('uploads' => $this->upload->data());
                            $config ['image_library'] = 'gd2';
                            $config ['source_image'] = './sampul/'.$upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);
                            //menghapus file photo lama
                            $galeri=$this->m_galeri->detail($id_galeri);
                            if ($galeri->foto_galeri !="") {
                                unlink('./sampul/'.$galeri->foto_galeri);
                            }
                            //end menghapus photo lama
                            $data = array(
                                'id_galeri'       =>$id_galeri,
                                'judul_galeri'    => $this->input->post('judul_galeri'),
                                'foto_galeri'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->m_galeri->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('galeri');
                    }

                    $upload_data = array('uploads' => $this->upload->data());
                    $config = array('uploads' => $this->upload->data());
                    $config ['image_library'] = 'gd2';
                    $config ['source_image'] = './foto/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                                'id_galeri'       =>$id_galeri,
                                'nama_galeri'    => $this->input->post('nama_galeri'),
                                'foto_galeri'    => $this->input->post('foto_galeri'),
                                'id_user'           =>  $this->session->userdata('id_user')
                        );
                        $this->m_galeri->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('galeri');
            } 

            $data = array(
                'title' => 'Edit Data Sarana & Prasarana',                
                'galeri' => $this->m_galeri->detail($id_galeri),
                'isi'  => 'admin/galeri/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }

        public function delete($id_galeri)
        {
            $data = array(
                'id_galeri' => $id_galeri,
            );
            $this->m_galeri->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');        
            redirect('galeri');
        }
}

/* End of file Siswa.php */