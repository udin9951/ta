<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Data Jadwal Khotib Salat Jumat</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                echo form_open_multipart('soljum/add'); ?>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" name="tgl_soljum" required="required" placeholder="Tanggal Salat Jumat" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ustad<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select required name="id_imam" class="form-control">
                            <option value="">-- Pilih Nama Ustad --</option>
                            <?php
                            foreach ($imam as $key => $value) {
                                echo "<option value='" . $value->id_imam . "'>" . $value->nama_imam . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-primary" href="<?= base_url('soljum')?>" role="button">Cancel</a>
                    </div>
                </div>

                <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>