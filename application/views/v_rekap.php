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
                <hr>
                    <?php echo form_open_multipart('home/rekap'); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Start Date</label>
                                    <input class="form-control" type="month" name="filter-start" id="date-filter" value="<?= !empty($start) ? $start : "" ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">End Date</label>
                                    <input class="form-control" type="month" name="filter-end" id="date-filter" value="<?= !empty($end) ? $end : "" ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">End Date</label>
                                    <br>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">Select All</option>
                                        <option value="Masuk" <?= $type == "Masuk" ? "Selected" : "" ?>>Kas Masuk</option>
                                        <option value="Keluar" <?= $type == "Keluar" ? "Selected" : "" ?>>Kas Keluar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    <?php echo form_close(); ?>
                <hr>
                <table id="datatable" class="table table-striped table-bordered mt-3" style="width:100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Uraian</th>
                        <th>Jenis Kas</th>
                        <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($rekap as $key => $value) { ?>
                    
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->tgl_kas?></td>
                        <td><?= $value->uraian_kas?></td>
                        <td><?= $value->jenis_kas?></td>
                        <?php
                            if($value->kas_masuk != 0)
                            {
                                echo "<td>".$value->kas_masuk."</td>";
                            }
                            else
                            {
                                echo "<td>".$value->kas_keluar."</td>";
                            }
                        ?>
                    </tr>
                <?php } ?>
                    <tr>
                            <td class="text-center" colspan="4"><b>Saldo</b></td>
                            <?php if($type == "")
                            {
                                echo "<td colspan='1'>".$total_kas."</td>";
                            }
                            else if($type == "Masuk")
                            {
                                echo "<td colspan='1'>".$kas_masuk->kas_masuk."</td>";
                            }
                            else if($type == "Keluar")
                            {
                                echo "<td colspan='1'>".$kas_keluar->kas_keluar."</td>";
                            }
                            ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

   