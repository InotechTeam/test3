<!DOCTYPE html>
<html>
<head>
  <title>Robot Sumo</title>
  <link rel="icon" type="image/x-icon" href="_b0e89bd4-2a69-48c1-a94b-b7be1d4c2dca-removebg-preview.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
  <body>
  
<header>
<!-- Tajuk sistem. Akan dipaparkan disebelah atas -->
<marquee direction="left" scrollamount="10" bgcolor="#606470">
  <h2>
    <span style="color: #f7f7f7;">SELAMAT  DATANG  KE  WEBSITE  SAH  KEHADIRAN  ACADEMY  ROBOT  SUMO  CAWANGAN  PULAU  PINANG</span>
  </h2>
</marquee>
<h1>PERTANDINGAN ROBOT SUMO</h1>
<p>Sistem Pengesahan Kehadiran Peserta</p>
</header>

<nav>
<?php  
  if(isset($_SESSION['tahap']) && $_SESSION['tahap'] == "ADMIN") {?>
<!-- Menu admin : dipaparkan sekiranya admin telah login --> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color: #f7f7f7;">Robot Sumo</a>
    </div>
<ul class="nav navbar-nav">
  <li class="active"><a href="index.php">Home</a></li>   
  <li><a href='profil.php'>Profil</a></li>
  <li><a href='kehadiran-rekod.php'>Kaunter Kehadiran</a></li>
  <li><a href='senarai-peserta.php'     >Senarai peserta</a></li>
  <li><a href='senarai-aktiviti.php'    >Senarai Aktiviti</a></li>
  <li><a href='kehadiran-laporan.php'   >Laporan Kehadiran</a></li>
  
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
</ul>
 </div>
</nav>
 <hr>

<?php } else if(isset($_SESSION['tahap']) && $_SESSION['tahap'] == "PESERTA BIASA"){ ?>
<!-- Menu peserta biasa : dipaparkan sekiranya peserta biasa telah login -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color: #f7f7f7;">Robot Sumo</a>
    </div>
<ul class="nav navbar-nav">
  <li class="active"><a href="index.php">Home</a></li>   
 <li><a href='profil.php'              >Profil</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
</ul>
  </div>
</nav>
 <hr>

<?php } else { ?>
<!-- menu Laman Utama : dipaparkan sekiranya admin atau peserta tidak login -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color: #f7f7f7;">Robot Sumo</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="customer-service.php">Customer Service</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup-borang.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login-borang.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

    <hr>
<?php } ?>
</nav>

