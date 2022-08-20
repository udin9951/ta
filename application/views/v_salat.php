
			<!-- End Intro Section -->
			<!-- Contact Section -->
			<section class="padding ptb-xs-40">
				<div class="container bare-minimum">
					<div class="row">					
						<div class="col-lg-12">
							<div class="headeing pb-30">
								<div class="section-title">
                            <h2>Jadwal Salat Kota Banjarmasin</h2>
                            <h3>Bulan Agustus Tahun 2022</h3>
                        </div>
								<span class="b-line l-left line-h"></span>
							</div>			
							<div class="col-lg-12">
								<table class="table table-bordered">
									<thead class="dark-bg">
										<tr>					
											<th class="text-center">No</th>
											<th class="text-center">Tanggal Salat</th>
											<th class="text-center">Imsak</th>
			                                <th class="text-center">Subuh</th>
			                                <th class="text-center">Duha</th>
			                                <th class="text-center">Zuhur</th>
			                                <th class="text-center">Asar</th>
			                                <th class="text-center">Magrib</th>
			                                <th class="text-center">Isya</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($salat as $key => $value) { ?>
											
									
										<tr>
											<td class="text-center"> <?= $no++ ?> </td>
											<td><?= $value->tgl_salat?> </td>
			                                <td><?= $value->imsak?> </td>
			                                <td><?= $value->subuh?> </td>
			                                <td><?= $value->duha?> </td>
			                                <td><?= $value->zuhur?> </td>
			                                <td><?= $value->asar?> </td>
			                                <td><?= $value->magrib?> </td>
			                                <td><?= $value->isya?> </td>
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
			