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
    $unik= $_GET['unik2'];
}
?>

<?php
include('koneksi.php');
$aksi2  = mysqli_query($db, "select * from image_tb2 where unik2='$unik'");
$data2 = mysqli_fetch_array($aksi2);
?>
<img src="<?php <?= $data2['img_location2']>?; ?>" border="0"/>
