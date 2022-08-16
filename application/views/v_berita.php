<!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                     <?php foreach ($berita as $key => $value) {
                        $date = DateTime::createFromFormat('Y-m-d', $value->tgl_berita);
                        ?>
                        <div class="col-sm-6 col-md-4 p-2 d-flex flex-wrap">
                            <div class="card w-100 h-100">
                                <a href="<?=base_url('home/detail_berita/'.$value->slug_berita)?>">
                                <div class="blog__item__pic">
                                    <img class="w-100" src="<?=file_exists(FCPATH.'/gambar/'. $value->gambar_berita) ? base_url('gambar/'. $value->gambar_berita) : "https://via.placeholder.com/300x300.png/001177?text=$value->gambar_berita";?>" style="height: 220px !important;object-fit:cover">
                                </div>
                                <div class="blog__item__text card-body">
                                    <p style="margin-bottom : 0;"><i class="fa fa-clock-o"></i><?= $date->format('d-m-Y') ?></p>
                                    <h5 class="card-title"><?= $value->jdl_berita ?></h5>
                                </div>
                                </a>
                            </div>
                        </div>
              <?php } ?>    
              <div class="col-lg-12 d-flex justify-content-center">
                            <div class="pagination__number blog__pagination">
                               <?php
                    if (isset($paginasi)) {
                      echo $paginasi;
                    }
                    ?>
                           
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- Blog Section End -->
      <!-- Intro Section -->