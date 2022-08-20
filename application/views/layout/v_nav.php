 <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top mt-3 mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            Sistem Informasi Masjid Al-Barqah
                            <a class="btn btn-success float-right" href="<?= base_url('login')?>">login</a> 
                    </div>
                </div>
            </div>
        </div>
 <?php $uri = $this->uri->segment('2'); ?>
        <div class="header__nav__option" style="background-color: #008000;">
            <div class="container"> <!--hitam full dan mengerucut tengah-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__nav">
                            <nav class="header__menu">
                                <ul class="menu__class">
                                    <li class="<?= $uri == ""  ? "active" :""  ?>"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="<?= in_array($uri, ['tentang','profil','pengurus','sapras'])  ? "active" :""  ?>"><a href="#">Tentang</a>
                                        <ul class="dropdown" style="background: #ffe000ed;">
                                            <li><a href="<?= base_url('home/profil') ?>">Profil</a></li>
                                            <li><a href="<?= base_url('home/pengurus') ?>">Susunan Kepengurusan</a></li>
                                            <li><a href="<?= base_url('home/sapras') ?>">Sarana & Prasarana</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= in_array($uri, ['kegiatan','pengajian','salat','soljum'])  ? "active" :""  ?>"><a href="#">Agenda</a>
                                        <ul class="dropdown" style="background: #ffe000ed;">
                                            <li><a href="<?= base_url('home/kegiatan') ?>">Jadwal Kegiatan</a></li>
                                            <li><a href="<?= base_url('home/pengajian') ?>">Jadwal Pengajian</a></li>
                                            <li><a href="<?= base_url('home/soljum') ?>">Jadwal Salat Jumat</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= $uri == "galeri"  ? "active" :""  ?>"><a href="<?= base_url('home/galeri') ?>">Galeri</a></li>
                                    <li class="<?= $uri == "channel"  ? "active" :""  ?>"><a href="<?= base_url('home/channel') ?>">Al-Barqah Channel</a></li>
                                    <li class="<?= $uri == "berita"  ? "active" :""  ?>"><a href="<?= base_url('home/berita') ?>">Artikel</a></li>
                                    <li class="<?= in_array($uri, ['rekap','laporan'])  ? "active" :""  ?>"><a href="#">Kas Masjid</a>
                                        <ul class="dropdown" style="background: #ffe000ed;">
                                            <li><a href="<?= base_url('home/rekap') ?>">Kas Infaq Senin Kamis</a></li>
                                            <li><a href="<?= base_url('home/laporan') ?>">Laporan Keuangan Masjid</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= $uri == "contact"  ? "active" :""  ?>"><a href="<?= base_url('home/contact') ?>">Kontak</a></li>
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