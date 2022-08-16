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
            <?php
                $urlExport = base_url('sapras/export');  

                $urlCetak = base_url('sapras/cetak');  

                $urlPrint = base_url('sapras/print');  
            ?>
            <a href="<?= base_url('sapras/add'); ?>"class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
            <a href="<?= $urlExport ?>"class="btn btn-success"  target="_BLANK"> <i class="fa-solid fa-file-excel"></i>Export Excel</a>
            <a href="<?= $urlCetak ?>"class="btn btn-warning"  target="_BLANK"> <i class="fa fa-file"></i>Export PDF</a>
            <a href="<?= $urlPrint ?>"class="btn btn-danger" target="_BLANK"> <i class="fa fa-print"></i>Print</a>
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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th> Nama Sarana & Prasarana</th>
                                <th> Deskripsi</th>
                                <th>Foto Sarana & Prasarana</th>
                                <th>User</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($sapras as $key => $value) { ?>
                         
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->nama_sapras?></td>
                                <td><?= $value->deskripsi_sapras?></td>
                                <td class="text-center"> <img src="<?= base_url('sampul/'.$value->foto_sapras) ?>" width="70px" height="50px" > <br> <br>
                                 </td>  
                                 <td><?= $value->nama_user?></td>
                                <td>
                                <a href="<?= base_url('sapras/edit/'.$value->id_sapras)?>" class ="btn btn-xs btn-primary"> <i class="fa fa-pencil"> </i></a>
                                <a href="<?= base_url('sapras/delete/'.$value->id_sapras)?>" onclick="return confirm('Apakah Data Ingin Dihapus..?')" class ="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
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
