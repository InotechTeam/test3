<?php
#memulakan fungsi session 
session_start();

#memanggil fail header.php, connection.php dan kawalan-admin.php 
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<!-- Header bagi jadual untuk memaparkan senarai ahli -->
<h3 align= 'center'>Senarai peserta</h3>

<table align='center' width='100%' border='1' id='saiz'>
    <tr bgcolor='cyan'>
        <td colspan='3'>
            <form action='' method='POST' style="margin:0; padding:0;">
            <input type='text'  name='nama'  placeholder='Carian Nama Ahli'>
            <input type='submit' value='Cari'>
</form>
</td>
<td colspan='3' align='right'>
    <a href='upload.php'>Muat Naik Peserta</a>
    <?php include('butang-saiz.php');
?>
</td>
</tr>
<tr bgcolor='yellow'>
    <td width='35%'>Nama</td>
    <td width='15%'>Nokp</td>
    <td width='10%'>Sekolah</td>
    <td width='10%'>Katalaluan</td>
    <td width='10%'>tahap</td>
    <td width='20%'>Tindakan</td>

</tr>

<?php
#syarat tambahan yang akan dimasukkan dalam arahan(query) senarai peserta
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan= " and peserta.nama like '%".$_POST['nama']."%'";
}

# arahan query untuk mencari senarai nama peserta

$arahan_papar="select* from peserta, sekolah 
where peserta.id_sekolah = sekolah.id_sekolah
$tambahan";

#laksanakan arahan mencari data peserta 
$laksana = mysqli_query($condb,$arahan_papar);
 
#mengambil data yang ditemui 
    while($m = mysqli_fetch_array($laksana))
    {
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini peserta
        $data_get=array(
            'nama'         => $m['nama'],
            'nokp'         => $m['nokp'],
            'katalaluan'   => $m['katalaluan'],
            'tahap'        => $m['tahap'],
            'id_sekolah'   => $m['id_sekolah'],
            'nama_sekolah' => $m['Nama_sekolah']
        );

        # memaparkan senarai nama dalam jadual 
        echo"<tr>
        <td>".$m['nama']."</td>
        <td>".$m['nokp']."</td>
        <td>".$m['Nama_sekolah']."</td>
        <td>".$m['katalaluan']."</td>
        <td>".$m['tahap']."</td> ";

        #memaparkan navigasi untuk kemaskini dan hapus data peserta
        echo"<td>
        <a href='peserta-kemaskini-borang.php?".http_build_query($data_get)."'>
        </a>
        
        <a href='peserta-padam-proses.php?nokp=".$m['nokp']."'
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
Hapus</a>|

        </td>
        </tr>";

    }

    ?>
    </table>
    <?php include ('footer.php');
    ?>