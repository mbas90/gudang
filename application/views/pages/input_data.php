<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-pencil"></i> Input Data Barang</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <?php if ($this->session->flashdata()) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Data Barang <strong>Berhasil!</strong> <?= $this->session->flashdata('flash') ?>.
                </div>
              <?php endif; ?>

              <?= form_open('input/prosesInput') ?>
              <div class="row">
                <div class="form-group">
                  <label class="control-label">
                    <h3>Kode Barang</h3>
                  </label>
                  <input type="text" placeholder="Write here.." class="form-control input-lg" name="kode_barang" autocomplete="off" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label class="control-label">
                    <h3>Jenis Barang</h3>
                  </label>
                  <select class="form-control input-lg" name="jenis_barang">
                    <option>--Pilih--</option>
                    <option value="Motor">Motor</option>
                    <option value="Mobil">Mobil</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label class="control-label">
                    <h3>Keterangan</h3>
                  </label>
                  <textarea class="form-control" rows="6" name="keterangan"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <br>
                  <center><button class="btn btn-primary btn-lg" name="upload">Simpan</button></center>
                </div>
              </div>
              <input type="hidden" name="tanggal" value="<?= date('d-M-Y') ?>">
              <input type="hidden" name="barang_masuk" value="<?= date('H:i:s') ?>">
              <input type="hidden" name="barang_keluar" value="">
              <input type="hidden" name="status" value="masuk">
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->