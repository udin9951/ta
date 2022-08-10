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
            
            <a href="<?= base_url('berita/add'); ?>"class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah Data</a>
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
                                <th>Judul Artikel</th>
                                <th>Slug Artikel</th>
                                <th>Tanggal Artikel</th>						
                                <th>Nama User</th>
                                <th>Foto</th>									
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($berita as $key => $value) { ?>
                         
                            <tr>	
                                <td><?= $no++; ?></td>
                                <td><?= $value->jdl_berita ?></td>
                                <td><?= $value->slug_berita ?></td>
                                <td><?= $value->tgl_berita ?></td>
                                <td><?= $value->nama_user ?></td>
                                <td> <img src="<?= base_url('gambar/'. $value->gambar_berita) ?>" width="150px"> </td>	
                                <td>
                                <a href="<?= base_url('berita/edit/'.$value->id_berita)?>" class ="btn btn-xs btn-primary"> <i class="fa fa-pencil"> </i></a>
                                <a href="<?= base_url('berita/delete/'.$value->id_berita)?>" onclick="return confirm('Apakah Data Ingin Dihapus..?')" class ="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
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