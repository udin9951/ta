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
            
            <a href="<?= base_url('galeri/add'); ?>"class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
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
                                <th>Judul Galeri</th>
                                <th>Tanggal Galeri</th>
                                <th>Foto Galeri</th>
                                 <th>Deskripsi Galeri</th>
                                 <th>User</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($galeri as $key => $value) {
                                    $date = DateTime::createFromFormat('Y-m-d', $value->tgl_galeri)->format('d-m-Y');
                                ?>
                         
                            <tr>	
                                <td><?= $no++; ?></td>
                                <td><?= $value->judul_galeri?></td>
                                <td><?= $date?></td>
                                <td> <img src="<?= base_url('sampul/'. $value->foto_galeri) ?>" width="150px"> </td>
                                <td><?= $value->deskripsi_galeri?></td>
                                <td><?= $value->nama_user?></td>
                                <td>
                                <a href="<?= base_url('galeri/edit/'.$value->id_galeri)?>" class ="btn btn-xs btn-primary"> <i class="fa fa-pencil"> </i></a>
                                <a href="<?= base_url('galeri/delete/'.$value->id_galeri)?>" onclick="return confirm('Apakah Data Ingin Dihapus..?')" class ="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
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
