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
        <!-- <?php var_dump($databyid) ?> -->
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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php if ($this->session->flashdata()) : ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Data PO <strong>Berhasil!</strong> <?= $this->session->flashdata('flash') ?>.
                                </div>
                            <?php endif; ?>

                            <?= form_open('input/prosesEdit') ?>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h3>ID PO</h3>
                                    </label>
                                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="id_po" autocomplete="off" value="<?= $databyid['id_po'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h3>Nama</h3>
                                    </label>
                                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="id_user" autocomplete="off" value="<?= $databyid['nama'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h3>No PO</h3>
                                    </label>
                                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="no_po" autocomplete="off" value="<?= $databyid['no_po'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h3>Tanggal Buat </h3>
                                    </label>
                                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="tanggal_buat" autocomplete="off" value="<?= $databyid['tanggal_buat'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h3>Tanggal Approve </h3>
                                    </label>
                                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="tanggal_approve" autocomplete="off" value="<?= $databyid['tanggal_approve'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h3>Status</h3>
                                    </label>
                                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="status" autocomplete="off" value="<?= $databyid['status'] ?>" required readonly>
                                </div>
                            </div>
                            <?php if ($databyid['status'] == 'pending') {
                            ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <center><a href="<?php echo base_url('edit/approvepo/' . $databyid['id_po']) ?> " class=" btn btn-primary btn-lg" name="upload">Approve</a></center>
                                    </div>
                                </div> <?php
                                    } ?>

                            <input type="hidden" name="id_po" value="<?= $databyid['id_po'] ?>">
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