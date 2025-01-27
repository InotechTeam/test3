<?php
session_start();

include('header.php');
include('connection.php');

#menyemak kewujudan nilai pemboleh ubah session['nokp']
if(empty($_SESSION['nokp'])){
    #jika nilai session nokp tidak wujud/kosong, aturcara akan dihentikan
    die("<script> alert('sila login');
    window.location.href = 'logout.php';</script>");
}
?>

<table width = '100%' bgcolor ='#afeeee' border = '1'>
    <tr>
        <td width = '70%' align = 'center' valign ='top'>
            <h3>Rekod Kehadiran</h3>
            
            <!--Header jadual untuk memaparkan senarai aktiviti--> 
            <table align = 'center' width = '100%' border = '1' id = 'saiz' bgcolor='white'>
                <caption>
                    Pengesahan kendiri hanya boleh dilakukan pada tarikh aktiviti dilaksanakan sahaja
                </caption> 
                <tr align = 'center' bgcolor = '#FEF1C1'>
                    <td>Nama Aktiviti</td>
                    <td>Tarikh | Masa</td>
                    <td>Kehadiran</td>
                </tr>
                <?php

                #arahan query untuk mencari senarai aktiviti
                $arahan_papar = "select* from aktiviti";

                #laksanakan arahan mencari data aktviti
                $laksana = mysqli_query($condb, $arahan_papar);

                #mengambil data yang ditemui
                while($m = mysqli_fetch_array($laksana)){
                    #memaparkan senarai nama dalam jadual
                    echo"<tr >
                    <td>".$m['nama_aktiviti']."</td>
                    <td>".$m['tarikh_aktiviti']." | ".$m['masa_mula']."</td>
                    <td align = 'center'>";
                    #arahan mendapatkan data kehadiran ahli bagi setiap aktiviti
                    $arahan_sql_hadir = "select* from kehadiran where
                    nokp = '".$_SESSION['nokp']."' and id_aktiviti ='".$m['id_aktiviti']."' ";

                    #melaksanakan arahan sql mendapatkan data
                    $laksanakan_hadir=mysqli_query($condb, $arahan_sql_hadir);

                    if(mysqli_num_rows($laksanakan_hadir) == 1){
                        echo"&#9989;";
                    }else{
                        echo"&#10060; <br>";

                        if(date("Y-m-d") == $m['tarikh_aktiviti']){
                            #pengesahan kehadiran kendiri
                            echo "<a class = 'pengesahan-kendiri' href = 'profil-sahkendiri.php?id_aktiviti=".$m['id_aktiviti']."'>PENGESAHAN KENDIRI</a>";
                        }
                    }
                    echo"</td></tr>";
                }?>
            </table>
        </td>
        <td align = 'center' valign ='top' bgcolor="#D2B48C">
                <h3>IMBAS KOD UNTUK SAH KEHADIRAN</h3>
                <p>
                    Nama : <?= $_SESSION['nama'] ?><br>
                    Nokp : <?= $_SESSION['nokp'] ?><br>
                </p>
                <?php

                #mengambil data untuk dijadikan qr code atau bar code
                $data = $_SESSION['nokp'];
                $saiz = "200x200";

                #Set umpukkan data API untuk memaparkan qr kod
                $qr_api = "https://quickchart.io/chart?chs=$saiz&cht=qr&chl=".$data;
                echo "<div align ='center'><img width ='50%' src ='".$qr_api."'></div>";
                ?>
                <br>
        </td>
    </tr>
</table>
<?php include('footer.php'); ?>