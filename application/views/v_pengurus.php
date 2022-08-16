             <!-- About Section Begin -->
    <!-- <section class="about spad"> -->
        <div class="container">
            <div class="about__content" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-title" style="margin-bottom: 0;">
                            <h2>Susunan Kepengurusan</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex Gallery" style="margin-bottom: 200px;">
                <?php $no=1; foreach ($pengurus as $key => $value) { ?>
                <div class="col-6 col-md-4">
                    <div class="services__item card">
                        <img style="object-fit: revert !important;" class="img-thumbnail" src="<?= file_exists(FCPATH.'/sampul/'. $value->foto_pengurus) ? base_url('sampul/'. $value->foto_pengurus) : "https://via.placeholder.com/300x300.png/001177?text=$value->nama_pengurus"; ?>">
                        <div class="card-body blog__item__text">
                        <h5 class="card-title" style="margin-bottom : 0px !important"><?= $value->nama_pengurus?> </h5>
                        <p class="card-text" style="margin-top : 0 !important"><?= ucfirst($value->jabatan_pengurus)?></p>
                        </div>
                    </div>
                </div>
                
                    <?php   }?>
            </div>
        </div>
    <!-- </section> -->
    <!-- About Section End -->