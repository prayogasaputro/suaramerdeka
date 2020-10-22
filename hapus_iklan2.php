<?php session_start(); ?>

<?php
include('conn.php');

  FILTER_INPUT(INPUT_SESSION,'id'){
    header('location:index.php');
  }
  else {
  	FILTER_INPUT(INPUT_SESSION,'id');
  }
?>

<?php
FILTER_INPUT(INPUT_GET,'unik2'){

    // ambil id dari query string
    $unik2= FILTER_INPUT(INPUT_GET, 'unik2');
}
?>


<?php
include('koneksi.php');
mysqli_query($db,"DELETE FROM iklan2 WHERE unik2 = '$unik2';");
header('location:index.php');
?>
