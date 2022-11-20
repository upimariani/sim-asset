<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Monitoring Asset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Monitoring Asset</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Monitoring Data
                            <small>Masukkan Data Kondisi Asset</small>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php echo form_open_multipart('admin/cmonitoring/create'); ?>
                    <div class="card-body pad">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Data Asset</label>
                            <select class="form-control" name="asset">
                                <option value="">---Pilih Asset---</option>
                                <?php
                                foreach ($asset as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_asset ?>"><?= $value->nama_barang ?> | <?= $value->merk ?> | <?= $value->alamat_lengkap ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <?= form_error('asset', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Monitoring</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" name="date" class="form-control" id="exampleInputPassword1" placeholder="Asal Usul">
                            <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Hasil Monitoring</label>
                            <textarea class="textarea" name="hasil" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <?= form_error('hasil', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar Kondisi Monitoring</label>
                            <input type="file" name="gambar" class="form-control" id="exampleInputPassword1" placeholder="Asal Usul" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Faktor Penyebab</label>
                            <textarea class="textarea" name="faktor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <?= form_error('faktor', '<small class="text-danger pl-3">', '</small>'); ?>

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