<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Jadwal Pengajian</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                echo form_open_multipart('pengajian/edit/' . $pengajian->id_pengajian); ?>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Hari<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" value="<?= $pengajian->hari_pengajian ?>" name="hari_pengajian" required="required" placeholder="Hari" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" value="<?= $pengajian->tgl_pengajian ?>" name="tgl_pengajian" required="required" placeholder="Tanggal" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jam<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="time" value="<?= $pengajian->jam_pengajian ?>" name="jam_pengajian" required="required" placeholder="Jam" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ustad<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select required name="id_penceramah" class="form-control">
                            <option value="">-- Pilih Nama Penceramah --</option>
                            <?php
                            foreach ($penceramah as $key => $value) { ?>
                                <option <?php if ($pengajian->id_penceramah  == $value->id_penceramah) echo 'selected'; ?> value="<?= $value->id_penceramah ?>"><?= $value->nama_penceramah ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class=" item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tema Pengajian<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" value="<?= $pengajian->tema_pengajian ?>" name="tema_pengajian" required="required" placeholder="Tema Pengajian" class="form-control ">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-primary" href="<?= base_url('pengajian')?>" role="button">Cancel</a>
                    </div>
                </div>

                <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>