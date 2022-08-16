<?php

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
 
class User extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('Pdf');
	}
	
    public function index()
    {
		$data = array(
			'title' => 'Data User',
			'user' => $this->m_user->lists()->result(),
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
					
					if($this->input->post('level') == 1){
						$nama_level = 'Admin';
					}
					else if($this->input->post('level') == 2){
						$nama_level = "User";
					}
					else if($this->input->post('level') == 3){
						$nama_level = "Sekertaris";
					}
					else if($this->input->post('level') == 4){
						$nama_level = "Bendahara";
					}

                    $data = array(
                            'nama_user' 		=> $this->input->post('nama_user'),							
                            'username' 		    => $this->input->post('username'),							
                            'password' 	    	=> $this->input->post('password'),							
                            'level' 	    	=> $this->input->post('level'),							
                            'nama_level' 	    => $nama_level,							
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
						 if($this->input->post('level') == 1){
							$nama_level = 'Super Admin';
						}
						else if($this->input->post('level') == 2){
							$nama_level = "Admin";
						}
						else if($this->input->post('level') == 3){
							$nama_level = "Sekertaris";
						}
						else if($this->input->post('level') == 4){
							$nama_level = "Bendahara";
						}
					
						$data = array(
							'id_user'			=> $id_user,
							'nama_user' 		=> $this->input->post('nama_user'),							
                            'username' 		    => $this->input->post('username'),							
                            'password' 	    	=> !empty($this->input->post('password')) ? $this->input->post('password') : $user->password ,							
                            'level' 	    	=> $this->input->post('level'),							
							'nama_level'		=> $nama_level,
                            'foto_user' 	    => $upload_data['uploads']['file_name'],
					);

					$this->m_user->edit($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
					redirect('user');
				 }
                 $user=$this->m_user->detail($id_user);
				 //edit tanpa ubah gambar

				 if($this->input->post('level') == 1){
					$nama_level = 'Super Admin';
				}
				else if($this->input->post('level') == 2){
					$nama_level = "Admin";
				}
				else if($this->input->post('level') == 3){
					$nama_level = "Sekertaris";
				}
				else if($this->input->post('level') == 4){
					$nama_level = "Bendahara";
				}
				 $data = array(
					'id_user'			=> $id_user,
					'nama_user' 		=> $this->input->post('nama_user'),							
                    'username' 		    => $this->input->post('username'),							
                    'password' 	    	=> !empty($this->input->post('password')) ? $this->input->post('password') : $user->password ,							
                    'level' 	    	=> $this->input->post('level'),
					'nama_level'		=> $nama_level,
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

	public function cetak()
	{
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm','A4');
        $pdf->AddPage();
		$pdf->Image('./icon/logo_.png',10,10,70,25);
		$pdf->Cell(50);
		$pdf->SetFont('Times','B','20');
		$pdf->Cell(0,5,'Pengurus Masjid Al-Barqah',0,1,'C');
		$pdf->Cell(50);
		$pdf->Cell(0,4,'',0,1,'C');
		$pdf->Cell(50);
		$pdf->Cell(0,5,'Komplek Kayu Tangi II',0,1,'C');
		$pdf->Cell(50);
		$pdf->Cell(0,4,'',0,1,'C');
		$pdf->Cell(50);
		$pdf->SetFont('Times','B','20');
		$pdf->Cell(0,5,'Banjarmasin',0,1,'C');
		$pdf->Cell(50);
		$pdf->Cell(0,4,'',0,1,'C');
		$pdf->SetLineWidth(1);		
		$pdf->Line(10,36,200,36);
		$pdf->SetLineWidth(0);				
		$pdf->Line(10,37,200,37);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,5,'Data User',0,1,'C');
		$pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(50,6,'Nama User',1,0,'C');
        $pdf->Cell(70,6,'Username',1,0,'C');
        $pdf->Cell(25,6,'Level',1,0,'C');
        $pdf->Cell(40,6,'Foto',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $user = $this->m_user->lists()->result();
        $no=0;
        foreach ($user as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(50,6,$data->nama_user,1,0);
            $pdf->Cell(70,6,$data->username,1,0);
            $pdf->Cell(25,6,$data->nama_level,1,0);
            $pdf->Cell(40,6,$data->foto_user,1,1);
        }
        $pdf->Output();
	}

	public function export()
    {

		$export = $this->m_user->lists()->result();

		$file_path = "Data User.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label = ['LAPORAN Data User'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Nama',
			'Username',
			'Level',
			'Foto',
		];


		$writer->addRow($label);
		$writer->addRow($spasi1);
		$writer->addRow($spasi2);
		$writer->addRow($spasi3);
		$writer->addRow($header);

		$data   = array(); //siapkan variabel array untuk menampung data
		$no     = 1;

		foreach ($export as $ex) {


			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$stok = array(
			    $no++,
			    $ex->nama_user,
			    $ex->username,
			    $ex->nama_level,
			    $ex->foto_user,
			);

			array_push($data, $stok);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer


    }
	
}

/* End of file user.php */