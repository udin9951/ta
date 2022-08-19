<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengajian');
        $this->load->model('M_penceramah');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Jadwal Pengajian',
            'pengajian' => $this->M_pengajian->lists(),
            'isi'  => 'admin/pengajian/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('hari_pengajian', 'Hari', 'required');
        $this->form_validation->set_rules('tgl_pengajian', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_pengajian', 'Jam', 'required');
        $this->form_validation->set_rules('tema_pengajian', 'Tema Pengajian', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal Pengajian',
                'penceramah' => $this->M_penceramah->lists(),
                'isi'  => 'admin/pengajian/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'hari_pengajian'    => $this->input->post('hari_pengajian'),
                'tgl_pengajian'    => $this->input->post('tgl_pengajian'),
                'jam_pengajian'    => $this->input->post('jam_pengajian'),
                'id_penceramah'    => $this->input->post('id_penceramah'),
                'tema_pengajian'    => $this->input->post('tema_pengajian')
            );
            $this->M_pengajian->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
            redirect('pengajian');
        }
    }

    public function edit($id_pengajian)
    {
        $this->form_validation->set_rules('hari_pengajian', 'Hari', 'required');
        $this->form_validation->set_rules('tgl_pengajian', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_pengajian', 'Jam', 'required');
        $this->form_validation->set_rules('tema_pengajian', 'Tema Pengajian', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal Pengajian',
                'pengajian' => $this->M_pengajian->detail($id_pengajian),
                'penceramah' => $this->M_penceramah->lists(),
                'isi'  => 'admin/pengajian/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_pengajian'     => $id_pengajian,
                'hari_pengajian'    => $this->input->post('hari_pengajian'),
                'tgl_pengajian'    => $this->input->post('tgl_pengajian'),
                'jam_pengajian'    => $this->input->post('jam_pengajian'),
                'id_penceramah'    => $this->input->post('id_penceramah'),
                'tema_pengajian'    => $this->input->post('tema_pengajian')
            );
            $this->M_pengajian->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            redirect('pengajian');
        }
    }

    public function delete($id_pengajian)
    {
        $data = array(
            'id_pengajian' => $id_pengajian,
        );
        $this->M_pengajian->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('pengajian');
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
        $pdf->Cell(0,5,'Data Pengajian',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(30,6,'Hari Pengajian',1,0,'C');
        $pdf->Cell(35,6,'Tanggal Pengajian',1,0,'C');
        $pdf->Cell(30,6,'Jam Pengajian',1,0,'C');
        $pdf->Cell(30,6,'Ustad',1,0,'C');
        $pdf->Cell(60,6,'Tema Pengajian',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pengurus = $this->M_pengajian->lists();
        $no=0;
        foreach ($pengurus as $data){
            $date = DateTime::createFromFormat('Y-m-d', $data->tgl_pengajian)->format('d-m-Y');
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$data->hari_pengajian,1,0, 'C');
            $pdf->Cell(35,6,$date,1,0,'C');
            $pdf->Cell(30,6,$data->jam_pengajian,1,0, 'C');
            $pdf->Cell(30,6,$data->nama_penceramah,1,0, 'C');
            $pdf->Cell(60,6,$data->tema_pengajian,1,1, 'C');
        }
        $pdf->Output();
    }

	public function export()
    {
		$export = $this->M_pengajian->lists();

		$file_path = "Data Pengajian.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Data Pengajian'];
        $label2 = ['Masjid Al-Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'hari Pengajian',
			'Tanggal Pengajian',
			'Jam Pengajian',
			'Ustad',
			'Tema Pengajian',
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
            $date = DateTime::createFromFormat('Y-m-d', $ex->tgl_pengajian)->format('d-m-Y');

			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$kas = array(
			    $no++,
			    $ex->hari_pengajian,
			    $date,
			    $ex->jam_pengajian,
			    $ex->nama_penceramah,
			    $ex->tema_pengajian,
			);

			array_push($data, $kas);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer
    }

    public function print()
    {
        $url = base_url('./icon/logo_.png');
        $kas = $this->M_pengajian->lists();
        $data = "";
        $no = 1;
        foreach ($kas as $value) {
            $date = DateTime::createFromFormat('Y-m-d', $value->tgl_pengajian)->format('d-m-Y');
            $data .= "<tr>
                    <td style='text-align : center;'>".$no++."</td>
                    <td style='text-align : center;'>".$value->hari_pengajian."</td>
                    <td style='text-align : center;'>".$date."</td>
                    <td style='text-align : center;'>".$value->jam_pengajian."</td>
                    <td style='text-align : center;'>".$value->nama_penceramah."</td>
                    <td style='text-align : center;'>".$value->tema_pengajian."</td>
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
            <center><h5>Data Pengajian</h5></center>	
        </div>

        <div class='row'>
            <table>
                <tr>
                    <th width='100px'>
                        <center>No</center>
                    </th>		
                    <th width='500px'>
                        <center>Hari Pengajian</center>
                    </th>		
                    <th width='500px'>
                        <center>Tanggal Pengajian</center>
                    </th>		
                    <th width='500px'>
                        <center>Jam Pengajian</center>
                    </th>		
                    <th width='500px'>
                        <center>Ustad</center>
                    </th>		
                    <th width='500px'>
                        <center>Tema Pengajian</center>
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

/* End of file Pengajian.php */