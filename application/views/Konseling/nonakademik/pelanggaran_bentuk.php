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
            <li >
              <a href="<?php echo site_url('konseling/laporan_pelanggaran'); ?>"> Laporan </a>
            </li>
            <li>
              <a href="<?php echo site_url('konseling/grafik'); ?>" class="dropdown-toggle"
                data-toggle="dropdown">Grafik</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1"
                    href="<?php echo site_url('konseling/grafikpelanggaran') .'/Bulanan'; ?>">Bulanan</a></li>
                    <li><a tabindex="-1"
                      href="<?php echo site_url('konseling/grafikpelanggaran').'/Tahunan'; ?>">Tahunan</a></li>
                    </ul>
                  </li>
                  <li class="active">
                    <a href="<?php echo site_url('konseling/bentuk_pelanggaran'); ?>">Bentuk Pelanggaran </a>
                  </li>
                  <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
                    <li>
                      <a href="<?php echo site_url('konseling/pengaturan_pelanggaran'); ?>">Pengaturan </a>
                    </li>
                  <?php endif; ?>
                </ul>

                <div class="tab-content no-padding">
                  <div class="chart tab-pane active" id="tab2" style="position: relative; ">
                    <div class="box">


                      <div class="box-body">
                        <p>                      
                          <h4><b>Data Bentuk Pelanggaran</b></h4> 
                        </p>
                        
                        <button style="margin-bottom:10px;" type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#addmodal">Tambah</button>
                        <input  class="form-control" id="_search" type="text" placeholder="Nama Pelanggaran" value=""/>  
                        <br>
                        <table class="table table-bordered">
                          <tr style="background-color: #857bb8">
                            <th style="width: 10px" class="text-center">
                              <font color="#fff">No</font>
                            </th>
                            <th class="text-center">
                              <font color="#fff">Nama Pelanggaran</font>
                            </th>
                            <th class="text-center">
                              <font color="#fff">Jumlah Poin</font>
                            </th>
                            <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
                              <th class="text-center">
                                <font color="#fff">Aksi</font>
                              </th>
                            <?php endif; ?>
                          </tr>
                          <?php
                          $i=0;
                          foreach ($bentuk as $row) {
                            $i++;
                            ?>
                            <tbody id="myTable">
                              <tr>
                                <td><?php echo $i; ?>.</td>
                                <td><?php echo $row->nama_pelanggaran; ?></td>
                                <td><?php echo $row->poin; ?></td>                 
                                <?php if($this->session->userdata('jabatan') !== 'Siswa') : ?>
                                  <td>
                                    <button type="button" class="btn btn-primary block" data-toggle="modal"
                                    data-target="#<?= $row->id_bentuk_pelanggaran ?>">
                                  Edit</button>
                                  <a href="<?php echo site_url('konseling/deletebentukpelanggaran/'.$row->id_bentuk_pelanggaran); ?>"
                                    class="btn btn-danger block"
                                    onclick="return confirm('Apakah anda yakin? Data yang dihapus tidak akan bisa dikembalikan');">Delete</a>
                                  </td>
                                <?php endif; ?>
                                <div class="modal fade" id="<?=$row->id_bentuk_pelanggaran?>" tabindex="-1" role="dialog"
                                  aria-labelledby="largeModal" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">Edit</button>
                                        <h3 class="modal-title" id="myModalLabel">Edit Bentuk</h3>
                                      </div>
                                      <form class="form-horizontal" method="post"
                                      action="<?php echo base_url().'konseling/editbentukpelanggaran'?>">
                                      <div class="modal-body">
                                        <div class="form-group">
                                          <label for="middle-name"
                                          class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggaran</label>
                                          <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="id" required="required" class="form-control hidden"
                                            value="<?= $row->id_bentuk_pelanggaran ?>">  
                                            <input type="text" name="nama_pelanggaran" required="required" class="form-control"
                                            placeholder="Nama Pelanggaran" style="font-size: 14px" value = "<?=$row->nama_pelanggaran ?>">                                        
                                          </div>
                                        </div>
                                        <br />
                                        <br />
                                        <div class="form-group">
                                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Poin</label>
                                          <div class="col-md-9 col-sm-9 col-xs-10">
                                            <input type="number" name="poin" required="required" class="form-control"
                                            placeholder="Point Pelanggaran" style="font-size: 14px" value = "<?=$row->poin ?>">
                                          </div>
                                        </div>
                                        <br />
                                        <br />
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="addmodal" tabindex="-1" role="dialog"
          aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">+</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Bentuk Pelanggaran</h3>
              </div>
              <form class="form-horizontal" method="post"
              action="<?php echo base_url().'konseling/simpanbentukpelanggaran'?>">
              <div class="modal-body">
                <div class="form-group">
                  <label for="middle-name"
                  class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggaran</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" name="nama_pelanggaran" required="required" class="form-control"
                    placeholder="Nama Pelanggaran" style="font-size: 14px" value = "">                                        
                  </div>
                </div>
                <br />
                <br />
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Poin</label>
                  <div class="col-md-9 col-sm-9 col-xs-10">
                    <input type="number" name="poin" required="required" class="form-control"
                    placeholder="Point Pelanggaran" style="font-size: 14px" value = "">
                  </div>
                </div>
                <br />
                <br />
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-info">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </section>
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