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

    <section class="content">

        <div class="row">
            <section class="col-lg-12 ">
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-left">
                    
                        <li>
                            <a href="<?php echo site_url('konseling/pelanggaran'); ?>"> Pelanggaran </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('konseling/laporan_pelanggaran'); ?>"> Laporan </a>
                        </li>
                        <li class="dropdown active">
                            <a class="dropdown-toggle " data-toggle="dropdown">Grafik</a>
                            <ul class="dropdown-menu">
                                <!-- <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Perkelas">Perkelas</a></li>
                                        <li><a tabindex="-1" href="<?php //echo site_url('nonakademik/grafik'); ?>#Mingguan">Mingguan</a></li> -->
                                <li><a tabindex="-1" href="<?php echo site_url('konseling/grafikpelanggaran') .'/Bulanan'; ?>">Bulanan</a>
                                </li>
                                <li><a tabindex="-1" href="<?php echo site_url('konseling/grafikpelanggaran').'/Tahunan'; ?>">Tahunan</a>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <a href="<?php echo site_url('konseling/bentuk_pelanggaran'); ?>">Bentuk Pelanggaran </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('konseling/pengaturan_pelanggaran'); ?>">Pengaturan </a>
                        </li>
                    </ul>

                    <br /><br /><br /><br />
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>
                            <h3 class="box-title" id="Bulanan">Grafik <?php echo $jenis; ?></h3>
                            <br>
                            <br>
                          <p>
                            <b style="margin-left:15px;">Filter By</b>
                          </p>
                          <div style="margin-bottom:50px;">
                            <?php if($check["kategori_pelanggaran"] != "off"): ?>
                              <div class="form-group">
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
                            <?php if($check["bentuk_pelanggaran"] != "off"): ?>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bentuk Pelanggaran</label>
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                  <select class="select2_single form-control" id="fbentuk">
                                    <option value="all"> - Pilih Bentuk Pelanggaran -  </option>
                                    <?php foreach($pelanggaran_bentuk as $b) : ?>
                                    <option value="<?= $b->id_bentuk_pelanggaran ?>" <?= $b->id_bentuk_pelanggaran == $bentuk ? 'selected' : '' ?>>
                                        <?= $b->nama_pelanggaran . ' ('.$b->poin. ' poin)' ?>
                                    </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            <?php endif; ?>
                          </div>
                          <br>
                        </div>
                        <div class="box-body">
                            
                            <script
                                src="<?php echo base_url(); ?>assets/nonakademik/highcharts/code/highcharts.js"></script>
                            <script
                                src="<?php echo base_url(); ?>assets/nonakademik/highcharts/code/modules/exporting.js"></script>

                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


                            <!-- <div id="bar-chart2" style="height: 300px;"></div> -->
                        </div>
                    </div>
                </div>
        </div>
</div>
</section>
</div>
</section>
</div>

<input type="hidden" id="cats" name="cats" value='<?php echo json_encode($categories, true) ?>'>
<input type="hidden" id="jumlah" name="jumlah" value='<?php echo json_encode($jumlah, true) ?>'>
<input type="hidden" id="custId" name="custId" value="3487">

<script type="text/javascript">

    $('#fkategori').on('change', function() {
    var bnt = $("#fbentuk").val()
    window.location = '<?php echo site_url('konseling/grafikpelanggaran'). '/'.$jenis; ?>/'+ this.value + '/' + bnt;  
    });

    $('#fbentuk').on('change', function() {
    var fk = $("#fkategori").val()
    window.location = '<?php echo site_url('konseling/grafikpelanggaran'). '/'.$jenis; ?>/'+ fk + '/' + this.value;  
    });


    $( document ).ready(function() {
        var cats = JSON.parse(document.getElementById("cats").value);
        console.log(cats);
        var jumlah = JSON.parse(document.getElementById("jumlah").value);
        console.log(jumlah);
            
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pelanggaran Siswa'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: cats,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Siswa'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Siswa</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pelanggaran',
                data: jumlah
        
            }]
        });
    });
    
        </script>
    