<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><span>SIMA BARQAH</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php
                  $username = $this->session->userdata('username');
                  $url = file_exists(FCPATH.'/gambar/'. $this->session->userdata('foto')) ? base_url('gambar/'. $this->session->userdata('foto')) : "https://via.placeholder.com/300x300.png/001177?text=$username"; ?>
                <img src="<?= $url;?>" alt="..." class="img-circle profile_img">
              </div>
                <div class="profile_info mt-3">
                  <h2> <?= $this->session->userdata('nama_user');?></h2>
                </div>
            </div>

            
            <!-- /menu profile quick info -->

            <br />