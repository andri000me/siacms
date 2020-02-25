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
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li><a href="<?php echo site_url('konseling/keterlambatan'); ?>">Keterlambatan </a></li>
                  <?php  endif; ?>
            <li class="active">
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
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li>
              <a href="<?php echo site_url('konseling/pengaturan'); ?>"> Pengaturan </a>
            </li>
                  <?php  endif; ?>
          </ul>
          <br />
          <br />

          <div style="margin: 20px;">              
            <h4>Tabel Laporan Keterlambatan Siswa <?= isset($siswa['nama']) ?$siswa['nama']: '' ?> </h4>
            <a href="<?php echo site_url('konseling/laporanketerlambatan/'); ?>" class="btn btn-success">Semua Laporan</a>
            <br>
            <br>

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Alasan</th>
                  <th>Jenis Sanksi</th>
                  <th>Bentuk Sanksi </th>
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                  <th>Action</th>
                  <?php  endif; ?>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php foreach($terlambat as $ter): ?>
                <tr>
                  <td><?= $ter["tgl_terlambat"] ?></td>
                  <td><?= $ter["jam"] ?></td>
                  <td><?= $ter["alasan"] ?></td>
                  <td><?= $ter["jenis_sanksi"] ?></td>
                  <td><?= $ter["bentuk_sanksi"] ?></td>
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                <td>
                    <button type="button" class="btn btn-primary block" data-toggle="modal" data-target="#<?= $ter['id_keterlambatan'] ?>">
                        Edit</button>
                    <a href="<?php echo site_url('konseling/deleteketerlambatan/'.$ter['id_keterlambatan']); ?>" class="btn btn-danger block"
                        onclick="return confirm('Apakah anda yakin? Data yang dihapus tidak akan bisa dikembalikan');">Delete</a>
                </td>
                  <?php  endif; ?>
                <div class="modal fade" id="<?= $ter['id_keterlambatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Edit</button>
                                <h3 class="modal-title" id="myModalLabel">Edit Detail Terlambat</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'konseling/editketerlambatan'?>">
                                <div class="modal-body">    
                                    <div class="box-body">                              
                
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-10">Tanggal</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                            <input type="text" name="id" required="required" class="form-control hidden"
                                             value="<?= $ter['id_keterlambatan'] ?>">
                                            <input type="date" name="tgl_terlambat" required="required" class="form-control"
                                            placeholder="tanggal terlambat" style="font-size: 14px" value = "<?=$ter['tgl_terlambat']?>">
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                                      <?php if($check['jam'] != 'off') : ?>
                                      <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jam</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <input type="text" name="jam" class="form-control"
                                            placeholder="Isi Jam Keterlambatan Siswa" style="font-size: 14px" value = "<?=$ter['jam']?>">
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                                      <?php endif;
                                                        if($check["alasan"] != "off"): ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <input type="text" name="alasan" class="form-control "
                                            placeholder="Isi Alasan Keterlambatan Siswa" style="font-size: 14px" value = "<?=$ter['alasan']?>">
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                  
                                      <?php endif;
                                                        if($check["kelamin"] != "off"): ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Jenis Kelamin</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
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
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <select class="select2_single form-control" tabindex="-1" name="jenis_sanksi">
                                            <option value="<?= (!empty($ter['jenis_sanksi'])) ? $ter['jenis_sanksi'] : '' ?>">
                                            <?= (!empty($ter['jenis_sanksi'])) ? $ter['jenis_sanksi'] : "- Pili Jenis Sanksi-";?>
                                          </option>
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
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <input type="text" name="bentuk_sanksi" class="form-control "
                                            placeholder="isi bentuk sanksi yang diberikan" style="font-size: 14px" value = "<?=$ter['bentuk_sanksi']?>">
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                  
                                      <?php endif;
                                                        if($check["wali_kelas"] != "off"): ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <input type="text" name="wali_kelas" class="form-control "
                                            placeholder="isi nama wali kelas siswa" style="font-size: 14px" value = "<?=$ter['wali_kelas']?>">
                                        </div>
                                      </div>
                                      <br />
                                      <br />
                  
                                      <?php endif;
                                                        if($check["guru_piket"] != "off"): ?>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guru Piket</label>
                                        <div class="col-md-9 col-sm-9 col-xs-10">
                                          <input type="text" name="guru_piket" class="form-control "
                                            placeholder="isi nama guru piket yang sedang bertugas" style="font-size: 14px" value = "<?=$ter['guru_piket']?>">
                                        </div>
                                      </div>
                                      <?php endif; ?>
                                    </div>
                                </div>
                
                
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </tr>
                <?php endforeach ?>
            </table>
            <br><br><br>
          </div>
        </div>
      </section>
    </div>

    <script>
      $(document).ready(function () {
        $("#myInput").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
  </section>
  <!-- /.content -->
</div>