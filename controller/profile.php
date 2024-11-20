<?php
require '../database/connect.php';
if (isset($_POST['simpan-profile'])) {
   $email = $_POST['id'];
   $gender = $_POST['gender'];
   $agama = $_POST['agama'];
   $no_telepon = $_POST['telepon'];
   $sql = mysqli_query($koneksi, "UPDATE ms_mahasiswa SET no_telepon='$no_telepon', agama='$agama', gender='$gender' WHERE email='$email'");
   if ($sql) {
      $_SESSION["sukses"] = 'Berhasil Simpan Data';
      $_SESSION['redirectlogin'] = 'profile';
   }
}


if (isset($_POST['simpan-user'])) {
   $email = $_POST['id'];
   $password = md5($_POST['password']);
   $rilis = date('Y-m-d H:i:s');
   $sql = mysqli_query($koneksi, "UPDATE user SET password='$password', update_at='$rilis' WHERE username='$email'");
   if ($sql) {
      $_SESSION["sukses"] = 'Berhasil Simpan Data';
      $_SESSION['redirectlogin'] = 'profile';
   }
}
