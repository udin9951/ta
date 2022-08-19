<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_masuk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kas_masuk');
        $this->load->library('Pdf');
    }

    public function index()
        {
            $filter = $this->input->post('filter');
            $end = $this->input->post('end');

            $filter = !empty($filter) ? $filter : "";
            $end = !empty($end) ? $end : "";

            $data = array(
                'title' => 'Data Kas Masuk', 
                'filter' => $filter,
                'end' => $end,
                'kas_masuk' => $this->M_kas_masuk->lists($filter,$end),
                'total_kas_masuk' => $this->M_kas_masuk->sumKas($filter, $end),
                'isi'  => 'admin/kas_masuk/v_list'
            );

            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

        }

    public function show_rekap(){
        $x['data']=$this->m_kas_masuk->show_rekap();
        $this->load->view('admin/kas_masuk/v_list',$x);
    }


    public function add()          
    {
        $this->form_validation->set_rules('tgl_kas', 'Tanggal Kas', 'required');        
        $this->form_validation->set_rules('uraian_kas', 'Uraian Kas', 'required');        
        $this->form_validation->set_rules('kas_masuk', 'Saldo Kas masuk', 'required');    
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Kas masuk', 
                'isi'  => 'admin/kas_masuk/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                }
                else
                {
                        $data = array(
                            'tgl_kas'    => $this->input->post('tgl_kas'),
                            'uraian_kas'    => $this->input->post('uraian_kas'),
                            'kas_masuk'    => $this->input->post('kas_masuk'),
                            'id_user'          =>  $this->session->userdata('id_user')
                        );
                    $this->M_kas_masuk->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                    redirect('kas_masuk');
                }
            }

    public function edit($id_kas)
    {
        $this->form_validation->set_rules('tgl_kas', 'Tanggal Kas', 'required');        
        $this->form_validation->set_rules('uraian_kas', 'Uraian Kas', 'required');        
        $this->form_validation->set_rules('kas_masuk', 'Saldo Kas masuk', 'required');    
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Tambah Data Kas masuk', 
                'kas_masuk' => $this->M_kas_masuk->detail($id_kas),
                'isi'  => 'admin/kas_masuk/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);

                }
                else
                {
                        $data = array(
                            'id_kas'   => $id_kas,
                            'tgl_kas'    => $this->input->post('tgl_kas'),
                            'uraian_kas'    => $this->input->post('uraian_kas'),
                            'kas_masuk'    => $this->input->post('kas_masuk'),
                            'id_user'           =>  $this->session->userdata('id_user')
                            );
                    $this->M_kas_masuk->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                    redirect('kas_masuk');
                }
    }

    public function delete($id_kas)
    {
        $data = array(
            'id_kas' => $id_kas,
        );
        $this->M_kas_masuk->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');        
        redirect('kas_masuk');
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
        $pdf->Cell(0,5,'Data Penerimaan Dana',0,1,'C');
        $pdf->Cell(0,5,'Masjid Al-Barqah',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(50,6,'Tanggal',1,0,'C');
        $pdf->Cell(90,6,'Uraian',1,0,'C');
        $pdf->Cell(40,6,'Penerimaan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $user = $this->M_kas_masuk->lists($filter);
        $total = $this->M_kas_masuk->sumKas($filter);
        $no=0;
        foreach ($user as $data){
            $datetime = DateTime::createFromFormat('Y-m-d', $data->tgl_kas);
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(50,6,$datetime->format('d-m-Y'),1,0, 'C');
            $pdf->Cell(90,6,$data->uraian_kas,1,0);
            $pdf->Cell(40,6,"Rp " . number_format($data->kas_masuk,2,',','.'),1,1, 'C');
        }
        $pdf->Cell(150,6,'Total Penerimaan',1,0,'C');
        $pdf->Cell(40,6,"Rp " . number_format($total->kas_masuk,2,',','.'),1,1,'C');
        $pdf->Output();
    }

	public function export($filter = NULL)
    {
		$export = $this->M_kas_masuk->lists($filter);

		$file_path = "Data Kas Penerimaan.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Penerimaan Dana'];
		$label2 = ['Masjid Al-Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Tanggal',
			'Uraian',
			'Jumlah Pemasukan',
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
            $datetime = DateTime::createFromFormat('Y-m-d', $ex->tgl_kas);

			// masukkan data dari database ke variabel array
			// silahkan sobat sesuaikan dengan nama field pada tabel database
			$kas = array(
			    $no++,
			    $datetime->format('d-m-Y'),
			    $ex->uraian_kas,
			    "Rp " . number_format($ex->kas_masuk,2,',','.'),
			);

			array_push($data, $kas);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer
    }

    public function print($filter = NULL)
    {

        $url = base_url('./icon/logo_.png');
        $kas = $this->M_kas_masuk->lists($filter);
        $total = $this->M_kas_masuk->sumKas($filter);
        $data = "";
        $no = 1;
        
        foreach ($kas as $value) {
            $datetime = DateTime::createFromFormat('Y-m-d', $value->tgl_kas);
            $data .= "<tr>
                    <td style='text-align : center;'>".$no++."</td>
                    <td style='text-align : center;'>".$datetime->format('d-m-Y')."</td>
                    <td>".$value->uraian_kas."</td>
                    <td style='text-align : center;'>"."Rp " . number_format($value->kas_masuk,2,',','.')."</td>
            </tr>
            ";
        }
        $data .="<tr><td colspan='3' style='text-align : center;'>Total Penerimaan</td><td style='text-align : center;'>"."Rp " . number_format($total->kas_masuk,2,',','.')."</td></tr>";
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
            <center><b>Data Penerimaan Dana</b></center>	
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
                    <th width='320px'>
                        <center>Uraian</center>
                    </th>		
                    <th width='200px'>
                        <center>Penerimaan</center>
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