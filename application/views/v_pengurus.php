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
            <div class="row">

                    <?php $no=1; foreach ($pengurus as $key => $value) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="<?= base_url('sampul/'. $value->foto_pengurus) ?>" width="150px">
                        <h4><?= $value->nama_pengurus?> </h4>
                        <p><?= $value->jabatan_pengurus?></p>
                    </div>
                </div>
                
                    <?php   }?>
            </div>
        </div>
    </section>
    <!-- About Section End -->