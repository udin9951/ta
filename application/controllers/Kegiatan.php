<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kegiatan');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Jadwal Kegiatan', 
            'kegiatan' => $this->M_kegiatan->lists(),
            'isi'  => 'admin/kegiatan/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);

    }
    public function add()          
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan ', 'required');   
        $this->form_validation->set_rules('hari_kegiatan', 'Hari Kegiatan', 'required');
        $this->form_validation->set_rules('tgl_kegiatan', 'tgl Kegiatan', 'required');  
        $this->form_validation->set_rules('jam_kegiatan', 'Jam Kegiatan', 'required');      
        $this->form_validation->set_rules('lokasi_kegiatan', 'Lokasi Kegiatan', 'required');        
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');    
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal Kegiatan', 
                'isi'  => 'admin/kegiatan/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                }
                else
                {
                        $data = array(
                            'nama_kegiatan'     => $this->input->post('nama_kegiatan'),
                            'hari_kegiatan'    => $this->input->post('hari_kegiatan'),
                            'tgl_kegiatan'    => $this->input->post('tgl_kegiatan'),
                            'jam_kegiatan'    => $this->input->post('jam_kegiatan'),
                            'lokasi_kegiatan'    => $this->input->post('lokasi_kegiatan'),
                            'deskripsi_kegiatan'    => $this->input->post('deskripsi_kegiatan'),
                            'id_user'          =>  $this->session->userdata('id_user')
                        );
                    $this->M_kegiatan->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                    redirect('kegiatan');
                }
            }

    public function edit($id_kegiatan)
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan ', 'required');   
        $this->form_validation->set_rules('hari_kegiatan', 'Hari Kegiatan', 'required');
        $this->form_validation->set_rules('tgl_kegiatan', ' tgl_kegiatan', 'required');        
        $this->form_validation->set_rules('jam_kegiatan', 'Jam Kegiatan', 'required');
        $this->form_validation->set_rules('lokasi_kegiatan', 'lokasi_kegiatan', 'required');        
        $this->form_validation->set_rules('deskripsi_kegiatan', 'deskripsi_kegiatan', 'required');    
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data kegiatan', 
                'kegiatan' => $this->M_kegiatan->detail($id_kegiatan),
                'isi'  => 'admin/kegiatan/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                }
                else
                {
                        $data = array(
                            'id_kegiatan'   => $id_kegiatan,
                            'nama_kegiatan'  => $this->input->post('nama_kegiatan'),
                            'hari_kegiatan'    => $this->input->post('hari_kegiatan'),
                            'tgl_kegiatan'    => $this->input->post('tgl_kegiatan'),
                            'lokasi_kegiatan'    => $this->input->post('lokasi_kegiatan'),
                            'jam_kegiatan'    => $this->input->post('jam_kegiatan'),
                            'deskripsi_kegiatan'    => $this->input->post('deskripsi_kegiatan'),
                            'id_user'           =>  $this->session->userdata('id_user')
                            );
                    $this->M_kegiatan->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                    redirect('kegiatan');
                }
            }

    public function delete($id_kegiatan)
    {
        $data = array(
            'id_kegiatan' => $id_kegiatan,
        );
        $this->M_kegiatan->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
        redirect('kegiatan');
    }

    public function cetak()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm','A4');
        $pdf->AddPage();
        $pdf->Image('./icon/logo_.png',10,10,70,25);
        $pdf->Cell(50);
        $pdf->SetFont('Times','B','10');
        $pdf->Cell(0,5,'Pengurus Masjid Al-Barqah',0,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(0,5,'Komplek Kayu Tangi II',0,1,'C');
        $pdf->Cell(50);
        $pdf->SetFont('Times','B','10');
        $pdf->Cell(0,5,'Banjarmasin',0,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(0,5,'Jl. Brigjen H. Hasan Basri Komplek Kayu Tangi II',0,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(0,5,'Telp.(021) 3303074',0,1,'C');
        $pdf->Cell(50);
        $pdf->Cell(0,4,'',0,1,'C');
        $pdf->SetLineWidth(1);		
        $pdf->Line(10,36,200,36);
        $pdf->SetLineWidth(1);		
        $pdf->Line(10,36,200,36);
        $pdf->SetLineWidth(0);				
        $pdf->Line(10,37,200,37);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'Data Kegiatan',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(40,6,'Nama Kegiatan',1,0,'C');
        $pdf->Cell(25,6,'Hari Kegiatan',1,0,'C');
        $pdf->Cell(40,6,'Tanggal Kegiatan',1,0,'C');
        $pdf->Cell(30,6,'Jam Kegiatan',1,0,'C');
        $pdf->Cell(45,6,'Lokasi Kegiatan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pengurus = $this->M_kegiatan->lists();
        $no=0;
        foreach ($pengurus as $data){
            $date = DateTime::createFromFormat('Y-m-d', $data->tgl_kegiatan)->format('d-m-Y');
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(40,6,$data->nama_kegiatan,1,0,'C');
            $pdf->Cell(25,6,$data->hari_kegiatan,1,0, 'C');
            $pdf->Cell(40,6,$date,1,0,'C');
            $pdf->Cell(30,6,$data->jam_kegiatan,1,0,'C');
            $pdf->Cell(45,6,$data->lokasi_kegiatan,1,1,'C');

        }
        $pdf->Output();
    }

	public function export()
    {
		$export = $this->M_kegiatan->lists();

		$file_path = "Data Kegiatan.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Data Kegiatan'];
        $label2 = ['Masjid Al-Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Nama Kegiatan',
			'Hari Kegiatan',
			'Tanggal Kegiatan',
			'Jam Kegiatan',
			'Lokasi Kegiatan',
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
            $date = DateTime::createFromFormat('Y-m-d', $ex->tgl_kegiatan)->format('d-m-Y');

			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$kas = array(
			    $no++,
			    $ex->nama_kegiatan,
			    $ex->hari_kegiatan,
			    $date,
			    $ex->jam_kegiatan,
			    $ex->lokasi_kegiatan,
			);

			array_push($data, $kas);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer
    }

    public function print()
    {
        $url = base_url('./icon/logo_.png');
        $kas = $this->M_kegiatan->lists();
        $data = "";
        $no = 1;
        foreach ($kas as $value) {
            $date = DateTime::createFromFormat('Y-m-d', $value->tgl_kegiatan)->format('d-m-Y');
            $data .= "<tr>
                    <td style='text-align : center;'>".$no++."</td>
                    <td style='text-align : center;'>".$value->nama_kegiatan."</td>
                    <td style='text-align : center;'>".$value->hari_kegiatan."</td>
                    <td style='text-align : center;'>".$date."</td>
                    <td style='text-align : center;'>".$value->jam_kegiatan."</td>
                    <td style='text-align : center;'>".$value->lokasi_kegiatan."</td>
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
                        <center>Nama Kegiatan</center>
                    </th>		
                    <th width='500px'>
                        <center>Hari Kegiatan</center>
                    </th>		
                    <th width='500px'>
                        <center>Tanggal Kegiatan</center>
                    </th>		
                    <th width='500px'>
                        <center>jam Kegiatan</center>
                    </th>		
                    <th width='500px'>
                        <center>Lokasi Kegiatan</center>
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

/* End of file Kegiatan.php */