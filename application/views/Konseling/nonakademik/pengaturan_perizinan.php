<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:navy;">Perizinan Siswa SMP Yogyakarta<br></center>
      <center><small><b>Tahun Ajaran 2019-2020</b></small></center>
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
                        <a href="<?php echo site_url('konseling/perizinan'); ?>">Perizinan </a>
                        
                    </li>
                    <li>
                        <a href="<?php echo site_url('konseling/laporan_perizinan'); ?>">Laporan </a>
                    </li> 
                    
                    <li class="active">
                        <a href="<?php echo site_url('konseling/pengaturan_perizinan'); ?>"> Pengaturan </a>
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
                          <h3 class="box-title">Pengaturan</h3>
                          <h5>Laman ini berisi pengaturan mengenai detail perizinan siswa</h5>
                          <h5>Silahkan ceklist pilihan-pilihan sesuai dengan kebutuhan anda !!! </h5>
                        </div>
                        <div class="box-body">
                            <form action="<?= site_url('konseling/pengaturan_perizinan') ?>" method="POST">
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
                                <input name="keterangan"  type="checkbox" class="custom-control-input" <?= ($check["keterangan"] == "on") ? 'checked': ''; ?> >
                                <label class="custom-control-label">Keterangan</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="jam_ke" <?= ($check["jam_ke"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Jam Ke</label>
                              </div>                              
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="jenis_perizinan" <?= ($check["jenis_perizinan"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Jenis Perizinan</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="penanggung_jawab" <?= ($check["penanggung_jawab"] == "on") ? 'checked': ''; ?>>
                                <label class="custom-control-label">Penanggung Jawab</label>
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
       </div>
       </div>             
                    </div>
                </section>
            </div>
    </section>
</div>