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
$aksi  = mysqli_query($db, "select * from image_tb where unik='$unik'");
$data = mysqli_fetch_array($aksi);
?>
<img src="<?php <?= $data['img_location']>?; ?>" border="0"/>
