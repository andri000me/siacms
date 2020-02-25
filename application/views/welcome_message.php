<!DOCTYPE html>
<head>
  <title>Sistem Informasi SMP</title>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/sweetalert/sweetalert.css'); ?>">
   
  <script type="text/javascript" src="<?php echo base_url('assets/superadmin/sweetalert/sweetalert.min.js'); ?>"></script>
</head>

<style>
  body{
    background: white;
  }

  #kotak{
    text-align: center;
    font-size: 70px;
    margin: auto;
    padding: auto;
    padding-top: 5%;

  }

  #menu{
    text-align: right;
    margin: auto;
    font-size: 19px;
    padding: auto;
    padding-right:3%;
    padding-top: 2%;
    height: auto;
    width: auto;
    letter-spacing: .1rem;
    word-spacing: 20px;

  }

  /**#selamatdatang{
    text-align: center;
    margin: auto;
    font-size: 150%;
    padding: auto;
    padding-top: 1%;
    height: auto;
    width: 400px;
  }*/

  #login{
    text-align: center;
    margin: auto;
    font-size: 16px;
    padding: 0 25px;
    padding-top: 2%;
    height: auto;
    width: 30%;
  }

  h2{
    color:white;
  }

</style>
<body>

  <div>
    <div id="menu">
      <div style="color:navy">
      <a href="<?php echo site_url('ppdb/calon_siswa/frontend_ppdb')?>">PPDB</a>  
      <a href="<?php echo site_url('Login')?>" >Login</a> 
      </div>
    </div>
  </div>

  <div>
    <div id="kotak">
      <div class="login-logo" style="color:navy">
      <b>SELAMAT DATANG</b><br>
      <img src="<?php echo base_url();?>assets/admin/image/smp.png" width="20%">
      <br>
      <div class="login-logo" style="color:navy">
       <b>SISTEM INFORMASI SMP</b>
     </div>

<!--<div class="form-group"> <?php echo $this->session->flashdata('warning')?></div>
</div>-->
</div>

</body>
</html>