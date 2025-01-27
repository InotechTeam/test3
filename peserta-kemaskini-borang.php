<?php 
# Memulakan fungsi session 
session_start(); 
 
# Memanggil fail header dan fail kawalan-admin.php 
include('header.php'); 
include('kawalan-admin.php'); 
include('connection.php'); 
 
# Menyemak kewujudan data GET. Jika data GET kosong, alihkan ke fail senarai-pelajar 
if (empty($_GET)) { 
    echo "<script>window.location.href='senarai-peserta.php';</script>"; 
    exit; 
} 
 
?> 
 
<h3>Kemaskini Peserta Baru</h3> 
<form action='peserta-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'> 
    Nama<br> 
    <input type='text' name='nama' value='<?= isset($_GET['nama']) ? $_GET['nama'] : '' ?>' required><br> 
 
    No Kad Pengenalan<br> 
    <input type='text' name='nokp' value='<?= isset($_GET['nokp']) ? $_GET['nokp'] : '' ?>' required><br> 
 
    Katalaluan<br> 
    <input type='text' name='katalaluan' value='<?= isset($_GET['katalaluan']) ? $_GET['katalaluan'] : '' ?>' required><br> 
 
    Tahap<br> 
    <select name='tahap'><br> 
        <option value='<?= isset($_GET['tahap']) ? $_GET['tahap'] : '' ?>'> <?= isset($_GET['tahap']) ? $_GET['tahap'] : '' ?> </option> 
        <?php 
        # Proses memaparkan senarai tahap dalam bentuk drop down list 
        $arahan_sql_tahap      = "SELECT tahap FROM peserta GROUP BY tahap ORDER BY tahap"; 
        $laksana_arahan_tahap  = mysqli_query($condb,$arahan_sql_tahap); 
        while($n=mysqli_fetch_array($laksana_arahan_tahap)) 
        { 
            if($n['tahap'] != $_GET['tahap']){ 
                echo "<option value='".$n['tahap']."'> 
                    ".$n['tahap']." 
                    </option>"; 
            } 
        } 
        ?> 
    </select> <br> 
 
    Tingkatan<br> 
    <select name='id_kelas'><br> 
        <option value='<?= isset($_GET['id_kelas']) ? $_GET['id_kelas'] : '' ?>'> 
            <?= isset($_GET['ting']) && isset($_GET['nama_kelas']) ? $_GET['ting']." ".$_GET['nama_kelas'] : '' ?> 
        </option> 
        <?php 
        # Proses memaparkan senarai kelas dalam bentuk drop down list 
        $arahan_sql_pilih      = "SELECT id_kelas, ting, nama_kelas FROM kelas ORDER BY ting, nama_kelas"; 
        $laksana_arahan_pilih  = mysqli_query($condb,$arahan_sql_pilih); 
        while($m=mysqli_fetch_array($laksana_arahan_pilih)) 
        { 
            if($m['id_kelas'] != $_GET['id_kelas']){ 
                echo "<option value='".$m['id_kelas']."'> 
                    ".$m['ting']." ".$m['nama_kelas']." 
                    </option>"; 
            } 
        } 
        ?> 
    </select> <br> 
 
    <input type='submit' value='Kemaskini'> 
</form> 
<?php include ('footer.php'); ?>