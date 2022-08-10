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
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5>
        <i class="icon fa fa-info"></i> Saldo Kas Masjid</h5>
    <h5>Pemasukan :
        Rp 3.600.000,00 </h5>

    <h5>Pengeluaran :
        Rp 245.000,00   </h5>
    <hr>

    <h3>Saldo Akhir :
        Rp 3.355.000,00 </h3>
</div>

                    <div class="col-sm-12">
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
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($rekap as $key => $value) { ?>
                         
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->tgl_kas?></td>
                                <td><?= $value->uraian_kas?></td>
                                <td><?= $value->kas_masuk?></td>
                                <td><?= $value->kas_keluar?></td>
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
