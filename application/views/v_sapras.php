            <!-- About Section Begin -->
    <!-- <section class="about spad"> -->
        <div class="container">
            <div class="about__content" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title" style="margin-bottom: 0px;">
                            <h2>Sarana & Prasarana</h2>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row d-flex Gallery" style="margin-bottom: 200px;">
                <?php $no=1; foreach ($sapras as $key => $value) { ?>
                <div class="col-6 col-md-4">
                    <div class="services__item card p2">
                        <img class="img-thumbnail w-100" src="<?= file_exists(FCPATH.'/sampul/'. $value->foto_sapras) ? base_url('sampul/'. $value->foto_sapras) : "https://via.placeholder.com/300x300.png/001177?text=$value->nama_sapras"; ?>">
                        <div class="card-body blog__item__text">
                        <h5 class="card-title" style="margin-bottom : 0px !important"><?= $value->nama_sapras?> </h5>
                        <p class="card-text" style="margin-top : 0px !important"><?= ucfirst($value->deskripsi_sapras)?></p>
                        </div>
                    </div>
                </div>
                
                    <?php   }?>
            </div>
        </div>
    <!-- </section> -->
    <!-- About Section End -->