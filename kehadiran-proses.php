<?php
// Memanggil fail connection.php
include('connection.php');

try {
    // Memadam data kehadiran lama agar dapat memasukkan data kehadiran baru 
    $sqlpadam = mysqli_query($condb, "DELETE FROM kehadiran WHERE id_aktiviti='".$_GET['id_aktiviti']."'");

    if (!$sqlpadam) {
        throw new mysqli_sql_exception(mysqli_error($condb));
    }

    $masa = date("H:i:s");
    foreach ($_POST['kehadiran'] as $nokp) {
        // Menyimpan semula data kehadiran yang baru 
        $simpandata = mysqli_query($condb, "INSERT INTO kehadiran (id, id_aktiviti, nokp, masa_hadir) VALUES ('','".$_GET['id_aktiviti']."','$nokp','$masa')");

        if (!$simpandata) {
            throw new mysqli_sql_exception(mysqli_error($condb));
        }
    }

    echo "<script>alert('Kemaskini Kehadiran Selesai'); window.location.href='kehadiran-borang.php?id_aktiviti=".$_GET['id_aktiviti']."';</script>";
} catch (mysqli_sql_exception $e) {
    // Handle the exception, e.g., display an error message
    echo "Error: " . $e->getMessage();
}
?>
