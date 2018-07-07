<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Zone</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url("template/bootstrap/css/bootstrap.min.css") ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("template/dist/css/AdminLTE.min.css") ?>">

  <link rel="stylesheet" href="<?php echo base_url("template/dist/css/skins/skin-blue.min.css") ?>">
  <!-- jquery -->

  <!-- end of jquery -->

  <script src="<?php echo base_url("template/plugins/jQuery/jQuery-2.1.4.min.js") ?>"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url("template/bootstrap/js/bootstrap.min.js") ?>"></script>
  <!-- AdminLTE App -->

<!-- highchart.js -->
  <script src="<?php echo base_url("template/dist/js/app.min.js") ?>"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

  
<!-- end of highchart.js -->


<!-- wysg -->
<link rel="stylesheet" href=" <?php echo base_url("template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") ?> ">

<!-- datatables -->
<link rel="stylesheet" href="<?php echo base_url("template/plugins/datatables/dataTables.bootstrap.css") ?>">
  <script src="<?php echo base_url ("template/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
  <script src="<?php echo base_url ("template/plugins/datatables/dataTables.bootstrap.min.js") ?>"></script>
  <script src="<?php echo base_url ("template/plugins/bootstrap-table/bootstrap-table.js") ?>"></script>
  <!-- end of datatables -->

  <!-- fullcalender -->
  <link rel="stylesheet" href="<?php echo base_url("template/plugins/fullcalendar/fullcalendar.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("template/plugins/fullcalendar/fullcalendar.print.min.css") ?>" rel='stylesheet' media='print' />
  <script src="<?php echo base_url ("template/plugins/fullcalendar/lib/moment.min.js") ?>"></script>
  <script src="<?php echo base_url ("template/plugins/fullcalendar/fullcalendar.min.js") ?>"></script>
  <script src="<?php echo base_url ("template/plugins/fullcalendar/locale-all.js") ?>"></script>
  <!-- end fullcalendar -->




  <!-- datetimepicker -->
  <link rel="stylesheet" href="<?php echo base_url("template/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css") ?>">

 <script type="text/javascript" src="<?php echo base_url("template/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js") ?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url("template/plugins/bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.id.js") ?>" charset="UTF-8"></script>

  <!-- end of datetimepicker -->


  <!-- daterangepicker -->
  <link rel="stylesheet" href="<?php echo base_url("template/plugins/daterangepicker/daterangepicker-bs3.css") ?>" >

  <script src="<?php echo base_url ("template/plugins/daterangepicker/daterangepicker.js") ?>"></script>
  <!-- daterangepicker -->

</head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>Zone</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header"></li>
          <!-- Optionally, you can add icons to the links -->



          <li class="active"><a href="<?php echo base_url("Dashboard") ?>"><i class="fa fa-tachometer"></i> <span>Beranda</span></a></li>

           <li><a href="<?php echo base_url("dashboard/listsurvey") ?>"><i class="fa fa-tachometer"></i> <span>List Survey</span></a></li>

          <?php if ($this->session->userdata("pengguna")['level']=="admin"): ?>

          <!--   <li><a href="<?php echo base_url("admin/Pelanggan/tampil") ?>"><i class="fa fa-users"></i> <span>Pelanggan</span></a></li> -->
            <li><a href="<?php echo base_url("Pendaftar/tampil") ?>"><i class="fa fa-users"></i> <span>Pendaftar</span></a></li>
             <li><a href="<?php echo base_url("booking/tampil") ?>"><i class="fa fa-bell"></i> <span>Booking</span></a></li>
               <li><a href="<?php echo base_url("penjualan/tampil") ?>"><i class="fa fa-shopping-cart"></i> <span>Penjualan</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bars"></i> <span>Data Master Pelatihan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("Instansi/tampil") ?>">Instansi</a></li>
                <li><a href="<?php echo base_url("Lokasi/tampil") ?>">Lokasi</a></li>
                <li><a href="<?php echo base_url("paket/tampil") ?>">Paket</a></li>
                <li><a href="<?php echo base_url("produk/tampil") ?>">Produk</a></li>
                <li><a href="<?php echo base_url("tema/tampil") ?>">Tema</a></li>
                <li><a href="<?php echo base_url("personil/tampil") ?>">Personil</a></li>

               
              </ul>
            </li>
          <?php endif ?>

          <li class="treeview">
              <a href="#"><i class="fa fa-bars"></i> <span>Data Master Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("kategori/tampil") ?>">Kategori</a></li>
                <li><a href="<?php echo base_url("product/tampil") ?>">Produk</a></li>
                
              </ul>
            </li>

        <!--   <li><a href="<?php echo base_url("Pembelian/tampil") ?>"><i class="fa fa-shopping-cart"></i> <span>Pembelian</span></a></li>
          <li><a href="<?php echo base_url("Komentar/tampil") ?>"><i class="fa fa-comments"></i> <span>Komentar</span></a></li> -->

          <?php if ($this->session->userdata("pengguna")['level']=="admin"): ?>

            <li class="treeview">
              <a href="#"><i class="fa fa-cog"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
               <li><a href="<?php echo base_url("pengaturan/tampil") ?>"><span>Pengaturan Profil Web</span></a></li>

               <li><a href="<?php echo base_url("admin/Admin/tampil") ?>"><span>Pengaturan Admin</span></a></li>
             <!--   <li><a href="<?php echo base_url("admin/Halamanstatis/tampil") ?>"><span>Pengaturan Halaman</span></a></li> -->
            <!--    <li><a href="<?php echo base_url("admin/Calendar/tampil") ?>"><span>Calendar</span></a> --></li>
             </ul>
           </li>
         <?php endif ?>

         <!-- <li><a href="<?php echo base_url("admin/pembelian/laporan") ?>"><i class="fa fa-file"></i> <span>Laporan</span></a></li> -->

         <li><a href="<?php echo base_url("Pengguna/logout") ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
       </ul><!-- /.sidebar-menu -->
     </section>
     <!-- /.sidebar -->
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <?php 
      $query =  $this->db->query("SELECT * FROM admin")->row();
      $valid  = $query->tanggal_join;
      $now    =   date("Y-m-d");

      if (strtotime($now) > strtotime($valid))
      {
        echo $konten;
      }
      else 
      {
    // echo $konten;
     //redirect('/admin/Pelanggan/validasi');
      //redirect(base_url('admin/Pelanggan/validasi'), 'refresh')
        echo "<div class='row'>

        <div class='col-md-12'>

        <div class='box'>

        <div class='alert alert-danger' role='alert'>
        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
        <span class='sr-only'>Error:</span>
      
        </div>


        </div>
        </div>
        </div>

        ";
      }

      ?>

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <?php 
    $xxx =  $this->db->query("SELECT * FROM pengaturan")->result_array();

    ?>
    <strong>Copyright <?php echo @$xxx[8]['isi']; ?></strong> All rights reserved.

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->

  </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
       <div class="control-sidebar-bg"></div>
     </div><!-- ./wrapper -->

     <!-- REQUIRED JS SCRIPTS -->

     <!-- jQuery 2.1.4 -->
     <script type="text/javascript">
        $(function () {
      var oTable =   $("#tabelku").DataTable();
        // toolbar: 'Full',
        // enterMode : CKEDITOR.ENTER_BR,
        // shiftEnterMode: CKEDITOR.ENTER_P
      });
     </script>

     
   <!--  <script src="<?php echo base_url("template/plugins/liveedit/liveedit.js") ?>"></script>
    --> 
       <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src="<?php echo base_url("template/plugins/fnreload/fnreload.js") ?>"></script>
     <script src="<?php echo base_url("template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") ?>"></script>
    <script>
      CKEDITOR.replace("editorku");
     $(".textarea").wysihtml5();
    </script>

  
 <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>

  </body>
  </html>
