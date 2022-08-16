
			<!-- End Intro Section -->
			<!-- Contact Section -->
			<section class="padding ptb-xs-40">
				<div class="container">
					<div class="row">					
						<div class="col-lg-12">
							<div class="headeing pb-30">
								<div class="section-title">
                            <h2>Jadwal Pengajian Masjid Al-Barqah</h2>
                        </div>
								<span class="b-line l-left line-h"></span>
							</div>			
							<hr>
								<?php echo form_open_multipart('home/pengajian'); ?>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="type">Pilih Hari</label>
												<br>
												<select class="form-control" name="hari" id="hari">
													<option value="">Select All</option>
													<option value="Senin" <?= $hari == "Senin" ? "Selected" : "" ?>>Senin</option>
													<option value="Selasa" <?= $hari == "Selasa" ? "Selected" : "" ?>>Selasa</option>
													<option value="Rabu" <?= $hari == "Rabu" ? "Selected" : "" ?>>Rabu</option>
													<option value="Kamis" <?= $hari == "Kamis" ? "Selected" : "" ?>>Kamis</option>
													<option value="Jumat" <?= $hari == "Jumat" ? "Selected" : "" ?>>Jumat</option>
													<option value="Sabtu" <?= $hari == "Sabtu" ? "Selected" : "" ?>>Sabtu</option>
													<option value="Minggu" <?= $hari == "Minggu" ? "Selected" : "" ?>>Minggu</option>
												</select>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Filter</button>
								<?php echo form_close(); ?>
							<hr>
							<div class="col-lg-12">
								<table class="table table-bordered">
									<thead class="dark-bg">
										<tr>					
											<th class="text-center">No</th>
											<th class="text-center">Hari</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Jam</th>
											<th class="text-center">Nama Ustad</th>
											<th class="text-center">Tema Pengajian</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($pengajian as $key => $value) { 
											$datetime = DateTime::createFromFormat('Y-m-d', $value->tgl_pengajian);
										?>
											
									
										<tr>
											<td class="text-center"> <?= $no++ ?> </td>
											<td><?= $value->hari_pengajian?> </td>
											<td><?= $datetime->format('d-m-Y')?> </td>
											<td><?= $value->jam_pengajian?> </td>
											<td><?= $value->nama_penceramah?> </td>
											<td><?= $value->tema_pengajian?> </td>
											
										</tr>
									<?php 	}?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>
				</div>
				<!-- Map Section -->

			</section>
			