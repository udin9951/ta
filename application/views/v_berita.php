<!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">

                     <?php foreach ($berita as $key => $value) { ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?=base_url('gambar/'.$value->gambar_berita)?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <p><i class="fa fa-clock-o"></i><?= $value->tgl_berita ?></p>
                                    <h5><a href="<?=base_url('home/detail_berita/'.$value->slug_berita)?>"><?= substr(strip_tags($value->jdl_berita),0,100) ?></a></h5>
                                </div>
                            </div>
                        </div>
              <?php } ?>    
              <div class="col-lg-12">
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