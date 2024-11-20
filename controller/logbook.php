<?php
require '../database/connect.php';
if (isset($_POST['logbook'])) {
   $user = $_POST['user'];
   $checkuser = mysqli_query($koneksi, "SELECT * FROM ms_mahasiswa WHERE email = '$user' ");
   $datauser = mysqli_fetch_array($checkuser);
   $npm = $datauser['id_mahasiswa'];
   $checkprogram = mysqli_query($koneksi, "SELECT * FROM student_mbkm WHERE npm='$npm'");
   $data = mysqli_fetch_array($checkprogram);
   $program = $data['id_peserta'];
   $deskripsi = $_POST['deskripsi'];
   $luaran = $_POST['luaran'];
   $insert = mysqli_query($koneksi, "INSERT INTO report_log_book(npm, description, id_student, status_log, outcome)VALUES('$npm','$deskripsi','$program','0','$luaran')");
   $_SESSION["sukses"] = 'Berhasil Simpan Data';
   $_SESSION['redirectlogin'] = 'log-book';
}
