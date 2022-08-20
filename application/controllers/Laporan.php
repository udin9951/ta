<?php

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Laporan extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_laporan');
		$this->load->library('Pdf');
	}
	
    public function index()
    {
		$data = array(
			'title' => 'Data Laporan',
			'laporan' => $this->M_laporan->lists()->result(),
			'isi'=> 'admin/laporan/v_list' 
			);
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    	
    public function add(){
    	
        $this->form_validation->set_rules('periode','Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
    	        $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
                $config['max_size']             = 5000;
                
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('foto_laporan')){
					print_r($this->upload->display_errors());die;
                	$data = array(
							'title' => 'Input Data Laporan',
							'error_upload' => $this->upload->display_errors(),
							'isi'=> 'admin/laporan/v_add'  
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
             	}else{
                    $upload_data 				= array('uploads'=> $this ->upload ->data());
                    $config ['image_library'] 	= 'gd2';
                    $config ['source_image']	= './gambar/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    }
					
                    $data = array(
                            'periode' 			=> $this->input->post('periode'),	
							'tgl_upload'		=> date('Y-m-d'),		
                            'foto_laporan' 	    => $upload_data['uploads']['file_name'],
							'user'				=> $this->session->userdata('id_user'),
                    );
                    $this->M_laporan->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                    redirect('laporan');
                }
		$data = array(
			'title' => 'Tambah Data Laporan',
			'laporan' => $this->M_laporan->lists(),
			'isi'=> 'admin/laporan/v_add' 
			);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
	
	public function edit($id)
    {
        $this->form_validation->set_rules('periode','Periode', 'required');

		if ($this->form_validation->run() == TRUE) {
			 $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
                $config['max_size']             = 5000;
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('foto_laporan')){
                	$data = array(
					'title' => 'Edit Data Laporan',
					'error_upload' => $this->upload->display_errors(),
					'user' => $this->M_laporan->detail($id),
					'isi'=> 'admin/laporan/v_edit' 
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
             	}else{
             			//edit dengan ubah gambar
						 $upload_data = array('uploads'=> $this ->upload ->data());
						 $config ['image_library'] = 'gd2';
						 $config ['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
						 $this->load->library('image_lib', $config);
						 
						 //menghapus file photo lama
						 $user=$this->M_laporan->detail($id);
						 if ($user->foto_laporan !="") {
							 unlink('./gambar/'.$user->foto_laporan);
						 }
						 //end menghapus photo lama
					
						 $data = array(
							'id'				=> $id,
                            'periode' 			=> $this->input->post('periode'),	
							'tgl_upload'		=> date('Y-m-d'),		
                            'foto_laporan' 	    => $upload_data['uploads']['file_name'],
							'user'				=> $this->session->userdata('id_user'),
                    );

					$this->M_laporan->edit($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
					redirect('laporan');
				 }
                 $user=$this->M_laporan->detail($id);
				 //edit tanpa ubah gambar

				 $data = array(
					'id'				=> $id,
					'periode' 			=> $this->input->post('periode'),	
					'tgl_upload'		=> date('Y-m-d'),		
					'user'				=> $this->session->userdata('id_user'),
			);

			$this->M_laporan->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
			redirect('laporan');
		}
		$data = array(
			'title' => 'Edit Data Laporan',
			'laporan' => $this->M_laporan->detail($id),
			'isi'=> 'admin/laporan/v_edit' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function delete($id)
	{	
		
		 //menghapus file photo lama
		 $laporan=$this->M_laporan->detail($id);
		 if ($laporan->foto_laporan !="") {
			 unlink('./gambar/'.$laporan->foto_laporan);
		 }
		 //end menghapus photo lama

		$data = array('id'=> $id,);
		$this->M_laporan->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
			redirect('laporan');
	}
}

/* End of file user.php */