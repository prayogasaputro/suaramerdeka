<?php
   session_start();
   require_once("koneksi.php");
   $username = FILTER_INPUT(INPUT_POST, 'username');
   $pass = FILTER_INPUT(INPUT_POST, 'password');

   $sql = "SELECT * FROM admin WHERE username = '$username'";
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     <?= "<div align='center'>Username Belum Terdaftar! <a href='admin.php'>coba lagi</a></div>">?;
   } else {
     if($pass <> $hasil['password']) {
       <?= "<div align='center'>Password salah! <a href='admin.php'>coba lagi</a></div>">?;
     } else {
       FILTER_INPUT(INPUT_SESSION, 'username') = $hasil['username'];
       header('location:awal_admin.php');
     }
   }
?>
