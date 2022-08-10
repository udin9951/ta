<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sapras extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sapras');

    }

      public function index()
        {
            $data = array(
                'title' => 'Data Sarana & Prasarana', 
                'sapras' => $this->m_sapras->lists(),
                'isi'  => 'admin/sapras/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }

         public function add()
        {         
            
        $this->form_validation->set_rules('nama_sapras','Nama Sarana & Prasarana', 'required|is_unique[sapras.nama_sapras]');
        $this->form_validation->set_rules('deskripsi_sapras','Deskripsi Sarana & Prasarana', 'required');
       
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_sapras'))
                    {
                           
                            $data = array(                
                                'title' => 'Input Data Sarana & Prasarana',
                                'error_upload' => $this->upload->display_errors(),
                                'isi'=> 'admin/sapras/v_add'  
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

                            $data = array(
                                'nama_sapras'        => $this->input->post('nama_sapras'),   
                                'deskripsi_sapras'        => $this->input->post('deskripsi_sapras'),   

                                'foto_sapras'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->m_sapras->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('sapras');
                    }
            } 
            
            $data = array(
                'title' => 'Tambah Data Sarana & Prasarana', 
                'sapras' => $this->m_sapras->lists(),
                'isi'  => 'admin/sapras/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }
        
         public function edit($id_sapras)
        {
            $this->form_validation->set_rules('nama_sapras','Nama Sarana & Prasarana', 'required|is_unique[sapras.nama_sapras]');
            $this->form_validation->set_rules('deskripsi_sapras','Deskripsi Sarana & Prasarana', 'required');
            // $this->form_validation->set_rules('foto_sapras','Foto Sarana & Prasarana', 'required');

            
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_sapras'))
                    {
                           
                            $data = array(                
                                'title' => ' Edit Data Sarana & Prasarana', 
                                'sapras' => $this->m_sapras->detail($id_sapras),
                                'isi'  => 'admin/sapras/v_edit'
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
                            $sapras=$this->m_sapras->detail($id_sapras);
                            if ($sapras->foto_sapras !="") {
                                unlink('./sampul/'.$sapras->foto_sapras);
                            }
                            //end menghapus photo lama
                            $data = array(
                                'id_sapras'       =>$id_sapras,
                                'nama_sapras'    => $this->input->post('nama_sapras'),
                                'deskripsi_sapras'    => $this->input->post('deskripsi_sapras'),
                                'foto_sapras'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->m_sapras->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('sapras');
                    }

                    $upload_data = array('uploads' => $this->upload->data());
                    $config = array('uploads' => $this->upload->data());
                    $config ['image_library'] = 'gd2';
                    $config ['source_image'] = './sampul/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                                'id_sapras'       =>$id_sapras,
                                'nama_sapras'    => $this->input->post('nama_sapras'),
                                'deskripsi_sapras'    => $this->input->post('deskripsi_sapras'),
                                'foto_sapras'    => $this->input->post('foto_sapras'),
                                'id_user'           =>  $this->session->userdata('id_user')
                        );
                        $this->m_sapras->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('sapras');
            } 

            $data = array(
                'title' => 'Edit Data Sarana & Prasarana',                
                'sapras' => $this->m_sapras->detail($id_sapras),
                'isi'  => 'admin/sapras/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }


        public function delete($id_sapras)
        {

             //menghapus file photo lama
             $sapras=$this->m_sapras->detail($id_sapras);
             if ($sapras->foto_sapras !="") {
                 unlink('./sampul/'.$sapras->foto_sapras);
             }
             //end menghapus photo lama
            $data = array(
                'id_sapras' => $id_sapras,
            );
            $this->m_sapras->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');        
            redirect('sapras');
        }
}

/* End of file Sapra.php */
