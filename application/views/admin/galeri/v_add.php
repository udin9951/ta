<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Data Galeri</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                     if (isset($error_upload)) {
                        echo ('<div class="alert alert-danger alert-dismissable ">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$error_upload.'</div>');
                       }
                ?>
                <br />                
              <?php 
              echo form_open_multipart('galeri/add'); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Galeri<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "judul_galeri" required="required" placeholder="Judul Galeri" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Galeri<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="date" name = "tgl_galeri" required="required" placeholder="Tanggal Galeri" class="form-control ">
                </div>
            </div>

           <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Foto Galeri<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="file" name = "foto_galeri" required="required" placeholder="Foto Galeri" class="form-control ">
            </div>
        </div>
    
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Galeri<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "deskripsi_galeri" required="required" placeholder="Deskripsi Galeri" class="form-control ">
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('galeri')?>" role="button">Cancel</a>
                </div>
            </div>


            </div>
            

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>