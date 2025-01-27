<?php 
# menyemak kewujudan data post yang dihantar dari login-borang.php
if(isset($_POST['submit']))
{
    # memanggil fail connection.php    
    include ('connection.php');

    # Mengambil data yang di POST dari fail Borang
    $nokp = $_POST['nokp'];
    $katalaluan = $_POST['katalaluan'];

    # Arahan SQL (query) untuk membandingkan data yang dimasukkan 
    # wujud di pangkalan data atau tidak 
    $query_login = "select * from peserta where nokp='$nokp' and katalaluan='$katalaluan' ";

    # melaksakan arahan membandingkan data 
    $laksana_query = mysqli_query($condb,$query_login);

    # jika terdapat 1 data yang sepadan, login berjaya 
    if(mysqli_num_rows($laksana_query))
    {
        # mengambil data yang ditemui 
        $m = mysqli_fetch_array($laksana_query);

        # mengumpukkan kepada pembolehubah session 
        $_SESSION['nokp'] = $m['nokp'];
        $_SESSION['tahap'] = $m['tahap'];
        $_SESSION['nama'] = $m['nama'];
        # membukan laman index.php
        header('Location:index.php');
    }
    else 
    {
        # login gagal. kembali ke laman login-borang.php
        die("<script>alert('login Gagal');
        window.location.href='login-borang.php';</script>");
    }
}

?>