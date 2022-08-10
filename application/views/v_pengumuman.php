 <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title">
                            <h2>Pengumuman</h2>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row">

					<?php $no=1; foreach ($pengumuman as $key => $value) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="<?= base_url()?>template/front-end/img/services/services-1.png" height="50" alt="">
                        <h4><?= $value->judul_pengumuman?> </h4>
                        <p><?= $value->isi_pengumuman?></p>
                        <p>
								<h4><span>Tanggal</span> : <?= $value->tgl?> </h4>
							</p>
                    </div>
                </div>
                
					<?php 	}?>
            </div>
        </div>
    </section>
    <!-- About Section End -->
