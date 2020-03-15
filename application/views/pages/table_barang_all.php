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
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <?php if ($this->session->flashdata()) : ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Data Barang<strong>Berhasil!</strong> <?= $this->session->flashdata('flash') ?>.
              </div>
            <?php endif; ?>
            <table class="table table-stripped table-bordered" id="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode barang</th>
                  <th>Jenis barang</th>
                  <th>Tanggal</th>
                  <th>Barang Masuk</th>
                  <th>Barang Keluar</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = '1' ?>
                <?php foreach ($DataBarangMasuk as $data) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['kode_barang'] ?></td>
                    <td><?= $data['jenis_barang'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['barang_masuk'] ?> WIB</td>
                    <td>
                      <?php if (empty($data['barang_keluar'])) {
                        echo "";
                      } else {
                        echo "" . $data['barang_keluar'] . " WIB";
                      }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php if ($data['status'] == 'Masuk') {
                        echo "<span class='label label-success'>" . $data['status'] . "</span>";
                      } else {
                        echo "<span class='label label-danger'>" . $data['status'] . "</span>";
                      }
                      ?>
                    </td>
                    <td>
                      <center>
                        <!-- <a class="btn btn-primary btn-xs" href="<?php echo site_url(); ?>data_list/detail/<?= $data['id_barang'] ?>"><span class="fa fa-eye"></span> Detail</a> -->
                        <a class="btn btn-warning btn-xs" href="<?php echo site_url(); ?>data_list/edit/<?= $data['id_barang'] ?>"><span class="fa fa-pencil"></span> Edit</a>
                        <a class="btn btn-danger btn-xs" onClick="return confirm('Apakah anda yakin data ini akan di hapus secara permanen?');" href="<?php echo site_url(); ?>data_list/delete/<?= $data['id_barang'] ?>"><span class="fa fa-close"></span> Delete</a>
                      </center>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->