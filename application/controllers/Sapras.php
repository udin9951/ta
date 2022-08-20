<?php
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

defined('BASEPATH') OR exit('No direct script access allowed');

class Sapras extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sapras');
        $this->load->library('Pdf');

    }

    public function index()
    {
        $data = array(
            'title' => 'Data Sarana & Prasarana', 
            'sapras' => $this->m_sapras->lists(),
            'isi'  => 'admin/sapras/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);

    }

        public function add()
    {         
        $this->form_validation->set_rules('nama_sapras','Nama Sarana & Prasarana', 
                                            'required|is_unique[sapras.nama_sapras]',
                                            array(
                                                'required' => "Sarana Dan Prasarana Wajib Di isi",
                                                'is_unique' => '%s Sudah Di gunakan'
                                            )
                                        );
        $this->form_validation->set_rules('deskripsi_sapras','Deskripsi Sarana & Prasarana', 'required');
        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = './sampul/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 50000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_sapras'))
            {
                $data = array(                
                    'title' => 'Input Data Sarana & Prasarana',
                    'error_upload' => $this->upload->display_errors(),
                    'isi'=> 'admin/sapras/v_add'  
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

                $data = array(
                    'nama_sapras'        => $this->input->post('nama_sapras'),   
                    'deskripsi_sapras'        => $this->input->post('deskripsi_sapras'),   
                    'foto_sapras'    => $upload_data['uploads']['file_name'],
                    'id_user'           =>  $this->session->userdata('id_user')
                    );
                $this->m_sapras->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                redirect('sapras');
            }
        } 
        
        $data = array(
            'title' => 'Tambah Data Sarana & Prasarana', 
            'sapras' => $this->m_sapras->lists(),
            'isi'  => 'admin/sapras/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);

    }
    
        public function edit($id_sapras)
    {
        $this->form_validation->set_rules('nama_sapras','Nama Sarana & Prasarana', 'required');
        $this->form_validation->set_rules('deskripsi_sapras','Deskripsi Sarana & Prasarana', 'required');
        // $this->form_validation->set_rules('foto_sapras','Foto Sarana & Prasarana', 'required');

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto_sapras'))
                {
                        $data = array(                
                            'title' => ' Edit Data Sarana & Prasarana', 
                            'error_upload' => $this->upload->display_errors(),
                            'sapras' => $this->m_sapras->detail($id_sapras),
                            'isi'  => 'admin/sapras/v_edit'
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
                        $sapras=$this->m_sapras->detail($id_sapras);
                        if ($sapras->foto_sapras !="") {
                            unlink('./sampul/'.$sapras->foto_sapras);
                        }
                        //end menghapus photo lama
                        $data = array(
                            'id_sapras'       =>$id_sapras,
                            'nama_sapras'    => $this->input->post('nama_sapras'),
                            'deskripsi_sapras'    => $this->input->post('deskripsi_sapras'),
                            'foto_sapras'    => $upload_data['uploads']['file_name'],
                            'id_user'           =>  $this->session->userdata('id_user')
                            );

                    $this->m_sapras->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                    redirect('sapras');
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config = array('uploads' => $this->upload->data());
                $config ['image_library'] = 'gd2';
                $config ['source_image'] = './sampul/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                            'id_sapras'       =>$id_sapras,
                            'nama_sapras'    => $this->input->post('nama_sapras'),
                            'deskripsi_sapras'    => $this->input->post('deskripsi_sapras'),
                            'foto_sapras'    => $this->input->post('foto_sapras'),
                            'id_user'           =>  $this->session->userdata('id_user')
                    );

                    $this->m_sapras->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                    redirect('sapras');
        } 

        $data = array(
            'title' => 'Edit Data Sarana & Prasarana',                
            'sapras' => $this->m_sapras->detail($id_sapras),
            'isi'  => 'admin/sapras/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    public function delete($id_sapras)
    {

            //menghapus file photo lama
            $sapras=$this->m_sapras->detail($id_sapras);
            if ($sapras->foto_sapras !="") {
                unlink('./sampul/'.$sapras->foto_sapras);
            }
            //end menghapus photo lama
        $data = array(
            'id_sapras' => $id_sapras,
        );
        $this->m_sapras->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');        
        redirect('sapras');
    }


    public function cetak()
    {
        // error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
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
        $pdf->Cell(0,5,'Data Sarana & Prasarana',0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(80,6,'Sarana & Prasarana',1,0,'C');
        $pdf->Cell(100,6,'Deskripsi',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $user = $this->m_sapras->lists();
        $no=1;

        foreach ($user as $key => $value) {
            $cellWidth=100; //lebar sel
        	$cellHeight=6; //tinggi sel satu baris normal

            if(strlen($value->deskripsi_sapras) < $cellWidth){
            //     //jika tidak, maka tidak melakukan apa-apa
                $line=1;
            }else{

            //     //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
            //     //dengan memisahkan teks agar sesuai dengan lebar sel
            //     //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
		
                $textLength=strlen($value->deskripsi_sapras);	//total panjang teks
                $errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
                $startChar=0;		//posisi awal karakter untuk setiap baris
                $maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                $textArray=array();	//untuk menampung data untuk setiap baris
                $tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
                
                while($startChar < $textLength){ //perulangan sampai akhir teks
                    //perulangan sampai karakter maksimum tercapai
                    while( 
                    $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                    ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($value->deskripsi_sapras,$startChar,$maxChar);
                    }
                    //pindahkan ke baris berikutnya
                    $startChar=$startChar+$maxChar;

                    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                    array_push($textArray,$tmpString);
                    //reset variabel penampung
                    $maxChar=0;
                    $tmpString='';
                    
                }
            //     //dapatkan jumlah baris
        		$line=count($textArray);
            }

            //     //tulis selnya
            $pdf->SetFillColor(255,255,255);
            $pdf->Cell(10,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
            $pdf->Cell(80,($line * $cellHeight),$value->nama_sapras,1,0); //sesuaikan ketinggian dengan jumlah garis

            // //memanfaatkan MultiCell sebagai ganti Cell
            // //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
            // //ingat posisi x dan y sebelum menulis MultiCell
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();
            $pdf->MultiCell($cellWidth,$cellHeight,$value->deskripsi_sapras,1,1);
            
            // //kembalikan posisi untuk sel berikutnya di samping MultiCell 
            // //dan offset x dengan lebar MultiCell
            // $pdf->SetXY($xPos + $cellWidth , $yPos);
            
        }

        $pdf->Output();
    }

	public function export()
    {
		$export = $this->m_sapras->lists();

		$file_path = "Data Sarana Dan Prasarana.xls";
		$writer = WriterFactory::create(Type::XLSX);
		$writer->openToBrowser($file_path);
		//silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan

		$label1 = ['Laporan Data Sarana Dan Prasarana'];
        $label2 = ['Masjid Al Barqah'];
		$spasi1 = [''];
		$spasi2 = [''];
		$spasi3 = [''];
		$header = [
			'No',
			'Sarana & Prasarana',
			'Deskripsi',
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
			    $ex->nama_sapras,
			    $ex->deskripsi_sapras,
			);

			array_push($data, $kas);
		}

		$writer->addRows($data); // tambahkan row untuk data anggota

		$writer->close(); //tutup spout writer
    }

    public function print()
    {
        $url = base_url('./icon/logo_.png');
        $kas = $this->m_sapras->lists();
        $data = "";
        $no = 1;
        foreach ($kas as $value) {
            $data .= "<tr>
                    <td>".$no++."</td>
                    <td>".$value->nama_sapras."</td>
                    <td>".$value->deskripsi_sapras."</td>
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
                    <th width='100px;'>
                        <center>No</center>
                    </th>		
                    <th width='500px'>
                        <center>Sarana & Prasarana</center>
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

/* End of file Sapra.php */
