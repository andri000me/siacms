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
    <section class="col-lg-12 ">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-left">
          
          <li class="active">
            <a href="<?php echo site_url('konseling/perizinan'); ?>">Perizinan </a>            
          </li>
          <li>
            <a href="<?php echo site_url('konseling/laporan_perizinan'); ?>">Laporan </a>
          </li> 
          
          <li >
            <a href="<?php echo site_url('konseling/pengaturan_perizinan'); ?>"> Pengaturan </a>
          </li>

        </ul>

        <div class="tab-content no-padding">
          <div class="chart tab-pane active" id="tab1" style="position: relative; ">
            <div class="box">
              <div class="box-body">

                      
                <h4 class="box-title"><b>Formulir Pengisian Detail Perizinan Siswa<b/></h4>
                <h5>Silahkan isi detail perizinan yang dilakukan siswa dibawah ini :</h5>
              </div>


              <form role="form" method="post" action="<?php echo site_url('konseling/simpanperizinan'); ?>">
                <div class="box-body">
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-10">Tanggal</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                      <input type="date" name="tgl_mulai"/> <b>s/d</b> <input type="date" name="tgl_selesai"/>
                    </div>
                  </div>
                  <br/><br/>
                <?php if($check["keterangan"] != "off"): ?>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                    <div class="col-md-7 col-sm-8 col-xs-10">
                      <input type="text" name="keterangan" class="form-control col-md-7 col-xs-12" placeholder="Isi Keterangan Siswa" style="font-size: 14px">
                    </div>
                  </div>
                    <br/>
                    <br/>
                <?php endif;?>
                  
                <?php if($check["jam_ke"] != "off"): ?>
                    <div class="form-group">
                        <label for="jam_ke" class="control-label col-md-3 col-sm-3 col-xs-12">Jam Ke</label>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="number" min = "0" name="jam_ke" required="required" class="form-control" placeholder="Jam Ke" style="font-size: 14px">
                        </div>
                    </div>
                    <br/>
                    <br/>
                <?php endif;?>

                <?php if($check["jenis_perizinan"] != "off"): ?>
                    <div class="form-group">
                        <label for="jenis_perizinan" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Perizinan</label>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <select name="jenis_perizinan" class="col-md-7 col-sm-8 col-xs-10">
                                <option value="">-Pilih Jenis Perizinan-</option>
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
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text"  name="penanggung_jawab" required="required" class="form-control" placeholder="Penanggung Jawab" style="font-size: 14px">
                        </div>
                    </div>
                    <br/>
                    <br/>
                <?php endif;?>
                <?php if($check["wali_kelas"] != "off"): ?>
                    <div class="form-group">
                        <label for="wali_kelas" class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text"  name="wali_kelas" required="required" class="form-control" placeholder="Wali Kelas" style="font-size: 14px">
                        </div>
                    </div>
                    <br/>
                    <br/>
                <?php endif;?>
                <?php if($check["guru_piket"] != "off"): ?>
                    <div class="form-group">
                        <label for="guru_piket" class="control-label col-md-3 col-sm-3 col-xs-12">Guru Piket</label>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                          <input type="text" name="guru_piket" required="required" class="form-control" placeholder="Guru Piket" style="font-size: 14px">
                        </div>
                    </div>
                    <br/>
                    <br/>
                <?php endif;?>


                </div>
                

                <div class="box-footer">
                  <div> <?php echo $this->session->flashdata('success')?></div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>

  </div>
  <script>
    $(".swa-confirm").on("submit", function(e) {
      e.preventDefault();
      swal({
        title: $(this).data("swa-title"),
        text: $(this).data("swa-text"),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#cc3f44",
        confirmButtonText: $(this).data("swa-btn-txt"),
        closeOnConfirm: false,
        html: false
      }, function() {

      }
      );
    });
  </script>