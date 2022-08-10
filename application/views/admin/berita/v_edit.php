<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Artikel</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 
              echo form_open_multipart('berita/edit/'.$berita->id_berita); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Artikel<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "jdl_berita" required="required" value="<?= $berita->jdl_berita ?>" placeholder="Judul Artikel" class="form-control ">
                </div>
            </div>
            
            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"> <span class="required"></span>
                </label>
            <div class="col-md-6 col-sm-6 ">
            <img src="<?= base_url('gambar/'.$berita->gambar_berita) ?>" width ="120px">
            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Foto Artikel</label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" type="file" name="gambar_berita">
                </div>
            </div>


            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Artikel<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea name="isi_berita" class="form-control" id="editor" cols="30" rows="10"><?= $berita->isi_berita ?></textarea>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('berita')?>" role="button">Cancel</a>
                </div>
            </div>

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>