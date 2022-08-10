 <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul class="header__top__widget">
                            <li>Sistem Informasi Masjid Al-Barqah</li> 
                            <!--<span class="icon_pin_alt"></span> 
                                icon pin icon_phone = hape-->
                            <li><a class="btn btn-dark" href="<?= base_url('login')?>">login</a></li> 
                          <!--  <li><blockquote class="btn btn-dark">login</blockquote> </li> 
                            jd gonol ke bwh blockqoute, span kecil
                          -->
                        </ul>                               
                    </div>
                </div>
            </div>
        </div>

        <div class="header__nav__option">
            <div class="container"> <!--hitam full dan mengerucut tengah-->
                <div class="row">
                    <!-- <div class="col-lg-1">ukuran gmbr 1 jd kcl 2 tegonol
                        <div class="header__logo">
                           <a href="./index.html"><img src="<?= base_url() ?>template/front-end/img/logo.png" width ="100px"  alt=""></a> 
                        </div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="header__nav">
                            <nav class="header__menu">
                                <ul class="menu__class">
                                    <li class="active"><a href="<?= base_url()?>">Home</a></li>
                                    <li><a href="#">Tentang</a>
                                        <ul class="dropdown">
                                            <li><a href="<?= base_url('home/profil') ?>">Profil</a></li>
                                            <li><a href="<?= base_url('home/pengurus') ?>">Susunan Kepengurusan</a></li>
                                            <li><a href="<?= base_url('home/sapras') ?>">Sarana & Prasarana</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Agenda</a>
                                        <ul class="dropdown">
                                            <li><a href="<?= base_url('home/kegiatan') ?>">Jadwal Kegiatan</a></li>
                                            <li><a href="<?= base_url('home/pengajian') ?>">Jadwal Pengajian</a></li>
                                            <li><a href="<?= base_url('home/salat') ?>">Jadwal Salat</a></li>
                                            <li><a href="<?= base_url('home/soljum') ?>">Jadwal Salat Jumat</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('home/galeri') ?>">Galeri</a></li>
                                    <li><a href="<?= base_url('home/channel') ?>">Al-Barqah Channel</a></li>
                                    <li><a href="<?= base_url('home/berita') ?>">Artikel</a></li>
                                    <li><a href="<?= base_url('home/rekap') ?>">Kas Masjid</a></li>
                                    <li><a href="<?= base_url('home/contact') ?>">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="canvas__open">
                    <span class="fa fa-bars"></span>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End --> 