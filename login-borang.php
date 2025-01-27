<?php
    ob_start();
    session_start();

    // if(isset($_SESSION['tahap'])){
    //     header('Location:index.php');
    // }

    #Memanggil fail header,php 
    include('header.php');
?>
    <!-- borang daftar masuk login/sign in) -->
    <style>
  .bolder-heading {
    font-weight: 800; /* You can adjust the value as needed */
  }
</style>

<h4 class="bolder-heading">Login Peserta Dan Admin</h4>
    <form method='post'>
        Nokp      <br> <input type='text'  name='nokp'><br>
        Katalaluan <br><input type='password' name='katalaluan'><br>
                <input type='submit'  name='submit'>

    </form>

<?php 
    include('login-proses.php');
    include('footer.php');
?>
