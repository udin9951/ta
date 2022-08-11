<?php

class User extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}
	
    public function index()
    {
		$data = array(
			'title' => 'Data User',
			'user' => $this->m_user->lists(),
			'isi'=> 'admin/user/v_list' 
			);
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    	
    public function add(){
    	
        $this->form_validation->set_rules('nama_user','Nama User', 'required');
		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('level','Level', 'required');

        if ($this->form_validation->run() == TRUE) {
    	        $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
                $config['max_size']             = 2000;
                
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('foto_user')){
                	$data = array(
							'title' => 'Input Data User',
							'error_upload' => $this->upload->display_errors(),
							'isi'=> 'admin/user/v_add'  
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
             	}else{
                    $upload_data 				= array('uploads'=> $this ->upload ->data());
                    $config ['image_library'] 	= 'gd2';
                    $config ['source_image']	= './gambar/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    }
                    $data = array(
                            'nama_user' 		=> $this->input->post('nama_user'),							
                            'username' 		    => $this->input->post('username'),							
                            'password' 	    	=> $this->input->post('password'),							
                            'level' 	    	=> $this->input->post('level'),							
                            'foto_user' 	    => $upload_data['uploads']['file_name'],
                    );
                    $this->m_user->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                    redirect('user');
                }
		$data = array(
			'title' => 'Tambah Data User',
			'user' => $this->m_user->lists(),
			'isi'=> 'admin/user/v_add' 
			);
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
	
	public function edit($id_user)
    {
        $this->form_validation->set_rules('nama_user','Nama User', 'required');
		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('level','Level', 'required');

		if ($this->form_validation->run() == TRUE) {
			 $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|ico';
                $config['max_size']             = 2000;
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('foto_user')){
                	$data = array(
					'title' => 'Edit Data user',
					'error_upload' => $this->upload->display_errors(),
					'user' => $this->m_user->detail($id_user),
					'isi'=> 'admin/user/v_edit' 
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
             	}else{
             			//edit dengan ubah gambar
						 $upload_data = array('uploads'=> $this ->upload ->data());
						 $config ['image_library'] = 'gd2';
						 $config ['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
						 $this->load->library('image_lib', $config);
						 
						 //menghapus file photo lama
						 $user=$this->m_user->detail($id_user);
						 if ($user->foto_user !="") {
							 unlink('./gambar/'.$user->foto_user);
						 }
						 //end menghapus photo lama
             		$data = array(
							'id_user'			=> $id_user,
							'nama_user' 		=> $this->input->post('nama_user'),							
                            'username' 		    => $this->input->post('username'),							
                            'password' 	    	=> !empty($this->input->post('password')) ? $this->input->post('password') : $user->password ,							
                            'level' 	    	=> $this->input->post('level'),							
                            'foto_user' 	    => $upload_data['uploads']['file_name'],
					);

					$this->m_user->edit($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
					redirect('user');
				 }
                 $user=$this->m_user->detail($id_user);
				 //edit tanpa ubah gambar
				 $data = array(
					'id_user'			=> $id_user,
					'nama_user' 		=> $this->input->post('nama_user'),							
                    'username' 		    => $this->input->post('username'),							
                    'password' 	    	=> !empty($this->input->post('password')) ? $this->input->post('password') : $user->password ,							
                    'level' 	    	=> $this->input->post('level'),
			);

			$this->m_user->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
			redirect('user');
		}
		$data = array(
			'title' => 'Edit Data User',
			'user' => $this->m_user->detail($id_user),
			'isi'=> 'admin/user/v_edit' 
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}



	public function delete($id_user)
	{	
		
		 //menghapus file photo lama
		 $user=$this->m_user->detail($id_user);
		 if ($user->foto_user !="") {
			 unlink('./gambar/'.$user->foto_user);
		 }
		 //end menghapus photo lama

		$data = array('id_user'=> $id_user,);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
			redirect('user');
	}
	
}

/* End of file user.php */