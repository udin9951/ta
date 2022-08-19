    <!-- Home About Section Begin -->
    <section class="home-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home__about__pic">
                        <!-- <img src="<?= base_url() ?>template/front-end/img/home-about/home-about.png" alt=""> -->
                    </div>
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
                    <center>Data Waktu Shalat<br>
                    Bulan <?= $tanggal?></center>
                </h3>
                <hr>
                <hr>
                <div class="card-body">
                    <h5 class="card-title" id="title-shalat">Jadwal Shalat Bulan <?= $tanggal  ?></h5>
                    <center>
                        <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>Subuh</td>
                                <td>Zuhur</td>
                                <td>Ashar</td>
                                <td>Magrib</td>
                                <td>Isya</td>
                            </tr>
                            <?php foreach ($shalat as $key => $value) { ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $value->subuh ?></td>
                                    <td><?= $value->dzuhur ?></td>
                                    <td><?= $value->ashar ?></td>
                                    <td><?= $value->maghrib ?></td>
                                    <td><?= $value->isya ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </center>
                    <br>
                    <a href="<?= base_url('home')?>" class="btn btn-warning" value="<?= date('m') ?>">Back.</a>
                    <?php echo form_close();  ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

   