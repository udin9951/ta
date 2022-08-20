
    <!--  <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <h5>Selamat Datang Di Website Resmi Masjid Al-Barqah</h5>
                         Tulisan di tengah menu utama wrna kuning bold
                    </div>
                </div>
            </div>
        </div> -->

    <!-- </section> -->
    <!-- Hero Section End -->

    <!-- Home About Section Begin -->
    <section class="home-about">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-6">
                    <div class="home__about__text">
                        <div class="section-title">
                            <h2>Selamat Datang Di Website Resmi Masjid Al-Barqah</h2>
                        </div>
                        <img src="<?= base_url() ?>template/front-end/img/home-about/sign.png" alt=""> logo masjidnya
                    </div>
                </div> -->
                <div class="col-lg-6">
                    <div class="home__about__pic">
                        <!-- <img src="<?= base_url() ?>template/front-end/img/home-about/home-about.png" alt=""> -->
                    </div>
                   <!--  <div>
                        <script type="text/javascript" src="https://www.muslimpro.com/muslimprowidget.js?cityid=1214520&language=id&timeformat=24" async></script>
                    </div> -->
                </div>

            </div>
        </div>
    </section>
    <!-- Home About Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="card-box table-responsive">
                <?php
                        if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>';
                    echo $this->session->flashdata ('pesan');
                    echo '</div>';
                }
                if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>';
                    echo $this->session->flashdata ('error');
                    echo '</div>';
                }
                ?>
                <h3>
                    <center>Laporan Penerimaan dan Pengeluaran Dana<br>
                    Masjid Al-Barqah<br>
                    <h3>Periode Bulan <?= DateTime::createFromFormat('Y-m', $laporan->periode)->format('F'); ?> 2022</h3>
                </center>
                </h3>
                <center>
                    <div class="row d-flex Gallery mt-3 " style="margin-bottom :0px !important;">
                        <div class="services__item card mx-auto d-block">
                            <img style="max-width: 600px !important; max-height: 800px !important;" class="w-100 img-thumbnail" src="<?= file_exists(FCPATH.'/gambar/'. $laporan->foto_laporan) ? base_url('gambar/'. $laporan->foto_laporan) : "https://via.placeholder.com/300x300.png/001177?text=$laporan->foto_laporan"; ?>">
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

   