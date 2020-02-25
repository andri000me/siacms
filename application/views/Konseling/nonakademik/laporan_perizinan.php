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
 function search(ele) {
  if(event.key === 'Enter') {
    var urlx =  '<?php echo site_url('konseling/laporan_pelanggaran'); ?>/'+ ele.value;
    console.log(urlx);
    window.location.href =   urlx;
  }
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
      <center style="color:navy;">Perizinan Siswa SMP Yogyakarta<br></center>
      <center><small><b>Tahun Ajaran 2019-2020</b></small></center>
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
            <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li>
              <a href="<?php echo site_url('konseling/perizinan'); ?>">Perizinan </a>              
            </li>
            <?php endif; ?>
            <li class="active">
              <a href="<?php echo site_url('konseling/laporan_perizinan'); ?>">Laporan </a>
            </li> 
            <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li >
              <a href="<?php echo site_url('konseling/pengaturan_perizinan'); ?>"> Pengaturan </a>
            </li>
            <?php endif; ?>

          </ul>
          <br>
          <br>
          <!--     <div class="box-header with-border">
                  <h3 class="box-title">Pelanggaran siswa</h3>
                </div> -->

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
                  <h4 class="box-title"><b>Data Perizinan Siswa</b></h4>
                  <input class="form-control" id="_search" type="text" placeholder="NISN atau Nama" />  
                  <br>
                  <table class="table table-bordered">
                    <tr style="background-color: #857bb8">
                      <th style="width: 10px" class="text-center">
                        <font color="#fff">No</font>
                      </th>
                      <th class="text-center">
                        <font color="#fff">NISN</font>
                      </th>
                      <th class="text-center">
                        <font color="#fff">Nama</font>
                      </th>
                      <th class="text-center">
                        <font color="#fff">Tanggal</font>
                      </th>
                      <?php if($check["keterangan"] != "off"): ?>
                      <th class="text-center">
                        <font color="#fff">Keterangan</font>
                      </th>
                      <?php endif;?>
                      <?php if($check["jam_ke"] != "off"): ?>
                      <th class="text-center">
                        <font color="#fff">Jam Ke</font>
                      </th>
                      <?php endif;?>
                      <?php if($check["jenis_perizinan"] != "off"): ?>
                      <th class="text-center">
                        <font color="#fff">Jenis Perizinan</font>
                      </th>
                      <?php endif;?>
                      <?php if($check["penanggung_jawab"] != "off"): ?>
                      <th class="text-center">
                        <font color="#fff">Penanggung Jawab</font>
                      </th>
                      <?php endif;?>
                      <?php if($check["wali_kelas"] != "off"): ?>
                      <th class="text-center">
                        <font color="#fff">Wali Kelas</font>
                      </th>
                      <?php endif;?>
                      <?php if($check["guru_piket"] != "off"): ?>
                      <th class="text-center">
                        <font color="#fff">Guru Piket</font>
                      </th>
                      <?php endif;?>
                      <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                      <th class="text-center">
                        <font color="#fff">Aksi</font>
                      </th>
                          <?php endif;?>                          
                    </tr>
                    <?php
                    $i=0;
                    foreach ($absenharian as $row) {
                      $i++;
                      ?>
                      <tbody id="myTable">
                        <tr>
                          <td><?php echo $i; ?>.</td>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama; ?></td>
                          <td><?php echo tgl_indo($row->tgl_mulai). ' - '.tgl_indo($row->tgl_selesai); ?></td>
                          <?php if($check["keterangan"] != "off"): ?>
                          <td><?php echo $row->keterangan; ?></td>
                          <?php endif;?>                 
                          <?php if($check["jam_ke"] != "off"): ?>
                          <td><?php echo $row->jam_ke; ?></td>
                          <?php endif;?>
                          <?php if($check["jenis_perizinan"] != "off"): ?>
                          <td><?php echo $row->jenis_perizinan; ?></td>
                          <?php endif;?>
                          <?php if($check["penanggung_jawab"] != "off"): ?>
                          <td><?php echo $row->penanggung_jawab; ?></td>
                          <?php endif;?>
                          <?php if($check["wali_kelas"] != "off"): ?>
                          <td><?php echo $row->wali_kelas; ?></td>
                          <?php endif;?>
                          <?php if($check["guru_piket"] != "off"): ?>
                          <td><?php echo $row->guru_piket; ?></td>
                          <?php endif;?>                          
                          <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                          <td>
                            <button type="button" class="btn btn-primary block" data-toggle="modal"
                            data-target="#<?= $row->id_absen_harian ?>">
                          Edit</button>
                          <a href="<?php echo site_url('konseling/deleteperizinan/'.$row->id_absen_harian); ?>"
                            class="btn btn-danger block"
                            onclick="return confirm('Apakah anda yakin? Data yang dihapus tidak akan bisa dikembalikan');">Delete</a>
                          </td>
                          <?php endif;?>                          

                          <div class="modal fade" id="<?=$row->id_absen_harian?>" tabindex="-1" role="dialog"
                            aria-labelledby="largeModal" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"
                                  aria-hidden="true">Edit</button>
                                  <h3 class="modal-title" id="myModalLabel">Edit Detail Perizinan</h3>
                                </div>
                                <form class="form-horizontal" method="post"
                                action="<?php echo base_url().'konseling/edit_perizinan'?>">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-10">Tanggal</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="text" name="id_absen_harian" required="required" class="form-control hidden" value="<?= $row->id_absen_harian ?>">
                                      <input type="date" name="tgl_mulai" 
                                      value="<?= $row->tgl_mulai ?>"> <b>s/d</b> <input type="date" name="tgl_selesai" 
                                      value="<?= $row->tgl_selesai ?>">
                                    </div>
                                  </div>
                                  <br/><br/>
                                  <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="text" name="keterangan" class="form-control " placeholder="Isi Keterangan Siswa" style="font-size: 14px" 
                                      value="<?= $row->keterangan ?>">
                                    </div>
                                  </div>
                                  <br/>
                                  <br/>                                  
                                  <?php if($check["jam_ke"] != "off"): ?>
                                    <div class="form-group">
                                      <label for="jam_ke" class="control-label col-md-3 col-sm-3 col-xs-12">Jam Ke</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" min = "0" name="jam_ke" required="required" class="form-control" placeholder="Jam Ke" style="font-size: 14px" 
                                        value="<?= $row->jam_ke ?>">
                                      </div>
                                    </div>
                                    <br/>
                                    <br/>
                                  <?php endif;?>

                                  <?php if($check["jenis_perizinan"] != "off"): ?>
                                    <div class="form-group">
                                      <label for="jenis_perizinan" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Perizinan</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="jenis_perizinan" class="col-md-7 col-sm-8 col-xs-10">
                                        <option
                                        value="<?= (!empty($row->jenis_perizinan)) ? $row->jenis_perizinan : "" ?>">
                                        <?= (!empty($row->jenis_perizinan)) ? $row->jenis_perizinan : "-Pilih Jenis Perizinan-";?>
                                      </option>
                                          <option value="Meninggalkan Kelas">Meninggalkan Kelas</option> 
                                          <option value="Tidak Mengikuti KBM">Tidak Mengikuti KBM</option>  
                                        </select>
                                      </div>
                                    </div>
                                    <br/>
                                    <br/>
                                  <?php endif;?>
                                  <?php if($check["penanggung_jawab"] != "off"): ?>
                                    <div class="form-group">
                                      <label for="penanggung_jawab" class="control-label col-md-3 col-sm-3 col-xs-12">Penanggung Jawab</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text"  name="penanggung_jawab" required="required" class="form-control" placeholder="Penanggung Jawab" style="font-size: 14px" 
                                        value="<?= $row->penanggung_jawab ?>">
                                      </div>
                                    </div>
                                    <br/>
                                    <br/>
                                  <?php endif;?>
                                  <?php if($check["wali_kelas"] != "off"): ?>
                                    <div class="form-group">
                                      <label for="wali_kelas" class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text"  name="wali_kelas" required="required" class="form-control" placeholder="Wali Kelas" style="font-size: 14px" 
                                        value="<?= $row->wali_kelas ?>">
                                      </div>
                                    </div>
                                    <br/>
                                    <br/>
                                  <?php endif;?>
                                  <?php if($check["guru_piket"] != "off"): ?>
                                    <div class="form-group">
                                      <label for="guru_piket" class="control-label col-md-3 col-sm-3 col-xs-12">Guru Piket</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="guru_piket" required="required" class="form-control" placeholder="Guru Piket" style="font-size: 14px" 
                                        value="<?= $row->guru_piket ?>">
                                      </div>
                                    </div>
                                    <br/>
                                    <br/>
                                  <?php endif;?>
                                  
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
                </div>
                
                <script>
                  $(document).ready(function () {
                    $("#_search").on("keyup", function () {
                      var value = $(this).val().toLowerCase();
                      $("#myTable tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                      });
                    });
                  });
                </script>
              </section>
  <!-- <div class="box-footer clearfix">
                          <a href="#" class="btn btn-primary">Kembali</a>
                        </div> -->
                      </div>
                    </div>