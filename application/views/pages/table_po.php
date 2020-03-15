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
        <?php if ($user_level == 1 || $user_level == 2) {
        ?>
            <a class="btn btn-xs btn-primary" href="<?= base_url() . '/data_list/tambahPO'; ?>">Tambah PO</a>
        <?php
        }
        ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <?php if ($this->session->flashdata()) : ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Data Barang <strong>Berhasil!</strong> <?= $this->session->flashdata('flash') ?>.
                            </div>
                        <?php endif; ?>
                        <table class="table table-stripped table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID PO</th>
                                    <th>Nama User</th>
                                    <th>Nomer PO</th>
                                    <th>Tanggal Buat</th>
                                    <th>Tanggal Approve</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = '1' ?>
                                <?php foreach ($DataPO as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['id_po'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['no_po'] ?></td>
                                        <td><?= $data['tanggal_buat'] ?></td>
                                        <td><?= $data['tanggal_approve'] ?> WIB</td>
                                        <td><?= $data['status'] ?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-xs btn-primary" href="<?php echo site_url(); ?>data_list/detail/<?= $data['id_po'] ?>"><span class="fa fa-eye"></span> Detail</a>
                                                <a class="btn btn-warning btn-xs" href="<?php echo site_url(); ?>/edit/EditPO/<?= $data['id_po'] ?>"><span class="fa fa-pencil"></span> Edit</a>
                                                <?php if ($data['status'] == 'pending') {
                                                ?>
                                                    <a class="btn btn-xs btn-danger" onClick="return confirm('Apakah anda yakin data ini akan di hapus secara permanen?');" href="<?php echo site_url(); ?>data_list/delete/<?= $data['id_po'] ?>"><span class="fa fa-close"></span> Hapus</a>
                                                <?php
                                                } ?>
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