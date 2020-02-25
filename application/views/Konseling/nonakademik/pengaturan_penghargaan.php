<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:navy;">Penghargaan Siswa SMP Yogyakarta<br></center>
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
                            <a href="<?php echo site_url('konseling/prestasi'); ?>">Penghargaan</a>
                        </li>
                        <li>    
                            <a href="<?php echo site_url('konseling/laporan_penghargaan'); ?>">Laporan</a>
                        </li>
                        <li>
                        <a href="<?php echo site_url('konseling/grafik'); ?>" class="dropdown-toggle" data-toggle="dropdown">Grafik</a>
                        <ul class="dropdown-menu">
                        <!-- <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Perkelas">Perkelas</a></li>
                          <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Mingguan">Mingguan</a></li> -->
                        <li><a tabindex="-1" href="<?php echo site_url('konseling/grafik_penghargaan/Bulanan'); ?>">Bulanan</a></li>
                        <li><a tabindex="-1" href="<?php echo site_url('konseling/grafik_penghargaan/Tahunan'); ?>">Tahunan</a></li>
                        </ul>
                      </li>
                        <!--<li>    
                            <a href="<?php echo site_url('konseling/grafik'); ?>">Grafik</a>
                        </li> -->
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
                  <!--  <div class="box box-primary"> -->
                       <div class="box-header with-border">
                          <i class="fa fa-cog"></i>
                          <h3 class="box-title"><b>Pengaturan<b/></h3>
                          <h5>Laman ini berisi pengaturan mengenai detail formulir penghargaan siswa</h5>
                          <h5>Silahkan checklist pilihan-pilihan sesuai dengan kebutuhan anda !!! </h5>
                        </div>
                        <div class="box-body">
                            <form action="<?= site_url('konseling/pengaturan_penghargaan') ?>" method="POST">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked disabled>
                                <input type="checkbox" class="custom-control-input" name="nisn" checked hidden>
                                <label class="custom-control-label">NISN</label>
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
                                <input type="checkbox" class="custom-control-input" name="kategori_prestasi" <?= ($check["kategori_prestasi"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Kategori Prestasi</label>
                              </div> 
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="nama_prestasi" <?= ($check["nama_prestasi"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Nama Prestasi</label>
                              </div>                             
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tingkat_prestasi" <?= ($check["tingkat_prestasi"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Tingkat Prestasi</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tahun" <?= ($check["tahun"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Tahun</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="peringkat" <?= ($check["peringkat"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Peringkat</label>
                              </div>
                              
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="penyelenggara" <?= ($check["penyelenggara"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Penyelenggara</label>
                              </div>

                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="keterangan" <?= ($check["keterangan"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Keterangan</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="foto" <?= ($check["foto"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Upload Foto</label>
                              </div>
                             
                              <br/>
                              <input type="submit" class="btn" value="kirim">
                            </form>
                        </div>                                                    
                    </div>
                    <!-- akhir isi -->





       </div>
       </div>             
                    </div>
                </section>
            </div>
    </section>
</div>