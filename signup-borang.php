<?php
#memulakan fungsi SESSION 
session_start();

#Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');
?>

<!-- TAJUK ANTARA MUKA -->
<style>
  .bolder-heading {
    font-weight: 800; /* You can adjust the value as needed */
  }
</style>

<h4 class="bolder-heading">Pendaftaran Peserta Baru</h4>

<!-- Borang Pendaftaran Peserta Baru -->
<form action = 'signup-proses.php' method = 'POST'>
    Nama Peserta <br>  <input type ='text'  name ='nama' required> <br>
    Nokp Peserta <br> <input type ='text'  name ='nokp' placeholder=" cth: 123456789012" patern="[0-9] {12}"
    oninvalid="this.setCustomValidity ('Sila masukkan 12 digit nombor sahaja')"
    oninput="this.setCustomValidity('')"
    valid required> <br>
    Sekolah      <br> <select name='id_sekolah'><br>
                  <option selected disabled value>Sila Pilih Sekolah</option>
                  <?php
                  # Proses memaparkan senarai sekolah dalam bentuk drop down list 
                  $arahan_sql_pilih = "select* from sekolah";
                  $laksana_arahan_pilih = mysqli_query($condb,$arahan_sql_pilih);
                  while($m=mysqli_fetch_array($laksana_arahan_pilih))
                  {
                    echo "<option value='".$m['id_sekolah']."'>
                     " .$m['Nama_sekolah']."
                    </option>";
                  }
                  ?>
                </select> <br>
    Katalaluan  <br> <input type ='password' name ='katalaluan'  required> <br>
                 <input type ='submit'  value='Daftar'>

 </form>
 <?php include ('footer.php');?>
