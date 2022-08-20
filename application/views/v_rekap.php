
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
        <div class="container" style="max-height: 800px;">
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
    <section class="services spad mt-5">
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
                    <center>Laporan Infaq Senin Kamis<br>
                    Masjid Al-Barqah<br>
                </center>
                </h3>
                <hr>
                    <?php echo form_open_multipart('home/rekap'); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Tanggal Mulai</label>
                                    <input class="form-control" type="date" name="filter-start" id="date-filter" value="<?= !empty($start) ? $start : "" ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Tanggal Selesai</label>
                                    <input class="form-control" type="date" name="filter-end" id="date-filter" value="<?= !empty($end) ? $end : "" ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">Jenis</label>
                                    <br>
                                    <select style="display: block !important;" class="form-control" name="type" id="kota">
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
                        <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($rekap as $key => $value) { 
                        	$datetime = DateTime::createFromFormat('Y-m-d', $value->tgl_kas);
                        ?>
                    
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $datetime->format('d-m-Y')?></td>
                        <td><?= $value->uraian_kas?></td>
                        <td><?= $value->jenis_kas?></td>
                        <?php
                            if($value->kas_masuk != 0)
                            {
                                echo "<td>"."Rp. ".number_format($value->kas_masuk,0,',','.')."</td>";
                            }
                            else
                            {
                                echo "<td>"."Rp. ".number_format($value->kas_keluar,0,',','.')."</td>";
                            }
                        ?>
                    </tr>
                <?php } ?>
                    <tr>
                            <td class="text-center" colspan="4"><b>Saldo</b></td>
                            <?php if($type == "")
                            {
                                echo "<td colspan='1'>"."Rp. ".number_format($total_kas,0,',','.')."</td>";
                            }
                            else if($type == "Masuk")
                            {
                                echo "<td colspan='1'>"."Rp. ".number_format($kas_masuk->kas_masuk,0,',','.')."</td>";
                            }
                            else if($type == "Keluar")
                            {
                                echo "<td colspan='1'>"."Rp. ".number_format($kas_keluar->kas_keluar,0,',','.')."</td>";
                            }
                            ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

   