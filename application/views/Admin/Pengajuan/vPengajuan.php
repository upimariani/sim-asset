<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php
        } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <a href="<?= base_url('Admin/cPengajuan/create') ?>" class="btn btn-default mb-3">
                        <i class="fas fa-list"></i> Tambah Data Pengajuan Asset
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengajuan Asset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center">Nama Barang Pengajuan</th>
                                        <th class="text-center">Total Pengajuan</th>
                                        <th class="text-center">Status Pengajuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengajuan as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->tgl_pengajuan ?></td>
                                            <td><?= $value->nama_barang ?></td>
                                            <td><?= $value->total_pengajuan ?></td>
                                            <td class="text-center"><?php if ($value->status_pengajuan == '0') {
                                                                    ?>
                                                    <span class="badge badge-warning">Menunggu Konfirmasi Kepala Desa</span>
                                                <?php
                                                                    } else if ($value->status_pengajuan == '1') {
                                                ?>
                                                    <span class="badge badge-info">Asset Keputusan</span>
                                                <?php
                                                                    } else if ($value->status_pengajuan == '2') {
                                                ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-danger">Ditolak!</span>
                                                <?php
                                                                    } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($value->status_pengajuan == '2') {
                                                ?>
                                                    <button type="button" data-toggle="modal" data-target="#detail<?= $value->id_pengajuan ?>" class="btn btn-info"><i class="fas fa-info"></i></button>
                                                <?php
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center">Nama Barang Pengajuan</th>
                                        <th class="text-center">Total Pengajuan</th>
                                        <th class="text-center">Status Pengajuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
foreach ($detail as $key => $value) {
?>
    <div class="modal fade" id="detail<?= $value->id_pengajuan ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('kepaladesa/ckeputusan/asset_keputusan/' . $value->id_pengajuan) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Asset Keputusan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Informasi Keputusan Asset</p>
                        <strong><?= $value->tgl_kep ?></strong>
                        <h5><?= $value->nama_asset_kep ?></h5>
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
<?php
}
?>