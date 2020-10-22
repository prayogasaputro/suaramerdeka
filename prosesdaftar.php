<?php
   require_once("koneksi.php");
   $nama = FILTER_INPUT(INPUT_POST, 'fullName2');
   $alamat = FILTER_INPUT(INPUT_POST, 'addressLine12');
   $email = FILTER_INPUT(INPUT_POST, 'email2');
   $username = FILTER_INPUT(INPUT_POST. 'namaPengguna2');
   $pass = FILTER_INPUT(INPUT_POST, 'kataSandi2');
   $sql = "SELECT * FROM pemasang WHERE namapengguna2 = '$username'";
   $query = $db->query($sql);
   if($query->num_rows != 0) {
     <?= "<div align='center'>Username Sudah Terdaftar! <a href='index.html'>coba lagi</a></div>">?;
   } else {
     if(!$nama || !$alamat || !$email || !$username || !$pass) {
       <?= "<div align='center'>Masih ada data yang kosong! <a href='index.html'>coba lagi</a>">?;
     } else {
       $data = "INSERT INTO pemasang VALUES (NULL, '$nama', '$alamat', '$email', '$username', '$pass')";
       $simpan = $db->query($data);
       if($simpan) {
         <?= "<div align='center'>Pendaftaran Sukses, Silahkan <a href='index.html'>Masuk</a></div>">?;
       } else {
         <?= "<div align='center'>Proses Gagal!</div>">?;
       }
     }
   }
?>
