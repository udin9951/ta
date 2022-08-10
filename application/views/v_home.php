<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active">

      <img src="<?php echo base_url('template/front-end/img/photo.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('template/front-end/img/1.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('template/front-end/img/11.jpg') ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
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
            <div class="section-title">
                &nbsp
                            <h2>Galeri Masjid Al-Barqah</h2>
                        </div>
            <div class="row">
                    <?php $no=1; foreach ($galeri as $key => $value) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__item">
                        <img src="<?= base_url('sampul/'. $value->foto_galeri) ?>" width="150px">
                        <h4><?= $value->judul_galeri?> </h4>
                        <p><?= $value->deskripsi_galeri?></p>
                        <p>
                                <h4><span>Deskripsi</span> : <?= $value->deskripsi_galeri?> </h4>
                            </p>
                    </div>
                </div>

                    <?php   }?>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

   