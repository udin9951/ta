<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengurus');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Pengurus', 
                'pengurus' => $this->m_pengurus->lists(),
                'isi'  => 'admin/pengurus/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }

        public function add()    
        {         
            
        $this->form_validation->set_rules('nama_pengurus','Nama Pengurus', 'required|is_unique[pengurus.nama_pengurus]');
       
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './gambar/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_pengurus'))
                    {
                           
                            $data = array(                
                                'title' => 'Input Data Pengurus',
                                'error_upload' => $this->upload->display_errors(),
                                'isi'=> 'admin/pengurus/v_add'  
                            );
                            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    }
                    else
                    {
                            $upload_data = array('uploads' => $this->upload->data());
                            // $config = array('uploads' => $this->upload->data());
                            $config ['image_library'] = 'gd2';
                            $config ['source_image'] = './foto_pengurus/'.$upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);

                            $data = array(
                                'nama_pengurus'        => $this->input->post('nama_pengurus'),
                                'jabatan_pengurus'        => $this->input->post('jabatan_pengurus'),                            
                                'foto_pengurus'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->m_pengurus->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('pengurus');
                    }
            } 
            
            $data = array(
                'title' => 'Tambah Data Pengurus', 
                'pengurus' => $this->m_pengurus->lists(),
                'isi'  => 'admin/pengurus/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }      
    
        public function edit($id_pengurus)
        {
            $this->form_validation->set_rules('nama_pengurus','Nama Pengurus', 'required|is_unique[pengurus.nama_pengurus]');

            
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_pengurus'))
                    {
                           
                            $data = array(                
                                'title' => ' Edit Data Pengurus', 
                                'pengurus' => $this->m_pengurus->detail($id_pengurus),
                                'isi'  => 'admin/pengurus/v_edit'
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
                            $pengurus=$this->m_pengurus->detail($id_pengurus);
                            if ($pengurus->foto_pengurus !="") {
                                unlink('./sampul/'.$pengurus->foto_pengurus);
                            }
                            //end menghapus photo lama
                            $data = array(
                                'id_pengurus'       =>$id_pengurus,
                                'nama_pengurus'    => $this->input->post('nama_pengurus'),
                                'foto_pengurus'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->m_pengurus->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('pengurus');
                    }

                    $upload_data = array('uploads' => $this->upload->data());
                    $config = array('uploads' => $this->upload->data());
                    $config ['image_library'] = 'gd2';
                    $config ['source_image'] = './foto/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                                'id_pengurus'       =>$id_pengurus,
                                'nama_pengurus'    => $this->input->post('nama_pengurus'),
                                'foto_pengurus'    => $this->input->post('foto_pengurus'),
                                'id_user'           =>  $this->session->userdata('id_user')
                        );
                        $this->m_pengurus->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('pengurus');
            } 

            $data = array(
                'title' => 'Edit Data Pengurus',                
                'pengurus' => $this->m_pengurus->detail($id_pengurus),
                'isi'  => 'admin/pengurus/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }

        public function delete($id_pengurus)
        {
            $data = array(
                'id_pengurus' => $id_pengurus,
            );
            $this->m_pengurus->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');        
            redirect('pengurus');
        }
}
/* End of file Siswa.php */