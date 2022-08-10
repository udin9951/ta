<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
        <h2><?= $title ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>   
        </ul>
        <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <div class="row">
                    <!-- atas rekap -->
                    <div class="alert alert-info alert-dismissible">
                        <h5>
                            <i class="icon fa fa-info"></i> Saldo Kas Masjid</h5>
                        <h5>Pemasukan :
                        <?= "Rp " . number_format($total_kas_masuk->kas_masuk,2,',','.'); ?></h5>

                        <h5>Pengeluaran :
                        <?= "Rp " . number_format($total_kas_keluar->kas_keluar,2,',','.'); ?></h5>
                        <hr>

                        <h3>Saldo Akhir :
                        <?= "Rp " . number_format(($total_kas_masuk->kas_masuk - $total_kas_keluar->kas_keluar),2,',','.'); ?></h3>
                    </div>

                    <div class="col-sm-12">
                        <hr>
                        <?php echo form_open_multipart('rekap/index'); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Filter By Date</label>
                                        <input class="form-control" type="month" name="filter" id="date-filter" value="<?= !empty($filter) ? $filter : "" ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Type</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Choose One</option>
                                            <option value="Masuk" <?= $type == "Masuk" ? "selected" : "" ?>>Masuk</option>
                                            <option value="Keluar" <?= $type == "Keluar" ? "selected" : "" ?>>Keluar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        <?php echo form_close(); ?>
                        <hr>
                    <div class="card-box table-responsive">
                        <?php
                                if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>';
                            echo $this->session->flashdata ('pesan');
                            echo '</div>';
                        }
                        ?>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Jenis Kas</th>
                                <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($rekap as $key => $value) { ?>
                         
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->tgl_kas?></td>
                                <td><?= $value->uraian_kas?></td>
                                <td><?= $value->jenis_kas?></td>
                                <?php
                                    if($value->kas_masuk != 0)
                                    {
                                        echo "<td>".$value->kas_masuk."</td>";
                                    }
                                    else
                                    {
                                        echo "<td>".$value->kas_keluar."</td>";
                                    }
                                ?>
                            </tr>
                        <?php } ?>
                            </tbody>
                            </table>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
