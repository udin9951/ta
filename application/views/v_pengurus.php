             <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title">
                            <h2>Susunan Kepengurusan</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex Gallery">
                <?php $no=1; foreach ($pengurus as $key => $value) { ?>
                <div class="col-6 col-md-3">
                    <div class="services__item card p2">
                        <img class="w-100" src="<?= file_exists(FCPATH.'/gambar/'. $value->foto_pengurus) ? base_url('gambar/'. $value->foto_pengurus) : "https://via.placeholder.com/200x200.png/001177?text=$value->nama_pengurus" ?>" style="height: 150px !important;object-fit:cover">
                        <div class="card-body">
                        <h5 class="card-title"><?= $value->nama_pengurus?> </h5>
                        <p class="card-text"><?= ucfirst($value->jabatan_pengurus)?></p>
                        </div>
                    </div>
                </div>
                
                    <?php   }?>
            </div>
        </div>
    </section>
    <!-- About Section End -->