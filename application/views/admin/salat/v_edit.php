<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Jadwal Salat</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 
              echo form_open_multipart('salat/edit/'.$salat->id_salat); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Salat<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="date" value ="<?= $salat->tgl_salat?>" name = "tgl_salat" required="required" placeholder="Tanggal salat" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Imsak<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->imsak?>" name = "imsak" required="required" placeholder="Imsak" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Subuh<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->subuh?>" name = "subuh" required="required" placeholder="Subuh" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Duha<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->duha?>" name = "duha" required="required" placeholder="Duha" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Zuhur<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->zuhur?>" name = "zuhur" required="required" placeholder="Zuhur" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Asar<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->asar?>" name = "asar" required="required" placeholder="Asar" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Magrib<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->magrib?>" name = "magrib" required="required" placeholder="Magrib" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Isya<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="time" value ="<?= $salat->isya?>" name = "isya" required="required" placeholder="Isya" class="form-control ">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('salat')?>" role="button">Cancel</a>
                </div>
            </div>
            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>