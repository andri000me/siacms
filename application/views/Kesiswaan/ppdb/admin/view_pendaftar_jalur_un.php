<div class="content-wrapper">
  <div style="overflow-y: scroll; height: 600px">
    <section class="content-header">
      <h1>
        <center style="color:navy;"><b>Penerimaan Peserta Didik Baru</b></center>
        <center><small>Jalur Nilai Ujian Nasional</small></center>
        <center><small>Hanya menggunakan nilai UN sebagai penyeleksi utama</small></center>    
        </h1>
    </section>
    <section class="content">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
       <!-- page content -->
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content8" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pengaturan Menu</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Pengaturan Formulir </a>
            </li>
            <?php
            if ($settingmenu['ketentuan'] == '1') {
            ?>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ketentuan </a>
            </li>
            <?php
            }
            ?>
            <?php
            if ($settingmenu['passing_grade'] == '1') {
            ?>
            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Passing Grade</a>
            </li>
            <?php
            }
            ?>
            <?php
            if ($settingmenu['pendaftar'] == '1') {
            ?>
            <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pendaftar </a>
            </li>
            <?php
            }
            ?>
            <?php
            if ($settingmenu['lolos_seleksi'] == '1') {
            ?>
            <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Lolos Seleksi </a>
            </li>
            <?php
            }
            ?>
            <?php
            if ($settingmenu['pengumuman'] == '1') {
            ?>
            <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pengumuman</a>
            </li>
            <?php
            }
            ?>
            <?php
            if ($settingmenu['pendaftaran'] == '1') {
            ?>
            <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pendaftaran</a>
            </li>
            <?php
            }
            ?>
          </ul>

          <?php echo $this->session->userdata('pesan'); ?> <!-- ketentuan -->
          <?php echo $this->session->userdata('status'); ?> <!-- cekbox -->
          <?php echo $this->session->userdata('aktif'); ?>  <!-- formulir aktif -->
          <?php echo $this->session->userdata('nonaktif'); ?>  <!-- formulir nonaktif -->
          <?php echo $this->session->userdata('baru'); ?>  <!-- update ketentuan -->
          <?php echo $this->session->userdata('passing'); ?> <!-- passing grade -->
          <?php echo $this->session->userdata('pendaftar'); ?> <!-- edit pendaftar -->
          <?php echo $this->session->userdata('pendaftarlolos'); ?> <!-- edit pendaftar lolos -->
          <?php echo $this->session->userdata('lolos'); ?> <!-- pembuatan akun siswa baru -->
          <?php echo $this->session->userdata('pengumuman'); ?> <!-- pengumuman -->
          <?php echo $this->session->userdata('pengumumanupdate'); ?> <!-- pengumuman update -->

          
            <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content8" aria-labelledby="home-tab">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/savemenu'); ?>">  
                <div class="form-group">
                  
                  <h4 class="box-title"><center><b>Pengaturan Menu PPDB UN</b></center></h4>    
                    <p><center>Berikan centang pada atribut menu yang ingin dikeluarkan sebagai Menu PPDB Jalur UN</p></center>  
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <?php
                      $i=1;
                      foreach ($pengaturan_menu_ppdb as $menu) 
                      { 
                        if ($i < 7) 
                        {
                          ?><input type="checkbox" class="flat" name="nilai<?php echo $menu->id_pengaturan_menu_ppdb; ?>" value="1" <?php 
                          if ($menu->nilai == "1") 
                            { echo " checked"; } ?>>
                            <label><?php echo $menu->atribut; ?></label><br> 
                          <?php 
                        }
                      }
                      ?>
                      <br>
                      <div class="modal-footer" align="center">
                        <!-- <button type="reset" class="btn btn-danger">Reset</button>  -->
                        <button type="Save" class="btn btn-success" onclick="return cek();">Aktifkan Menu</button>
                        
                      </div>
                    </div>
                  </div>
                </form>        
            </div>

<!--end tab 8 -->
          
            <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="profile-tab">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/saveformnegeri'); ?>">  
                <div class="form-group">
                  <script type="text/javascript">
                    function cek() {
                      var sdh = true;
                      if ((document.getElementById('nilai29').checked == true) && (document.getElementById('atribut29').value == "")) { sdh = false; }
                      if ((document.getElementById('nilai30').checked == true) && (document.getElementById('atribut30').value == "")) { sdh = false; }
                      if ((document.getElementById('nilai31').checked == true) && (document.getElementById('atribut31').value == "")) { sdh = false; }
                      if ((document.getElementById('nilai32').checked == true) && (document.getElementById('atribut32').value == "")) { sdh = false; }
                      if ((document.getElementById('nilai33').checked == true) && (document.getElementById('atribut33').value == "")) { sdh = false; }
                      if (sdh == false) { alert('Nama "Berkas Lain" yang dicentang harus diisi!'); }
                      return sdh;
                    }
                  </script>
                  <div class="col-md-12 col-sm-12 col-xs-12" align="right">
                    <a href="<?php echo site_url('ppdb/calon_siswa/form_ppdb'); ?>" target="_blank" class="btn btn-default"><i class="fa fa-external-link-square text-blue" aria-hidden="true"></i> Lihat Halaman Formulir PPDB</a>
                  </div><br><br>
                  <h4 class="box-title"><center><b>Pengaturan Formulir</b></center></h4>    
                    <p><center>Berikan centang pada atribut formulir yang ingin dikeluarkan sebagai Formulir Penerimaan Peserta Didik Baru:</p></center>  
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <?php
                      $i=1;
                      foreach ($tabel_form_ppdb as $form) 
                      { 
                        if ($i < 43) 
                        {
                          ?><input type="checkbox" class="flat" name="nilai<?php echo $form->id_form_ppdb; ?>" value="1" <?php 
                          if ($form->nilai == "1") 
                            { echo " checked"; } ?>>
                            <label><?php echo $form->atribut; ?></label><br> 
                          <?php 
                        }
                        elseif ($form!==NULL) 
                        { 
                          if ($form->id_form_ppdb < 48) 
                          {
                            ?><input type="checkbox" class="flat" id="nilai <?php echo $form->id_form_ppdb; ?>" name="nilai<?php echo $form->id_form_ppdb; ?>" value="1" <?php 
                              if ($form->nilai == "1") 
                              {
                                echo " checked"; 
                              } 
                            ?>> <label style="font-style: normal;">Berkas lain yg ingin dilampirkan</label> 
                            <input type="text" id="atribut<?php echo $form->id_form_ppdb; ?>" name="atribut<?php echo $form->id_form_ppdb; ?>" placeholder=" Nama Berkas" value="<?php echo $form->atribut; ?>"> <br>
                             <?php 
                          }
                          elseif ($i < 48) 
                          { 
                            ?><input type="checkbox" class="flat" name="nilai <?php echo $form->id_form_ppdb; ?>" value="1" <?php 
                            if ($form->nilai == "1") 
                            { echo " checked"; } 
                            ?>
                            > <label><?php echo $form->atribut; ?></label><br>
                          <?php 
                          }
                        }
                        else
                        { echo "error"; }
                        $i=$i+1;
                      }
                      ?>
                      <br>
                      <div class="modal-footer" align="center">
                        <a href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/nonaktifform'); ?>" class="btn btn-danger">Non Aktifkan Formulir</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Reset</button>
                        <button type="Save" class="btn btn-success" onclick="return cek();">Aktifkan Formulir</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

<!-- =========================================end tab 1================================================== -->
                
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <h4><center><b>Ketentuan PPDB</b></center></h4>
                     <br>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/saveketentuan'); ?>" enctype="multipart/form-data">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Ketentuan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama_ketentuan">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Isi Ketentuan</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" required="required" class="form-control" id="inputName" placeholder="Name" name="isi_ketentuan" accept="application/pdf">
                                  <textarea name="descr" id="descr" style="display:none;"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal berlaku </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" class="form-control" required="required" id="tgl_berlaku" placeholder="Tgl Berlaku" name="tgl_berlaku">
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-default" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                          </div>
                          <br>
                    </form>

                      <table class="table table-striped projects" id="example1">
                      <thead>
                        <tr>
                          <th style="width: 5%">No </th>
                          <th style="width: 70%">Judul Ketentuan</th>
                          <th style="width: 10%">Tanggal</th>
                          <th style="width: 5%"></th>
                          <th style="width: 10%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $i=0;
                          foreach ($tabel_ketentuan_ppdb as $row) {
                            $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row->nama_ketentuan; ?></td>
                          <td><?php echo $row->tgl_berlaku; ?></td>
                          <td>                        
                            <a data-toggle="modal" class="btn btn-info btn-xs" data-show="true" href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/editketentuan/'.$row->id_ketentuan); ?>" data-target="#myKetentuan<?php echo $i; ?>">Edit</a>
                          </td>
                          <td>
                            <a href="<?php echo base_url(); ?>assets/kesiswaan/ketentuan/<?php echo $row->isi_ketentuan; ?>" class="btn btn-download btn-xs"><i class="fa fa-file" aria-hidden="true"></i> Lihat Dokumen</a>
                          </td>
                        </tr>

                        <div id="myKetentuan<?php echo $i; ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Data</h4>
                              </div>
                            </div>
                          </div>
                        </div>    
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    </div>

   <!-- =========================================== end tab 2 ============================================= -->
       
              <div class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <div class="tab-pane">
                  <h4><center><b>Tetapkan Passing Grade</b></center></h4><br>
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/savepassing'); ?>" >
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" name="kategori">
                                <option value="Dalam Kota">Dalam Kota</option>
                                <option value="Luar Kota">Luar Kota</option>
                          </select> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nilai Bawah</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input placeholder=" angka desimal gunakan titik" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nilai">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal berlaku <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" class="form-control" required="required" id="tgl_berlaku" placeholder="Tgl Berlaku" name="tgl_berlaku">
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-default" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </div>
                    </form>
                    <br>
                    <table class="table table-striped projects" id="example1">
                      <thead>
                        <tr>
                          <th style="width: 10%">No </th>
                          <th style="width: 20%">Th Ajaran</th>
                          <th style="width: 20%">Kategori</th>
                          <th style="width: 20%">Nilai Bawah</th>
                          <th style="width: 20%">Tanggal Berlaku</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                          foreach ($tabel_passing_grade as $row) {
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row->tahun_ajaran; ?></td>
                          <td><?php echo $row->kategori; ?></td>
                          <td><?php echo $row->nilai; ?></td>
                          <td><?php echo $row->tgl_berlaku; ?></td>
                        </tr>
                        <?php
                        $i=$i+1;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

<!-- ========================================= end tab 3 ============================================ -->

                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                  <h4><center><b>Pendaftar PPDB</b></center></h4> <br>
                    <form method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/ubahstatus');?>">
                    <table class="table table-striped projects" id="example1">
                      <div class="form-group" align="right">
                        Ubah Status pendaftar bersamaan
                        <input onclick="return confirm('Apakah anda ingin mengubah status siswa menjadi Diterima?');" type="submit" name="button" value="Diterima" class="btn btn-primary btn-xs"/>
                        <input onclick="return confirm('Apakah anda ingin mengubah status siswa menjadi Tidak Diterima?');" type="submit" name="button" value="Tidak Diterima" class="btn btn-success btn-xs"/>
                        <input onclick="return confirm('Apakah anda ingin mengubah status siswa menjadi Dicabut?');" type="submit" name="button" value="Dicabut" class="btn btn-danger btn-xs"/>
                      </div><br>

                <!-- <div class="row">
                  <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                      <label>Show <select name="example1_length" class="form-control input-sm" aria-controls="example1"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                    </div>
                  </div>
          
                  <div class="dataTables_filter" id="example1_filter">
                    <label>Search : <input class="form-control input-sm" aria-controls="example1" type="search" placeholder="">
                    </label>
                  </div>
                </div> -->

                      <thead>
                        <tr>
                          <th style="width: 2%"></th>
                          <th style="width: 4%">No</th>
                          <?php
                          if ($settingform['waktu_pendaftaran'] == '1') {
                          ?>
                          <th style="width: 15%">Waktu Pendaftaran</th>
                          <?php
                          }
                          ?>
                          <th style="width: 10%">NISN</th>
                          <th style="width: 20%">Nama</th>
                          <th style="width: 5%">Total Nilai</th>
                          <th style="width: 10%"></th>
                          <?php
                          if ($settingform['minat_olahraga'] == '1') {
                          ?>
                          <th style="width: 10%">Minat Olahraga</th>
                          <?php
                          }
                          ?>
                          <th style="width: 10%">Verifikasi</th>
                          <th style="width: 10%">Status</th>
                          <th style="width: 7%">Aksi</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        foreach ($tabel_pendaftar_ppdb as $row) 
                        {
                          ?>
                          <tr>
                            <td><input type="checkbox" class="flat" name="nisn_ubah[]" value="<?php echo $row->nisn_pendaftar; ?>"></td>
                            <td><?php echo $row->nomor_pendaftaran; ?></td>
                            <?php
                            if ($settingform['waktu_pendaftaran'] == '1') {
                            ?>
                            <td><?php echo $row->waktu_pendaftaran; ?></td>
                            <?php
                            }
                            ?>
                            <td><?php echo $row->nisn_pendaftar; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->nilai_un_nun; ?></td>
                            <td>
                             <a data-toggle="modal" class="btn btn-default btn-xs" data-show="true" href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/editnilai/'.$row->nisn_pendaftar); ?>" data-target="#myNilai<?php echo $i; ?>">Detail Nilai</a>
                            </td>
                            <?php
                            if ($settingform['minat_olahraga'] == '1') {
                            ?>
                            <td><?php echo $row->minat_olahraga; ?></td>
                            <?php
                            }
                            ?>
                            <td><?php echo $row->terverifikasi; ?></td>
                            <td><?php echo $row->status_siswa; ?></td>
                            <td>
                             <a data-toggle="modal" class="btn btn-info btn-xs" data-show="true" href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/editpendaftar/'.$row->nisn_pendaftar); ?>" data-target="#myPendaftar<?php echo $i; ?>">Edit</a>
                            </td>
                          </tr>
                          <?php
                          $i=$i+1;
                          }
                          ?>
                        </tbody>
                      </table>
                    </form>

                   <?php 
                      $i=1;
                      foreach ($tabel_pendaftar_ppdb as $row) 
                      { ?>
                          <div id="myNilai<?php echo $i; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Lihat Nilai</h4>
                                  </div>
                                  <div class="modal-body"></div>
                              </div>
                            </div>
                          </div> 

                          <div id="myPendaftar<?php echo $i; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Data</h4>
                                </div>
                                <div class="modal-body"></div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $i=$i+1;
                        } ?>
                </div>

         <!-- =============================== END OF TAB CONTENT 4 ================================== -->
              
                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                 <h4><center><b>Pendaftar PPDB yang Lolos Seleksi</b></center></h4>
                    <br>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="dataTables_length" id="example1_length">
                          <div class="form-group" align="right">
                          <a type="button" role="button" href=<?php echo site_url('ppdb/admin/pendaftar_jalur_un/eksportujian');?> class="btn btn-default"><i class="fa fa-print text-red "></i> Export Data Pendaftar</a>
                        </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="dataTables_length" id="example1_length">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="dataTables_length" id="example1_length">
                          <div class="form-group">
                            <a type="button" role="button" class="btn btn-default" href=<?php echo site_url('ppdb/admin/pendaftar_jalur_ujian/buatakun');?> onclick="return confirm('Apakah anda yakin data pendaftar yang lolos sudah benar dan akan dibuatkan akun siswa?');"><i class="fa fa-user text-blue" aria-hidden="true"></i> Buat akun siswa</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <table class="table table-striped projects" id="example1">
                      <thead>
                        <tr>
                          <th style="width: 5%">No</th>
                          <th style="width: 10%">NISN</th>
                          <th style="width: 35%">Nama</th>
                          <th style="width: 20%">Asal Sekolah</th>
                          <th style="width: 15%">Domisili</th>
                          <th style="width: 5%">Penilaian</th>
                          <th style="width: 5%"></th>
                          <th style="width: 5%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        foreach ($tabel_pendaftar_ppdb_lolos as $row) 
                        {
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->nisn_pendaftar; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->asal_sekolah; ?></td>
                            <td><?php echo $row->domisili; ?></td>
                            <td><?php echo $row->nilai_un_nun; ?></td>
                            <td>
                             <a data-toggle="modal" class="btn btn-default btn-xs" data-show="true" href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/editnilai/'.$row->nisn_pendaftar); ?>" data-target="#myNilailolos<?php echo $i; ?>">Detail</a>
                            </td>
                            <td>
                             <a data-toggle="modal" class="btn btn-info btn-xs" data-show="true" href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/editpendaftarlolos/'.$row->nisn_pendaftar); ?>" data-target="#myPendaftarlolos<?php echo $i; ?>">Edit</a>
                            </td>
                          </tr>

                          <div id="myNilailolos<?php echo $i; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Lihat Nilai</h4>
                                  </div>
                                  <div class="modal-body"></div>
                              </div>
                            </div>
                          </div> 

                          <div id="myPendaftarlolos<?php echo $i; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Data</h4>
                                </div>
                                <div class="modal-body"></div>
                              </div>
                            </div>
                          </div>
                          <?php
                          $i=$i+1;
                        }
                        ?>
                      </tbody>
                    </table>
                    <div class="ln_solid"></div>
                  </div>

<!-- =============================== END OF TAB CONTENT 5 ================================== -->
                  <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                    <h4><center><b>Pengumuman PPDB</b></center></h4><br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/savepengumuman'); ?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul Pengumuman</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="judul">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Isi</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" class="form-control" required="required" id="inputName" placeholder="Name" name="isi" accept="application/pdf">
                              <textarea name="descr" id="descr" style="display:none;"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal berlaku</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" class="form-control" id="tgl_berlaku" required="required" placeholder="Tgl Berlaku" name="tanggal_berlaku">
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-default" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </div>
                    </form>
                <br>

                <table class="table table-striped projects" id="example1">
                  <thead>
                    <tr>
                      <th style="width: 5%">No </th>
                      <th style="width: 70%">Judul Pengumuman</th>
                      <th style="width: 10%">Tanggal</th>
                      <th style="width: 5%"></th>
                      <th style="width: 10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=1;
                    foreach ($tabel_pengumuman_ppdb as $row) {
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->tanggal_berlaku; ?></td>
                      <td>                        
                        <a data-toggle="modal" class="btn btn-info btn-xs" data-show="true" href="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/editpengumuman/'.$row->id_pengumuman_ppdb); ?>" data-target="#myPengumuman<?php echo $i; ?>">Edit</a>
                      <td>
                        <a href="<?php echo base_url(); ?>assets/kesiswaan/pengumuman/<?php echo $row->isi; ?>" class="btn btn-download btn-xs"><i class="fa fa-file" aria-hidden="true"></i> Lihat Dokumen</a>
                      </td>
                    </tr>

                    <div id="myPengumuman<?php echo $i; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data</h4>
                          </div>
                          <div class="modal-body"></div>
                        </div>
                      </div>
                    </div>
                    <?php
                    $i=$i+1;
                      }
                    ?>
                  </tbody>
                </table>
                <br>
              </div>
 <!-- ================================ end tab 6 ========================================== -->
<div class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
      <h4><center><b>Pendaftaran PPDB Oleh Petugas</b></center></h4><br>
      <br>
      <?php echo $this->session->userdata('pesan'); ?>
      <?php echo $this->session->userdata('pesanlain'); ?>
      <?php 
      if ($settingform['nisn_pendaftar'] == '0')
      {
          ?><br><br><br><br><br><h3><center>Bukan masa Pendaftaran Penerimaan Peserta Didik Baru</center></h3><br><br><br><br><br><br><br><br><br>
          <?php
      } else {
        ?>
       
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/admin/pendaftar_jalur_un/savependaftar'); ?>" >

          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" >IDENTITAS PESERTA SELEKSI </label>
          </div>
         
          <?php
          if ($settingform['nomor_pendaftaran'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">No Pendaftaran </label>
              <div class="col-md-1 col-sm-1 col-xs-1">
                <input type="text" class="form-control" name="nomor_pendaftaran" required="required">
              </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['waktu_pendaftaran'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Waktu Pendaftaran </label>
             <div class="col-md-3 col-sm-3 col-xs-3">
             <input type="datetime-local" id="current-time" class="form-control" name="waktu_pendaftaran">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['no_usbn'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">No. USBN </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input type="text" id="first-name" required="required" class="form-control" name='no_usbn'>
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nisn_pendaftar'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">NISN </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" name='nisn_pendaftar'>
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nama'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Nama Lengkap </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="nama">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['tempat_lahir'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Tempat Lahir </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="tempat_lahir">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['tanggal_lahir'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Tanggal Lahir</label>
            <fieldset>
              <div class="col-md-5 col-sm-6 col-xs-3">
                <input type="date" class="form-control" required="required" id="tgl_berlaku" placeholder="Tgl Berlaku" name="tanggal_lahir">
                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                </div>
              </div>
            </fieldset>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['jenis_kelamin'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Jenis Kelamin</label> <br>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input required="required" type="radio" name="jenis_kelamin"
                <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Perempuan") echo "checked";?>
                      value="Perempuan"> Perempuan <br>
                <input required="required" type="radio" name="jenis_kelamin"
                <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Laki-Laki") echo "checked";?>
                        value="Laki-laki"> Laki-Laki 
              </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['domisili'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Domisili </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input required="required" type="radio" name="domisili"
                  <?php if (isset($domisili) && $domisili=="Dalam Daerah") echo "checked";?>
                        value="Dalam Daerah">Dalam Daerah <br>
                  <input required="required" type="radio" name="domisili"
                  <?php if (isset($domisili) && $domisili=="Luar Daerah") echo "checked";?>
                          value="Luar Daerah">Luar Daerah 
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['alamat'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Alamat </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <textarea required="required" class="form-control" rows="3" name="alamat"></textarea>
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['agama'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Agama </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="agama">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['no_hp_siswa'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Nomor Telp/HP Siswa </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="no_hp_siswa">
            </div>
          </div>
          <?php
          }
          ?>
          

          <?php
          if ($settingform['nama_orang_tua'] == '1' || ['pekerjaan_orang_tua'] == '1' || ['agama_orang_tua'] == '1' || ['alamat_orang_tua'] == '1' || ['no_telp_orang_tua'] == '1' || ['nama_wali'] == '1' || ['pekerjaan_wali'] == '1' || ['alamat_wali'] == '1' || ['no_telp_wali'] == '1') {
          ?>
          <br>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">IDENTITAS ORANG TUA / WALI </label>
          </div>
          <?php
          }
          ?>

          <?php
          if ($settingform['nama_orang_tua'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Nama Orang Tua </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="nama_orang_tua">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['pekerjaan_orang_tua'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Pekerjaan Orang Tua </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan_orang_tua">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['agama_orang_tua'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Agama Orang Tua </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="agama_orang_tua">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['alamat_orang_tua'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Alamat Orang Tua </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <textarea class="form-control" rows="3" name="alamat_orang_tua"></textarea>
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['no_telp_orang_tua'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Nomor Telp/HP Orang Tua </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="no_telp_orang_tua">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nama_wali'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Nama Wali </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="nama_wali">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['pekerjaan_wali'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Pekerjaan Wali </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pekerjaan_wali">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['alamat_wali'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Alamat Wali </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <textarea  class="form-control" rows="3" name="alamat_wali"></textarea>
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['no_telp_wali'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Nomor Telp/HP Wali </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name"  class="form-control col-md-7 col-xs-12" type="text" name="no_telp_wali">
            </div>
          </div>
          <?php
          }
          ?>

          <?php
          if ($settingform['asal_sekolah'] == '1' || ['status_sekolah'] == '1' || ['tahun_lulus'] == '1' || ['alamat_sekolah'] == '1'){
          ?>
          <br>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">ASAL SEKOLAH </label>
          </div>
          <?php
          }
          ?>

          <?php
          if ($settingform['asal_sekolah'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Asal Sekolah</label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="asal_sekolah">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['tahun_lulus'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tahun Kelulusan </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="tahun_lulus">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['status_sekolah'] == '1') {
          ?>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Status Sekolah </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="status_sekolah">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['alamat_sekolah'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Alamat Sekolah </label>
            <div class="col-md-5 col-sm-6 col-xs-3">
              <textarea required="required" class="form-control" rows="3" name="alamat_sekolah"></textarea>
            </div>
          </div>
          <?php
          }
          ?>
          <!--<?php
          if ($settingform['pilihan_sekolah_1'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pilihan 1 </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control" name="pilihan_sekolah_1" required="required">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['pilihan_sekolah_2'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pilihan 2 </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control" required="required" name="pilihan_sekolah_2">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['pilihan_sekolah_3'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pilihan 3 </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" class="form-control" name="pilihan_sekolah_3">
            </div>
          </div>
          <?php
          }
          ?>-->

          <?php
          if ($settingform['nilai_un_ind'] == '1' || ['nilai_un_mat'] == '1' || ['nilai_un_ipa'] == '1' || ['nilai_un_nun'] == '1'){
          ?>
          <br>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">NILAI UJIAN NASIONAL / USBN </label>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nilai_un_ind'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai UN Bahasa Indonesia </label>
             <div class="col-md-3 col-sm-3 col-xs-3">
              <input type="text" required="required" class="form-control" name="nilai_un_ind" placeholder="gunakan tanda titik untuk desimal">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nilai_un_mat'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai UN Matematika </label>
             <div class="col-md-3 col-sm-3 col-xs-3">
              <input required="required" type="text" class="form-control" name="nilai_un_mat" placeholder="gunakan tanda titik untuk desimal">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nilai_un_ipa'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nilai UN IPA </label>
              <div class="col-md-3 col-sm-3 col-xs-3">
              <input type="text" class="form-control" required="required" name="nilai_un_ipa" placeholder="gunakan tanda titik untuk desimal">
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['nilai_un_nun'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Nilai </label>
             <div class="col-md-3 col-sm-3 col-xs-3">
              <input type="text" class="form-control" required="required" name="nilai_un_nun" placeholder="gunakan tanda titik untuk desimal">
            </div>
          </div>
          <?php
          }
          ?>

          <?php
          if ($settingform['minat_olahraga'] == '1') {
          ?>
          <br>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">INFORMASI KELAS OLAHRAGA </label>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                (daya tampung 1 kelas = 32 siswa)
            </div>
          </div>
          <?php
          }
          ?>

          <?php
          if ($settingform['minat_olahraga'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pilihan Cabang Olahraga </label> <br>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input  type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Sepak Bola") echo "checked";?>
                      value="Sepak Bola"> Sepak Bola <br>
                <input type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Futsal") echo "checked";?>
                        value="Futsal"> Futsal <br>      
                <input type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Bola Voly") echo "checked";?>
                        value="Bola Voly"> Bola Voly <br>
                <input type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Renang") echo "checked";?>
                        value="Renang"> Renang <br>
                <input  type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Bulu Tangkis") echo "checked";?>
                        value="Bulu Tangkis"> Bulu Tangkis <br>
                <input type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Basket") echo "checked";?>
                        value="Basket"> Basket <br>
                <input type="radio" name="minat_olahraga"
                <?php if (isset($minat_olahraga) && $minat_olahraga=="Lainnya") echo "checked";?>
                        value="Lainnya"> Lainnya
                                              
              </div>
          </div>
          <?php
          }
          ?>


          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Berkas yang Harus Diserahkan :</label>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                *berikan centang pada berkas yang akan dikumpulkan
            </div>
          </div>

          <?php
          if ($settingform['bukti_pengajuan_daftar'] == '1') {
          ?>

          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="bukti_pengajuan_daftar" value="1"> 
                Bukti Pengajuan Daftar
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['surat_ket_penambah_nilai'] == '1') {
          ?>

          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="surat_keterangan_penambah_nilai" value="1"> 
                Surat Keterangan Penambah Nilai
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['fc_ijazah'] == '1') {
          ?>
          <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="fc_ijazah" value="1"> 
                Fotocopy Ijazah
              </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['skhun'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="skhun" value="1"> 
              SKHUN
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['fc_skhun'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="fc_skhun" value="1"> 
                Fotocopy SKHUN
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['surat_keterangan_napza'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="surat_keterangan_napza" value="1"> 
                Surat Keterangan Napza
              </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['fc_rapor'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="fc_rapor" value="1"> 
                Fotocopy Rapor
              </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['surat_ket_nisn'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="surat_ket_nisn" value="1"> 
              Surat Keterangan NISN
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['skck_kepsek'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="skck_kepsek" value="1"> 
              Surat Kelakuan Baik dari Kepala Sekolah
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['fc_kk'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="fc_kk" value="1"> 
                Fotocopy Kartu Keluarga
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['fc_akta_lahir'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="fc_akta_lahir" value="1">
              Fotocopy Akta Lahir
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['surat_ket_rt'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="surat_ket_rt" value="1"> 
                Surat Keterangan RT
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['berkas_1'] == '1') {
          ?>
          <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="checkbox" name="berkas_1" value="1"> 
                <?php echo $settingformberkas['berkas_1']; ?> 
              </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['berkas_2'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="berkas_2" value="1"> 
              <?php echo $settingformberkas['berkas_2']; ?> 
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['berkas_3'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="berkas_3" value="1"> 
              <?php echo $settingformberkas['berkas_3']; ?> 
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['berkas_4'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="berkas_4" value="1"> 
              <?php echo $settingformberkas['berkas_4']; ?> 
            </div>
          </div>
          <?php
          }
          ?>
          <?php
          if ($settingform['berkas_5'] == '1') {
          ?>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" name="berkas_5" value="1"> 
              <?php echo $settingformberkas['berkas_5']; ?> 
            </div>
          </div>
          <?php
          }
          ?>

          <br>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-xs-6 col-md-offset-6">
                <button class="btn btn-dark" type="reset">Reset</button>
                <button class="btn btn-success" type="submit">Submit</button>
              </div>
            </div>

        </form>
      <?php
      }
      ?>
  </div><!--/.container-->
                </div>
<!-- ================================ end tab 7 ========================================== -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
</div>