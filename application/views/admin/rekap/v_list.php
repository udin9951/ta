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
                                        <label for="date">Tanggal Mulai</label>
                                        <input class="form-control" type="date" name="filter" id="date-filter" value="<?= !empty($filter) ? $filter : "" ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Tanggal Selesai</label>
                                        <input class="form-control" type="date" name="end" id="date-filter" value="<?= !empty($end) ? $end : "" ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Jenis</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Pilih</option>
                                            <option value="Masuk" <?= $type == "Masuk" ? "selected" : "" ?>>Masuk</option>
                                            <option value="Keluar" <?= $type == "Keluar" ? "selected" : "" ?>>Keluar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        <?php 
                        
                        $urlExport = base_url('rekap/export');  
                        if(!empty($filter))
                        {
                            $urlExport = base_url('rekap/export/'.$filter);
                        }
        
                        $urlCetak = base_url('rekap/cetak');  
                        if(!empty($filter))
                        {
                            $urlCetak = base_url('rekap/cetak/'.$filter);
                        }
                        
                        $urlPrint = base_url('rekap/print');  
                        if(!empty($filter))
                        {
                            $urlPrint = base_url('rekap/print/'.$filter);
                        }

                        echo form_close(); ?>
                        <hr>
                            <a href="<?= $urlExport ?>"class="btn btn-success" target="_BLANK"> <i class="fa-solid fa-file-excel"></i>Export Excel</a>
                            <a href="<?= $urlCetak ?>"class="btn btn-warning"  target="_BLANK"> <i class="fa fa-file"></i>Export PDF</a>
                            <a href="<?= $urlPrint ?>"class="btn btn-danger" target="_BLANK"> <i class="fa fa-print"></i>Print</a>
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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Jenis Kas</th>
                                <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($rekap as $key => $value) { 
                                $date = DateTime::createFromFormat('Y-m-d', $value->tgl_kas)->format('d-m-Y');
                                ?>
                         
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $date?></td>
                                <td><?= $value->uraian_kas?></td>
                                <td><?= $value->jenis_kas?></td>
                                <?php
                                    if($value->kas_masuk != 0)
                                    {
                                        echo "<td>"."Rp. ".number_format($value->kas_masuk,0,',','.')."</td>";
                                    }
                                    else
                                    {
                                        echo "<td>"."Rp. ".number_format($value->kas_keluar,0,',','.')."</td>";
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
