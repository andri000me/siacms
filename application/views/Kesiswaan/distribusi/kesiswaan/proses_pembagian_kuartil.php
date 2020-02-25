<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:navy;">Pembagian Kelas Berdasarkan Kuartil<br></center>
        <center><small>Tahun Ajaran 2019-2020 Kurikulum 2013</small></center> </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>kesiswaan/distribusi_reg">Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <!-- include message for error and success -->
      <?php $this->load->view('common/messages') ?>
      
      <!-- /.row -->
      <!-- Main row -->
     <div class="row">
     
        <!-- /.col -->
        <div class="col-md-20">
          <div class="nav-tabs-custom">
            
            <div class="tab-content">
              <div class="active tab-pane" id="kelolamapel">
              
               <form method="post" action="<?php echo site_url('kesiswaan/hsl_pembagian_kuartil'); ?>">
                  <input type="hidden" name="jenjang" value="<?php echo $jenjang ?>">
                  <div class="bigbox-mapel"> 
                    <div class="box-mapel">
                      <br>
                      <center>
                      <select class="kodekelas" name="id_kelas_reguler_berjalan" id="kelas1" >
                        <option value="">Pilih Kelas</option>
                        <?php
                        foreach ($kelas_reguler_berjalan as $row_kelas) {
                          ?>
                          <option value="<?php echo $row_kelas->id_kelas_reguler_berjalan; ?>"><?php echo $row_kelas->nama_kelas; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <br>
                      </center>
                      
                      <br>

                    <!-- <div class="container">
                  <div class="right_col" role="main"> -->
                    <div class="col-md-6">
                    <table id="tabel-pembagian-laki" class="table table-striped">
                      <br>
                      <thead>
                        <tr id="myTr">
                          <th class="center">Pilih</th>
                          <th class="center">NISN</th>
                          <th class="center">Nama Siswa</th>
                          <?php
                          if ($settingtabel['jenis_kelamin'] == '1') {
                          ?>
                          <th class="center">JK</th>
                          <?php
                          }
                          ?>
                          <?php
                          if ($settingtabel['agama'] == '1') {
                          ?>
                          <th class="center">Agama</th>
                          <?php
                          }
                          ?>
                          <?php
                          if ($settingtabel['nilai_un'] == '1') {
                          ?>
                          <th class="center">Nilai UN</th>
                          <?php
                          }
                          ?>
                          <?php
                          if ($settingtabel['prestasi'] == '1') {
                          ?>
                          <th class="center">Prestasi</th>
                          <?php
                          }
                          ?>
                          <?php
                          if ($settingtabel['total_nilai_kenaikan'] == '1') {
                          ?>
                          <th class="center">Nilai Raport</th>
                          <?php
                          }
                          ?>
                          <th class="center">Kuartil</th>
                          <th class="center">Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php   
                          $no = 1;
                          if (count($siswaL) % 2 == 0) {
                            $batas1 = (count($siswaL) + 2) / 4;
                            $batas3 = ((3 * count($siswaL)) + 2) / 4;
                          } else {
                            $batas1 = (1 * (count($siswaL) + 1)) / 4;
                            $batas3 = (3 * (count($siswaL) + 1)) / 4;
                          }
                          
                          $i=0;
                          foreach ($siswaL as $murid): 
                            $i++;
                            if ($murid->prestasi_or != 0) {
                              $prestasi = $murid->prestasi_or;
                            } else {
                              $prestasi = $murid->prestasi_tahfidz;
                            }
                            if ($murid->total_nilai != 0) {
                              $nilai = $murid->total_nilai;
                            } else {
                              $nilai = $murid->nilai_un_nun;
                            }
                            if ($murid->jenis_kelamin == "Laki-Laki") { 
                              $jenis_kelamin = "L";
                            } else { 
                              $jenis_kelamin = "P"; 
                            }

                            if ($i <= $batas1) { 
                              $kuartil = "Q1";
                            } else if ($i >= $batas3) {
                              $kuartil = "Q3"; 
                            } else { 
                              $kuartil = "Q2"; 
                            }
                          ?>
                            <tr>
                              <td>
                                <?php if ($murid->nama_kelas == "") { ?>
                                <input type="checkbox" name="pilih[]" value="<?= $murid->nisn ?>">
                                <?php } ?>
                              </td>
                              <td><?= $murid->nisn ?></td>
                              <td><?= $murid->nama ?></td>
                              <?php
                              if ($settingtabel['jenis_kelamin'] == '1') {
                              ?>
                              <td><?= $jenis_kelamin ?></td>
                              <?php
                              }
                              ?>
                              <?php
                              if ($settingtabel['agama'] == '1') {
                              ?>
                              <td><?= $murid->agama ?></td>
                              <?php
                              }
                              ?>
                              <?php
                              if ($settingtabel['nilai_un'] == '1') {
                              ?>
                              <td><?= $nilai ?></td>
                              <?php
                              }
                              ?>
                              <?php
                              if ($settingtabel['prestasi'] == '1') {
                              ?>
                              <td><?= $prestasi ?></td> 
                              <?php
                              }
                              ?>
                              <?php
                              if ($settingtabel['total_nilai_kenaikan'] == '1') {
                              ?>
                              <td><?= $murid->total_nilai_kenaikan ?></td>
                              <?php
                              }
                              ?>
                              <td><?= $kuartil ?></td>
                              <td><?= $murid->nama_kelas ?></td> 
                            </tr>
                          <?php endforeach; ?>
                      </tbody>

                      </table>
                      
                    </div>
              </div>

                    <div class="col-md-6">
                    <table id="tabel-pembagian-perempuan" class="table table-striped">
                      <br>
                      <thead>
                        <tr>
                          <th class="center">Pilih</th>
                          <th class="center">NISN</th>
                          <th class="center">Nama Siswa</th>
                          <?php
                            if ($settingtabel['jenis_kelamin'] == '1') {
                          ?>
                          <th class="center">JK</th>
                          <?php
                          }
                          ?>
                          <?php
                            if ($settingtabel['agama'] == '1') {
                          ?>
                          <th class="center">Agama</th>
                          <?php
                          }
                          ?>
                          <?php
                            if ($settingtabel['nilai_un'] == '1') {
                          ?>
                          <th class="center">Nilai UN</th>
                          <?php
                          }
                          ?>
                          <?php
                            if ($settingtabel['prestasi'] == '1') {
                          ?>
                          <th class="center">Prestasi</th>
                          <?php
                          }
                          ?>
                          <?php
                            if ($settingtabel['total_nilai_kenaikan'] == '1') {
                          ?>
                          <th class="center">Nilai Raport</th>
                          <?php
                          }
                          ?>
                          <th class="center">Kuartil</th>
                          <th class="center">Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php   
                          $no = 1;
                          if (count($siswaP) % 2 == 0) {
                            $batas1 = (count($siswaP) + 2) / 4;
                            $batas3 = ((3 * count($siswaP)) + 2) / 4;
                          } else {
                            $batas1 = (1 * (count($siswaP) + 1)) / 4;
                            $batas3 = (3 * (count($siswaP) + 1)) / 4;
                          }
                          
                          $i=0;
                          foreach ($siswaP as $murid):
                            $i++; 
                            if ($murid->prestasi_or != 0) {
                              $prestasi = $murid->prestasi_or;
                            } else {
                              $prestasi = $murid->prestasi_tahfidz;
                            }
                            if ($murid->total_nilai != 0) {
                              $nilai = $murid->total_nilai;
                            } else {
                              $nilai = $murid->nilai_un_nun;
                            }
                            if ($murid->jenis_kelamin == "Perempuan") { 
                              $jenis_kelamin = "P";
                            } else { 
                              $jenis_kelamin = "L"; 
                            }
                          ?>
                            <tr>
                              <td>
                                <?php if ($murid->nama_kelas == "") { ?>
                                <input type="checkbox" name="pilih[]" value="<?= $murid->nisn ?>">
                                <?php } ?>
                              </td>
                              <td><?= $murid->nisn ?></td>
                              <td><?= $murid->nama ?></td>
                              <?php
                                if ($settingtabel['jenis_kelamin'] == '1') {
                              ?>
                              <td><?= $jenis_kelamin ?></td>
                              <?php
                              }
                              ?>
                              <?php
                                if ($settingtabel['agama'] == '1') {
                              ?>
                              <td><?= $murid->agama ?></td>
                              <?php
                              }
                              ?>
                              <?php
                                if ($settingtabel['nilai_un'] == '1') {
                              ?>
                              <td><?= $nilai ?></td>
                              <?php
                              }
                              ?>
                              <?php
                                if ($settingtabel['prestasi'] == '1') {
                              ?>
                              <td><?= $prestasi ?></td>
                              <?php
                              }
                              ?>
                              <?php
                                if ($settingtabel['total_nilai_kenaikan'] == '1') {
                              ?>
                              <td><?= $murid->total_nilai_kenaikan ?></td>
                              <?php
                              }
                              ?>
                              <td><?php if ($i <= $batas1) { echo "Q1"; } else if ($i >= $batas3) { echo "Q3"; } else { echo "Q2"; } ?></td>
                              <td><?= $murid->nama_kelas ?></td> 
                            </tr>
                          <?php endforeach; ?>
                      </tbody>
                      </table>

                        </div>
                       <div class="col-sm-offset-2 col-sm-10">
                        <br>
                       <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                    </div>
                  </div>

                  
                </form>
               
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
              </div>
            </div>
          </div>
        </div>
      </section>
              
<!-- ./wrapper -->
