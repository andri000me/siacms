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
  </script><div class="content-wrapper">
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
  
              <li class="active">
                <a href="<?php echo site_url('konseling/keterlambatan'); ?>"> Keterlambatan </a>
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
              <li>
                <a href="<?php echo site_url('konseling/pengaturan'); ?>">Pengaturan </a>
              </li>
            </ul>
  
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="tab2" style="position: relative; ">
                <div class="box">
                  <div class="box-body">
  
                    <h4 class="box-title"><b>Formulir Pengisian Detail Keterlambatan Siswa<b/></h4>
                    <h5>Silahkan isi detail keterlambatan yang dilakukan siswa dibawah ini :</h5>
                  </div>
  
                  <form role="form" method="post" action="<?php echo site_url('konseling/simpanketerlambatan'); ?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <select class="select2_single form-control" tabindex="-1"
                            onchange="fetch_select_siswa(this.value);">
                            <option>-Pilih Kelas-</option>
                            <?php
                                              foreach ($kelas_reguler as $row) {
                                              ?>
                            <option value="<?php echo $row->id_kelas_reguler; ?>"><?php echo $row->nama_kelas; ?></option>
                            <?php
                                              }
                                              ?>
                          </select>
                        </div>
                      </div>
                      <br />
                      <br />
  
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <!--input type="text" name="nisn" required="required" class="form-control" placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px"-->
                          <select name="nisn" required="required" class="form-control"
                            placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px" id="cbsiswa">
                            <option value="">-Pilih Siswa-</option>
                          </select>
                        </div>
                      </div>
                      <br />
                      <br />
  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-10">Tanggal</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="date" name="tgl_terlambat" />
                        </div>
                      </div>
                      <br />
                      <br />
                      <?php if($check['jam'] != 'off') : ?>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jam</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="jam" class="form-control col-md-7 col-xs-12"
                            placeholder="Isi Jam Keterlambatan Siswa" style="font-size: 14px">
                        </div>
                      </div>
                      <br />
                      <br />
                      <?php endif;
                                        if($check["alasan"] != "off"): ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="alasan" class="form-control col-md-7 col-xs-12"
                            placeholder="Isi Alasan Keterlambatan Siswa" style="font-size: 14px">
                        </div>
                      </div>
                      <br />
                      <br />
  
                      <?php endif;
                                        if($check["kelamin"] != "off"): ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Jenis Kelamin</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <select class="select2_single form-control" tabindex="-1" name="jk">
                            <option value="">-Pilih Jenis Kelamin-</option>
                            <option value="Pelanggaran Ringan">Laki-Laki</option>
                            <option value="Pelanggaran Sedang">Perempuan</option>
  
                          </select>
                        </div>
                        <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" name="kelamin" class="form-control col-md-7 col-xs-12" placeholder="Isi Jenis Kelamin" style="font-size: 14px">
                                          </div> -->
                      </div>
                      <br />
                      <br />
  
                      <?php endif;
                                        if($check["jenis_sanksi"] != "off"): ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Sanksi</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <select class="select2_single form-control" tabindex="-1" name="jenis_sanksi">
                            <option value="">-Pilih Jenis Sanksi-</option>
                            <option value="Langsung">Langsung</option>
                            <option value="Tidak Langsung">Tidak Langsung</option>
  
                          </select>
                        </div>
                        <!--<div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" name="jenis_sanksi" class="form-control col-md-7 col-xs-12" placeholder="Isi Jenis Sanksi" style="font-size: 14px">
                                          </div> -->
                      </div>
                      <br />
                      <br />
  
                      <?php endif;
                                        if($check["bentuk_sanksi"] != "off"): ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bentuk Sanksi</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="bentuk_sanksi" class="form-control col-md-7 col-xs-12"
                            placeholder="isi bentuk sanksi yang diberikan" style="font-size: 14px">
                        </div>
                      </div>
                      <br />
                      <br />
  
                      <?php endif;
                                        if($check["wali_kelas"] != "off"): ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="wali_kelas" class="form-control col-md-7 col-xs-12"
                            placeholder="isi nama wali kelas siswa" style="font-size: 14px">
                        </div>
                      </div>
                      <br />
                      <br />
  
                      <?php endif;
                                        if($check["guru_piket"] != "off"): ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guru Piket</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="guru_piket" class="form-control col-md-7 col-xs-12"
                            placeholder="isi nama guru piket yang sedang bertugas" style="font-size: 14px">
                        </div>
                      </div>
                      <?php endif; ?>
  
  
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
  
  
            <!--    <div class="tab-content no-padding">
                                <div class="chart tab-pane active" id="tab1" style="position: relative; ">
                                  <div class="box">
                                    <div class="box-body">
                                      <center><h3>Data Keterlambatan siswa</h3></center>
                                      <select name="id_tahun_ajaran" id="id_tahun_ajaran" onchange="document.location='<?php echo site_url('konseling/keterlambatan');?>/' + document.getElementById('id_tahun_ajaran').value;">
                                        <option value=""></option>  
                                        <?php
                                        foreach ($tahunajaran as $rowtahunajaran) {
                                          ?>
                                          <option value="<?php echo $rowtahunajaran->id_tahun_ajaran; ?>" <?php if ($id_tahun_ajaran == $rowtahunajaran->id_tahun_ajaran) { echo " selected"; } ?>><?php echo $rowtahunajaran->nama_file_kaldik; ?></option>  
                                          <?php
                                        }
                                        ?>
                                      </select>
                                      <br/><br/>
                                      <table class="table table-bordered">
                                        <tr style="background-color: #53c68c">
                                          <th>Semester</th>
                                          <th>Jumlah Siswa</th>
                                          <th>Jumlah Terlambat</th>
                                        </tr>
                                        <?php
                                        foreach ($keterlambatan as $row_keterlambatan) {
                                          ?>
                                          <tr >
                                            <td> Semester 1</td>
                                            <td>
                                              <a data-toggle="modal" data-show="true" href="<?php echo site_url('konseling/dataketerlambatan/'.$id_tahun_ajaran."/".$row_keterlambatan->jml); ?>" data-target="#myModal<?php echo $row_keterlambatan->orang ?>"><?php echo $row_keterlambatan->orang; ?> Siswa</a>
                                            </td>
                                            <td>
                                              <?php echo $row_keterlambatan->jml; ?> Kali
                                            </td>
                                          </tr>
  
                                          <div id="myModal<?php echo $row_keterlambatan->orang ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-md">
  
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Edit Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                  
                                                </div>
                                              </div>
  
                                            </div>
                                          </div>
  
                                          <?php
                                        }
                                        ?>
                                      </table>
                                    </div>
  
                                  </div>
                                </div>            
                              </section>
                            </div>
                          </section>
                          <!-- /.content -->
          </div>