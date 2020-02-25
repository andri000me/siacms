<div class="content-wrapper">

<section class="content-header">
      <h1>
        <center style="color:grey;">Penempatan Kelas Tambahan<br></center>
        <center><small>Tahun Ajaran 2019-2020 Kurikulum 2013</small></center> </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>distribusi/kesiswaan/">Dashboard</a></li>
      </ol> -->
    </section>

    <section class="content">
      <?php $this->load->view('common/messages') ?>

      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Data Master</a>
            </li>
            <li><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Penempatan Siswa</a>
            </li>
            <li><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Lihat Kelas</a>
            </li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_content4" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Tambah</a>
                            </li>
                            <li><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data Master Kelas</a>
                            </li>
                          </ul>
                <div class="tab-content"> 
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="home-tab">
                  <form class="form-horizontal form-mapel" method="post" action="<?php echo base_url('kesiswaan/tambahkelas_tambahan'); ?>">

                    <div class="bigbox-mapel">
                      <div class="box-mapel">
                        <div class="form-group formgrup jarakform">
                        <label class="control-label col-md-3" for="first-name">Jumlah Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                        <input type="text" class="form-control" name="jumlah_kelas_tambahan">
                      </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3">Pilih Jenjang</label>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select class="form-control" name="jenjang_kls_tambahan">
                            <option value="">- Pilih Jenjang -</option>
                            <option value="7">Kelas 7</option>
                            <option value="8">Kelas 8</option>
                            <option value="9">Kelas 9</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select class="form-control" name="penamaan">
                            <option value="">-Pilih Penamaan-</option>
                            <option value="angka">Angka (1,2,3,..)</option>
                            <option value="huruf">Huruf (A,B,C,..)</option>
                            <option value="romawi">Romawi (I,II,III,..)</option>
                          </select>
                        </div>
                      </div>
                       <!--  <label class="control-label col-md-3">Jenis Kelas</label>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select class="form-control" name="jenjang">
                            <option value="">- Pilih Jenis Kelas -</option>
                            <option value="7">Mata Pelajaran</option>
                            <option value="8">Ekstrakurikuler</option>
                          </select>
                        </div> -->
                      
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button> 
                          </div>
                      </div>
                      </div>
                    </div>
                  </form>
                </div>

                <!-- END TAB 4 -->

                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                        
                        <table class="table table-striped projects_1">
                      <thead>
                        <tr>
                          <th style="width: 1%"></th>
                          <th style="width: 1%">No</th>
                          <th style="width: 5%">Kelas</th>
                          
                          <th style="width: 5%">Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i=0;
                        foreach ($nama_kelas_tambahan as $m) {
                          $i++;
                      ?>
                        <tr>
                          <td><?php //echo $i; ?></td>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $m->nama_kelas_tambahan; ?></td>
                          
                          <td>
                            <a onclick="return confirm"('Apakah anda yakin akan menghapus data? <?php echo $m->id_kelas_tambahan; ?>') href="<?php echo site_url("kesiswaan/hapus_kelas_tambahan/".$m->id_kelas_tambahan) ?>" type="button" role="button" class="btn btn-block btn-danger button-action btnedit">Hapus</a>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                      </tbody>
                      </table>

                      </div>
                      </div>
                      </div>

                      <!-- END TAB 5 -->
              </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    
                 <form class="form-horizontal form-mapel" method="post" action="<?php echo base_url('kesiswaan/pilih_pembagian_tambahan'); ?>" enctype="multipart/form-data">
                  <div class="bigbox-mapel">
                  <div class="box-mapel">
                    <div class="row">
                    <div class="col-sm-9" align="right">
                      <a type="button" role="button" class="btn btn-default" href="<?php echo base_url(); ?>assets/distribusi/import/Ketentuan Unggah Hasil TPM.pdf" download="Ketentuan Unggah Hasil TPM.pdf" class="btn btn-download btn-xs"><i class="fa fa-download text-blue"></i> Download Ketentuan Unggah Hasil TPM</a>
                    </div>
                        <div class="col-sm-2" align="right">
                          <a type="button" role="button" class="btn btn-default" href="<?php echo base_url(); ?>assets/distribusi/import/Template Unggah Hasil TPM.xlsx" download="Template Unggah Hasil TPM.xlsx" class="btn btn-download btn-xs"><i class="fa fa-download text-blue"></i> Download Format Excel</a>
                        </div>
                  </div><br><br><br>

                  <div class="form-group">
                        <label class="control-label col-md-3">Pilih jenjang</label>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                          <select class="form-control" name="jenjang_kls_tambahan">
                            <option value="">- Pilih Jenjang -</option>
                            <option value="7">Kelas 7</option>
                            <option value="8">Kelas 8</option>
                            <option value="9">Kelas 9</option>
                          </select>
                        </div>
                  </div>

                  <div class="form-group">
                          <label class="control-label col-md-3"></label>
                          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                             <input type="submit" class="btn btn-primary" name="btntipe" value="Pengacakan">
                          </div>
                 </div>
                  </div>
                  </div>
                  </form>
                  </div>

               <!--    END TAB 2 -->
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            
                     
                      <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%"></th>
                          <th style="width: 1%">No</th>
                          <th style="width: 5%">Nama Kelas</th>
                          <th style="width: 5%"></th>
                          <th style="width: 5%">Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i=0;
                        foreach ($nama_kelas_tambahan as $m) {
                          $i++;
                      ?>
                        <tr>
                          <td><?php //echo $i; ?></td>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $m->nama_kelas_tambahan; ?></td>
                          
                          <td>
                           <div class="modal fade bs-example-modal-lg" id="myDetail<?php echo $i; ?>">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Daftar Siswa Kelas</h4>
                                </div>
                                <div class="modal-body">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <td>No</td>
                                        <td>NISN</td>
                                        <td>Nama</td>                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $no = 1;
                                      foreach ($m->siswa as $siswa): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $siswa->nisn ?></td>
                                        <td><?= $siswa->nama ?></td>
                                      </tr>
                                      <?php endforeach; ?>
                                      <?php if (!count($m->siswa)): ?>
                                        <tr>
                                          <td colspan="3">Belum ada siswa.</td>
                                        </tr>
                                      <?php endif; ?>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <!-- <button type="button" class="btn btn-primary button-form button-update-barang">Save changes</button> -->
                                </div>
                              </div>
                            </div>
                          </div> 
                          <a data-toggle="modal" class="btn btn-default btn-xs" data-show="true" data-target="#myDetail<?php echo $i; ?>">Detail Siswa</a>
                       
                          </td>
                          <td><a onclick="return confirm"('Apakah anda yakin akan menghapus data? <?php echo $m->id_kelas_tambahan; ?>') href="<?php echo site_url("kesiswaan/hapus_kelas_tambahan/".$m->id_kelas_tambahan) ?>" type="button" role="button" class="btn btn-block btn-danger button-action btnedit">Hapus</a>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                      </tbody>
                    </table>
                      </div>

                      <!-- END TAB 3 -->
            </div>
          </div>
        </div>
      </div>


    </section>


</div>