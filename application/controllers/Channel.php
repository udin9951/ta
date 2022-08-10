<?php

class Channel extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_channel');
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Video',
			'channel' => $this->M_channel->lists(),
			'isi' => 'admin/channel/v_list'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function add()
	{
		$this->form_validation->set_rules('judul_channel', 'Judul Channel', 'required');
		$this->form_validation->set_rules('link_channel', 'Link Channel', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Tambah Data Video',
				'isi'  => 'admin/channel/v_add'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'judul_channel' 	=> $this->input->post('judul_channel'),
				'link_channel' 		=> $this->input->post('link_channel'),
				'id_user' 			=> 	$this->session->userdata('id_user')
			);
			$this->M_channel->add($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
			redirect('channel');
		}
	}

	public function edit($id_channel)
	{
		$this->form_validation->set_rules('judul_channel', 'Judul Channel', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('link_channel', 'Link Channel', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Edit Data Video',
				'channel' => $this->M_channel->detail($id_channel),
				'isi'  => 'admin/channel/v_edit'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_channel'		=> $id_channel,
				'judul_channel' 	=> $this->input->post('judul_channel'),
				'link_channel' 		=> $this->input->post('link_channel'),
				'id_user' 			=> 	$this->session->userdata('id_user')
			);
			$this->M_channel->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
			redirect('channel');
		}
	}



	public function delete($id_channel)
	{

		$data = array('id_channel' => $id_channel,);
		$this->M_channel->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('channel');
	}
}

/* End of file channel.php */