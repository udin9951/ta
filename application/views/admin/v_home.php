<!-- page content -->
<div role="main">
          <div class="">
            <div class="page-title">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="alert alert-primary alert-dismissible">
                          <h5>
                          <i class="fa fa-info"></i> Total Pemasukan Masjid</h5>
                          <h2><b><?= "Rp " . number_format($total_kas_masuk->kas_masuk,2,',','.'); ?></b></h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="alert alert-warning alert-dismissible">
                          <h5>
                          <i class="fa fa-warning"></i> Total Pengeluaran Masjid</h5>
                          <h2><b><?= "Rp " . number_format($total_kas_keluar->kas_keluar,2,',','.'); ?></b></h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="alert alert-success alert-dismissible">
                          <h5>
                          <i class="fa fa-info"></i> Total Pemasukan Masjid</h5>
                          <h2><b><?= "Rp " . number_format($total_kas_masuk->kas_masuk - $total_kas_keluar->kas_keluar,2,',','.'); ?></b></h2>
                      </div>
                    </div>
                  </div>
                </div>

              </div>






                <!-- <h3>Fixed Sidebar <small>  <strong></strong></small></h3> -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

