<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Pengurus</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 
              echo form_open_multipart('pengurus/edit/'.$pengurus->id_pengurus); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pengurus <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" value ="<?= $pengurus->nama_pengurus?>" name = "nama_pengurus" required="required" placeholder="Nama Pengurus" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"> Jabatan Pengurus <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" value ="<?= $pengurus->jabatan_pengurus?>" name = "jabatan_pengurus" required="required" placeholder="Jabatan Pengurus" class="form-control ">
                </div>
            </div>
            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"> Foto Pengurus <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <img src="<?= base_url('sampul/'.$pengurus->foto_pengurus) ?>" width="100px" alt="">
                    <input type="file" value ="<?= $pengurus->foto_pengurus?>" name = "foto_pengurus" required="required" placeholder="Foto Pengurus" class="form-control ">
                </div>
            </div>



            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('pengurus')?>" role="button">Cancel</a>
                </div>
            </div>

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>