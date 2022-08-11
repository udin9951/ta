 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
				<h3>General</h3>
        
            <ul class="nav side-menu">
              <li><a href="<?= base_url('admin')?>"><i class="fa fa-home"></i> Dashboard <span class="label label-success pull-right"></span></a></li>
              <?php
                if($this->session->userdata('level') != 4)
                {

              ?>
              <li><a><i class="fa fa-user"></i>Tentang<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('pengurus')?>">Susunan Kepengurusan</a></li>
                  <li><a href="<?= base_url('sapras')?>">Sarana & Prasarana</a></li>  
                </ul>
              </li>       
              <li><a><i class="fa fa-calendar-check-o"></i>Agenda<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('kegiatan')?>">Jadwal Kegiatan</a></li>
                  <li><a href="<?= base_url('salat')?>">Jadwal Salat</a></li>  
                  <li><a href="<?= base_url('soljum')?>">Jadwal Salat Jumat</a></li>  
                  <li><a href="<?= base_url('pengajian')?>">Jadwal Pengajian</a></li>  
                  <li><a href="<?= base_url('imam')?>">Data Imam</a></li>  
                  <li><a href="<?= base_url('penceramah')?>">Data Penceramah</a></li>  
                </ul>
              </li>       

              <?php
                }
                if($this->session->userdata('level') != 3)
                {

              ?>
              <li><a><i class="fa fa-camera"></i>Media<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('galeri')?>">Galeri</a></li>
                  <li><a href="<?= base_url('channel')?>">Channel</a></li>    
                </ul>
              </li>
              <li><a href="<?= base_url('berita')?>"><i class="fa fa-newspaper-o"></i>Artikel<span class="label label-success pull-right"></span></a></li> 

              <?php
                }
                if(in_array($this->session->userdata('level'), [1,4] ))
                {

              ?>
              <li><a><i class="fa fa-book"></i>Kas Masjid<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('kas_masuk')?>">Kas Masuk</a></li>
                  <li><a href="<?= base_url('kas_keluar')?>">Kas Keluar</a></li>  
                  <li><a href="<?= base_url('rekap')?>">Rekap Kas Masjid</a></li>  
                </ul>
              </li> 

              <?php 
                }
                if($this->session->userdata('level') == 1)
                {
              ?>
              <li><a href="<?= base_url('user')?>"><i class="fa fa-users"></i>Users<span class="label label-success pull-right"></span></a></li>
              <?php 
                }
              ?>
            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->
      </div>
		</div>
		
		<!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('nama_user');?> <b></b>
                      <!-- <img src="<?= base_url() ?>template/back-end/production/images/img.jpg" alt="">John Doe -->
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <!--   <a class="dropdown-item"  href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a> -->
                      <a class="dropdown-item"  href="<?= base_url('home')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3><?= $title ?></h3>
        </div>
    </div>
    </div>