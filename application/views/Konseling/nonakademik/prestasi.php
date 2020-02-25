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
      <center style="color:navy;">Penghargaan Siswa SMP Yogyakarta <br></center>
      <center><small><b>Tahun Ajaran 2019/2020</b></small></center>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('konseling');?>">Dashboard</a></li>
    </ol>
  </section>


  <section class="content">
    
    <div class="row">          
      <!-- Left col -->
      <section class="col-lg-12 ">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-left"> 
            <li class="active">
              <a href="<?php echo site_url('konseling/prestasi'); ?>"> Penghargaan </a>
            </li>
            <li>
              <a href="<?php echo site_url('konseling/laporan_penghargaan'); ?>"> Laporan </a>
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
          <li>
            <a href="<?php echo site_url('konseling/pengaturan_penghargaan'); ?>">Pengaturan </a>
          </li>
        </ul>
        <div class="tab-content no-padding">
          <div class="chart tab-pane active" id="tab1" style="position: relative; ">
            
            <div class="box">
              <div class="box-body">
                <!-- <br/><br/> -->
                <form role="form" method="post" action="<?php echo site_url('konseling/simpanprestasi'); ?>" enctype="multipart/form-data">
                    <!-- <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-3 col-sm-3 col-xs-10">
                          <input type="text" name="nama" required="required" class="form-control" placeholder="Nama">
                        </div>
                      </div> -->

                      <h4><b>Formulir Penghargaan Siswa<b/></h4>
                      <h5>Silahkan isi detail penghargaan yang dilakukan siswa dibawah ini :</h5>
                      
                      
                      <?php if($check["kelas"] != "off"): ?>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                            <select class="select2_single form-control" tabindex="-1" onchange="fetch_select_siswa(this.value);">
                              <option>-Pilih Kelas-</option>
                              <?php foreach ($kelas_reguler as $row) { ?>
                                <option value="<?php echo $row->id_kelas_reguler; ?>" ><?php echo $row->nama_kelas; ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <br/>
                        <br/>
                      <?php endif; if($check["nama"] != "off"): ?>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                          <div class="col-md-7 col-sm-8 col-xs-10">
                          <!--input type="text" name="nisn" required="required" class="form-control" placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px"-->
                          <select name="nisn" required="required" class="form-control" placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px" id="cbsiswa">
                            <option value="">-Pilih Siswa-</option>
                          </select>
                        </div>
                      </div>
                      <br/>
                      <br/>
                  <?php endif ?>
                      <div class="form-group">
                        <label for="tanggal" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Penghargaan</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="date" name="tanggal" required="required" class="form-control" placeholder="Tanggal Penghargaan" style="font-size: 14px">
                        </div>
                      </div>
                      <br/>
                      <br/>
                    <?php  if($check["kategori_prestasi"] != "off"): ?>
                    <div class="form-group">
                      <label for="kategori_prestasi" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Prestasi</label>
                      <div class="col-md-7 col-sm-8 col-xs-10">
                          <select name="kategori_prestasi" class="form-control" style="font-size: 14px" id="cbsiswa">
                            <option value="">- Pilih Kategori Prestasi -</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Non Akademik">Non Akademik</option>
                          </select>
                      </div>
                    </div>
                    <br/>
                    <br/>
                  <?php endif ?>
                  
                  <?php  if($check["nama_prestasi"] != "off"): ?>
                    <div class="form-group">
                      <label for="nama_prestasi" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Prestasi</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                        <input type="text" name="nama_prestasi" class="form-control col-md-3 col-xs-12" placeholder="Nama Prestasi" style="font-size: 14px">
                      </div>
                    </div>
                    <br/>
                    <br/>
                  <?php endif ?>

                  <?php  if($check["tahun"] != "off"): ?>
                  <div class="form-group">
                    <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                      <input type="text" name="tahun" class="form-control col-md-3 col-xs-12" placeholder="Tahun" style="font-size: 14px">
                    </div>
                  </div>
                  <br/>
                  <br/>
                <?php endif; if($check["peringkat"] != "off"): ?>
                <div class="form-group">
                  <label for="peringkat" class="control-label col-md-3 col-sm-3 col-xs-12">Peringkat</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                    <input type="text" name="peringkat" required="required" class="form-control" placeholder="Peringkat" style="font-size: 14px">
                  </div>
                </div>
                <br/>
                <br/>
              <?php endif; if($check["tingkat_prestasi"] != "off"): ?>
              <div class="form-group">
                <label for="tingkat_prestasi" class="control-label col-md-3 col-sm-3 col-xs-12">Tingkat</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                  <input type="text" name="tingkat_prestasi" required="required" class="form-control" placeholder="Tingkat" style="font-size: 14px">
                </div>
              </div>
              <br/>
              <br/>
            <?php endif; if($check["foto"] != "off"): ?>
            <div class="form-group">
              <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                <input type="file" name="foto" required="required" class="form-control" placeholder="foto" style="font-size: 14px">
              </div>
            </div>
            <br/>
            <br/>
          <?php endif; ?>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      
            <!--          <div class="box">
                        <div class="box-body">
                        <table class="table table-bordered">
                            <tr style="background-color: #53c68c">
                              <th style="width: 10px">No</th>
                              <th>Nama Siswa</th>
                              <th>Jenis Prestasi</th>
                              <th>Tahun</th> 
                              <th>Peringkat</th>
                              <th>Tingkat</th>
                              <th>Foto</th>
                            </tr>
                            <?php
                            $i=0;
                            foreach ($prestasi as $rowprestasi) {
                              $i++;
                            ?>
                            <tr>
                              <td><?php echo $i; ?>.</td>
                              <td><?php echo $rowprestasi->nama; ?></td>
                              <td><?php echo $rowprestasi->jenis_prestasi; ?></td>
                              <td><?php echo $rowprestasi->tahun; ?></td>
                              <td><?php echo $rowprestasi->peringkat; ?></td>
                              <td><?php echo $rowprestasi->tingkat_pend; ?></td>
                              <td><img src="<?php echo base_url()."./assets/nonakademik/image/".$rowprestasi->fotoprestasi; ?>" width="200"/></td>
                            </tr> 
                            <?php
                            }
                            ?>
                          </table>
                        </div> -->
                        <!-- <div class="box-footer clearfix">
                          <a href="#" class="btn btn-primary">Kembali</a>
                        </div> -->
                      </div>
                      
                      
                    </div>
                    
                    
                    
                    
                    
                    
                  </div>
                </div>
              </section>
            </div>

            
          </section>
          <!-- /.content -->
        </div>