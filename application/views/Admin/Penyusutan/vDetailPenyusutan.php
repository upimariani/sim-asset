<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penyusutan Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penyusutan Asset</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data Asset
                            <small>Informasi Asset</small>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <table class="table">
                        <tr>
                            <th>Kode Asset</th>
                            <td><?= $detail['asset']->kode_asset ?></td>
                        </tr>
                        <tr>
                            <th>Nama Asset</th>
                            <td><?= $detail['asset']->nama_barang ?>, <?= $detail['asset']->merk ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Peroleh</th>
                            <td><?= $detail['asset']->tgl_peroleh ?></td>
                        </tr>
                        <tr>
                            <th>Harga Asset</th>
                            <td>Rp. <?= number_format($detail['asset']->harga_asset)  ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Penyusutan Asset</h3>
                    </div>

                    <?php
                    //PENGECEKAN STATUS ASSET DIHAPUSKAN
                    $cek_hapus = $this->mPenyusutan->cek_status_hapus($detail['asset']->id_asset);
                    if (!$cek_hapus) {
                    ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-level-down-alt"></i> Penyusutan Harga Asset</button>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Jumlah Kurang</th>
                                    <th>Total Akhir</th>
                                    <th>Status Asset</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total = 0;
                                foreach ($detail['penyusutan'] as $key => $value) {
                                    $total += $value->min_harga
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>Rp. <?= number_format($value->min_harga) ?></td>
                                        <td>Rp. <?= number_format($value->harga_asset - $total)  ?></td>
                                        <td><?php if ($value->status_asset == '0') {
                                            ?>
                                                <span class="badge badge-success">Masih Berjalan</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger">Asset Dihapuskan</span>
                                            <?php
                                            } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/cpenyusutan/create/' . $detail['asset']->id_asset) ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Penyusutan Asset</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Minus (Harga)</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Minus Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan Penyusutan</label>
                        <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" placeholder="Keterangan Penyusutan" required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="hapus" value="1"> <label for="exampleInputEmail1">Apakah Asset akan dihapuskan?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->