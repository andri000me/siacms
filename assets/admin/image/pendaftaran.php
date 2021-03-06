<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi SMP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>SMP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="image/guru1.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Kurikulum</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="image/guru1.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body pdg">
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- Sidebar user panel -->

        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->


        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <!-- Sidebar user panel -->

        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
 <ul class="sidebar-menu">
          <li class="header">KBM</li>


     <!--  <li><a href="kaldik.php"><i class="fa fa-circle-o text-red "></i> <span>Kaldik</span></a></li>
      <li><a href="kurikulum.php"><i class="fa fa-circle-o text-red"></i> <span>Kurikulum</span></a></li>
      <li><a href="mapel.php"><i class="fa fa-circle-o text-red"></i> <span>Mata Pelajaran</span></a></li>
      <li><a href="presensisiswa.php"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>
      <li><a href="jammengajar.php"><i class="fa fa-circle-o text-red"></i> <span>Pembagian Jam Mengajar Guru</span></a></li> -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Kesiswaan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> PPDB </a>
           <ul class="treeview-menu">
            <li ><a href="harirentang.php"><i class="fa fa-circle-o text-red"></i> PPDB Ujian</a></li>
            <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o text-red"></i> PPDB UN</a></li>
          </ul>
        </li>
        <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o"></i> Distribusi dan Mutasi </a>
          <ul class="treeview-menu">
            <li ><a href="harirentang.php"><i class="fa fa-circle-o text-red"></i>Distribusi Kelas</a></li>
            <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o text-red"></i> Mutasi</a></li>

          </ul>
        </li>
      </li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Kurikulum</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penjadwalan</a>
        <ul class="treeview-menu">
          <li ><a href="harirentang.php"><i class="fa fa-circle-o text-red"></i> Manajemen Hari & Jam</a></li>
          <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o text-red"></i> Jadwal Mapel</a></li>
          <li><a href="jadwalpiketguru.php"><i class="fa fa-circle-o text-red"></i> Jadwal Piket Guru</a></li>
          <li><a href="jadwaltambahan.php"><i class="fa fa-circle-o text-red"></i> Jadwal Tambahan</a></li>
        </ul>
      </li>

      <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o"></i> Penilaian</a></li>

    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Kepegawaian</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="Datapegawai.php"><i class="fa fa-circle-o"></i>Data Pegawai</a></li>
      <li ><a href="presensipegawai.php"><i class="fa fa-circle-o"></i> Presensi Pegawai</a></li>
      <li><a href="jadwalmengajar.php"><i class="fa fa-circle-o"></i>Jadwal Mengajar</a></li>
    </ul>
  </li>

  <li class="active treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Non akademik</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active treeview"><a href="#"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a>
          <ul class="treeview-menu">
            <li class="active"><a href="pendaftaran.php"><i class="fa fa-circle-o text-red"></i>Pendaftaran</a></li>
            <li><a href="jadwal.php"><i class="fa fa-circle-o text-red"></i> Jadwal Ekstrakurikuler</a></li>
            <li><a href="presensi.php"><i class="fa fa-circle-o text-red"></i> Presensi</a></li>
            <li><a href="nilai.php"><i class="fa fa-circle-o text-red"></i> Nilai</a></li>
            <li><a href="pembayaran.php"><i class="fa fa-circle-o text-red"></i> Pendanaan</a></li>
          </ul>
        </li>

        <li><a href="#"><i class="fa fa-circle-o"></i> Bimbingan Konseling</a>
        <ul class="treeview-menu">
          <li ><a href="keterlambatan.php"><i class="fa fa-circle-o text-red"></i> Keterlambatan & Jam</a></li>
          <li ><a href="absensi_harian.php"><i class="fa fa-circle-o text-red"></i> Perizinan</a></li>
          <li><a href="pelanggaran.php"><i class="fa fa-circle-o text-red"></i> Pelanggaran</a></li>
          <li><a href="prestasi.php"><i class="fa fa-circle-o text-red"></i> Prestasi</a></li>
        </ul>
  </li>  
</ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:navy;">Pendaftaran Ekstrakurikuler Siswa SMP Yogyakarta<br></center>
        <center><small>Tahun Ajaran 2016-2017</small></center>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
       
         <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">Formulir Pendaftaran</h4>
                </div>
                <form role="form" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Kelas</label>
                      <select name="kelas">
                        <option value="7A">7A</option>
                        <option value="7B">7B</option>
                        <option value="7C">7C</option>
                        <option value="7D">7D</option>
                        <option value="7E">7E</option>
                        <option value="7F">7F</option>
                        <option value="8A">8A</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama Siswa</label>
                      <input type="text"name="nama_lengkap" required="required">
                    </div>
                    <div class="form-group">
                      <label>Ekstrakurikuler Pilihan</label> <input type="text" maxlength="1" name="eks_pil" id="eks_pil" size="1" max="2" />
                      
                        <div id="eks">
                          <select name="kelas" id="kelas">
                            <option value="Bulutangkis">Bulutangkis</option>
                            <option value="Catur">Catur</option>
                            <option value="Volly">Volly</option>
                            <option value="Kaligrafi">Kaligrafi</option>
                          </select><br/> 
                        <br/>
                              
                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                        <script type="text/javascript">
                            $(function () {
                                $("#eks_pil").bind("change", function () {
                                    var input1 = parseInt($(this).val());
                                    if(input1<3){
                                        for(i=0;i<input1;i++){
                                            var index = $("#eks select").length + i;
                                            var ddl = $("#kelas").clone();
                                            ddl.attr("id", "kelas" + index);
                                            ddl.attr("name", "kelas_" + index);
                                            $("#eks").append(ddl);
                                            $("#eks").append("<br/><br/>");
                                        }
                                    }else{
                                        alert('maximal 2');
                                    } 
                                });
                            });
                        </script>

                      </div> 
                    </div>
                    <div class="form-group">
                      <label>Request Ekstrakurikuler</label>
                      <br/>
                      <input type="text" name="request">
                    </div>
                    
                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
         
        
        <div class="row">
            <div class="col-md-12">
              <center><h3>Data Peserta Ekstrakurikuler SMP Yogyakarta</h3></center>
              <center><h4>Tahun Ajaran 2016-2017</h4></center>
              
              <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Data Peserta Ekstrakurikuler</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Jenis Ekstrakurikuler</th>
                      <th>Jumlah Peserta</th>
                      <th>Aksi</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Bulutangkis</td> 
                      <td><a href="Pendaftaran_jumlah_peserta_ekskul.html">20</a></td>
                      <td><button type="submit" class="btn btn-primary">Buat Jadwal</button></td>  
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Olimpiade IPA</td> 
                      <td><a href="Pendaftaran_jumlah_peserta_ekskul.html">10</a></td>
                      <td><button type="submit" class="btn btn-primary">Buat Jadwal</button></td>  
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Karya Ilmiah Remaja</td> 
                      <td><a href="Pendaftaran_jumlah_peserta_ekskul.html">15</a></td>
                      <td><button type="submit" class="btn btn-primary">Buat Jadwal</button></td>  
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Bahasa Inggris</td> 
                      <td><a href="Pendaftaran_jumlah_peserta_ekskul.html">15</a></td><td><button type="submit" class="btn btn-primary">Buat Jadwal</button></td> 
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Tonti</td> 
                      <td><a href="Pendaftaran_jumlah_peserta_ekskul.html">20</a></td>
                      <td><button type="submit" class="btn btn-primary">Buat Jadwal</button></td>  
                    </tr>
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>

            
    </section>
    <!-- /.content -->
  </div>
  
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
<script>
  $(function () {
    // $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</html>

