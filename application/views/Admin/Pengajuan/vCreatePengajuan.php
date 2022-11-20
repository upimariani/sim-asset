<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengajuan Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan Asset</li>
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
                            Hasil Monitoring Data Asset
                            <small>Masukkan Data Monitoring Asset</small>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php echo form_open_multipart('admin/cpengajuan/create'); ?>
                    <div class="card-body pad">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Asset Hasil Monitoring</label>
                            <select class="form-control" id="monitoring" name="asset">
                                <option value="">--Pilih Asset Monitoring---</option>
                                <?php
                                foreach ($monitoring as $key => $value) {
                                ?>
                                    <option data-tgl="<?= $value->tgl_monitoring ?>" data-faktor="<?= $value->faktor_penyebab ?>" data-hasil="<?= $value->hasil_monitoring ?>" value="<?= $value->id_monitoring ?>"><?= $value->nama_barang ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <?= form_error('asset', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Monitoring</label>
                            <input type="text" class="tgl form-control" id="exampleInputPassword1" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Hasil Monitoring</label>
                            <textarea class="hasil form-control" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" readonly></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Faktor Penyebab</label>
                            <textarea class="faktor form-control" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" readonly></textarea>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Pengajuan Data
                            <small>Masukkan Data Pengajuan Asset</small>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pengajuan</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" name="date" class="form-control">
                            <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Pengajuan</label>
                            <input type="number" name="jml" class="form-control" placeholder="Jumlah Pengajuan">
                            <?= form_error('jml', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>