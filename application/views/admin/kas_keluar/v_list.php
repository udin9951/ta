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
            <div class="alert alert-primary alert-dismissible">
                <h5>
                <i class="fa fa-info"></i> Total Pengeluaran Masjid</h5>
                <h2><?= "Rp " . number_format($total_kas_keluar->kas_keluar,2,',','.'); ?></h2>
            </div>
            <a href="<?= base_url('kas_keluar/add'); ?>"class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah Data</a>
            <div class="x_content">
                <div class="row">
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
                                <th>Jumlah Pengeluaran</th>
                                <th>User</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($kas_keluar as $key => $value) { ?>
                         
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->tgl_kas?></td>
                                <td><?= $value->uraian_kas?></td>
                                <td><?= $value->kas_keluar?></td>
                                <td><?= $value->nama_user?></td>

                                <td>
                                <a href="<?= base_url('kas_keluar/edit/'.$value->id_kas)?>" class ="btn btn-xs btn-primary"> <i class="fa fa-pencil"> </i></a>
                                <a href="<?= base_url('kas_keluar/delete/'.$value->id_kas)?>" onclick="return confirm('Apakah Data Ingin Dihapus..?')" class ="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
                                </td>
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
