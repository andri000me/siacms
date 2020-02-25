
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
        <center style="color:navy;">Pelanggaran Siswa SMP Yogyakarta<br></center>
        <center><small><b>Tahun Ajaran 2019/2020</b></small></center>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('konseling');?>">Dashboard</a></li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
         <div class="row">
            <div class="col-md-12">
              <div class="class nav-tabs-custom">
       <ul class="nav nav-tabs pull-left"> 
          <li class="active">
            <a href="<?php echo site_url('konseling/pelanggaran'); ?>"> Pelanggaran </a>
          </li>
          <li>
              <a href="<?php echo site_url('konseling/laporan_pelanggaran'); ?>"> Laporan </a>
          </li>
          <li>
            <a href="<?php echo site_url('konseling/grafik'); ?>" class="dropdown-toggle" data-toggle="dropdown">Grafik</a>
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
          <li>
            <a href="<?php echo site_url('konseling/pengaturan_pelanggaran'); ?>">Pengaturan </a>
          </li>
       </ul>



<form role="form" method="post" action="<?php echo site_url('konseling/simpanpelanggaran'); ?>">
    <?php
      $tgl = date('Y-m-d');
      if ($this->input->post('tgl') != "") { $tgl = $this->input->post('tgl'); }
    ?>

  <div class="tab-content no-padding">
    <div class="chart tab-pane active" id="tab2" style="position: relative; ">
      <div class="box">
        <div class="box-body">
                      <h4><b>Formulir Pelanggaran Siswa</b></h4>
                      <h5>Silahkan isi detail pelanggaran yang dilakukan siswa dibawah ini :</h5>
                      <?php echo $this->session->flashdata('pesan'); ?>
                      <hr>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas</label>
                          <div class="col-md-7 col-sm-8 col-xs-10">
                          <select class="select2_single form-control" tabindex="-1" onchange="fetch_select_siswa(this.value);">
                            <option>-Pilih Kelas-</option>
                            <?php
                            foreach ($kelas_reguler as $row) {
                              ?>
                              <option value="<?php echo $row->id_kelas_reguler; ?>" ><?php echo $row->nama_kelas; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <br/>
                      <br/>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">NISN</label>
                          <div class="col-md-7 col-sm-8 col-xs-10">
                          <!--input type="text" name="nisn" required="required" class="form-control" placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px"-->
                          <select name="nisn" required="required" class="form-control" placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px" id="cbsiswa">
                            <option value="">-Pilih Siswa-</option>
                          </select>
                        </div>
                      </div>
                      <br/>
                      <br/>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pelanggaran</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="date" name="tanggal" required="required" class="form-control" placeholder="tanggal kejadian" style="font-size: 14px">
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <?php if($check["kategori_pelanggaran"] != "off"): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Pelanggaran</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <select class="select2_single form-control" tabindex="-1" name="kategori_pelanggaran">
                            <option value="">-Kategori Pelanggaran-</option>
                            <option value="Pelanggaran Ringan">Pelanggaran Ringan</option>  
                            <option value="Pelanggaran Sedang">Pelanggaran Sedang</option>  
                            <option value="Pelanggaran Berat">Pelanggaran Berat</option>
                          </select>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <?php endif;
                    if($check["bentuk_pelanggaran"] != "off"): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bentuk Pelanggaran</label>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <select name="id_bentuk" class="select2_single form-control" tabindex="-1" >
                              <option>- Pilih Bentuk Pelanggaran -</option>
                              <?php
                              foreach ($pelanggaran_bentuk as $row) {
                                ?>
                                <option value="<?php echo $row->id_bentuk_pelanggaran; ?>" ><?php echo $row->nama_pelanggaran . " (". $row->poin . " Poin)"; ?></option>
                                <?php
                              }
                              ?>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <?php endif;
                    if($check["pasal"] != "off"): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >No Pasal</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <select name="pasal" class="col-md-7 col-sm-8 col-xs-10">
                                <option value="1">Pasal 1</option>  
                                <option value="2">Pasal 2</option>  
                                <option value="3">Pasal 3</option>
                                <option value="4">Pasal 4</option>
                                <option value="5">Pasal 5</option>
                                <option value="6">Pasal 6</option>
                                <option value="7">Pasal 7</option>
                                <option value="8">Pasal 8</option>
                                <option value="9">Pasal 9</option>
                                <option value="10">Pasal 10</option>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <?php endif;
                    if($check["jenis_sanksi"] != "off"): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Sanksi</label>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <select name="jenis_sanksi" class="col-md-7 col-sm-8 col-xs-10">
                                <option value="">-Pilih Jenis Sanksi-</option>
                                <option value="Sanksi Langsung">Sanksi Langsung</option> 
                                <option value="Sanksi Tidak Langsung">Sanksi Tidak Langsung</option>  
                            </select>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <?php endif;
                    if($check["bentuk_sanksi"] != "off"): ?>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sanksi</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="bentuk_sanksi" required="required" class="form-control" placeholder="isi hukuman yang diberikan" style="font-size: 14px">
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <?php endif;
                    if($check["guru_piket"] != "off"): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guru Piket</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="guru_piket" class="form-control col-md-7 col-xs-12" placeholder="isi nama guru piket yang sedang bertugas" style="font-size: 14px">
                         </div>
                         </div>
                    <?php endif; ?>
                    
                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

                <?php
                  function tgl_indo($tanggal) {
                    $tgl = substr($tanggal, 8, 2);
                    $bln = substr($tanggal, 5, 2);
                    $thn = substr($tanggal, 0, 4);
                    if ($bln == "1") { $bulan = "Januari"; } 
                    if ($bln == "2") { $bulan = "Februari"; } 
                    if ($bln == "3") { $bulan = "Maret"; } 
                    if ($bln == "4") { $bulan = "April"; } 
                    if ($bln == "5") { $bulan = "Mei"; } 
                    if ($bln == "6") { $bulan = "Juni"; } 
                    if ($bln == "7") { $bulan = "Juli"; } 
                    if ($bln == "8") { $bulan = "Agustus"; } 
                    if ($bln == "9") { $bulan = "September"; } 
                    if ($bln == "10") { $bulan = "Oktober"; } 
                    if ($bln == "11") { $bulan = "November"; } 
                    if ($bln == "12") { $bulan = "Desember"; } 
                    return $tgl." ".$bulan." ".$thn;
                  }
                ?>
               <!-- <div class="box">
                        <div class="box-body">
                          <h4 class="box-title">Data Pelanggaran Siswa</h4>
                        <table class="table table-bordered">
                            <tr style="background-color: #53c68c">
                              <th style="width: 10px">No</th>
                              <th>NISN</th>
                              <th>nama</th>
                              <th>Tanggal Pelanggaran</th>
                              <th>Kategori Pelanggaran</th> 
                              <th>Bentuk Pelanggaran</th>
                              <th>No Pasal</th>
                              <th>Point Pelanggaran</th>
                              <th>Sanksi</th>
                              <th>Aksi</th>
                            </tr>
                            <?php
                            $i=0;
                            foreach ($pelanggaran as $rowpelanggaran) {
                              $i++;
                            ?>
                            <tr>
                              <td><?php echo $i; ?>.</td>
                              <td><?php echo $rowpelanggaran->nisn; ?></td>
                              <td><?php echo $rowpelanggaran->nama; ?></td>
                              <td><?php echo tgl_indo($rowpelanggaran->tanggal); ?></td>
                              <td><?php echo $rowpelanggaran->kategori_pelanggaran; ?></td>
                              <td><?php echo $rowpelanggaran->bentuk_pelanggaran; ?></td>
                              <td><?php echo $rowpelanggaran->pasal; ?></td>
                              <td><?php echo $rowpelanggaran->poin_pelanggaran; ?></td>
                              <td><?php echo $rowpelanggaran->bentuk_sanksi; ?></td>
                              <td><a href="<?php echo site_url('konseling/deletepelanggaran/'.$rowpelanggaran->id); ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?');">Del</a></td>
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
       </div>
     </div>
