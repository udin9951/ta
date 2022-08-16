<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_user');
    }

    public function index()
        {

			$url = './icon/logo_.png';
			$user = $this->m_user->lists()->result();
			$data = "";
			$no = 1;
			foreach ($user as $value) {
				$data .= "<tr>
						<td>".$no++."</td>
						<td>".$value->nama_user."</td>
						<td>".$value->username."</td>
						<td>".$value->nama_level."</td>
						<td>".$value->foto_user."</td>
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
						<th width='100px'>
							<center>Nama User</center>
						</th>		
						<th width='100px'>
							<center>Username</center>
						</th>		
						<th width='100px'>
							<center>Level</center>
						</th>		
						<th width='100px'>
							<center>Foto</center>
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