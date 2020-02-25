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
            <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <li>
              <a href="<?php echo site_url('konseling/prestasi'); ?>"> Penghargaan </a>
            </li>
            <?php endif; ?>
            <li class="active">
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
            <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
          <li>
            <a href="<?php echo site_url('konseling/pengaturan_penghargaan'); ?>">Pengaturan </a>
          </li>
            <?php endif; ?>
        </ul>
      </br>
    </br>

    <div class="box">

      <div class="box-body">
        <h4><b>Data Prestasi Siswa<b/></h4>
        <input class="form-control" id="myInput" type="text" placeholder="NISN atau Nama">
        <br>
        <table class="table table-bordered">
          <tr style="background-color: #857bb8">
            <th style="width: 10px" class="text-center"><font color="#fff">No</font></th>
            <?php if($check["nisn"] != "off"): ?>
            <th class="text-center"><font color="#fff">NISN</font></th>
            <?php endif; ?>
            <?php if($check["nama"] != "off"): ?>
            <th class="text-center"><font color="#fff">Nama Siswa</font></th>
            <?php endif; ?>
            <?php if($check["kategori_prestasi"] != "off"): ?>
            <th class="text-center"><font color="#fff">Kategori Prestasi</font></th>
            <?php endif; ?>
            <?php if($check["nama_prestasi"] != "off"): ?>
            <th class="text-center"><font color="#fff">Nama Prestasi</font></th>
            <?php endif; ?>
            <?php if($check["tingkat_prestasi"] != "off"): ?>
            <th class="text-center"><font color="#fff">Tingkat</font></th>
            <?php endif; ?>
            <?php if($check["tahun"] != "off"): ?>
            <th class="text-center"><font color="#fff">Tahun</font></th> 
            <?php endif; ?>
            <?php if($check["peringkat"] != "off"): ?>
            <th class="text-center"><font color="#fff">Peringkat</font></th>
            <?php endif; ?>
            <?php if($check["penyelenggara"] != "off"): ?>
            <th class="text-center"><font color="#fff">Penyelenggaran</font></th>
            <?php endif; ?>
            <?php if($check["keterangan"] != "off"): ?>
            <th class="text-center"><font color="#fff">Keterangan</font></th>
            <?php endif; ?>
            <?php if($check["foto"] != "off"): ?>
            <th class="text-center"><font color="#fff">Foto</font></th>
            <?php endif; ?>
            <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
            <th class="text-center"><font color="#fff">Aksi</font></th>
            <?php endif; ?>
          </tr>
          <?php
          $i=0;
          foreach ($prestasi as $rowprestasi) {
            $i++;
            ?>
            <tbody id="myTable">
              <tr>
                <td><?php echo $i; ?>.</td>
                <?php if($check["nisn"] != "off"): ?>
                <td><?php echo $rowprestasi->nisn; ?></td>
                <?php endif; ?>
                <?php if($check["nama"] != "off"): ?>
                <td><?php echo $rowprestasi->nama; ?></td>
                <?php endif; ?>
                <?php if($check["kategori_prestasi"] != "off"): ?>
                <td><?php echo $rowprestasi->kategori_prestasi; ?></td>
                <?php endif; ?>
                <?php if($check["nama_prestasi"] != "off"): ?>
                <td><?php echo $rowprestasi->nama_prestasi; ?></td>
                <?php endif; ?>
                <?php if($check["tingkat_prestasi"] != "off"): ?>
                <td><?php echo $rowprestasi->tingkat_prestasi; ?></td>
                <?php endif; ?>
                <?php if($check["tahun"] != "off"): ?>
                <td><?php echo $rowprestasi->tahun; ?></td>
                <?php endif; ?>
                <?php if($check["peringkat"] != "off"): ?>
                <td><?php echo $rowprestasi->peringkat; ?></td>
                <?php endif; ?>
                <?php if($check["penyelenggara"] != "off"): ?>
                <td><?php echo $rowprestasi->penyelenggara; ?></td>
                <?php endif; ?>
                <?php if($check["keterangan"] != "off"): ?>
                <td><?php echo $rowprestasi->keterangan; ?></td>
                <?php endif; ?>
                <?php if($check["foto"] != "off"): ?>
                <td><img src="<?php echo base_url()."./assets/nonakademik/image/".$rowprestasi->fotoprestasi; ?>" width="200"/></td>
                <?php endif; ?>
                <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                <td>
                  <button type="button" class="btn btn-primary block" data-toggle="modal"
                  data-target="#<?= $rowprestasi->id_prestasi ?>">
                Edit</button>
                <a href="<?php echo site_url('konseling/deleteprestasi/'.$rowprestasi->id_prestasi); ?>" class="btn btn-danger block" onclick="return confirm('Apakah anda yakin? Data yang dihapus tidak akan bisa dikembalikan');">Delete</a>
                </td>
                <?php endif; ?>
              
              <div class="modal fade" id="<?=$rowprestasi->id_prestasi?>" tabindex="-1" role="dialog"
                aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"
                      aria-hidden="true">Edit</button>
                      <h3 class="modal-title" id="myModalLabel">Edit Detail Prestasi</h3>
                    </div>
                    <form class="form-horizontal" method="post"
                    action="<?php echo base_url().'konseling/editprestasi'?>" enctype="multipart/form-data">
                    <div class="modal-body">
                      
                      <div class="form-group">
                        <label for="tanggal" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Penghargaan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="id_prestasi" required="required" class="form-control hidden" value="<?= $rowprestasi->id_prestasi ?>">
                          <input type="text" name="old_poto" class="form-control hidden" value="<?= $rowprestasi->foto ?>">
                          <input type="date" name="tanggal" required="required" class="form-control" placeholder="Tanggal Penghargaan" style="font-size: 14px" 
                          value="<?= $rowprestasi->tanggal ?>">
                        </div>
                      </div>
                      <br/>
                      <br/>
                      <?php  if($check["kategori_prestasi"] != "off"): ?>
                        <div class="form-group">
                          <label for="kategori_prestasi" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Prestasi</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">                           
                            <select name="kategori_prestasi" class="form-control" style="font-size: 14px" id="cbsiswa">
                              <option value="">- Pilih Kategori Prestasi -</option>
                              <option value="Akademik" <?=$rowprestasi->kategori_prestasi === 'Akademik' ? 'selected' : '' ?>>Akademik</option>
                              <option value="Non Akademik" <?=$rowprestasi->kategori_prestasi === 'Non Akademik' ? 'selected' : '' ?>>Non Akademik</option>
                            </select>
                          </div>
                        </div>
                        <br/>
                        <br/>
                      <?php endif; ?>
                      <?php if($check["nama_prestasi"] != "off"): ?>
                        <div class="form-group">
                          <label for="nama_prestasi" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Prestasi</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="nama_prestasi" class="form-control " placeholder="Nama Prestasi" style="font-size: 14px" 
                            value="<?= $rowprestasi->nama_prestasi ?>">
                          </div>
                        </div>
                        <br/>
                        <br/>
                      <?php endif; ?>
                      <?php if($check["tahun"] != "off"):  ?>
                      <div class="form-group">
                        <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="tahun" class="form-control " placeholder="Tahun" style="font-size: 14px" 
                          value="<?= $rowprestasi->tahun ?>">
                        </div>
                      </div>
                      <br/>
                      <br/>
                    <?php endif; if($check["peringkat"] != "off"): ?>
                    <div class="form-group">
                      <label for="peringkat" class="control-label col-md-3 col-sm-3 col-xs-12">Peringkat</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="peringkat" required="required" class="form-control" placeholder="Peringkat" style="font-size: 14px" 
                        value="<?= $rowprestasi->peringkat ?>">
                      </div>
                    </div>
                    <br/>
                    <br/>
                  <?php endif; if($check["tingkat_prestasi"] != "off"): ?>
                  <div class="form-group">
                    <label for="tingkat_prestasi" class="control-label col-md-3 col-sm-3 col-xs-12">Tingkat</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" name="tingkat_prestasi" required="required" class="form-control" placeholder="Tingkat" style="font-size: 14px" 
                      value="<?= $rowprestasi->tingkat_prestasi ?>">
                    </div>
                  </div>
                  <br/>
                  <br/>
                <?php endif; if($check["foto"] != "off"): ?>
                <div class="form-group">
                  <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="file" name="foto" class="form-control" placeholder="foto" style="font-size: 14px" ?>
                  </div>
                </div>
                <br/>
                <br/>
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
  </tr> </tbody>
  <?php
}
?>
</table>
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
