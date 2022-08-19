<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

defined('BASEPATH') OR exit('No direct script access allowed');

class rekap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekap');
        $this->load->model('M_kas_masuk');
        $this->load->model('M_kas_keluar');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $filter = $this->input->post('filter');
        $end = $this->input->post('end');
        $type = $this->input->post('type');

        $filter = !empty($filter) ? $filter : "";
        $end = !empty($end) ? $end : "";
        $type = !empty($type) ? $type : "";

        $data = array(
            'title' => 'Data Rekap Kas Masjid', 
            'filter' => $filter,
            'type'  => $type,
            'end'  => $end,
            'rekap' => $this->M_rekap->lists($filter, $end, $type),
            'total_kas_masuk' => $this->M_kas_masuk->sumKas($filter, $end),
            'total_kas_keluar' => $this->M_kas_keluar->sumKas($filter, $end),
            'postback' => base_url('rekap/index'),
            'isi'  => 'admin/rekap/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);

    }

    public function cetak($filter = NULL)
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
        $pdf->SetLineWidth(0);				
        $pdf->Line(10,37,200,37);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,10,'Laporan Penerimaan dan Pengeluaran Dana',0,1,'C');
        $pdf->Cell(0,0,'Masjid Al-Barqah',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(50,6,'Tanggal',1,0,'C');
        $pdf->Cell(70,6,'Uraian',1,0,'C');
        $pdf->Cell(30,6,'Penerimaan',1,0,'C');
        $pdf->Cell(30,6,'Pengeluaran',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $user =$this->M_rekap->lists($filter);
        $no=0;
        $total_masuk = 0;
        $total_keluar = 0;
        foreach ($user as $data){
            $total_masuk += $data->kas_masuk;
            $total_keluar += $data->kas_keluar;
            $datetime = DateTime::createFromFormat('Y-m-d', $data->tgl_kas);
            $no++;
            if(empty($data->kas_masuk)){
                $data->kas_masuk = "-";
            }
            else
            {
                $data->kas_masuk = "Rp. ".number_format($data->kas_masuk,0,',','.');
            }
            
            if(empty($data->kas_keluar)){
                $data->kas_keluar = "-";
            }
            else
            {
                $data->kas_keluar = "Rp. ".number_format($data->kas_keluar,0,',','.');
            }

            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(50,6,$datetime->format('d-m-Y'),1,0,'C');
            $pdf->Cell(70,6,$data->uraian_kas,1,0);
            $pdf->Cell(30,6,$data->kas_masuk,1,0,'C');
            $pdf->Cell(30,6,$data->kas_keluar,1,1,'C');
        }
        $pdf->Cell(130,6,'Total Penerimaan',1,0,'C');
        $pdf->Cell(60,6,"Rp " . number_format($total_masuk,2,',','.'),1,1,'C');
        $pdf->Cell(130,6,'Total Pengeluaran',1,0,'C');
        $pdf->Cell(60,6,"Rp " . number_format($total_keluar,2,',','.'),1,1,'C');
        $pdf->Cell(130,6,'Total Saldo Akhir Kas Masjid',1,0,'C');
        $pdf->Cell(60,6,"Rp " . number_format(($total_masuk - $total_keluar),2,',','.'),1,1,'C');

        $pdf->Output();
    }

	public function export($filter = NULL)
    {
		$export = $this->M_rekap->lists($filter);
		$file_path = "Data Rekap Kas.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Penerimaan dan Pengeluaran Dana'];
        $label2 = ['Masjid Al-Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Tanggal',
			'Uraian',
			'Pemasukan',
			'Pengeluaran',
		];


		$writer->addRow($label1);
		$writer->addRow($label2);
		$writer->addRow($spasi1);
		$writer->addRow($spasi2);
		$writer->addRow($spasi3);
		$writer->addRow($header);

		$data   = array(); //siapkan variabel array untuk menampung data
		$data_masuk   = array(); //siapkan variabel array untuk menampung data
		$no     = 1;
        $total_masuk = 0;
        $total_keluar = 0;
		foreach ($export as $ex) {

            $total_masuk += $ex->kas_masuk;
            $total_keluar += $ex->kas_keluar;
            $date = DateTime::createFromFormat('Y-m-d', $ex->tgl_kas)->format('d-m-Y');
            
            if(empty($ex->kas_masuk)){
                $ex->kas_masuk = "-";
            }
            else
            {
                $ex->kas_masuk = "Rp. ".number_format($ex->kas_masuk,0,',','.');
            }
            
            if(empty($ex->kas_keluar)){
                $ex->kas_keluar = "-";
            }
            else
            {
                $ex->kas_keluar = "Rp. ".number_format($ex->kas_keluar,0,',','.');
            }
			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$kas = array(
			    $no++,
			    $date,
			    $ex->uraian_kas,
                $ex->kas_masuk,
                $ex->kas_keluar,
			);

			array_push($data, $kas);
		}

            $data_masuk = array(
                '',
                'Total Kas Masuk',
                '',
                "Rp " . number_format(($total_masuk),2,',','.'),
                '',
            );

            $data_keluar = array(
                '',
                'Total Kas Keluar',
                '',
                '',
                "Rp " . number_format(($total_keluar),2,',','.'),
            );

            $total = array(
                '',
                'Total Saldo Akhir Kas Masjid',
                '',
                "Rp " . number_format(($total_masuk - $total_keluar),2,',','.'),
                '',
            );

        $writer->addRows($data);
        $writer->addRow($data_masuk);
        $writer->addRow($data_keluar);
        $writer->addRow($total);

		$writer->close(); //tutup spout writer
    }
    
    public function print($filter = NULL)
    {

        $url = base_url('./icon/logo_.png');
        $kas = $this->M_rekap->lists($filter);
        $data = "";
        $no = 1;
        $total_masuk = 0;
        $total_keluar = 0;
        foreach ($kas as $value) {
            $total_masuk += $value->kas_masuk;
            $total_keluar += $value->kas_keluar;
            $date = DateTime::createFromFormat('Y-m-d', $value->tgl_kas)->format('d-m-Y');
            if(empty($value->kas_masuk)){
                $value->kas_masuk = "-";
            }
            else
            {
                $value->kas_masuk = "Rp. ".number_format($value->kas_masuk,0,',','.');
            }
            
            if(empty($value->kas_keluar)){
                $value->kas_keluar = "-";
            }
            else
            {
                $value->kas_keluar = "Rp. ".number_format($value->kas_keluar,0,',','.');
            }

            $data .= "<tr>
                    <td style='text-align : center;'>".$no++."</td>
                    <td style='text-align : center;'>".$date."</td>
                    <td>".$value->uraian_kas."</td>
                    <td style='text-align : center;'>".$value->kas_masuk."</td>
                    <td style='text-align : center;'>".$value->kas_keluar."</td>
            </tr>
            ";
        }

        $data .= "<tr>
                <td colspan='3' style='text-align : center;'><center>Total Penerimaan</center></td>
                <td colspan='2' style='text-align : center;'> Rp".number_format(($total_masuk),2,',','.')."</td>
        </tr>";

        $data .= "<tr>
                <td colspan='3' style='text-align : center;'><center>Total Pengeluaran</center></td>
                <td colspan='2' style='text-align : center;'> Rp".number_format(($total_keluar),2,',','.')."</td>
        </tr>";

        $data .= "<tr>
                <td colspan='3' style='text-align : center;'><center>Total Saldo Akhir Kas Masjid</center></td>
                <td colspan='2' style='text-align : center;'> Rp".number_format(($total_masuk - $total_keluar),2,',','.')."</td>
        </tr>";

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
            <center><b>Data Penerimaan dan Pengeluaran Dana</b></center>	
            <center><b>Masjid Al-Barqah</b></center>
            <br> 	
        </div>

        <div class='row'>
            <table>
                <tr>
                    <th width='100px'>
                        <center>No</center>
                    </th>		
                    <th width='100px'>
                        <center>Tanggal</center>
                    </th>		
                    <th width='210px'>
                        <center>Uraian</center>
                    </th>		
                    <th width='150px'>
                        <center>Penerimaan</center>
                    </th>		
                    <th width='150px'>
                        <center>Pengeluaran</center>
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

/* End of file kas.php */