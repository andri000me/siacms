<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:grey;">Pembagian Kelas Berdasarkan Prestasi<br></center>
        <center><small>Tahun Ajaran 2016-2017 Kurikulum 2013</small></center> </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>distribusi/kesiswaan/index">Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <!-- /.row -->
      <!-- Main row -->
     <div class="row">
   
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            
            <div class="tab-content">
              <div class="active tab-pane" id="kelolamapel">
              
               <form class="form-horizontal formmapel" method="post" action="<?php echo base_url();?>distribusi/kesiswaan/hsl_pembagian_prestasi">
                  <div class="bigbox-mapel"> 
                    <div class="box-mapel">

                  <?php
                    //for ($i=0; $i<$jumlah_kelas; $i++) {
                    $i=-1;
                    foreach ($kelas_reguler as $row_kelas_reguler) {
                      $i++;
                  ?>
                  
                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-4">
                          <input name="nama_kelas<?php echo $i; ?>" type="text" class="form-control" readonly value="<?php echo $row_kelas_reguler->nama_kelas; ?>">
                          <input name="id_kelas_reguler<?php echo $i; ?>" type="hidden" readonly value="<?php echo $row_kelas_reguler->id_kelas_reguler; ?>">
                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Jumlah Siswa</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" value="" name="jumlah_siswa<?php echo $i; ?>">
                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Pilih Jenis Kelamin</label>
                        <div class="col-sm-4">
                          <select class="form-control" value="" name="jenis_kelamin<?php echo $i; ?>">
                            <option value="">Campur</option>
                            <option value="Perempuan">Perempuan Saja</option>
                            <option value="Laki-Laki">Laki-Laki Saja</option>
                          </select>
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                    <?php
                      }
                    ?>

                    </div>
                  </div>

                  <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="jumlah_kelas" value="<?php echo count($kelas_reguler); ?>">
                  <input type="hidden" name="jenjang" value="<?php echo $jenjang; ?>">
                  <button type="submit" class="btn btn-primary">Bagi Kelas</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  
                  
                  </div>
                </form>
               
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              
<!-- ./wrapper -->
