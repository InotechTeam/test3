<?php
session_start();
include('connection.php');

$masa = date("H:i:s");

#menyemak kewujudan data GET id_aktiviti
if(!empty($_GET['id_aktiviti']) and !empty($_SESSION['nokp'])){
    #arahan simpan data kehadiran
    $sql = "insert into kehadiran (id_aktiviti,nokp,masa_hadir)
    values ('".$_GET['id_aktiviti']."', '".$_SESSION['nokp']."','$masa')";

    #laksana arahan simpan
    $simpandata = mysqli_query($condb,$sql);

    #menguji proses simpanan
    if($simpandata){
        echo "<script>
        alert('Kehadiran Telah Disahkan');
        window.location.href = 'profil.php';
        </script>";
    }else{
        echo "<script>
        alert ('Kehadiran gagal disahkan, sila ke meja urussetia');
        window.location.href = 'profil.php';
        </script>";
    }
}else{
    echo"<script>
    alert('akses secara terus');
    window.location.href = 'logout.php';
    </script>";
}
?>