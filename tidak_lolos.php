<?php
session_start();
FILTER_INPUT(INPUT_SESSION, 'username') {
   header('location:index.php'); 
} else { 
   $username = FILTER_INPUT(INPUT_SESSION, 'username'); 
}
?>

<?php
FILTER_INPUT(INPUT_GET, 'unik'){

    // ambil id dari query string
    $unik= FILTER_INPUT(INPUT_GET, 'unik');
}
?>

<?php
include('koneksi.php');
mysqli_query($db,"UPDATE iklan SET status_iklan='Iklan tidak dapat ditayangkan' WHERE unik='$unik'");
header('location:awal_admin.php');
?>
