<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login</title>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Custom styles -->
  <link href="<?= base_url()?>assets/css/login.css" rel="stylesheet">
<body>

 <div class="main">    
    <div class="container">
      <center>
        <div class="middle">
          <div id="login">

            <?= form_open('auth/proses_login')?>
              <fieldset class="clearfix">
                <?php
                  if(isset($pesan)){
                    echo '<div class="alert alert-danger" role="alert">'.$pesan.'</div>';
                  }
                ?>
                <p ><span class="fa fa-user"></span><input type="text" name="username"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fa fa-lock"></span><input type="password" name="password"  Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                  <div>
                      <span style="width:100%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
                  </div>
              </fieldset>
              <div class="clearfix"></div>
            <?= form_close()?>
              <div class="clearfix"></div>

          </div> <!-- end login -->
          <div class="logo">
            <img src="<?= base_url()?>assets/img/gudang01.jpg" height="170px"/>
              <div class="clearfix"></div>
          </div>
      
        </div>
      </center>
    </div>
  </div>

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
</body>
</html>
