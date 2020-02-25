<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
      <center style="color:navy;">Keteralambatan Siswa SMP Yogyakarta<br></center>
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
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                        <li><a href="<?php echo site_url('konseling/keterlambatan'); ?>">Keterlambatan </a></li>
                  <?php  endif; ?>
                        <li >
                        <a href="<?php echo site_url('konseling/laporanketerlambatan'); ?>"> Laporan </a>
                        </li>
                        <li>                            
                        <li class="dropdown active">                            
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
                        </li>
                  <?php if($this->session->userdata('jabatan') !== 'Siswa'): ?>
                        <li>
                        <a href="<?php echo site_url('konseling/pengaturan'); ?>"> Pengaturan </a>
                        </li>
                  <?php  endif; ?>
                    </ul>

                    <br /><br /><br /><br />
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>
                            <h3 class="box-title" id="Bulanan">Grafik <?php echo $jenis; ?></h3>
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
                text: 'Keterlambatan Siswa'
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
                name: 'Keterlambatan',
                data: jumlah
        
            }]
        });
    });
    
        </script>
    