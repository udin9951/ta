<div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah Data Pengurus</h2>
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

                    echo $this->session->flashdata ('error');

                  echo form_open_multipart('pengurus/add'); ?>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pengurus <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" name = "nama_pengurus" required="required" placeholder="Nama Pengurus" class="form-control ">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Type <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control " name="type_pengurus" id="type_pengurus">
                            <option value="">Pilih</option>
                            <option value="Penasihat">Penasihat</option>
                            <option value="Pengurus Harian">Pengurus Harian</option>
                            <option value="Bidang Bidang">Bidang Bidang</option>
                        </select>
                    </div>
                </div>
                <div class="item form-group bidang_pengurus" style="display: none;">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan Bidang <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control " name="type_bidang" id="type_bidang">
                            <option value="">Pilih</option>
                            <option value="Ta'mir dan Dakwah">Ta'mir dan Dakwah</option>
                            <option value="Perlengkapan dan Pemeliharaan">Perlengkapan dan Pemeliharaan</option>
                            <option value="Pendidikan & Kewanitaan">Pendidikan & Kewanitaan</option>
                            <option value="Ambulan & Pemulasaran">Ambulan & Pemulasaran</option>
                            <option value="Remaja Masjid">Remaja Masjid</option>
                        </select>
                    </div>
                </div>

                <div class="item form-group bidang_pengurus" style="display: none;">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Ketua ? <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control " name="bidang_ketua" id="bidang_ketua">
                            <option value="">Pilih</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>

                <div class="item form-group" style="display: none;" id="jabatan_pengurus">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"> Jabatan Pengurus <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control " name="jabatan_pengurus" id="jabatan_pengurus">
                            <option value="">Pilih</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Wakil Bendahara">Wakil Bendahara</option>
                            <option value="Anggota">Anggota</option>
                        </select>
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