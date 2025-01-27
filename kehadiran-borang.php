<?php
#memulakkan fugnsi session 
session_start();

#memanggil fail header.php, connection.php dan guard-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

#Mendapatkan maklumat aktiviti dari pangkalan data
$arahan_sql_aktiviti = "select* from aktiviti where id_aktiviti 
= '".$_GET['id_aktiviti']."' ";
$laksana_aktiviti  =  mysqli_query($condb,$arahan_sql_aktiviti);
$n  =  mysqli_fetch_array($laksana_aktiviti);

?>

<h3>Pengesahan Kehadiran Peserta</h3>

Nama Aktiviti : <?= $n['nama_aktiviti'] ?><br>
Tarikh | Masa : <?= $n['tarikh_aktiviti']." ".$n['masa_mula'] ?><br>
<br><br>

<?php include('butang-saiz.php');?>
<form action="kehadiran-proses.php?id_aktiviti=<?= $_GET['id_aktiviti']?>"
method="POST">
<table border="1" id="saiz" width="100%"> 
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>Nokp</td>
        <td>Sekolah</td>
        <td>Kehadiran</td>
    </tr>

    <?php

    #Arahan untuk mendapatkan data kehadiran setiap peserta 
    $arahan_sql_kehadiran = "SELECT 
    peserta.nokp,peserta.nama,
    sekolah.Nama_sekolah,
    kehadiran.id_aktiviti
    FROM peserta 
    LEFT JOIN sekolah
    ON peserta.id_sekolah  =  sekolah.id_sekolah
    LEFT JOIN kehadiran 
    ON peserta.nokp        =  kehadiran.nokp
    AND kehadiran.id_aktiviti='" .$_GET['id_aktiviti']."'
    ORDER BY peserta.nama";

    #Laksanakan arahan untuk memproses data 
    $laksana_kehadiran = mysqli_query($condb,$arahan_sql_kehadiran);
    $bil=0;

    #Mengambil dan memaparkan semua data kehadiran yang ditemui 
    while($m=mysqli_fetch_array($laksana_kehadiran)){ ?>
    <tr>
        <td><?=++$bil;?></td>
        <td><?= $m['nama']?></td>
        <td><?= $m['nokp']?></td>
        <td><?= $m['Nama_sekolah']?></td>
        <td><?php

        if($m['id_aktiviti'] !=null)
        {
            $tanda='checked';
        }else
        $tanda="";
        ?>

        <input <?= $tanda ?> type="checkbox" name="kehadiran[]"
        value="<?= $m['nokp'] ?>" style="width: 30px; height:30px;">
        </td>
    </tr>
<?php
}
?>
<tr>
    <td colspan="4"></td>
    <td><input type="submit" value="Simpan"></td>
</tr>
</table>
</form>
<?php include ('footer.php'); 
?>