 <!-- About Section Begin -->
    <!-- <section class="about spad"> -->
        <div class="container bare-minimum">
            <div class="about__content" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title" style="margin-bottom: 0;">
                            <h2>Galeri</h2>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row d-flex Gallery mb-3">
					<?php $no=1; foreach ($galeri as $key => $value) { 
                        $date =DateTime::createFromFormat('Y-m-d', $value->tgl_galeri)->format('d-m-Y');
                        ?>
                    <div class="col-6 col-md-4">
                        <div class="services__item card">
                        <img class="w-100 img-thumbnail" src="<?= file_exists(FCPATH.'/sampul/'. $value->foto_galeri) ? base_url('sampul/'. $value->foto_galeri) : "https://via.placeholder.com/300x300.png/001177?text=$value->foto_galeri"; ?>">
                        <div class="card-body blog__item__text">
                        <h5 class="card-title" style="margin-bottom: 0rem;"><?= $value->judul_galeri?> </h5>
                        <p style="margin-top : 0 !important">
                            <i class="fa fa-clock-o"></i><?= $date ?><br>
                            <?= $value->deskripsi_galeri?>
                        </p>
                        </div>
                        </div>
                    </div>
                
					<?php 	}?>
            </div>
        </div>
    <!-- </section> -->
    <!-- About Section End -->