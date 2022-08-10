<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Data Sarana & Prasarana</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 

              //notifikasi gagal upload gambar
              if (isset($error_upload)) {
                echo ('<div class="alert alert-danger alert-dismissable ">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$error_upload.'</div>');
               }
               //validasi data tidak boleh kosong//
               echo validation_errors('<div class="alert alert-danger alert-dismissable ">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

              echo form_open_multipart('sapras/add'); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Sarana & Prasarana <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "nama_sapras" required="required" placeholder="Nama Sarana & Prasarana" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Sarana & Prasarana <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "deskripsi_sapras" required="required" placeholder="Deskripsi Sarana & Prasarana" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Foto Sarana & Prasarana</label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" type="file" name="foto_sapras">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('sapras')?>" role="button">Cancel</a>

                </div>
            </div>

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>