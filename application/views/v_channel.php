<!-- Blog Section Begin -->
<section class="padding ptb-xs-40">
    <div class="container bare-minimum">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="headeing pb-30">
                    <div class="section-title">
                        <h2>Al-Barqah Channel</h2>
                    </div>
                    <span class="b-line l-left line-h"></span>
                </div>
                <div class="row">
                    <?php foreach ($channel as $key => $value) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <iframe width="100%" height="250px" src="<?= $value->link_channel ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius:10px"></iframe>
                                </div>
                                <div class="blog__item__text">
                                    <h5 class="text-center"><a href="<?= $value->link_channel ?>" target="_blank"><?= substr(strip_tags($value->judul_channel), 0, 100) ?></a></h5>
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