
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
							<div class="col-lg-12">
								<table class="table table-bordered">
									<thead class="dark-bg">
										<tr>					
											<th class="text-center">No</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Nama Ustad</th>
											<th class="text-center">Tema Pengajian</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($pengajian as $key => $value) { ?>
											
									
										<tr>
											<td class="text-center"> <?= $no++ ?> </td>
											<td><?= $value->tgl_pengajian?> </td>
											<td><?= $value->id_penceramah?> </td>
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
			