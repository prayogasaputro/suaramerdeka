<?php

include("koneksi.php");

FILTER_INPUT(INPUT_GET, 'unik'){

    // ambil id dari query string
    $unik= FILTER_INPUT(INPUT_GET, 'unik');
}
?>

<?php
include('koneksi.php');
mysqli_query($db,"DELETE FROM iklan WHERE unik = '$unik';");
header('location:index.php');
?>
