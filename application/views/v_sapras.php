            <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="about__content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title">
                            <h2>Sarana & Prasarana</h2>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row">

                    <?php $no=1; foreach ($sapras as $key => $value) { ?>
                <div class="col-6 col-md-3">
                    <div class="services__item card">
                        <img class="w-100" src="<?= file_exists(FCPATH.'/gambar/'. $value->foto_sapras) ? base_url('gambar/'. $value->foto_sapras) : "https://via.placeholder.com/200x200.png/001177?text=$value->nama_sapras" ?>"
                        style="height: 150px !important;object-fit:cover">
                        <div class="card-body">
                        <h5 class="card-title"><?= $value->nama_sapras?> </h5>
                        <p class="card-text"><?= ucfirst($value->deskripsi_sapras)?></p>
                        </div>
                    </div>
                </div>
                
                    <?php   }?>
            </div>
        </div>
    </section>
    <!-- About Section End -->