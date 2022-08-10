<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Video</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <?php
                echo form_open_multipart('channel/edit/' . $channel->id_channel); ?>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Video<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="judul_channel" required="required" value="<?= $channel->judul_channel ?>" placeholder="Judul Video" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Link Video<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="link_channel" required="required" value="<?= $channel->link_channel ?>" placeholder="Contoh : https://www.youtube.com/embed/UpYx7F14oxo" class="form-control ">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-primary" href="<?= base_url('channel')?>" role="button">Cancel</a>
                    </div>
                </div>

                <?php echo form_close();  ?>
            </div>
        </div>
    </div>
</div>
</div>