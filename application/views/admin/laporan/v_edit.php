<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Lporan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 
              echo form_open_multipart('laporan/edit/'.$laporan->id); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Periode<span class="required"></span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="month" name="periode" value="<?= $laporan->periode ?>"  required placeholder="Periode" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"> <span class="required"></span>
                </label>
            <div class="col-md-6 col-sm-6 ">
            <img src="<?= base_url('gambar/'.$laporan->foto_laporan) ?>" width ="120px">
            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Foto Periode</label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" type="file" name="foto_laporan">
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('user')?>" role="button">Cancel</a>
                </div>
            </div>

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>