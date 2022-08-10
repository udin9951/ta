<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_masuk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kas_masuk');
    }

    public function index()
        {
            $data = array(
                'title' => 'Data Kas Masuk', 
                'kas_masuk' => $this->M_kas_masuk->lists(),
                'isi'  => 'admin/kas_masuk/v_list'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }

    public function show_rekap(){
        $x['data']=$this->m_kas_masuk->show_rekap();
        $this->load->view('admin/kas_masuk/v_list',$x);
    }


        public function add()          
        {
            $this->form_validation->set_rules('tgl_kas', 'Tanggal Kas', 'required');        
            $this->form_validation->set_rules('uraian_kas', 'Uraian Kas', 'required');        
            $this->form_validation->set_rules('kas_masuk', 'Saldo Kas masuk', 'required');    
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Kas masuk', 
                    'isi'  => 'admin/kas_masuk/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'tgl_kas'    => $this->input->post('tgl_kas'),
                                'uraian_kas'    => $this->input->post('uraian_kas'),
                                'kas_masuk'    => $this->input->post('kas_masuk'),
                                'id_user'          =>  $this->session->userdata('id_user')
                            );
                        $this->M_kas_masuk->add($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                        redirect('kas_masuk');
                    }
                }

        public function edit($id_kas)
        {
            $this->form_validation->set_rules('tgl_kas', 'Tanggal Kas', 'required');        
            $this->form_validation->set_rules('uraian_kas', 'Uraian Kas', 'required');        
            $this->form_validation->set_rules('kas_masuk', 'Saldo Kas masuk', 'required');    
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Tambah Data Kas masuk', 
                    'kas_masuk' => $this->M_kas_masuk->detail($id_kas),
                    'isi'  => 'admin/kas_masuk/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                    }
                    else
                    {
                            $data = array(
                                'id_kas'   => $id_kas,
                                'tgl_kas'    => $this->input->post('tgl_kas'),
                                'uraian_kas'    => $this->input->post('uraian_kas'),
                                'kas_masuk'    => $this->input->post('kas_masuk'),
                                'id_user'           =>  $this->session->userdata('id_user')
                                );
                        $this->M_kas_masuk->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                        redirect('kas_masuk');
                    }
        }

        public function delete($id_kas)
        {
            $data = array(
                'id_kas' => $id_kas,
            );
            $this->M_kas_masuk->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
            redirect('kas_masuk');
        }

        public function rekap(){
            $kas_masuk['kas_masuk'] = $this->M_kas_masuk->rekap();
        //$data['keluar'] = $this->pengeluaran_model->hasil();
        }
}

/* End of file kas.php */