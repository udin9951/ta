<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Data Kas Keluar Masjid</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 

               //validasi data tidak boleh kosong//
               echo validation_errors('<div class="alert alert-danger alert-dismissable ">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

              echo form_open_multipart('kas_keluar/add'); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Kas<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="date" name = "tgl_kas" required="required" placeholder="Tanggal Kas" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Uraian Kas<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "uraian_kas" required="required" placeholder="Uraian Kas" class="form-control ">
                </div>
            </div>

             <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Pengeluaran</label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" type="text" name="kas_keluar" placeholder="Jumlah Pengeluaran" >
                </div>
            </div>
           
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-primary" href="<?= base_url('kas_keluar')?>" role="button">Cancel</a>
                </div>
            </div>

            <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>