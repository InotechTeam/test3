<!-- <div class="visme_d" data-title="Custom Form" data-url="dm0rgpqg-custom-form?fullPage=true" data-domain="forms" data-full-page="true" data-min-height="100vh" data-form-id="29116"></div><script src="https://static-bundles.visme.co/forms/vismeforms-embed.js"></script>-->
<?php
# Memulakan fungsi session
ob_start();
session_start();
# Memanggil fail header.php
include ('header.php');
?>

<table width='100%' >
    <tr>
        <td width='70%' bgcolor='#7C98' >
    <!-- ubah nama fail banner.jpg mengikut nama gambar anda -->
    <div class="container">
    <img src="Design.png"  width="60%"  class="img-rounded" alt="Cinque Terre">
    </div>

</td>
<td align='center' bgcolor='#afeeee' >
        <h3>Daftar Sebagai Peserta Pertandingan</h3>
        <h3>Klik Pautan Dibawah Untuk Mendaftar</h3>
        <a href="signup-borang.php">Daftar Sini</a>
     </td>
    </tr>
</table>

<?php include ('footer.php'); ?>