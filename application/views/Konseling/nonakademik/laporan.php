<script type="text/javascript">

  function fetch_select_siswa(val)
  {
     $('#cbsiswa').html('<option value="">Please Wait ... </option>');
     $.ajax({
     type: 'post',
     url: '<?php echo site_url('konseling/getsiswa'); ?>/'+val,
     //data: 'nama=' + jsnama + '&instansi=' + jsinstansi + '&hp=' + jshp  + '&email=' + jsemail,
     data: {
       program:val
     },
     success: function (response) {
       document.getElementById("cbsiswa").innerHTML=response; 
     }
     });
  } 
  </script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Keterlambatan Siswa SMP Yogyakarta<br></center>
      <center><small><b>Tahun Ajaran 2019/2020</b></small></center>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('konseling');?>">Dashboard</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 ">
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-left">
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li><a href="<?php echo site_url('konseling/keterlambatan'); ?>">Keterlambatan </a></li>
                  <?php  endif; ?>
            <li class="active">
              <a href="<?php echo site_url('konseling/laporanketerlambatan'); ?>"> Laporan </a>
            </li>
            <li>
              <a href="<?php echo site_url('konseling/grafik'); ?>" class="dropdown-toggle"
                data-toggle="dropdown">Grafik</a>
              <ul class="dropdown-menu">
                <!-- <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Perkelas">Perkelas</a></li>
                <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Mingguan">Mingguan</a></li> -->
                <li><a tabindex="-1"
                    href="<?php echo site_url('konseling/grafikketerlambatan/Bulanan'); ?>">Bulanan</a></li>
                <li><a tabindex="-1"
                    href="<?php echo site_url('konseling/grafikketerlambatan/Tahunan'); ?>">Tahunan</a></li>
              </ul>
            </li>
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li>
              <a href="<?php echo site_url('konseling/pengaturan'); ?>"> Pengaturan </a>
            </li>
                  <?php  endif; ?>
          </ul>
          <br />
          <br />

          <div style="margin: 20px;">              
            <h4><b>Data Keterlambatan Siswa<b/></h4>
            <input class="form-control" id="myInput" type="text" placeholder="NISN atau Nama">
            <br>

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jumlah Terlambat</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php foreach($terlambat as $ter): ?>
                <tr>
                  <td><?= $ter["nisn"] ?></td>
                  <td><?= $ter["nama"] ?></td>
                  <td><?= $ter['nama_kelas'] ?></td>
                  <td><?= $ter["total_terlambat"] ?></td>
                  <td><?php 
                    if($ter["total_terlambat"] >= 5 && $ter["total_terlambat"] <10) {
                      echo '<a class="btn btn-success" href="'. site_url('konseling/cetakbk/').$ter['nisn']. '"> Cetak Surat Panggilan </a>';
                    }elseif($ter["total_terlambat"] >= 10) {
                      echo '<a class="btn btn-success" href="'. site_url('konseling/cetaksp/').$ter['nisn']. '"> Cetak Surat Peringatan </a>';
                    }else {
                      echo "-";
                    }
                   ?></td>
                  <td><a class="btn btn-primary" href="<?php echo site_url('konseling/detailketerlambatan/').$ter['nisn']; ?>"> Detail </a></td>
                </tr>
                <?php endforeach ?>
            </table>
            <br><br><br>
          </div>
        </div>
      </section>
    </div>

    <script>
      $(document).ready(function () {
        $("#myInput").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
  </section>
  <!-- /.content -->
</div>