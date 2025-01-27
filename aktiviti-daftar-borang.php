<?php
#Memulakan fungsi session 
session_start();

#Memanggil fail header dan fail kawalan-admin.php 
include('header.php');
include('kawalan-admin.php');
?>

<h3>Daftar Aktiviti Baharu</h3>
<!-- Borang untuk menerima data dari pengguna -->
<form action="aktiviti-daftar-proses.php" method="POST">
    
nama_aktiviti
<br><input type="text" name="Nama Aktiviti" required><br>

tarikh_aktiviti
<br><input type="date" name="Tarikh Aktiviti" min='<?= date("Y-m-d") ?>' required><br>

masa_mula
<br><input type="text"  name="Masa Mula"  required><br>

<input type="submit" value="Daftar">

</form>
<?php include('footer.php');?>