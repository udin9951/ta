<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Data Jadwal Kegiatan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 
              echo form_open_multipart('kegiatan/add'); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kegiatan<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "nama_kegiatan" required="required" placeholder="Nama Kegiatan" class="form-control ">
                </div>
            </div>
             <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Hari Kegiatan<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "hari_kegiatan" required="required" placeholder="Hari Kegiatan" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Kegiatan<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="date" name = "tgl_kegiatan" required="required" placeholder="Tanggal Kegiatan" class="form-control ">
                </div>
            </div>
             <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jam Kegiatan<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" name = "jam_kegiatan" required="required" placeholder="Jam Kegiatan" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Lokasi Kegiatan<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "lokasi_kegiatan" required="required" placeholder="Lokasi Kegiatan" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Kegiatan<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "deskripsi_kegiatan" required="required" placeholder="Deskripsi Kegiatan" class="form-control ">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('kegiatan')?>" role="button">Cancel</a>
                </div>
            </div>

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>