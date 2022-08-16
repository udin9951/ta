
			<!-- End Intro Section -->
			<!-- Contact Section -->
			<section class="padding ptb-xs-40">
				<div class="container">
					<div class="row">					
						<div class="col-lg-12">
							<div class="headeing pb-30">
								<div class="section-title">
                            <h2>Jadwal Khotib Salat Jumat Masjid Al-Barqah</h2>
                        </div>
								<span class="b-line l-left line-h"></span>
							</div>			
							<hr>
							
								<?php
								if ($this->session->flashdata('error')) {
									echo '<div class="alert alert-danger alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
											</button>';
										echo $this->session->flashdata ('error');
										echo '</div>';
									} 
								echo form_open_multipart('home/soljum'); ?>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label for="date">Start Date</label>
												<input class="form-control" type="month" name="filter-start" id="date-filter" value="<?= !empty($start) ? $start : "" ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="date">End Date</label>
												<input class="form-control" type="month" name="filter-end" id="date-filter" value="<?= !empty($end) ? $end : "" ?>">
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
											<th class="text-center">Tanggal</th>
											<th class="text-center">Nama Khotib</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($soljum as $key => $value) { 
											$datetime = DateTime::createFromFormat('Y-m-d', $value->tgl_soljum);
										?>
									
										<tr>
											<td class="text-center"> <?= $no++ ?> </td>
											<td><?= $datetime->format('d-m-Y')?> </td>
											<td><?= $value->nama_imam?> </td>
											
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
			