             <!-- About Section Begin -->
    <!-- <section class="about spad"> -->
        <div class="container">
            <div class="about__content" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-title" style="margin-bottom: 0;">
                            <h2>Susunan Kepengurusan</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row d-flex Gallery" style="margin-bottom: 200px;">
                <?php 
                $no=1; foreach ($pengurus as $key => $value) { ?>
                <div class="col-6 col-md-6">
                    <div class="services__item card">
                        <img style="object-fit: revert !important;" class="img-thumbnail" src="<?= file_exists(FCPATH.'sampul/'. $value->foto_pengurus) ? base_url('sampul/'. $value->foto_pengurus) : "https://via.placeholder.com/300x300.png/001177?text=$value->nama_pengurus"; ?>">
                        <div class="card-body blog__item__text">
                        <h5 class="card-title" style="margin-bottom : 0px !important"><?= $value->nama_pengurus?> </h5>
                        <p class="card-text" style="margin-top : 0 !important"><?= ucfirst($value->jabatan_pengurus)?></p>
                        </div>
                    </div>
                </div>
                
                    <?php   }?>
            </div> -->

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th colspan="2">Jabatan</th>
                                <th colspan="4">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($penasihat) > 0)
                            { ?>

                                <tr>
                                    <td rowspan="<?= count($penasihat)+1 ?>">I</td>
                                    <td colspan="2" rowspan="<?= count($penasihat)+1 ?>"><b>Penasihat</b></td>
                                </tr>
                                <?php foreach ($penasihat as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->nama_pengurus ?></td>
                                    </tr>
                                <?php } ?>

                            <?php } ?>
                            <?php
                                if(count($pengurus) > 0)
                            { ?>

                                <tr>
                                    <td rowspan="<?= count($pengurus) +1 ?>">
                                        II
                                    </td>
                                    <td colspan="4">
                                        <b>pengurus harian</b>
                                    </td>
                                </tr>
                                <?php
                                        foreach ($pengurus as $key => $value) { ?>
                                        <tr>
                                            <td colspan="2">
                                                <?= $value->jabatan_pengurus ?>
                                            </td>
                                            <td><?= $value->nama_pengurus ?></td>
                                        </tr>

                                <?php } ?>


                            <?php } ?>
                            <?php
                                if(count($bidang) > 0)
                            { ?>

                                <tr>
                                    <td rowspan="<?= count($bidang) +1 ?>">
                                        III
                                    </td>
                                    <td colspan="4">
                                        <b>Bidang Bidang</b>
                                    </td>
                                </tr>
                                <?php
                                        foreach ($bidang as $key => $value) { ?>
                                        <tr>
                                            <td colspan="2">
                                                <?= $value->jabatan_pengurus ?>
                                            </td>
                                            <td>
                                            <?php
                                                for($i=0;$i<count($anggota);$i++)
                                                {
                                                    if($anggota[$i]['jabatan'] == $value->jabatan_pengurus){
                                                        if($anggota[$i]['title'] == 1)
                                                        {
                                                            echo "<b>Ketua</b> : ".$anggota[$i]['nama']."<br>";
                                                        }
                                                        else
                                                        {
                                                            echo ($i).". ".$anggota[$i]['nama']."<br>";
                                                        }
                                                    }
                                                }
                                            ?>
                                            </td>
                                        </tr>

                                <?php } ?>

                            <?php } ?>
                            <!-- <tr>
                                <td rowspan="6">
                                    II
                                </td>
                                <td colspan="4">
                                    pengurus harian
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Wakil Ketua
                                </td>
                                <td colspan="2">Budi</td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    Sekretaris
                                </td>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Wakil Sekretaris
                                </td>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Bendahara
                                </td>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Wakil Bendahara
                                </td>
                                <td colspan="2">Budi</td>
                            </tr> -->
                            <!-- <tr>
                                <td rowspan="13">III</td>
                                <td colspan="4">Bidang Bidang</td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="4">Bidang 1</td>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="4">Bidang 2</td>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="4">Bidang 2</td>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr>
                            <tr>
                                <td colspan="2">Budi</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- </section> -->
    <!-- About Section End -->