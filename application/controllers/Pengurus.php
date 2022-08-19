<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengurus');
        $this->load->library('Pdf');
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
        $this->form_validation->set_rules('jabatan_pengurus','Nama Pengurus', 'required');
       
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
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
                            return;
                    }
                    else
                    {
                        if(ucfirst($this->input->post('jabatan_pengurus')) == 'Ketua'){
                            $no_urut = 1;
                            $las_count = $this->m_pengurus->last($no_urut);
                            if(!empty($las_count))
                            {
                                $data = array(                
                                    'title' => 'Input Data Pengurus',
                                    'error_upload' => 'Ketua sudah ada',
                                    'isi'=> 'admin/pengurus/v_add'  
                                );
                                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                                return;
                            }
                        }
                        else if(ucfirst($this->input->post('jabatan_pengurus')) == 'Wakil Ketua'){
                            $no_urut = 2;
                            $las_count = $this->m_pengurus->last($no_urut);
                            if(!empty($las_count))
                            {
                                $data = array(                
                                    'title' => 'Input Data Pengurus',
                                    'error_upload' => 'Wakil Ketua sudah ada',
                                    'isi'=> 'admin/pengurus/v_add'  
                                );
                                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                                return;
                            }
                        }
                        else if(ucfirst($this->input->post('jabatan_pengurus')) == 'Sekretaris'){
                            $no_urut = 3;
                            $las_count = $this->m_pengurus->last($no_urut);
                            if(!empty($las_count))
                            {
                                $data = array(                
                                    'title' => 'Input Data Pengurus',
                                    'error_upload' => 'Sekretaris sudah ada',
                                    'isi'=> 'admin/pengurus/v_add'  
                                );
                                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                                return;
                            }
                        }
                        else if(ucfirst($this->input->post('jabatan_pengurus')) == 'Wakil Sekretaris'){
                            $no_urut = 4;
                            $las_count = $this->m_pengurus->last($no_urut);
                            if(!empty($las_count))
                            {
                                $data = array(                
                                    'title' => 'Input Data Pengurus',
                                    'error_upload' => 'Wakil Sekretaris sudah ada',
                                    'isi'=> 'admin/pengurus/v_add'  
                                );
                                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                                return;
                            }
                        }
                        else if(ucfirst($this->input->post('jabatan_pengurus')) == 'Bendahara'){
                            $no_urut = 5;
                            $las_count = $this->m_pengurus->last($no_urut);
                            if(!empty($las_count))
                            {
                                $data = array(                
                                    'title' => 'Input Data Pengurus',
                                    'error_upload' => 'Bendahara sudah ada',
                                    'isi'=> 'admin/pengurus/v_add'  
                                );
                                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                                return;
                            }
                        }
                        else if(ucfirst($this->input->post('jabatan_pengurus')) == 'Wakil Bendahara'){
                            $no_urut = 6;
                            $las_count = $this->m_pengurus->last($no_urut);
                            if(!empty($las_count))
                            {
                                $data = array(                
                                    'title' => 'Input Data Pengurus',
                                    'error_upload' => 'Wakil Bendahara sudah ada',
                                    'isi'=> 'admin/pengurus/v_add'  
                                );
                                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                                return;
                            }
                        }
                        else if(ucfirst($this->input->post('jabatan_pengurus')) == 'Anggota'){
                            $las_count = $this->m_pengurus->last()->no_urut;
                            if($las_count <= 6)
                            {
                               $no_urut =  7;
                            }
                            else
                            {
                                $no_urut = $las_count + 1;
                            }
                        }

                            $upload_data = array('uploads' => $this->upload->data());
                            $config = array('uploads' => $this->upload->data());
                            $config ['image_library'] = 'gd2';
                            $config ['source_image'] = './foto_pengurus/'.$upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);

                            $data = array(
                                'nama_pengurus'        => $this->input->post('nama_pengurus'),
                                'jabatan_pengurus'        => $this->input->post('jabatan_pengurus'),                            
                                'foto_pengurus'    => $upload_data['uploads']['file_name'],
                                'id_user'           =>  $this->session->userdata('id_user'),
                                'no_urut'           =>  $no_urut
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
            $this->form_validation->set_rules('nama_pengurus','Nama Pengurus', 'required');
            
            if ($this->form_validation->run() == TRUE) {
               $config['upload_path'] = './sampul/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               $config['max_size']             = 50000;
               $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_pengurus'))
                    {
                           
                            $data = array(                
                                'title' => ' Edit Data Pengurus', 
                                'error_upload' => $this->upload->display_errors(),
                                'pengurus' => $this->m_pengurus->detail($id_pengurus),
                                'isi'  => 'admin/pengurus/v_edit'
                            );
                            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                            return;
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
        $pdf->Cell(0,5,'Data Pengurus',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(80,6,'Nama Pengurus',1,0,'C');
        $pdf->Cell(100,6,'Jabatan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pengurus = $this->m_pengurus->lists();
        $no=0;
        foreach ($pengurus as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(80,6,$data->nama_pengurus,1,0);
            $pdf->Cell(100,6,$data->jabatan_pengurus,1,1);

        }
        $pdf->Output();
    }

	public function export()
    {
		$export = $this->m_pengurus->lists();

		$file_path = "Data Pengurus.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Data Pengurus'];
        $label2 = ['Masjid Al-Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Nama Pengurus',
			'Jabatan',
		];


		$writer->addRow($label1);
		$writer->addRow($label2);
		$writer->addRow($spasi1);
		$writer->addRow($spasi2);
		$writer->addRow($spasi3);
		$writer->addRow($header);

		$data   = array(); //siapkan variabel array untuk menampung data
		$no     = 1;

		foreach ($export as $ex) {


			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$kas = array(
			    $no++,
			    $ex->nama_pengurus,
			    $ex->jabatan_pengurus,
			);

			array_push($data, $kas);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer
    }

    public function print()
    {
        $url = base_url('./icon/logo_.png');
        $kas = $this->m_pengurus->lists();
        $data = "";
        $no = 1;
        foreach ($kas as $value) {
            $data .= "<tr>
                    <td>".$no++."</td>
                    <td>".$value->nama_pengurus."</td>
                    <td>".$value->jabatan_pengurus."</td>
            </tr>
            ";
        }
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Cetak Data Masjid Al Barqah</title>

            <style>
            * {
            box-sizing: border-box;
            }

            /* Create two unequal columns that floats next to each other */
            .column {
            float: left;
            padding: 10px;
            height: 120px; /* Should be removed. Only for demonstration */
            }

            .left {
            width: 25%;
            }

            .right {
            width: 75%;
            }

            table, th, td {
                border: 1px solid;
            }

            /* Clear floats after the columns */
            
            </style>

        </head>
        <body>
        <div class='row'>
            <div class='column left'>
                <img class='' src='$url' style='height: 100px;'>
            </div>
            <div class='column right'>
                <center>
                    <p>Pengurus Masjid Al-Barqah<br>
                    Komplek Kayu Tangi II Banjarmasin<br>
                    Jl. Brigjen H. Hasan Basri Komplek Kayu Tangi II<br>Telp.(021) 3303074</p>
                </center>
            </div>
            <hr>	
        </div>

        <div class='row'>
            <table>
                <tr>
                    <th width='100px'>
                        <center>No</center>
                    </th>		
                    <th width='500px'>
                        <center>Pengurus</center>
                    </th>		
                    <th width='500px'>
                        <center>Deskripsi</center>
                    </th>		
                </tr>
                $data
                
            </table>
        </div>
        <script>
            window.print();
        </script>

        </body>
        </html>";
    }
}
/* End of file Siswa.php */