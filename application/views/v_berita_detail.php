

    <!-- Blog Post Section -->
  <section class="padding ptb-xs-40">
    <div class="container">
      <div class="row"> 
        <!-- Post Bar -->
        <div class="col-lg-9 blog-post-hr post-section">
          <div class="blog-post mb-30">
            <div class="post-meta">
              <div class="post-more-link pull-right">
               
                <a class="btn-text xs-hidden"> <i class="ion-android-share-alt"></i></a> </div>
            </div>
            <div class="post-header">
              <h2><?= $berita->jdl_berita ?></h2>
            </div>
            <div class="post-media"> <img src="<?= base_url('gambar/'.$berita->gambar_berita ) ?>" alt=""></div>
            <div class="post-entry">
              <p><?= $berita->isi_berita ?></p>
             
            </div>
          </div>
          <hr />
     
          <div class="clearfix"></div>
        </div>
        <!-- End Post Bar --> 
        
      </div>
    </div>
  </section>
  <!-- End Blog Post Section --> 