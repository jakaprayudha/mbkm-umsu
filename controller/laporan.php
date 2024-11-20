<?php
require '../database/connect.php';
if (isset($_POST['report-month'])) {
   $user = $_POST['id'];
   $checkuser = mysqli_query($koneksi, "SELECT * FROM ms_mahasiswa WHERE email = '$user' ");
   $datauser = mysqli_fetch_array($checkuser);
   $npm = $datauser['id_mahasiswa'];
   $checkprogram = mysqli_query($koneksi, "SELECT * FROM student_mbkm WHERE npm='$npm'");
   $data = mysqli_fetch_array($checkprogram);
   $judul = $_POST['judul'];
   $program = $data['id_peserta'];
   $deskripsi = $_POST['deskripsi'];
   $insert = mysqli_query($koneksi, "INSERT INTO report_monthly(npm, description, id_student, title)VALUES('$npm','$deskripsi','$program','$judul')");
   $_SESSION["sukses"] = 'Berhasil Simpan Data';
   $_SESSION['redirectlogin'] = 'laporan';
}

if (isset($_POST['upload-month'])) {
   $id = $_POST['id'];
   $ekstensi_diperbolehkan = array('pdf', 'jpg', 'png', 'JPG', 'JPEG', 'jpeg');
   $namafile = $_FILES['dokumen']['name'];
   $x = explode('.', $namafile);
   $ekstensi = strtolower(end($x));
   $ukuran    = $_FILES['dokumen']['size'];
   $file_tmp = $_FILES['dokumen']['tmp_name'];
   $generatename = uniqid();
   $namafile = $generatename;
   $namafile = $generatename . "." . $ekstensi;

   if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      if ($ukuran < 5044070) {
         move_uploaded_file($file_tmp, '../file/report/' . $namafile);
         $insert = mysqli_query($koneksi, "UPDATE report_monthly SET dokumen='$namafile' WHERE id_rpt_mnth='$id'");
         if ($insert) {
            $_SESSION["sukses"] = 'Berhasil Simpan Data';
         } else {
            $_SESSION["error"] = 'Gagal Simpan';
         }
      } else {
         $_SESSION["error"] = 'Ukuran File Terlalu Besar Max File 5MB';
      }
   } else {
      $_SESSION["error"] = 'Ekstension File Upload Tidak Diperbolehkan, File Harus Format JPG, PNG, PDF';
   }
   $_SESSION['redirectlogin'] = 'log-book';
}
