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

    <section class="content">                  
        <div class="row">
            <section class="col-lg-12 ">
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-left">
                        <li>
                            <a href="<?php echo site_url('konseling/keterlambatan'); ?>">Keterlambatan</a>
                        </li>
                        <li>    
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
                        <li class="active">
                            <a href="#">Pengaturan</a>
                          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grafik</a> -->
                         <!--  <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="<?php //echo site_url('konseling/grafik'); ?>#Bulanan">Bulanan</a></li>
                              <li><a tabindex="-1" href="<?php //echo site_url('konseling/grafik'); ?>#Tahunan">Tahunan</a></li>
                          --> </ul>
                        </li>
                    </ul>
                    <br/><br/>



<div class="tab-content no-padding">
  <div class="chart tab-pane active" id="tab2" style="position: relative; ">
      <div class="box" style="padding:30px;">

                    <!-- isi -->
                    <!--<div class="box box-primary"> -->
                        <div class="box-header with-border">
                          <i class="fa fa-cog"></i>
                          <h3 class="box-title">Pengaturan</h3>
                          <h5>Laman ini berisi pengaturan mengenai detail formulir keterlambatan siswa</h5>
                          <h5>Silahkan checklist pilihan-pilihan sesuai dengan kebutuhan anda !!! </h5>
                        </div>
                        <div class="box-body">
                            <form action="<?= site_url('konseling/pengaturan') ?>" method="POST">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked disabled>
                                <input type="checkbox" class="custom-control-input" name="nisn" checked hidden>
                                <label class="custom-control-label">Nisn</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked disabled>
                                <input type="checkbox" class="custom-control-input" name="nama" checked hidden>
                                <label class="custom-control-label">Nama</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked disabled>
                                <input type="checkbox" class="custom-control-input" name="kelas" checked hidden>
                                <label class="custom-control-label">Kelas</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked disabled>
                                <input type="checkbox" class="custom-control-input" name="tanggal" checked hidden>
                                <label class="custom-control-label">Tanggal</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="kelamin" <?= ($check["kelamin"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Jenis Kelamin</label>
                              </div>                              
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="jam" <?= ($check["jam"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Jam</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="alasan" <?= ($check["alasan"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Alasan</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="jenis_sanksi" <?= ($check["jenis_sanksi"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Jenis Sanksi</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="bentuk_sanksi" <?= ($check["bentuk_sanksi"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Bentuk Sanksi</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="wali_kelas" <?= ($check["wali_kelas"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Wali Kelas</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="guru_piket" <?= ($check["guru_piket"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Guru Piket</label>
                              </div>
                              <br/>
                              <input type="submit" class="btn" value="kirim">
                            </form>
                        </div>                                                    
                    </div>
                    <!-- akhir isi -->





                    
                    </div>
                </section>
            </div>
    </section>
</div>