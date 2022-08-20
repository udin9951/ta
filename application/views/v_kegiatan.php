<!-- End Intro Section -->
<!-- Contact Section -->
<section class="padding ptb-xs-40">
	<div class="container bare-minimum">
		<div class="row">
			<div class="col-lg-12">
				<div class="headeing pb-30">
					<div class="section-title">
						<h2>Jadwal Kegiatan Masjid Al-Barqah</h2>
					</div>
					<span class="b-line l-left line-h"></span>
				</div>
				<div class="col-lg-12">
					<table class="table table-bordered">
						<thead class="dark-bg">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Kegiatan</th>
								<th class="text-center">Hari Kegiatan</th>
								<th class="text-center">Tanggal Kegiatan</th>
								<th class="text-center">Jam Kegiatan</th>
								<th class="text-center">Lokasi Kegiatan</th>
								<th class="text-center">Deskripsi Kegiatan</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
								foreach ($kegiatan as $key => $value) { 
									$date = DateTime::createFromFormat('Y-m-d', $value->tgl_kegiatan)->format('d-m-Y');
							?>


								<tr>
									<td class="text-center"> <?= $no++ ?> </td>
									<td><?= $value->nama_kegiatan ?> </td>
									<td><?= $value->hari_kegiatan ?> </td>
									<td><?= $date ?> </td>
									<td><?= $value->jam_kegiatan ?> </td>
									<td><?= $value->lokasi_kegiatan ?> </td>
									<td><?= $value->deskripsi_kegiatan ?> </td>
								</tr>
							<?php 	} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Map Section -->

</section>