 <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title">
                            <h2>Galeri</h2>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="d-flex Gallery my-0">
					<?php $no=1; foreach ($galeri as $key => $value) { ?>
                    <div class="col-6 col-md-4">
                        <div class="card">
                        <img class="w-100" src="<?= file_exists(FCPATH.'/gambar/'. $value->foto_galeri) ? base_url('gambar/'. $value->foto_galeri) : "https://via.placeholder.com/300x300.png/001177?text=$value->foto_galeri"; ?>">
                        <div class="card-body blog__item__text">
                        <h5 class="card-title"><?= $value->judul_galeri?> </h5>
                        <p>
                            <i class="fa fa-clock-o"></i><?= $value->tgl_galeri ?><br>
                            <?= $value->deskripsi_galeri?>
                        </p>
                        </div>
                        </div>
                    </div>
                
					<?php 	}?>
            </div>
        </div>
    </section>
    <!-- About Section End -->