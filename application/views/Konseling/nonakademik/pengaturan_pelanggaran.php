<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Pelanggaran Siswa SMP Yogyakarta<br></center>
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
            <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
              <li>
                <a href="<?php echo site_url('konseling/pelanggaran'); ?>"> Pelanggaran </a>
              </li>
            <?php endif; ?>
            <li >
              <a href="<?php echo site_url('konseling/laporan_pelanggaran'); ?>"> Laporan </a>
            </li>
            <li>
              <a href="<?php echo site_url('konseling/grafik'); ?>" class="dropdown-toggle"
                data-toggle="dropdown">Grafik</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1"
                    href="<?php echo site_url('konseling/grafikpelanggaran') .'/Bulanan'; ?>">Bulanan</a></li>
                    <li><a tabindex="-1"
                      href="<?php echo site_url('konseling/grafikpelanggaran').'/Tahunan'; ?>">Tahunan</a></li>
                    </ul>
                  </li>
                  <li >
                    <a href="<?php echo site_url('konseling/bentuk_pelanggaran'); ?>">Bentuk Pelanggaran </a>
                  </li>
                  <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
                    <li class="active">
                      <a href="<?php echo site_url('konseling/pengaturan_pelanggaran'); ?>">Pengaturan </a>
                    </li>
                  <?php endif; ?>
                </ul>
                <br/><br/>



                <div class="tab-content no-padding">
                  <div class="chart tab-pane active" id="tab2" style="position: relative; ">
                    <div class="box" style="padding:30px;">
                      

                      <!-- isi -->
                      <!--  <div class="box box-primary"> -->
                       <div class="box-header with-border">
                        <i class="fa fa-cog"></i>
                        <h3 class="box-title">Pengaturan</h3>
                        <h5>Laman ini berisi pengaturan mengenai detail formulir pelanggaran siswa</h5>
                        <h5>Silahkan ceklist pilihan-pilihan sesuai dengan kebutuhan anda !!! </h5>
                      </div>
                      <div class="box-body">
                        <form action="<?= site_url('konseling/pengaturan_pelanggaran') ?>" method="POST">
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
                            <input type="checkbox" class="custom-control-input" name="kategori_pelanggaran" <?= ($check["kategori_pelanggaran"] == "on") ? 'checked': ''; ?>>
                            <label class="custom-control-label">Kategori Pelanggaran</label>
                          </div>                              
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="bentuk_pelanggaran" <?= ($check["bentuk_pelanggaran"] == "on") ? 'checked': ''; ?>>
                            <label class="custom-control-label">Bentuk Pelanggaran</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="pasal" <?= ($check["pasal"] == "on") ? 'checked': ''; ?>>
                            <label class="custom-control-label">Pasal</label>
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
                </div>             
              </div>
            </section>
          </div>
        </section>
      </div>