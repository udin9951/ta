<?php

class Berita extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita');
	}
	
    public function index()
    {
		$data = array(
			'title' => 'Data Artikel',
			'berita' => $this->m_berita->lists(),
			'isi'=> 'admin/berita/v_list' 
			);
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    	
    public function add(){
    	
        $this->form_validation->set_rules('jdl_berita','Judul Berita', 'required');
		$this->form_validation->set_rules('isi_berita','Isi Berita', 'required',array(
			'required' => '%s Harus Diisi !!!'
			));
		if ($this->form_validation->run() == TRUE) {
			 $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
                $config['max_size']             = 2000;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('gambar_berita')){
                	$data = array(
							'title' => 'Input Data Artikel',
							'error_upload' => $this->upload->display_errors(),
							'isi'=> 'admin/berita/v_add'  
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
					return;
             	}else{
             		$upload_data 				= array('uploads'=> $this ->upload ->data());
             		$config ['image_library'] 	= 'gd2';
             		$config ['source_image']	= './gambar/'.$upload_data['uploads']['file_name'];
             		$this->load->library('image_lib', $config);
             		}
             		$data = array(
							'jdl_berita' 		=> $this->input->post('jdl_berita'),							
							'slug_berita' 		=> url_title($this->input->post('jdl_berita'),'dash', TRUE),
							'isi_berita' 		=> $this->input->post('isi_berita'),
							'tgl_berita' 		=> date('Y-m-d'),							
							'id_user' 			=> 	$this->session->userdata('id_user'),
							'gambar_berita' 	=> $upload_data['uploads']['file_name'],
					);
					$this->m_berita->add($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
					redirect('berita');
             	}
		$data = array(
			'title' => 'Tambah Data Artikel',
			'berita' => $this->m_berita->lists(),
			'isi'=> 'admin/berita/v_add' 
			);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
	
	public function edit($id_berita)
    {
        $this->form_validation->set_rules('jdl_berita','Judul Berita', 'required',array(
			'required' => '%s Harus Diisi !!!'
			));
		$this->form_validation->set_rules('isi_berita','Isi Berita', 'required',array(
			'required' => '%s Harus Diisi !!!'
			));

		if ($this->form_validation->run() == TRUE) {
			 $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
                $config['max_size']             = 2000;
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('gambar_berita')){

                	$data = array(
					'title' => 'Edit Data berita',
					'error_upload' => $this->upload->display_errors(),
					'berita' => $this->m_berita->detail($id_berita),
					'isi'=> 'admin/berita/v_edit' 
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
					return;
             	}else{
             			//edit dengan ubah gambar
						 $upload_data = array('uploads'=> $this ->upload ->data());
						 $config ['image_library'] = 'gd2';
						 $config ['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
						 $this->load->library('image_lib', $config);
						 
						 //menghapus file photo lama
						 $berita=$this->m_berita->detail($id_berita);

						 if ($berita->gambar_berita !="") {
							 unlink('./gambar/'.$berita->gambar_berita);
						 }

						 //end menghapus photo lama
             		$data = array(
							'id_berita'		    => $id_berita,
							'jdl_berita' 		=> $this->input->post('jdl_berita'),							
							'slug_berita' 		=> url_title($this->input->post('jdl_berita'),'dash', TRUE),
							'isi_berita' 		=> $this->input->post('isi_berita'),							
							'id_user' 			=> 	$this->session->userdata('id_user'),
							'gambar_berita' 			=> $upload_data['uploads']['file_name'],
					);
					$this->m_berita->edit($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
					redirect('berita');
				 }
				 //edit tanpa ubah gambar
				 $data = array(
					'id_berita'		    => $id_berita,
					'jdl_berita' 		=> $this->input->post('jdl_berita'),							
					'slug_berita' 		=> url_title($this->input->post('jdl_berita'),'dash', TRUE),
					'isi_berita' 		=> $this->input->post('isi_berita'),							
					'id_user' 			=> 	$this->session->userdata('id_user'),
			);
			$this->m_berita->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
			redirect('berita');
		}
		$data = array(
			'title' => 'Edit Data Artikel',
			'berita' => $this->m_berita->detail($id_berita),
			'isi'=> 'admin/berita/v_edit' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}



	public function delete($id_berita)
	{	
		
		 //menghapus file photo lama
		 $berita=$this->m_berita->detail($id_berita);
		 if ($berita->gambar_berita !="") {
			 unlink('./gambar/'.$berita->gambar_berita);
		 }
		 //end menghapus photo lama

		$data = array('id_berita'=> $id_berita,);
		$this->m_berita->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
			redirect('berita');
	}
	
}

/* End of file berita.php */