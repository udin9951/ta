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
            
            <a href="<?= base_url('salat/add'); ?>"class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah Data</a>
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
                                <th class="text-center">Tanggal Salat</th>
                                <th class="text-center">Imsak</th>
                                <th class="text-center">Subuh</th>
                                <th class="text-center">Duha</th>
                                <th class="text-center">Zuhur</th>
                                <th class="text-center">Asar</th>
                                <th class="text-center">Magrib</th>
                                <th class="text-center">Isya</th>
                                <th class="text-center">User</th>                      
                               <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                              
                            <?php $no=1; foreach ($salat as $key => $value) { ?>
                         
                            <tr>    
                                <td><?= $no++; ?></td>
                                <td><?= $value->tgl_salat?> </td>
                                <td><?= $value->imsak?> </td>
                                <td><?= $value->subuh?> </td>
                                <td><?= $value->duha?> </td>
                                <td><?= $value->zuhur?> </td>
                                <td><?= $value->asar?> </td>
                                <td><?= $value->magrib?> </td>
                                <td><?= $value->isya?> </td>
                                <td><?= $value->nama_user?> </td>
                                <td>
                                <a href="<?= base_url('salat/edit/'.$value->id_salat)?>" class ="btn btn-xs btn-primary"> <i class="fa fa-pencil"> </i></a>
                                <a href="<?= base_url('salat/delete/'.$value->id_salat)?>" onclick="return confirm('Apakah Data Ingin Dihapus..?')" class ="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
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
