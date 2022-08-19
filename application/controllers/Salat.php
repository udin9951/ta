<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

defined('BASEPATH') OR exit('No direct script access allowed');

class salat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_salat');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Jadwal salat', 
            'salat' => $this->M_salat->lists(),
            'isi'  => 'admin/salat/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);

    }


    public function add()          
    {
        $this->form_validation->set_rules('tgl_salat', 'Tanggal Salat', 'required');        
        $this->form_validation->set_rules('imsak', 'Imsak', 'required');        
        $this->form_validation->set_rules('subuh', 'Subuh', 'required');
        $this->form_validation->set_rules('duha', 'Duha', 'required');
        $this->form_validation->set_rules('zuhur', 'Zuhur', 'required');    
        $this->form_validation->set_rules('asar', 'Asar', 'required');
        $this->form_validation->set_rules('magrib', 'Magrib', 'required');
        $this->form_validation->set_rules('isya', 'Isya', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Jadwal salat', 
                'isi'  => 'admin/salat/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                }
                else
                {
                        $data = array(
                            'tgl_salat'    => $this->input->post('tgl_salat'),
                            'imsak'    => $this->input->post('imsak'),
                            'subuh'    => $this->input->post('subuh'),
                            'duha'    => $this->input->post('duha'),
                            'zuhur'    => $this->input->post('zuhur'),
                            'asar'    => $this->input->post('asar'),
                            'magrib'    => $this->input->post('magrib'),
                            'isya'    => $this->input->post('isya'),
                            'id_user'          =>  $this->session->userdata('id_user')
                        );
                    $this->M_salat->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                    redirect('salat');
                }
            }

    public function edit($id_salat)
    {
        $this->form_validation->set_rules('tgl_salat', 'Tanggal Salat', 'required');        
        $this->form_validation->set_rules('imsak', 'Imsak', 'required');        
        $this->form_validation->set_rules('subuh', 'Subuh', 'required');
        $this->form_validation->set_rules('duha', 'Duha', 'required');
        $this->form_validation->set_rules('zuhur', 'Zuhur', 'required');    
        $this->form_validation->set_rules('asar', 'Asar', 'required');
        $this->form_validation->set_rules('magrib', 'Magrib', 'required');
        $this->form_validation->set_rules('isya', 'Isya', 'required');    

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Edit Data Salat', 
                'salat' => $this->M_salat->detail($id_salat),
                'isi'  => 'admin/salat/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

            }
            else
            {
                    $data = array(
                        'id_salat'    => $id_salat,
                        'tgl_salat'    => $this->input->post('tgl_salat'),
                        'imsak'    => $this->input->post('imsak'),
                        'subuh'    => $this->input->post('subuh'),
                        'duha'    => $this->input->post('duha'),
                        'zuhur'    => $this->input->post('zuhur'),
                        'asar'    => $this->input->post('asar'),
                        'magrib'    => $this->input->post('magrib'),
                        'isya'    => $this->input->post('isya'),
                        'id_user'          =>  $this->session->userdata('id_user')
                        );
                $this->M_salat->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                redirect('salat');
            }
        }

    public function delete($id_salat)
    {
        $data = array(
            'id_salat' => $id_salat,
        );
        $this->M_salat->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
        redirect('salat');
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
        $pdf->Cell(0,5,'Data Salat',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(40,6,'Tanggal Salat',1,0,'C');
        $pdf->Cell(20,6,'Imsak',1,0,'C');
        $pdf->Cell(20,6,'Subuh',1,0,'C');
        $pdf->Cell(20,6,'Duha',1,0,'C');
        $pdf->Cell(20,6,'Dzuhur',1,0,'C');
        $pdf->Cell(20,6,'Ashar',1,0,'C');
        $pdf->Cell(20,6,'Maghrib',1,0,'C');
        $pdf->Cell(20,6,'Isya',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pengurus = $this->M_salat->lists();
        $no=0;
        foreach ($pengurus as $data){
            $date = DateTime::createFromFormat('Y-m-d', $data->tgl_salat)->format('d-m-Y');
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(40,6,$date,1,0,'C');
            $pdf->Cell(20,6,$data->imsak,1,0, 'C');
            $pdf->Cell(20,6,$data->subuh,1,0, 'C');
            $pdf->Cell(20,6,$data->duha,1,0, 'C');
            $pdf->Cell(20,6,$data->zuhur,1,0, 'C');
            $pdf->Cell(20,6,$data->asar,1,0, 'C');
            $pdf->Cell(20,6,$data->magrib,1,0, 'C');
            $pdf->Cell(20,6,$data->isya,1,1, 'C');
        }
        $pdf->Output();
    }

	public function export()
    {
		$export = $this->M_salat->lists();

		$file_path = "Data Salat.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Data Salat'];
        $label2 = ['Masjid Al-Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Tanggal Salat',
			'Imsak',
			'Subuh',
			'Duha',
			'Dzuhur',
			'Ashar',
			'Maghrib',
			'Isya'
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
            $date = DateTime::createFromFormat('Y-m-d', $ex->tgl_salat)->format('d-m-Y');

			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$kas = array(
			    $no++,
			    $date,
			    $ex->imsak,
			    $ex->subuh,
			    $ex->duha,
			    $ex->zuhur,
			    $ex->asar,
			    $ex->magrib,
			    $ex->isya,
			);

			array_push($data, $kas);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer
    }

    public function print()
    {
        $url = base_url('./icon/logo_.png');
        $kas = $this->M_salat->lists();
        $data = "";
        $no = 1;
        foreach ($kas as $value) {
            $date = DateTime::createFromFormat('Y-m-d', $value->tgl_salat)->format('d-m-Y');
            $data .= "<tr>
                    <td style='text-align : center;'>".$no++."</td>
                    <td style='text-align : center;'>".$date."</td>
                    <td style='text-align : center;'>".$value->imsak."</td>
                    <td style='text-align : center;'>".$value->subuh."</td>
                    <td style='text-align : center;'>".$value->duha."</td>
                    <td style='text-align : center;'>".$value->zuhur."</td>
                    <td style='text-align : center;'>".$value->asar."</td>
                    <td style='text-align : center;'>".$value->magrib."</td>
                    <td style='text-align : center;'>".$value->isya."</td>
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
            <center><h5>Data Salat</h5></center>	
        </div>

        <div class='row'>
            <table>
                <tr>
                    <th width='100px'>
                        <center>No</center>
                    </th>		
                    <th width='500px'>
                        <center>Tanggal Salat</center>
                    </th>		
                    <th width='500px'>
                        <center>Imsak</center>
                    </th>		
                    <th width='500px'>
                        <center>Subuh</center>
                    </th>		
                    <th width='500px'>
                        <center>Duha</center>
                    </th>		
                    <th width='500px'>
                        <center>Dzuhur</center>
                    </th>		
                    <th width='500px'>
                        <center>Ashar</center>
                    </th>		
                    <th width='500px'>
                        <center>Maghrib</center>
                    </th>		
                    <th width='500px'>
                        <center>Isya</center>
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

/* End of file salat.php */