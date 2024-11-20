<?php
require 'database/connect.php';
if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $param = "SELECT * FROM user WHERE username = '$username'";
   $sql = mysqli_query($koneksi, $param);
   $datauser = mysqli_fetch_array($sql);
   if ($datauser['username'] == $username) {
      $passwordDB = $datauser['password'];
      if ($passwordDB == $password) {
         session_start();
         $_SESSION['id_user'] = $datauser['id_user'];
         $_SESSION['username'] = $datauser['username'];
         $_SESSION['roles'] = $datauser['roles'];
         $_SESSION['status'] = $datauser['status_user'];
         $_SESSION['fullname'] = $datauser['fullname'];
         if ($datauser['roles'] == 'admin') {
            $_SESSION["sukses"] = 'Selamat Anda Berhasil Login Sebagai Admin';
            $_SESSION['redirectlogin'] = 'admin';
         } else if ($datauser['roles'] == 'student') {
            $_SESSION["sukses"] = 'Selamat Anda Berhasil Login Sebagai Student';
            $_SESSION['redirectlogin'] = 'student';
         }
      } else {
         $_SESSION["error"] = 'Password Salah';
         $_SESSION['redirectlogin'] = '';
      }
   } else {
      $_SESSION["error"] = 'Username Tidak Ada';
      $_SESSION['redirectlogin'] = '';
   }
}

if (isset($_POST['reset'])) {
   $username = $_POST['username'];
   $param = "SELECT * FROM user WHERE username = '$username'";
   $sql = mysqli_query($koneksi, $param);
   $datauser = mysqli_fetch_array($sql);
   if ($datauser['username'] == $username) {
      $newpassword = md5('123456');
      $update = mysqli_query($koneksi, "UPDATE user SET password ='$newpassword' WHERE username='$username' ");
      $passwordDB = $datauser['password'];
      if ($update) {
         $_SESSION["sukses"] = 'Berhasil Reset Password !';
         $_SESSION['redirectlogin'] = 'index';
      }
   } else {
      $_SESSION["error"] = 'Username Tidak Ada';
      $_SESSION['redirectlogin'] = '';
   }
}
