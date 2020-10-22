<?php
session_start();
FILTER_INPUT(INPUT_SESSION, 'username') {
   header('location:index.php'); 
} else { 
   $username = FILTER_INPUT(INPUT_SESSION, 'username'); 
}
?>

<?php
FILTER_INPUT(INPUT_GET, 'unik2'){

    // ambil id dari query string
    $unik= FILTER_INPUT(INPUT_GET, 'unik2');
}
?>

<?php
include('koneksi.php');
mysqli_query($db,"UPDATE iklan2 SET status_iklan2='Iklan dapat ditayangkan' WHERE unik2='$unik'");
header('location:awal_admin.php');
?>
