<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:grey;">Hasil Pembagian Kelas Tambahan<br></center>
        <center><small>Tahun Ajaran 2019-2020 Kurikulum 2013</small></center> </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>kesiswaan/distribusi_tam">Dashboard</a></li>
      </ol>
    </section>


   <!-- Main content -->
              <body>
                  <div class="container">
                    <br />
                    <form method="post" id="import_form" enctype="multipart/form-data">
                      <p><label>Hasil Tes Pendalaman Materi</label>
                      <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                      <br />
                      <input type="submit" name="import" value="Import" class="btn btn-info" />
                    </form>
                    <form method="post" action="<?php echo site_url('kesiswaan/penempatan_kelas_tambahan'); ?>">
                    <center>
                      <input type="hidden" name="jenjang_kls_tambahan" value="<?php echo $jenjang_kls_tambahan ?>">
                      <select class="kodekelas" name="id_kelas_tambahan" id="kelas1" >
                        <option value="">Pilih Kelas</option>
                        <?php
                        foreach ($kelas_tambahan as $row_kelas_tambahan) {
                          ?>
                          <option value="<?php echo $row_kelas_tambahan->id_kelas_tambahan ?>"><?php echo $row_kelas_tambahan->nama_kelas_tambahan; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <br>
                    </center>
                    <br>
                    <div class="table-responsive" id="kelas_tambahan">
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                  <br>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </div>
                  
                </body>
                </html>
                <script>
                $(document).ready(function(){

                  load_data();

                  function load_data()
                  {
                    $.ajax({
                      url:"<?php echo base_url(); ?>distribusi/excel_import/fetch",
                      method:"POST",
                      success:function(data){
                        $('#kelas_tambahan').html(data);
                      }
                    })
                  }

                  $('#import_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                      url:"<?php echo base_url(); ?>distribusi/excel_import/import",
                      method:"POST",
                      data:new FormData(this),
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(data){
                        $('#file').val('');
                        load_data();
                        alert(data);
                      }
                    })
                  });

                });
                </script>
              </form>