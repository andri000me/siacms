<section id="feature" class="transparent-bg">
  <div class="container">
      <br><br><br><br>
      <h2><center>Formulir Penerimaan Peserta Didik Baru</center></h2>
      <br><br>
      <?php echo $this->session->userdata('pesan'); ?>
      <?php echo $this->session->userdata('pesanlain'); ?>
      <?php 
      if ($settingform['nisn_pendaftar'] == '0')
      {
          ?><br><br><br><br><br><h3><center>Bukan masa Pendaftaran Penerimaan Peserta Didik Baru</center></h3><br><br><br><br><br><br><br><br><br>
          <?php
      } else {
        ?>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('ppdb/calon_siswa/form_ppdb/savependaftar'); ?>" >

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
</section><!--/#feature-->