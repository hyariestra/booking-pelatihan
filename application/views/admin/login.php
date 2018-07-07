<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Area BUMDES</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url("template/bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("template/dist/css/AdminLTE.min.css")?>">
    
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
     
       <b>Admin</b>Area
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login Untuk Masuk ke Dashboard admin</p>
        <form method="post">
         <?php echo $this->session->userdata("pesan"); ?>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url("template/plugins/jQuery/jQuery-2.1.4.min.js")?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url("template/bootstrap/js/bootstrap.min.js")?>"></script>
    
  </body>
</html>
