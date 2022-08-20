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
      
    <!-- Home About Section Begin -->
    <section class="home-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home__about__pic">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Home About Section End -->

    <!-- Services Section Begin -->
<section class="services spad" style="margin :10px;margin-top : 20px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="container" text align="justify">
            <h2>Profil Masjid Al-Barqah</h2>&nbsp;
            <p>Masjid Al-Barqah merupakan masjid yang berlokasi di Komplek Kayu Tangi II Rt. 15 Jl. H. Hasan Basri Kecamatan Banjarmasin Utara, 
                Kota Banjarmasin. Masjid ini terletak di dalam komplek yang berada dekat kawasan kampus dan sekolah. 
                Masjid ini pertama kali didirikan pada tahun 1980 di atas tanah seluas 700 meter persegi. Pada awal pembangunan, 
                bangunan ini bernama Musholla Al-Barqah, lalu pada sekitar tahun 1984 bangunan ini berganti status menjadi masjid yang bernama 
                Masjid Al-Barqah hingaa saat ini. Dari awal dibangun hingga saat ini, masjid ini telah mengalami dua kali renovasi. 
                <br>
                <a href="<?= base_url('home/profil')  ?>"><b>Selengkapnya...</b></a>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="contact__form">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16861.5992887304!2d114.58411808292901!3d-3.300443490524068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423a723347adb%3A0xe0bf7cbd2ddea589!2sMesjid%20Al%20-%20Barqah!5e0!3m2!1sid!2sid!4v1659377590709!5m2!1sid!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <div class="card text-center  mx-auto d-block" style="width: 50%;">
          <div class="card-header">
            <center>
            <?php
                echo form_open_multipart('home/get_per_month'); ?>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 form-group">
                  <div>
                    <label for="kota">Kota</label>
                    <br>
                      <select class="form-control" name="kota" id="kota">
                        <?php foreach ($list_kota as $k) { ?>
                          <option value="<?= $k->id ?>" <?= $k->id == $wilayah ? "selected" : "" ?>><?= $k->lokasi ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
              </div>

            </center>
          </div>
          <hr>
          <div class="card-body">
            <h5 class="card-title" id="title-shalat">Jadwal Shalat Tanggal <?= date('d-m-Y')  ?></h5>
            <input type="date" style="display :none;" id="date-now" name="date-now" value="<?= date('Y-m-d') ?>">
              <center>
                <table class="table-striped">
                  <tr>
                    <td><input type="button" id="tanggal" value="Kemarin"></td>
                    <td>&emsp;</td>
                    <td>&emsp;</td>
                    <td><input type="button" id="tanggal" value="Besok"></td>
                  </tr>
                  <tbody>
                    <tr style="margin-top : 50px;">
                      <td><h5>Subuh</h5></td>
                      <td>&emsp;</td>
                      <td>&emsp;</td>
                      <td><h5 id="subuh"><?= $jadwal_shalat->subuh ?></h5></td>
                    </tr>
                    <tr style="margin-top : 50px;">
                      <td><h5>Dzuhur</h5></td>
                      <td>&emsp;</td>
                      <td>&emsp;</td>
                      <td><h5 id="dzuhur"><?= $jadwal_shalat->dzuhur ?></h5></td>
                    </tr>
                    <tr style="margin-top : 50px;">
                      <td><h5>Ashar</h5></td>
                      <td>&emsp;</td>
                      <td>&emsp;</td>
                      <td><h5 id="ashar"><?= $jadwal_shalat->ashar ?></h5></td>
                    </tr>
                    <tr style="margin-top : 50px;">
                      <td><h5>Maghrib</h5></td>
                      <td>&emsp;</td>
                      <td>&emsp;</td>
                      <td><h5 id="maghrib"><?= $jadwal_shalat->maghrib ?></h5></td>
                    </tr>
                    <tr style="margin-top : 50px;">
                      <td><h5>Isya</h5></td>
                      <td>&emsp;</td>
                      <td>&emsp;</td>
                      <td><h5 id="isya"><?= $jadwal_shalat->isya ?></h5></td>
                    </tr>
                  </tbody>
                </table>
              </center>
              <br>
            <button type="submit" value="<?= date('m') ?>">Tekan Untuk 1 Bulan Ini.</button>
            <?php echo form_close();  ?>

          </div>
          <div class="card-footer text-muted">
            Jadwal Shalat Hari Ini
          </div>
        </div>
      </div>

    </div>
</section>
    <!-- Services Section End -->

   
