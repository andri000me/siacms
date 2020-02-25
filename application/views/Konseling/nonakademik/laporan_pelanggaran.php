<style>
  .block {
    display: block;
    width: 100%;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    margin-bottom: 4px;
  }

  .block:hover {
    background-color: #ddd;
    color: black;
  }
</style>
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

  <?php echo $this->session->flashdata('pesan'); ?>
  
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="class nav-tabs-custom">
          <ul class="nav nav-tabs pull-left">
            <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
              <li>
                <a href="<?php echo site_url('konseling/pelanggaran'); ?>"> Pelanggaran </a>
              </li>
            <?php endif; ?>
            <li class="active">
              <a href="<?php echo site_url('konseling/laporan_pelanggaran'); ?>"> Laporan </a>
            </li>
            <li>
              <a href="<?php echo site_url('konseling/grafik'); ?>" class="dropdown-toggle"
                data-toggle="dropdown">Grafik</a>
                <ul class="dropdown-menu">
                <!-- <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Perkelas">Perkelas</a></li>
                  <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Mingguan">Mingguan</a></li> -->
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
                    <li>
                      <a href="<?php echo site_url('konseling/pengaturan_pelanggaran'); ?>">Pengaturan </a>
                    </li>
                  <?php endif; ?>
                </ul>
          <!--     <div class="box-header with-border">
                  <h3 class="box-title">Pelanggaran siswa</h3>
                </div> -->

                <form role="form" method="post" action="<?php echo site_url('konseling/editpelanggaran'); ?>">
                  <?php
                  $tgl = date('Y-m-d');
                  if ($this->input->post('tgl') != "") { $tgl = $this->input->post('tgl'); }
                  ?>

                  <?php
                  $colors = [];
                  foreach ($pelanggaran as $rowpelanggaran) {
                    if(isset($colors[$rowpelanggaran->nisn])) {
                      $colors[$rowpelanggaran->nisn]['jum'] += isset($rowpelanggaran->poin) ? $rowpelanggaran->poin : 0;
                      if($colors[$rowpelanggaran->nisn]['jum'] > 100) {
                        $colors[$rowpelanggaran->nisn]['mark'] = true;
                      }
                    }else {
                      $colors[$rowpelanggaran->nisn] = [
                        'mark' => false,
                        'jum' => isset($rowpelanggaran->poin) ? $rowpelanggaran->poin : 0
                      ];
                    }
                  }
                  ?>
                  <div class="tab-content no-padding">
                    <div class="chart tab-pane active" id="tab2" style="position: relative; ">
                      <div class="box">
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

                        <div class="box-body">
                          <h4 class="box-title"><b>Data Pelanggaran Siswa</b></h4>
                          <input class="form-control" id="_search_pelanggaran" type="text" placeholder="NISN atau Nama" value=""/>  
                          <br>
                          <p>
                            <b style="margin-left:15px;">Filter By</b>
                          </p>
                          <div style="margin-bottom:50px;">
                            <?php if($check["kategori_pelanggaran"] != "off"): ?>
                              <div class="form-group" >
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Pelanggaran</label>
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                  <select class="select2_single form-control" id="fkategori" name = "fkategori">
                                    <option value="all">- Pilih Kategori Pelanggaran -</option>
                                    <option value="Pelanggaran Ringan" <?= $kategori === "Pelanggaran Ringan" ? 'selected' : '' ?> >Pelanggaran Ringan</option>
                                    <option value="Pelanggaran Sedang" <?= $kategori === "Pelanggaran Sedang" ? 'selected' : '' ?>>Pelanggaran Sedang</option>
                                    <option value="Pelanggaran Berat" <?= $kategori === "Pelanggaran Berat" ? 'selected' : '' ?>>Pelanggaran Berat</option>
                                  </select>
                                </div>
                              </div>
                              <br>
                              <br>
                            <?php endif; ?>
                            <?php if($check["tanggal"] != "off"): ?>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester</label>
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                  <select class="select2_single form-control" id="fsemester">
                                    <option value="all"> - Pilih Semester -  </option>
                                    <option value="1" <?= $semester === 1 ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= $semester === 2 ? 'selected' : '' ?>>2</option>
                                  </select>
                                </div>
                              </div>
                            <?php endif; ?>
                          </div>
                          <br>
                          <table class="table table-bordered" id="tabl">
                            <tr style="background-color: #857bb8">
                              <th style="width: 10px" class="text-center">
                                <font color="#fff">No</font>
                              </th>
                              <?php if($check["nisn"] !== "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">NISN</font>
                                </th>
                              <?php endif; ?>
                              <?php if($check["nama"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">Nama</font>
                                </th>
                              <?php endif; ?>
                              <?php if($check["tanggal"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">Tanggal Pelanggaran</font>
                                </th>
                              <?php endif; ?>
                              <?php if($check["kategori_pelanggaran"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">Kategori Pelanggaran</font>
                                </th>
                              <?php endif; ?>
                              <?php if($check["bentuk_pelanggaran"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">Bentuk Pelanggaran</font>
                                </th>
                              <?php endif; ?>
                              <?php if($check["pasal"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">No Pasal</font>
                                </th>
                              <?php endif; ?>                             
                              
                              <?php if($check["jenis_sanksi"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">Jenis Sanksi</font>
                                </th>
                              <?php endif; ?>
                              <?php if($check["bentuk_sanksi"] != "off"): ?>
                                <th class="text-center">
                                  <font color="#fff">Sanksi</font>
                                </th>
                              <?php endif; ?>
                              <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
                                <th class="text-center">
                                  <font color="#fff">Aksi</font>
                                </th>
                              <?php endif; ?>
                            </tr>
                            <?php
                            $i=0;
                            foreach ($pelanggaran as $rowpelanggaran) {
                              $i++;
                              ?>
                              <tbody id="tb_pelanggaran">
                                <tr bgcolor= "<?php if($colors[$rowpelanggaran->nisn]['mark']) echo 'lightgreen'; ?>">
                                  <td><?php echo $i; ?>.</td>
                                  <?php if($check["nisn"] != "off"): ?>
                                    <td class="c_nisn"><?php echo $rowpelanggaran->nisn; ?></td>
                                  <?php endif; ?>     
                                  <?php if($check["nama"] != "off"): ?>
                                    <td class="c_nama"><?php echo $rowpelanggaran->nama; ?></td>
                                  <?php endif; ?>     
                                  <?php if($check["tanggal"] != "off"): ?>
                                    <td class="c_tanggal"><?php echo tgl_indo($rowpelanggaran->tanggal); ?></td>
                                  <?php endif; ?>     
                                  <?php if($check["kategori_pelanggaran"] != "off"): ?>   
                                    <td class="c_kategori"><?php
                                    if($rowpelanggaran->kategori_pelanggaran === 'Pelanggaran Berat') {
                                      echo '<font color="red">'.$rowpelanggaran->kategori_pelanggaran.'</font>'; 
                                    }else {
                                      echo $rowpelanggaran->kategori_pelanggaran;
                                    }
                                    ?>
                                  </td>   
                                <?php endif; ?>                      
                                <?php if($check["bentuk_pelanggaran"] != "off"): ?>
                                  <td>
                                    <?php 
                                    echo isset($rowpelanggaran->nama_pelanggaran) ? $rowpelanggaran->nama_pelanggaran . " (".$rowpelanggaran->poin." Poin)" : "-"; 
                                    ?>
                                  </td>   
                                <?php endif; ?>                      
                                <?php if($check["pasal"] != "off"): ?>
                                  <td><?php echo $rowpelanggaran->pasal; ?></td>   
                                <?php endif; ?>   
                                
                                <?php if($check["jenis_sanksi"] != "off"): ?>
                                  <td><?php echo $rowpelanggaran->jenis_sanksi; ?></td>   
                                <?php endif; ?>                      
                                <?php if($check["bentuk_sanksi"] != "off"): ?>
                                  <td><?php echo $rowpelanggaran->bentuk_sanksi; ?></td>     
                                <?php endif; ?>                      
                                <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
                                  <td>
                                    <button type="button" class="btn btn-primary block" data-toggle="modal"
                                    data-target="#<?= $rowpelanggaran->id ?>">
                                  Edit</button>
                                  <a href="<?php echo site_url('konseling/deletepelanggaran/'.$rowpelanggaran->id); ?>"
                                    class="btn btn-danger block"
                                    onclick="return confirm('Apakah anda yakin? Data yang dihapus tidak akan bisa dikembalikan');">Delete</a>
                                  </td>
                                <?php endif; ?>
                                <div class="modal fade" id="<?=$rowpelanggaran->id?>" tabindex="-1" role="dialog"
                                  aria-labelledby="largeModal" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">Edit</button>
                                        <h3 class="modal-title" id="myModalLabel">Edit Detail Pelanggaran</h3>
                                      </div>
                                      <form class="form-horizontal" method="post"
                                      action="<?php echo base_url().'konseling/editpelanggaran'?>">
                                      <div class="modal-body">
                                        <div class="form-group">
                                          <label for="middle-name"
                                          class="control-label col-md-3 col-sm-3 col-xs-12">NISN</label>
                                          <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="id" required="required" class="form-control hidden"
                                            placeholder="isi hukuman yang diberikan" value="<?= $rowpelanggaran->id ?>">
                                            <!--input type="text" name="nisn" required="required" class="form-control" placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px"-->
                                            <select class="select2_single form-control" tabindex="-1"
                                            placeholder="Nomor Induk Siswa Nasional" style="font-size: 14px" id="cbsiswa"
                                            name="nisn" required="required">
                                            <option
                                            value="<?= (!empty($rowpelanggaran->nisn)) ? $rowpelanggaran->nisn : "-Pilih Siswa-" ; ?>">
                                            <?= (!empty($rowpelanggaran->nisn)) ? $rowpelanggaran->nisn : "-Pilih Siswa-" ; ?>
                                          </option>
                                        </select>
                                      </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                      Pelanggaran</label>
                                      <div class="col-md-9 col-sm-9 col-xs-10">
                                        <input type="date" name="tanggal" required="required" class="form-control"
                                        placeholder="tanggal kejadian" style="font-size: 14px" value = "<?=$rowpelanggaran->tanggal ?>">
                                      </div>
                                    </div>
                                    <br />
                                    <br />
                                    <?php if($check["kategori_pelanggaran"] != "off"): ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori
                                        Pelanggaran</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <select class="select2_single form-control" tabindex="-1"
                                          name="kategori_pelanggaran">
                                          <option
                                          value="<?= (!empty($rowpelanggaran->kategori_pelanggaran)) ? $rowpelanggaran->kategori_pelanggaran : "" ?>">
                                          <?= (!empty($rowpelanggaran->kategori_pelanggaran)) ? $rowpelanggaran->kategori_pelanggaran : "-Kategori Pelanggaran-";?>
                                        </option>
                                        <option value="Pelanggaran Ringan">Pelanggaran Ringan</option>
                                        <option value="Pelanggaran Sedang">Pelanggaran Sedang</option>
                                        <option value="Pelanggaran Berat">Pelanggaran Berat</option>
                                      </select>
                                    </div>
                                  </div>
                                  <br />
                                  <br />
                                <?php endif; ?>
                                <?php if($check["bentuk_pelanggaran"] != "off"): ?>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bentuk Pelanggaran</label>
                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                      <select name="id_bentuk" class="select2_single form-control" tabindex="-1" >
                                        <option value = "">- Pilih Bentuk Pelanggaran -</option>
                                        <?php
                                        foreach ($pelanggaran_bentuk as $row) {
                                          ?>
                                          <option value="<?php echo $row->id_bentuk_pelanggaran; ?>" <?=$rowpelanggaran->id_bentuk == $row->id_bentuk_pelanggaran ? 'selected' : '' ?>>
                                            <?php echo $row->nama_pelanggaran . " (". $row->poin . " Poin)"; ?>
                                          </option>
                                          <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <br />
                                  <br />
                                <?php endif;
                                if($check["pasal"] != "off"): ?>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No Pasal</label>
                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                      <select class="select2_single form-control" tabindex="-1" name="pasal">
                                        <?php if(!empty($rowpelanggaran->pasal)){ ?>
                                          <option value="<?= $rowpelanggaran->pasal ?>">Pasal
                                            <?= $rowpelanggaran->pasal ?></option>
                                          <?php }else{ ?>
                                            <option value="">-Pilih Pasal-</option>
                                          <?php }; ?>
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
                                    <br />
                                    <br />
                                  <?php endif;
                                  
                                  if($check["jenis_sanksi"] != "off"): ?>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Sanksi</label>
                                      <div class="col-md-9 col-sm-9 col-xs-10">
                                        <select class="select2_single form-control" tabindex="-1" name="jenis_sanksi">
                                          <option value="<?= $rowpelanggaran->jenis_sanksi ?>">
                                            <?= $rowpelanggaran->jenis_sanksi ?></option>
                                            <option value="Sanksi Langsung">Sanksi Langsung</option>
                                            <option value="Sanksi Tidak Langsung">Sanksi Tidak Langsung</option>
                                          </select>
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                                    <?php endif;
                                    if($check["bentuk_sanksi"] != "off"): ?>
                                      <div class="form-group">
                                        <label for="middle-name"
                                        class="control-label col-md-3 col-sm-3 col-xs-12">Sanksi</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <input type="text" name="bentuk_sanksi" required="required" class="form-control"
                                          placeholder="isi hukuman yang diberikan" style="font-size: 14px"
                                          value="<?= $rowpelanggaran->bentuk_sanksi ?>">
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                                    <?php endif;
                                    if($check["guru_piket"] != "off"): ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guru Piket</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                          <input type="text" name="guru_piket" class="form-control col-md-7 col-xs-12"
                                          placeholder="isi nama guru piket yang sedang bertugas" style="font-size: 14px"
                                          value="<?= $rowpelanggaran->guru_piket ?>">
                                        </div>
                                      </div>
                                    <?php endif; ?>
                                  </div>


                                  <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </tr></tbody>
                      <?php } ?>
                    </table>
                    <br>
                    <p>
                      <b>Keterangan : </b>
                      <br>
                      <p>
                        Kolom mark hijau : poin pelanggaran siswa &gt; 100
                        <br>
                        Kolom mark putih : poin pelanggaran siswa &lt; 100
                      </p>
                    </p>
                  </div>
                  
                </section>
              </div>
            </div>

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
 
 $('#fkategori').on('change', function() {
  var smst = $("#fsemester").val()
  window.location = '<?php echo site_url('konseling/laporan_pelanggaran'); ?>/'+ this.value + '/' + smst;  
});

$('#fsemester').on('change', function() {
  var fk = $("#fkategori").val()
  window.location = '<?php echo site_url('konseling/laporan_pelanggaran'); ?>/'+ fk + '/' + this.value;  
});



 $(document).ready(function () {
  $("#_search_pelanggaran").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    console.log('search');
    
    $("#tb_pelanggaran tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>