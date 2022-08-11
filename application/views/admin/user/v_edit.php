<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data User</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
              <?php 
              echo form_open_multipart('user/edit/'.$user->id_user); ?>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama User<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "nama_user"  value="<?= $user->nama_user ?>"  required placeholder="Nama User" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Username<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" name = "username"  value="<?= $user->username ?>"  required placeholder="Username" class="form-control ">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="password" name = "password"  value="" placeholder="Password" class="form-control">
                </div>
            </div>
            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Level<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <select class="form-control" name="level" id="level" required>
                    <option value="">Pilih</option>
                    <option value="1" <?= $user->level == 1 ? "selected" : "" ?>>Super Admin</option>
                    <option value="2" <?= $user->level == 2 ? "selected" : "" ?>>Admin</option>
                    <option value="3" <?= $user->level == 3 ? "selected" : "" ?>>Sekertaris</option>
                    <option value="4" <?= $user->level == 4 ? "selected" : "" ?>>Bendahara</option>
                </select>
                </div>
            </div>


            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"> <span class="required"></span>
                </label>
            <div class="col-md-6 col-sm-6 ">
            <img src="<?= base_url('gambar/'.$user->foto_user) ?>" width ="120px">
            </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Foto User</label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" type="file" name="foto_user">
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