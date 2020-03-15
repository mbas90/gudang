<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $title?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-search"></i> Search Data Barang</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
            <div class="box-body">

              <?php if($this->session->flashdata()):?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Data barang <strong>Berhasil!</strong> <?= $this->session->flashdata('flash')?>.
                </div>
              <?php endif; ?>

              <?= form_open('')?>
              <div class="row">
               <div class="col-lg-3"></div>
               <div class="form-group">
                  <div class="col-md-6">
                  <h2 class="text-center">Masukan Kode Barang</h2>
                    <input type="text" placeholder="Write here.." class="form-control input-lg" name="keyword" autocomplete="off">
                    <br>
                    <center><button class="btn btn-primary btn-md" name="cari" type="submit">Cari</button> - <a href="<?= base_url()?>search" class="btn btn-primary btn-md">Clear</a></center>
                  </div>
                </div>
              <div class="col-lg-3"></div>
              </div>
              <?= form_close()?>

              <br>
              <br>

              <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-md-6">
                  <?php if(!empty($barang)){ ?>
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <?php foreach ($barang as $data) :?>
                            <center><h2>Data Barang</h2></center>
                            <table class="table">
                            </table>
                            <?= form_open('search/prosesData')?>
                            <div class="form-group">
                              <div class="col-md-6">
                              <label class="control-label"><h3>Kode Barang</h3></label>
                                <input type="text" placeholder="Write here.." class="form-control" readonly name="kode_Barang" value="<?= $data['kode_barang']?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                              <label class="control-label"><h3>Jenis barang</h3></label>
                                <input type="text" placeholder="Write here.." class="form-control" readonly name="jenis_barang" value="<?= $data['jenis_barang']?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                              <label class="control-label"><h3>Tanggal</h3></label>
                                <input type="text" readonly class="form-control" name="tanggal" value="<?= $data['tanggal']?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6">
                              <label class="control-label"><h3>barang Masuk</h3></label>
                                <input type="text" readonly class="form-control" name="barang_masuk" value="<?= $data['barang_masuk']?>">
                              </div>
                            </div>
                            <div class="col-md-12">
                                <center><button class="btn btn-primary btn-md" type="submit" style="margin-top: 20px;">Proses</button></center>
                              </div>
                                <input type="hidden" name="barang_keluar" readonly value="<?= date('H:i:s')?>">
                                <input type="hidden" name="status" readonly value="Keluar">
                                <input type="hidden" name="id_barang" readonly value="<?= $data['id_barang']?>">
                          <?= form_close()?>
                          <?php endforeach; ?>
                      </div>                      
                  <?php } ?>
                </div>
              </div>
              <br>
              <br>
              </div>

            </div>
          </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
